<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Key;
use App\Models\CategoryProduct;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Models\ProductTranslation;
use App\Models\Attribute;
use App\Models\Supplier;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\ProductForCategory;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use App\Traits\ParagraphTrait;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ValidateAddProduct;
use App\Http\Requests\Admin\ValidateEditProduct;

use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;
use App\Models\ProductVariant;
use App\Models\Variant;
use App\Models\ParagraphProduct;
use App\Models\ParagraphProductTranslation;
use App\Models\Question;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class AdminProductController extends Controller
{
    //
    use StorageImageTrait, DeleteRecordTrait, ParagraphTrait;
    private $product;
    private $categoryProduct;
    private $htmlselect;
    private $productImage;
    private $tag;
    private $option;
    private $optionValue;
    private $productTag;
    private $productTranslation;
    private $supplier;
    private $attribute;
    private $langConfig;
    private $langDefault;
    private $typeParagraph;
    private $configParagraph;

    public function __construct(
        ProductTranslation $productTranslation,
        Product $product,
        CategoryProduct $categoryProduct,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag,
        Attribute $attribute,
        Supplier $supplier,
        Option $option,
        OptionValue $optionValue,
        ParagraphProduct $paragraphProduct,
        ParagraphProductTranslation $paragraphProductTranslation
    ) {
        $this->product = $product;
        $this->categoryProduct = $categoryProduct;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->productTranslation = $productTranslation;
        $this->paragraphProduct = $paragraphProduct;
        $this->paragraphProductTranslation = $paragraphProductTranslation;
        $this->attribute = $attribute;
        $this->supplier = $supplier;
        $this->option = $option;
        $this->optionValue = $optionValue;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');

        $this->typeParagraph = config('paragraph.products');
        $this->configParagraph = config('paragraph.products');
    }
    //
    public function index(Request $request)
    {
        //   dd(App::getLocale());
        $totalProduct = $this->product->all()->count();
        $data = $this->product;
        if ($request->input('category')) {
            $categoryProductId = $request->input('category');
            $idCategorySearch = $this->categoryProduct->getALlCategoryChildren($categoryProductId);
            $idCategorySearch[] = (int)($categoryProductId);
            $data = $data->whereIn('category_id', $idCategorySearch);
            $htmlselect = $this->categoryProduct->getHtmlOption($categoryProductId);
        } else {
            $htmlselect = $this->categoryProduct->getHtmlOption();
        }
        $where = [];
        $orWhere = null;
        if ($request->input('keyword')) {

            $data = $data->where(function ($query) {
                $idProTran = $this->productTranslation->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('product_id');
                // dd($idProTran);
                $query->whereIn('id', $idProTran)->orWhere([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            // $orWhere = ['masp', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');

            switch ($key) {
                case 'hot':
                    $where[] = ['hot', '=', 1];
                    break;
                case 'sp_km':
                    $where[] = ['sp_km', '=', 1];
                    break;
                case 'active':
                    $where[] = ['active', '=', 1];
                    break;
                case 'no_active':
                    $where[] = ['active', '=', 0];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }
        //  dd($orWhere);
        if ($orWhere) {
            $data = $data->orWhere(...$orWhere);
        }
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'viewASC':
                    $orderby = [
                        'view',
                        'ASC'
                    ];
                    break;
                case 'viewDESC':
                    $orderby = [
                        'view',
                        'DESC'
                    ];
                    break;
                case 'priceASC':
                    $orderby = [
                        'price',
                        'ASC'
                    ];
                    break;
                case 'priceDESC':
                    $orderby = [
                        'price',
                        'DESC'
                    ];
                    break;
                case 'payASC':
                    $orderby = [
                        'pay',
                        'ASC'
                    ];
                    break;
                case 'payDESC':
                    $orderby = [
                        'pay',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }
        //  dd($this->product->select('*', \App\Models\Store::raw('Sum(quantity) as total')->whereRaw('products.id','stores.product_id'))->orderBy('total')->paginate(15));
        //  dd($data->get()->first()->name);
        $data = $data->paginate(15);

        return view(
            "admin.pages.product.list",
            [
                'data' => $data,
                'totalProduct' => $totalProduct,
                'option' => $htmlselect,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }

    public function loadActive($id)
    {
        $product   =  $this->product->find($id);
        $active = $product->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $product->update([
            'active' => $activeUpdate,
        ]);
        // dd($updateResult);
        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function loadHot($id)
    {
        $product   =  $this->product->find($id);
        $hot = $product->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $product->update([
            'hot' => $hotUpdate,
        ]);

        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function loadKhuyenMai($id)
    {
        $product   =  $this->product->find($id);
        $sp_km = $product->sp_km;

        if ($sp_km) {
            $spkmUpdate = 0;
        } else {
            $spkmUpdate = 1;
        }
        $updateResult =  $product->update([
            'sp_km' => $spkmUpdate,
        ]);

        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-sp_km', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function loadyeuThich($id)
    {
        $product   =  $this->product->find($id);
        $sp_ngoc = $product->sp_ngoc;

        if ($sp_ngoc) {
            $spytUpdate = 0;
        } else {
            $spytUpdate = 1;
        }
        $updateResult =  $product->update([
            'sp_ngoc' => $spytUpdate,
        ]);

        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-sp_ngoc', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function boSuuTap($id)
    {
        $product   =  $this->product->find($id);
        $bo_suu_tap = $product->bo_suu_tap;

        if ($bo_suu_tap) {
            $boSuuTapUpdate = 0;
        } else {
            $boSuuTapUpdate = 1;
        }
        $updateResult =  $product->update([
            'bo_suu_tap' => $boSuuTapUpdate,
        ]);

        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-bo_suu_tap', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function create(Request $request = null)
    {
        $htmlselect = $this->categoryProduct->getHtmlOption();

        $attributes = $this->attribute->where('parent_id', 0)->get();
        $questions = Question::where('parent_id', 0)->get();
        $supplier = $this->supplier->all();
        $data_cate = $this->categoryProduct->with('translationsLanguage')->where('parent_id', 185)->orderBy("order")->get();
        $url = URL::to('/');
        return view(
            "admin.pages.product.add",
            [
                'option' => $htmlselect,
                'url' => $url,
                'data_cate' => $data_cate,
                'questions' => $questions,
                'attributes' => $attributes,
                'supplier' => $supplier,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddProduct $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            $dataProductCreate = [
                "masp" => $request->input('masp'),
                "price" => $request->input('price') ?? 0,
                "old_price" => $request->input('old_price') ?? 0,
                "size" => $request->input('size') ?? null,
                "color" => $request->input('color') ?? null,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "bo_suu_tap" => $request->input('bo_suu_tap') ?? 0,
                "sp_km" => $request->input('sp_km') ?? 0,
                "option_status" => $request->input('option_status') ?? 0,
                "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                "order" => $request->input('order') ?? null,
                "file3" => $request->input('file3') ?? null,
                // "pay"=>$request->input('pay'),
                // "number"=>$request->input('number'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "active" => $request->input('active'),
                "category_id" => $category_id[0]??0,
                "supplier_id" => $request->input('supplier_id') ?? 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            //    dd($dataProductCreate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadAvatar = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file"] = $dataUploadAvatar["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "file2", "file");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["file2"] = $dataUploadAvatar["file_path"];
            }
            // $dataUploadAvatar = $this->storageTraitUpload($request, "file3", "file");
            // if (!empty($dataUploadAvatar)) {
            //     $dataProductCreate["file3"] = $dataUploadAvatar["file_path"];
            // }
            // dd($dataProductCreate);
            // insert database in product table
            $product = $this->product->create($dataProductCreate);

            if ($request->has("category")) {
                $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('category') as $categoryItem) {
                    if ($categoryItem) {
                        $categoryInstance = $this->categoryProduct->find($categoryItem);
                        $category_ids[] = $categoryInstance->id;
                    }
                }
                //dd($category_ids);
                
                $product_cate = $product->productscate()->attach($category_ids);
            }
            // insert data product lang
            $dataProductTranslation = [];
            foreach ($this->langConfig as $key => $value) {
                $itemProductTranslation = [];
                $itemProductTranslation['name'] = $request->input('name_' . $key);
                $itemProductTranslation['slug'] = $request->input('slug_' . $key);
                $itemProductTranslation['link1'] = $request->input('link1_' . $key);
                $itemProductTranslation['link2'] = $request->input('link2_' . $key);
                $itemProductTranslation['link3'] = $request->input('link3_' . $key);
                $itemProductTranslation['link4'] = $request->input('link4_' . $key);
                $itemProductTranslation['description'] = $request->input('description_' . $key);
                $itemProductTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemProductTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemProductTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemProductTranslation['content'] = $request->input('content_' . $key);
                //add
                $itemProductTranslation['content2'] = $request->input('content2_' . $key);
                $itemProductTranslation['content3'] = $request->input('content3_' . $key);
                $itemProductTranslation['content4'] = $request->input('content4_' . $key);
                $itemProductTranslation['model'] = $request->input('model_' . $key);
                $itemProductTranslation['tinhtrang'] = $request->input('tinhtrang_' . $key);
                $itemProductTranslation['baohanh'] = $request->input('baohanh_' . $key);
                $itemProductTranslation['xuatsu'] = $request->input('xuatsu_' . $key);

                $itemProductTranslation['language'] = $key;
                $dataProductTranslation[] = $itemProductTranslation;
            }
            //    dd($dataProductTranslation);
            $productTranslation =   $product->translations()->createMany($dataProductTranslation);
            //  dd($productTranslation);
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 4;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $product->id;
                $dataKey = Key::create($itemKey);
            }
            // insert database to product_images table
            if ($request->hasFile("image")) {
                //
                $dataProductImageCreate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $dataProductImageCreate[] = [
                        "name" => $dataProductImageDetail["file_name"],
                        "image_path" => $dataProductImageDetail["file_path"]
                    ];
                }
                // insert database in product_images table by createMany
                $productImage =   $product->images()->createMany($dataProductImageCreate);
            }

            // insert attribute to product
            if ($request->has("attribute")) {
                $attribute_ids = [];
                foreach ($request->input('attribute') as $attributeItem) {
                    if ($attributeItem) {
                        $attributeInstance = $this->attribute->find($attributeItem);
                        $attribute_ids[] = $attributeInstance->id;
                    }
                }

                $attribute = $product->attributes()->attach($attribute_ids);
            }
            // insert question to product
            if ($request->has("question")) {
                $question_ids = [];
                foreach ($request->input('question') as $questionItem) {
                    if ($questionItem) {
                        $questionInstance = Question::find($questionItem);
                        $question_ids[] = $questionInstance->id;
                    }
                }

                $question = $product->questions()->attach($question_ids);
            }
            // insert database to product_tags table
            foreach ($this->langConfig as $key => $value) {
                if ($request->has("tags_" . $key)) {
                    $tag_ids = [];
                    foreach ($request->input('tags_' . $key) as $tagItem) {
                        $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                        $tag_ids[] = $tagInstance->id;
                    }
                    $product->tags()->attach($tag_ids, ['language' => $key]);
                }
            }

            if ($request->has("priceOption")) {
                //
                $dataProductOptionCreate = [];
                foreach ($request->input('priceOption') as $key => $value) {
                    if ($value || $request->input('sizeOption')[$key] || $request->input('old_priceOption')[$key]) {

                        $dataProductOptionCreate[] = [
                            "price" => $request->input('priceOption')[$key],
                            "old_price" =>  $request->input('old_priceOption')[$key],
                            "size" =>  $request->input('sizeOption')[$key],
                            "color" =>  null,
                            "avatar_type" => null,
                        ];
                    }
                }
                $product->options()->createMany($dataProductOptionCreate);
            }

            if ($request->has('typeParagraph')) {
                $dataParagraphCreate = [];
                foreach ($request->input('typeParagraph') as $key => $typeParagraph) {
                    if ($typeParagraph) {
                        $dataParagraphCreateItem = [];
                        $dataParagraphCreateItem = [
                            "active" => $request->input('activeParagraph')[$key],
                            "type" => $typeParagraph,
                            "parent_id" => $request->input('parentIdParagraph')[$key] ?? 0,
                            "order" => $request->input('orderParagraph')[$key] ?? 0,
                            "admin_id" => auth()->guard('admin')->id()
                        ];

                        //  dd(count($request->image_path_paragraph));
                        //dd($request->hasFile('image_path_paragraph[0]'));
                        $dataUploadParagraphAvatar = $this->storageTraitUploadMutipleArray($request, "image_path_paragraph", $key, "product");
                        if (!empty($dataUploadParagraphAvatar)) {
                            $dataParagraphCreateItem["image_path"] = $dataUploadParagraphAvatar["file_path"];
                        }
                        $dataParagraphCreate[] = $dataParagraphCreateItem;
                        $paragraph = $product->paragraphs()->create(
                            $dataParagraphCreateItem
                        );

                        // insert data paragraph lang
                        $dataParagraphTranslation = [];
                        //  dd($this->langConfig);
                        foreach ($this->langConfig as $keyL => $valueL) {
                            $itemParagraphTranslation = [];
                            $itemParagraphTranslation['name'] = $request->input('nameParagraph_' . $keyL)[$key];
                            $itemParagraphTranslation['value'] = $request->input('valueParagraph_' . $keyL)[$key];
                            $itemParagraphTranslation['language'] = $keyL;
                            $dataParagraphTranslation[] = $itemParagraphTranslation;
                        }
                        // dd($dataParagraphTranslation);
                        $paragraphTranslation =   $paragraph->translations()->createMany($dataParagraphTranslation);
                        //  dd($paragraphTranslation);
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.product.index')->with("alert", "Thêm sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index')->with("error", "Thêm sản phẩm không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->product->find($id);
        $attributes = $this->attribute->where('parent_id', 0)->get();
        $questions = Question::where('parent_id', 0)->get();
        $category_id = $data->category_id;
        $htmlselect = $this->categoryProduct->getHtmlOption($category_id);
        $supplier = $this->supplier->all();
        $data_cate_ed = $this->categoryProduct->with('translationsLanguage')->where('parent_id', 185)->orderBy("order")->get();
        $categoryProductOfAdmin = ProductForCategory::where('product_id', $data->id)->get()->pluck('category_id');
        $url = URL::to('/');
        return view("admin.pages.product.edit", [
            'option' => $htmlselect,
            'data' => $data,
            'data_cate_ed' => $data_cate_ed,
            'categoryProductOfAdmin' => $categoryProductOfAdmin,
            'url' => $url,
            'questions' => $questions,
            'attributes' => $attributes,
            'supplier' => $supplier,
            'configParagraph' => $this->configParagraph
        ]);
    }
    public function update(ValidateEditProduct $request, $id)
    {
//         dd($request->all());
        $category_id = [];
        $category_id = $request->input('category');
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                "masp" => $request->input('masp') ?? null,
                "price" => $request->input('price') ?? 0,
                "old_price" => $request->input('old_price') ?? 0,
                "size" => $request->input('size') ?? null,
                "color" => $request->input('color') ?? null,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "bo_suu_tap" => $request->input('bo_suu_tap') ?? 0,
                "sp_km" => $request->input('sp_km') ?? 0,
                "option_status" => $request->input('option_status') ?? 0,
                "sp_ngoc" => $request->input('sp_ngoc') ?? 0,
                "order" => $request->input('order') ?? null,
                "file3" => $request->input('file3') ?? null,
                // "pay"=>$request->input('pay'),
                // "number"=>$request->input('number'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "active" => $request->input('active'),
                "category_id" => $category_id[0]??0,
                "supplier_id" => $request->input('supplier_id') ?? 0,
                "admin_id" => auth()->guard('admin')->id()
            ];
            // dd( $dataProductUpdate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "product");
            if (!empty($dataUploadAvatar)) {
                $path = $this->product->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $dataUploadFile = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadFile)) {
                $path = $this->product->find($id)->file;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductUpdate["file"] = $dataUploadFile["file_path"];
            }

            $dataUploadFile2 = $this->storageTraitUpload($request, "file2", "file");
            if (!empty($dataUploadFile2)) {
                $path = $this->product->find($id)->file2;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductUpdate["file2"] = $dataUploadFile2["file_path"];
            }

            // $dataUploadFile3 = $this->storageTraitUpload($request, "file3", "file");
            // if (!empty($dataUploadFile3)) {
            //     $path = $this->product->find($id)->file3;
            //     if ($path) {
            //         Storage::delete($this->makePathDelete($path));
            //     }
            //     $dataProductUpdate["file3"] = $dataUploadFile3["file_path"];
            // }

            // insert database in product table
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            if ($request->has("category")) {
                $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('category') as $categoryItem) {
                    if ($categoryItem) {
                        $categoryInstance = $this->categoryProduct->find($categoryItem);
                        $category_ids[] = $categoryInstance->id;
                    }
                }
                //dd($category_ids);
                
                $product_cate = $product->productscate()->sync($category_ids);
            }
            // insert data product lang
            $dataProductTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemProductTranslationUpdate = [];
                $itemProductTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemProductTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemProductTranslationUpdate['link1'] = $request->input('link1_' . $key);
                $itemProductTranslationUpdate['link2'] = $request->input('link2_' . $key);
                $itemProductTranslationUpdate['link3'] = $request->input('link3_' . $key);
                $itemProductTranslationUpdate['link4'] = $request->input('link4_' . $key);
                $itemProductTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemProductTranslationUpdate['description_seo'] = $request->input('description_seo_' . $key);
                $itemProductTranslationUpdate['title_seo'] = $request->input('title_seo_' . $key);
                $itemProductTranslationUpdate['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemProductTranslationUpdate['content'] = $request->input('content_' . $key);

                //add
                $itemProductTranslationUpdate['content2'] = $request->input('content2_' . $key);
                $itemProductTranslationUpdate['content3'] = $request->input('content3_' . $key);
                $itemProductTranslationUpdate['content4'] = $request->input('content4_' . $key);
                $itemProductTranslationUpdate['model'] = $request->input('model_' . $key);
                $itemProductTranslationUpdate['tinhtrang'] = $request->input('tinhtrang_' . $key);
                $itemProductTranslationUpdate['baohanh'] = $request->input('baohanh_' . $key);
                $itemProductTranslationUpdate['xuatsu'] = $request->input('xuatsu_' . $key);

                $itemProductTranslationUpdate['language'] = $key;
                //  dd($itemProductTranslationUpdate);
                //  dd($product->translations($key)->first());
                if ($product->translationsLanguage($key)->first()) {
                    $product->translationsLanguage($key)->first()->update($itemProductTranslationUpdate);
                } else {
                    $product->translationsLanguage($key)->create($itemProductTranslationUpdate);
                }
                //  $dataProductTranslationUpdate[] = $itemProductTranslationUpdate;
                //   $dataProductTranslationUpdate[] = new ProductTranslation($itemProductTranslationUpdate);
            }
            //    dd($product->translations);
            //   $productTranslation =   $product->translations()->saveMany($dataProductTranslationUpdate);
            //  $productTranslation =   $product->translations()->createMany($dataProductTranslationUpdate);

            // dd($product->translations);
            //Sửa slug vào bảng key
//            dd($itemProductTranslationUpdate);
            foreach ($this->langConfig as $key => $value) {
                $dataKey = Key::where('type', 4)->where('key_id', $product->id)->where('language', $key)->first();
                $itemKey = [];
                if ($dataKey) {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 4;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $product->id;
                } else {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 4;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $product->id;
                }

                if ($product->key($key)->first()) {
                    $product->key($key)->first()->update($itemKey);
                } else {
                    $product->key($key)->create($itemKey);
                }
            }

            // insert attribute to product
            if ($request->has("attribute")) {
                $attribute_ids = [];
                foreach ($request->input('attribute') as $attributeItem) {
                    if ($attributeItem) {
                        $attributeInstance = $this->attribute->find($attributeItem);
                        $attribute_ids[] = $attributeInstance->id;
                    }
                }

                $attribute = $product->attributes()->sync($attribute_ids);
            }
            // insert question to product
            if ($request->has("question")) {
                $question_ids = [];
                foreach ($request->input('question') as $questionItem) {
                    if ($questionItem) {
                        $questionInstance = Question::find($questionItem);
                        $question_ids[] = $questionInstance->id;
                    }
                }

                $product->questions()->sync($question_ids);
            }

            // insert database to product_images table
            if ($request->hasFile("image")) {
                //
                //   $product->images()->where("product_id", $id)->delete();
                $dataProductImageUpdate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $itemImage = [
                        "name" => $dataProductImageDetail["file_name"],
                        "image_path" => $dataProductImageDetail["file_path"]
                    ];
                    $dataProductImageUpdate[] = $itemImage;
                }
                // insert database in product_images table by createMany
                // dd($dataProductImageUpdate);
                $product->images()->createMany($dataProductImageUpdate);
                //  dd($product->images);
            }
            //  dd($product->images);
            // insert database to product_tags table
            $tag_ids = [];
            foreach ($this->langConfig as $key => $value) {

                if ($request->has("tags_" . $key)) {
                    foreach ($request->input('tags_' . $key) as $tagItem) {
                        $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                        $tag_ids[$tagInstance->id] = ['language' => $key];
                    }
                    //   $product->tags()->attach($tag_ids, ['language' => $key]);
                    // Các syncphương pháp chấp nhận một loạt các ID để ra trên bảng trung gian. Bất kỳ ID nào không nằm trong mảng đã cho sẽ bị xóa khỏi bảng trung gian.
                }
            }
            // dd($tag_ids);
            $product->tags()->sync($tag_ids);
            //  dd($product->tags);
            // end update tag


            if ($request->has("priceOption")) {
                //
                $dataProductOptionCreate = [];
                foreach ($request->input('priceOption') as $key => $value) {
                    if ($value || $request->input('sizeOption')[$key] || $request->input('old_priceOption')[$key]) {


                        // $file_path = null;

                        // if ($request->file('avatar_type')[$key] ?? false) {

                        //     $arr = $request->file('avatar_type')[$key];

                        //     $dataProductImageDetail = $this->storageTraitUploadMutiple2($arr, "product");

                        //     $file_path = $dataProductImageDetail["file_path"];
                        // }

                        $dataProductOptionCreate[] = [
                            "price" => $request->input('priceOption')[$key],
                            "old_price" => $request->input('old_priceOption')[$key],
                            "size" =>  $request->input('sizeOption')[$key],
                            "color" =>  null,
                            "avatar_type" =>  null,
                        ];
                    }
                }
                // dd($dataProductOptionCreate);
                // insert database in product_images table by createMany
                $product->options()->createMany($dataProductOptionCreate);
            }

            if ($request->has("idOption")) {
                //
                foreach ($request->input('idOption') as $key => $value) {
                    if ($value && ($request->input('priceOptionOld')[$key] || $request->input('sizeOptionOld')[$key] || $request->input('old_priceOptionOld')[$key])) {
                        $option = $this->option->find($value);
                        if ($option) {

                            // if ($request->file('avatar_typeOld')[$key] ?? false) {

                            //     $arr = $request->file('avatar_typeOld')[$key];

                            //     $dataProductImageDetail = $this->storageTraitUploadMutiple2($arr, "product");

                            //     $file_path = $dataProductImageDetail["file_path"];
                            // } else {
                            //     $file_path = $option->avatar_type;
                            // }


                            $dataProductOptionUpdate = [
                                "price" => $request->input('priceOptionOld')[$key],
                                "old_price" => $request->input('old_priceOptionOld')[$key],
                                "size" =>  $request->input('sizeOptionOld')[$key],
                                "color" =>  null,
                                "avatar_type" =>  null,
                            ];
                            $option->update($dataProductOptionUpdate);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.product.index')->with("alert", "Sửa sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index')->with("error", "Sửa sản phẩm không thành công");
        }
    }

    //Option

    public function listProductOption($product_id, Request $request)
    {

        $data = $this->option->where('product_id', $product_id)->get();

        return view(
            "admin.pages.product.option-list",
            [
                'data' => $data,
                'product_id' => $product_id,
            ]
        );
    }

    public function addProductOption($product_id, Request $request = null)
    {
        $htmlselect = $this->categoryProduct->getHtmlOption();
        $supplier = $this->supplier->all();
        $variants = Variant::all();
        return view(
            "admin.pages.product.option-add",
            [
                'option' => $htmlselect,
                'product_id' => $product_id,
                'request' => $request,
                'variants' => $variants,
            ]
        );
    }


    public function optionStore(Request $request)
    {

        try {
            DB::beginTransaction();
            $dataProductOptionCreate = [
                "size" => $request->input('size'),
                "color" => $request->input('color'),
                "price" => $request->input('price'),
                "old_price" => $request->input('old_price'),
                "product_id" => $request->input('product_id'),
            ];
            //    dd($dataProductCreate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_type", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductOptionCreate["avatar_type"] = $dataUploadAvatar["file_path"];
            }

            // dd($dataProductCreate);
            // insert database in product table
            $option = $this->option->create($dataProductOptionCreate);
            // insert data product lang

            if ($request->hasFile("image")) {
                //
                //   $product->images()->where("product_id", $id)->delete();
                $dataProductOptionImageUpdate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataProductOptionImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $itemImage = [
                        "name" => $dataProductOptionImageDetail["file_name"],
                        "image_path" => $dataProductOptionImageDetail["file_path"]
                    ];
                    $dataProductOptionImageUpdate[] = $itemImage;
                }
                // insert database in product_images table by createMany
                // dd($dataProductImageUpdate);
                $option->images()->createMany($dataProductOptionImageUpdate);

                //  dd($product->images);
            }

            //check if product has variant
            if ($request->has('variants')) {
                $variants = $request->variants;
                foreach ($variants as $variant) {
                    //2$|Color$|2$|Green
                    $variantArr = explode('$|', $variant); //[2,"Color",2,"Green"]
                    if (count($variantArr) == 4) {
                        $variantId = $variantArr[0];
                        $variantName = $variantArr[1];
                        $variantValueId = $variantArr[2];
                        $variantValueName = $variantArr[3];
                        ProductVariant::create([
                            'option_id' => $option->id,
                            'variant_id' => $variantId,
                            'variant_name' => $variantName,
                            'variant_value_id' => $variantValueId,
                            'variant_value_name' => $variantValueName
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.product.option', ['product_id' => $request->input('product_id')])->with("alert", "Thêm option sản phẩm thành công");
        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.option', ['product_id' => $request->input('product_id')])->with("error", "Thêm option sản phẩm không thành công");
        }
    }

    public function editProductOption($id)
    {
        $option = Option::find($id);
        $variants = Variant::all();
        $variantValueIds = $option->variantValues->toArray();
        $variantValueIdsArr = [];
        foreach ($variantValueIds as $variantValueIdObj) {
            // echo $variantValueIdObj['id'];
            $variantValueIdsArr[] = $variantValueIdObj['id']; //id of variant_value
        }
        $data = $this->option->find($id);
        return view("admin.pages.product.option-edit", [
            'data' => $data,
            'variants' => $variants,
            'variantValueIdsArr' => $variantValueIdsArr,
        ]);
    }

    public function updateProductOption(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductOptionUpdate = [
                "size" => $request->input('size'),
                "color" => $request->input('color'),
                "price" => $request->input('price'),
                "old_price" => $request->input('old_price'),
                "product_id" => $request->input('product_id'),
            ];
            // dd( $dataProductUpdate);
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_type", "product");
            if (!empty($dataUploadAvatar)) {
                $path = $this->option->find($id)->avatar_type;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataProductOptionUpdate["avatar_type"] = $dataUploadAvatar["file_path"];
            }


            // insert database in product table
            $this->option->find($id)->update($dataProductOptionUpdate);

            $option = $this->option->find($id);

            if ($request->hasFile("image")) {
                //
                //   $product->images()->where("product_id", $id)->delete();
                $dataProductOptionImageUpdate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataProductOptionImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $itemImage = [
                        "name" => $dataProductOptionImageDetail["file_name"],
                        "image_path" => $dataProductOptionImageDetail["file_path"]
                    ];
                    $dataProductOptionImageUpdate[] = $itemImage;
                }
                // insert database in product_images table by createMany
                // dd($dataProductImageUpdate);
                $option->images()->createMany($dataProductOptionImageUpdate);
                //  dd($product->images);
            }

            if ($request->has('variants')) {
                $variants = $request->variants;
                //delete old data
                ProductVariant::where('option_id', $id)
                    ->delete();

                foreach ($variants as $variant) {
                    //2$|Color$|2$|Green
                    $variantArr = explode('$|', $variant); //[2,"Color",2,"Green"]
                    if (count($variantArr) == 4) {
                        $variantId = $variantArr[0];
                        $variantName = $variantArr[1];
                        $variantValueId = $variantArr[2];
                        $variantValueName = $variantArr[3];


                        ProductVariant::create([
                            'option_id' => $id,
                            'variant_id' => $variantId,
                            'variant_name' => $variantName,
                            'variant_value_id' => $variantValueId,
                            'variant_value_name' => $variantValueName
                        ]);
                    }
                }
            }


            DB::commit();
            return redirect()->route('admin.product.option', ['product_id' => $request->input('product_id')])->with("alert", "Sửa option sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.option', ['product_id' => $request->input('product_id')])->with("error", "Sửa option sản phẩm không thành công");
        }
    }



    public function loadOptionProduct(Request $request)
    {
        $dataView = ['i' => $request->i];
        return response()->json([
            "code" => 200,
            "html" =>  view('admin.components.load-option-product', $dataView)->render(),
            "message" => "success"
        ], 200);
    }

    public function loadOptionProductSize(Request $request)
    {
        $dataView = ['i' => $request->i];
        return response()->json([
            "code" => 200,
            "html" =>  view('admin.components.load-option-product-size', $dataView)->render(),
            "message" => "success"
        ], 200);
    }

    // thêm sửa xóa đoạn văn
    public function loadParagraphProduct(Request $request)
    {
        return $this->loadParagraph($request, $this->configParagraph);
    }

    public function loadParentParagraphProduct($id, Request $request)
    {
        return $this->loadParentParagraph($this->product, $this->paragraphProduct, $id, $request);
    }

    public function loadCreateParagraphProduct($id)
    {
        return  $this->loadCreateParagraph($this->product, $id, $this->configParagraph);
    }

    public function loadEditParagraphProduct($id, Request $request)
    {

        return   $this->loadEditParagraph($this->paragraphProduct, $this->configParagraph, $id);
    }

    public function storeParagraphProduct(Request $request, $id)
    {
        return $this->storeParagraph($this->product, $this->configParagraph, $id,  $request);
    }
    public function updateParagraphProduct(Request $request, $id)
    {
        return $this->updateParagraph($this->paragraphProduct, $this->configParagraph, $id,  $request);
    }
    public function destroyParagraphProduct($id)
    {
        return $this->deleteCategoryRecusiveTrait($this->paragraphProduct, $id);
    }
    // end thêm sửa xóa đoạn văn

    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);

        // Xóa tất cả các bản ghi trong bảng "key" có "key_id" trùng với "id" của sản phẩm
        Key::where('key_id', $product->id)->delete();
        return $this->deleteTrait($this->product, $id);
    }

    public function destroyProductImage($id)
    {
        return $this->deleteImageTrait($this->productImage, $id);
    }

    public function excelExportDatabase()
    {
        return Excel::download(new ExcelExportsDatabase(config('excel_database.product')), config('excel_database.product.excelfile'));
    }
    public function excelImportDatabase()
    {
        $path = request()->file('fileExcel')->getRealPath();
        Excel::import(new ExcelImportsDatabase(config('excel_database.product')), $path);
    }


    public function destroyOptionProduct($id)
    {
        return $this->deleteTrait($this->option, $id);
    }

    public function destroyOptionProductSize($id)
    {

        return $this->deleteTrait($this->optionValue, $id);
    }
}
