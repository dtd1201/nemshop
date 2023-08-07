<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\CategoryPost;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Attribute;
use App\Models\ProductStar;
use App\Models\ProductAttribute;
use App\Models\ProductTranslation;
use App\Models\CategoryProductTranslation;
use App\Models\Comment;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DB;
use App\Traits\StorageImageTrait;
class ProductController extends Controller
{
    //
    use StorageImageTrait;
    private $product;
    private $header;
    private $productStar;
    private $unit = 'đ';
    private $categoryProduct;
    private $categoryPost;
    private $productTranslation;
    private $categoryProductTranslation;
    private $attribute;
    private $productAttribute;
    private $limitProduct = 12;
    private $sliderLimit = 12;
    private $limitProductRelate = 7;
    private $idCategoryProductRoot = 185;
    private $breadcrumbFirst = [
        // 'name'=>'Sản phẩm',
        //  'slug'=>'san-pham',
    ];
    public $priceSearch;


    public function __construct(
        Product $product,
        CategoryProduct $categoryProduct,
        CategoryPost $categoryPost,
        Setting $setting,
        ProductTranslation $productTranslation,
        CategoryProductTranslation $categoryProductTranslation,
        Attribute $attribute,
        ProductAttribute $productAttribute
    ) {
        $this->product = $product;
        $this->categoryProduct = $categoryProduct;
        $this->categoryPost = $categoryPost;
        $this->setting = $setting;
        $this->productTranslation = $productTranslation;
        $this->categoryProductTranslation = $categoryProductTranslation;
        $this->attribute = $attribute;
        $this->productAttribute = $productAttribute;
        $this->priceSearch = config('web_default.priceSearch');
    }
    // danh sách toàn bộ product
    public function index(Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        // get category
        $category = $this->categoryProduct->where([
            ['id', $this->idCategoryProductRoot],
        ])->first();
        if ($category) {
            if ($category->count()) {

                if ($request->ajax()) {
                    return $this->filter($category, $request);
                }


                $categoryId = $category->id;
                $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                $countProduct = $data =  $this->product->whereIn('category_id', $listIdChildren)->count();
                $data =  $this->product->where('active', '1')->whereIn('category_id', $listIdChildren)->paginate($this->limitProduct);
                $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                $listIdActive = $listIdParent;
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                }

                return view('frontend.pages.product-by-category', [
                    'data' => $data,
                    'countProduct' => $countProduct,
                    'unit' => $this->unit,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'category' => $category,
                    'categoryProductActive' => $listIdActive,
                    'seo' => [
                        'title' =>  $category->title_seo ?? "",
                        'keywords' =>  $category->keywords_seo ?? "",
                        'description' =>  $category->description_seo ?? "",
                        'image' => $category->avatar_path ?? "",
                        'abstract' =>  $category->description_seo ?? "",
                    ]
                ]);
            }
        }
    }
    public function detail($category, $slug, Request $request)
    {
        //   $data= $this->categoryProduct->setAppends(['breadcrumb'])->where('parent_id',0)->orderBy("created_at", "desc")->paginate(15);

        $breadcrumbs = [];
        $data = [];
        $translation = $this->productTranslation->where([
            ["slug", $slug],
        ])->first();
        if ($translation) {
            $data = $translation->product;
            // $view = $data->view;

            // $data->update([
            //     'view' => $view + 1,
            // ]);


            if (checkRouteLanguage($slug, $data)) {
                return checkRouteLanguage($slug, $data);
            }
            $categoryId = $data->category_id;
            $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);

            $dataRelate =  $this->product->where('active', '1')->whereIn('category_id', $listIdChildren)->where([
                ["id", "<>", $data->id],
            ])->limit($this->limitProductRelate)->get();
            $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
            $listIdActive = $listIdParent;
            foreach ($listIdParent as $parent) {
                $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
            }


            // Lấy danh sản các tất cả sản phẩm cùng danh mục sản phẩm được chọn
            $categoryAll = $this->product->where('active', '1')->where('category_id', $categoryId)->get();

            $giaohang = $this->setting->find(130);
            $chinhSach = $this->setting->find(171);
            $huongDan = $this->setting->find(172);
            $sliders = slider::where([
                ['active', 1],
            ])->orderBy('order')->orderByDesc('created_at')->limit($this->sliderLimit)->get();

            // $featuredelly = $this->setting->where('active', 1)->find(337);
            // $huongDanMuaHang = $this->setting->where('active', 1)->find(333);
            // $quyTrinh = $this->setting->where('active', 1)->find(334);
            // $huongDanChonSize = $this->setting->where('active', 1)->find(335);

            // $saleSideBar = $this->product->where('active', 1)->where('sale', '>', 0)->orWhere('old_price', '!=', 0)->limit(6)->get();
            // $daXemSideBar = $this->product->where('active', 1)->orderBy('view', 'DESC')->limit(6)->get();

            $camket = $this->setting->where('active', 1)->find(406);


            $avgRating = 0;
            $dataRating = $data->comments()->where('type_comment', 2)->where('parent_id', 0);
            $sumRating = array_sum(array_column($dataRating->get()->toArray(), 'stars'));
            $countRating = $dataRating->count();
            if ($countRating != 0) {
                $avgRating = $sumRating / $countRating;
            }

            // $star5 = $data->stars()->where([
            //     ['active', 1],
            //     ['star', 5],
            // ])->get();

            // $star4 = $data->stars()->where([
            //     ['active', 1],
            //     ['star', 4],
            // ])->get();

            // $star3 = $data->stars()->where([
            //     ['active', 1],
            //     ['star', 3],
            // ])->get();

            // $star2 = $data->stars()->where([
            //     ['active', 1],
            //     ['star', 2],
            // ])->get();

            // $star1 = $data->stars()->where([
            //     ['active', 1],
            //     ['star', 1],
            // ])->get();

            $accordion = $this->setting->where('active', 1)->find(389);

            // dd($avgRating, $countRating);

            return view('frontend.pages.product-detail', [
                'accordion' => $accordion,
                'data' => $data,
                // 'star5' => $star5,
                // 'star4' => $star4,
                // 'star3' => $star3,
                // 'star2' => $star2,
                // 'star1' => $star1,
                'avgRating' => ceil($avgRating),
                'countRating' => $countRating,
                'camket' => $camket,
                'slider' => $sliders,
                // 'saleSideBar' => $saleSideBar,
                // 'daXemSideBar' => $daXemSideBar,
                // 'featuredelly' => $featuredelly,
                // 'huongDanMuaHang' => $huongDanMuaHang,
                // 'huongDanChonSize' => $huongDanChonSize,
                // 'quyTrinh' => $quyTrinh,
                'categoryAll' => $categoryAll,
                'unit' => $this->unit,
                "dataRelate" => $dataRelate,
                'breadcrumbs' => $breadcrumbs,
                'typeBreadcrumb' => 'category_products',
                'title' => $data ? $data->name : "",
                'category' => $data->category ?? null,
                'categoryProductActive' => $listIdActive,
                'giaohang' => $giaohang,
                'chinhSach' => $chinhSach,
                'huongDan' => $huongDan,
                'seo' => [
                    'title' =>  $data->title_seo ?? "",
                    'keywords' =>  $data->keywords_seo ?? "",
                    'description' =>  $data->description_seo ?? "",
                    'image' => $data->avatar_path ?? "",
                    'abstract' =>  $data->description_seo ?? "",
                ]
            ]);
        }
    }



    public function quickview(Request $request)
    {
        $product_id = $request->product_id;
        $product = $this->product->where('active', '1')->find($product_id);

        $productTranslation = $product->translations()->first();


        /*$gallery = Gallery::where('product_id',$product_id)->get();*/

        $output['product_gallery'] = '';

        /*foreach ($gallery as $key => $gal) {
            $output['product_gallery'] .='<p><img src="public/uploads/gallery/'.$gal->product_image.'" width="100%"></p>';
        }*/



        $output['product_name'] = $productTranslation->name;
        $output['product_id'] = $product->product_id;

        $output['product_price'] = number_format($product->price_after_sale) . '' . $this->unit;

        if ($product->sale) {
            $product_price_old = number_format($product->price) . '' . $this->unit;
        } else {
            $product_price_old = '';
        }
        $output['product_price_old'] = $product_price_old;
        $output['product_image'] = '<img class="p-product-image-feature" src="' . asset($product->avatar_path) . '">';
        $output['product_quantity'] = '
            <label>' . __('product.so_luong') . '</label>
            <input id="quantity-quickview" name="quantity" type="number" min="1" value="1" />
        ';
        $output['dat_mua'] = '
            <a id="buyCartQuickView" class="btn-detail btn-color-add btn-min-width btn-mgt btn-addcart" href=' . route('cart.buy', ['id' => $product->id,]) . '>' . __('product.cho_vao_gio_hang') . '</a>
            <div class="qv-readmore">
                <span> ' . __('product.hoac') . ' </span>
                <a class="read-more p-url" href="' . $product->slug_full . '" role="button">' . __('product.xem_chi_tiet') . '</a>
            </div>
        ';
        /*$output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price, 0, ',', '.').'VNĐ';
        $output['product_image'] = '<p><img src="public/uploads/product/'.$product->product_image.'" width="100%"></p>';*/

        echo json_encode($output);
    }

    // danh sách product theo category
    public function productByCategory($slug, Request $request)
    {
        //
        $breadcrumbs = [];
        // get category
        $translation = $this->categoryProductTranslation->where([
            ['slug', $slug],
        ])->firstOrFail();
        if ($translation) {
            if ($translation->count()) {
                // $request->ajax()
                $category = $translation->category;
                if ($request->ajax()) {
                    return $this->filter($category, $request);
                }

                $category = $translation->category;
                if (checkRouteLanguage($slug, $category)) {
                    return checkRouteLanguage($slug, $category);
                }
                $categoryId = $category->id;
                $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                $countProduct = $data =  $this->product->whereIn('category_id', $listIdChildren)->count();
                $data =  $this->product->where('active', '1')->whereIn('category_id', $listIdChildren)->orderBy('order')->orderBy('created_at')->paginate(12);
                $dataHot =  $this->product->where('active', '1')->whereIn('category_id', $listIdChildren)->orderBy('order')->orderBy('created_at')->limit(12)->get();
                $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                $listIdActive = $listIdParent;
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                }
                $products = $this->categoryProduct->where('active', 1)->find(185);
                $listIdActiveProduct = $this->categoryProduct->getALlCategoryChildrenAndSelf(185);
                // dd($products);
                $banner = $this->setting->find(412);

                return view('frontend.pages.product-by-category', [
                    'data' => $data,
                    'banner' => $banner,
                    'dataHot' => $dataHot,
                    'products' => $products,
                    'listIdActiveProduct' => $listIdActiveProduct,
                    'countProduct' => $countProduct,
                    'unit' => $this->unit,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'category' => $category,
                    'categoryProductActive' => $listIdActive,
                    'seo' => [
                        'title' =>  $category->title_seo ?? "",
                        'keywords' =>  $category->keywords_seo ?? "",
                        'description' =>  $category->description_seo ?? "",
                        'image' => $category->avatar_path ?? "",
                        'abstract' =>  $category->description_seo ?? "",
                    ]
                ]);
            }
        }
    }

    // danh sách toàn bộ product
    public function sale(Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        // get category
        $category = $this->categoryProduct->where([
            ['id', $this->idCategoryProductRoot],
        ])->first();
        if ($category) {
            if ($category->count()) {

                if ($request->ajax()) {
                    return $this->filter($category, $request);
                }

                $categoryId = $category->id;
                $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                $countProduct = $data =  $this->product->whereIn('category_id', $listIdChildren)->count();
                $data =  $this->product->where('sale', '>', 0)->whereIn('category_id', $listIdChildren)->orderby('sale')->latest()->paginate($this->limitProduct);
                $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                $listIdActive = $listIdParent;
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                }

                return view('frontend.pages.product-by-category', [
                    'data' => $data,
                    'countProduct' => $countProduct,
                    'unit' => $this->unit,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'category' => $category,
                    'categoryProductActive' => $listIdActive,
                    'seo' => [
                        'title' =>  $category->title_seo ?? "",
                        'keywords' =>  $category->keywords_seo ?? "",
                        'description' =>  $category->description_seo ?? "",
                        'image' => $category->avatar_path ?? "",
                        'abstract' =>  $category->description_seo ?? "",
                    ]
                ]);
            }
        }
    }
    public function new(Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        // get category
        $category = $this->categoryProduct->where([
            ['id', $this->idCategoryProductRoot],
        ])->first();
        // dd($category);
        if ($category) {
            if ($category->count()) {

                if ($request->ajax()) {
                    return $this->filter($category, $request);
                }

                $categoryId = $category->id;
                $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                $countProduct = $data =  $this->product->whereIn('category_id', $listIdChildren)->count();
                $data =  $this->product->whereIn('category_id', $listIdChildren)->orderby('created_at', 'DESC')->latest()->paginate($this->limitProduct);
                $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                $listIdActive = $listIdParent;
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                }

                return view('frontend.pages.product-by-category', [
                    'data' => $data,
                    'countProduct' => $countProduct,
                    'unit' => $this->unit,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'category' => $category,
                    'categoryProductActive' => $listIdActive,
                    'seo' => [
                        'title' =>  $category->title_seo ?? "",
                        'keywords' =>  $category->keywords_seo ?? "",
                        'description' =>  $category->description_seo ?? "",
                        'image' => $category->avatar_path ?? "",
                        'abstract' =>  $category->description_seo ?? "",
                    ]
                ]);
            }
        }
    }

    public function selling(Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        // get category
        $category = $this->categoryProduct->where([
            ['id', $this->idCategoryProductRoot],
        ])->first();
        if ($category) {
            if ($category->count()) {

                if ($request->ajax()) {
                    return $this->filter($category, $request);
                }

                $categoryId = $category->id;
                $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                $countProduct = $data =  $this->product->whereIn('category_id', $listIdChildren)->count();
                $data =  $this->product->whereIn('category_id', $listIdChildren)->where('hot', 1)->orderby('created_at', 'DESC')->latest()->paginate($this->limitProduct);
                $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                $listIdActive = $listIdParent;
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                }

                return view('frontend.pages.product-by-category', [
                    'data' => $data,
                    'countProduct' => $countProduct,
                    'unit' => $this->unit,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'category' => $category,
                    'categoryProductActive' => $listIdActive,
                    'seo' => [
                        'title' =>  $category->title_seo ?? "",
                        'keywords' =>  $category->keywords_seo ?? "",
                        'description' =>  $category->description_seo ?? "",
                        'image' => $category->avatar_path ?? "",
                        'abstract' =>  $category->description_seo ?? "",
                    ]
                ]);
            }
        }
    }

    public function collection(Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        // get category
        $category = $this->categoryProduct->where([
            ['id', $this->idCategoryProductRoot],
        ])->first();
        if ($category) {
            if ($category->count()) {

                if ($request->ajax()) {
                    return $this->filter($category, $request);
                }

                $categoryId = $category->id;
                $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                $countProduct = $data =  $this->product->whereIn('category_id', $listIdChildren)->count();
                $data =  $this->product->whereIn('category_id', $listIdChildren)->where('bo_suu_tap', 1)->orderby('created_at', 'DESC')->latest()->paginate($this->limitProduct);
                $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                $listIdActive = $listIdParent;
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                }

                return view('frontend.pages.product-by-category', [
                    'data' => $data,
                    'countProduct' => $countProduct,
                    'unit' => $this->unit,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'category' => $category,
                    'categoryProductActive' => $listIdActive,
                    'seo' => [
                        'title' =>  $category->title_seo ?? "",
                        'keywords' =>  $category->keywords_seo ?? "",
                        'description' =>  $category->description_seo ?? "",
                        'image' => $category->avatar_path ?? "",
                        'abstract' =>  $category->description_seo ?? "",
                    ]
                ]);
            }
        }
    }
    public function filter($category, $request)
    {
        // dd($request->all());
        $q = $request->input('keywords');
        // dd($request->all());
        $categoryId = $category->id;
        $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
        $data =  $this->product->where('active', 1);
        if ($request->has('supplier_id') && $request->input('supplier_id')) {
            $data = $data->whereIn('supplier_id', $request->input('supplier_id'));
            // dd($data->get());
        }

        if ($request->has('keywords') && $request->input('keywords')) {
            // $data = $data->where(function ($query) {
            //     $idProTran = $this->productTranslation->where([
            //         ['name', 'like', '%' . request()->input('keywords') . '%']
            //     ])->pluck('product_id');

            //     $query->whereIn('id', $idProTran);
            // });

            $data = $data->whereHas('translations', function ($query) use ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            });
        }


        if ($request->has('price') && $request->input('price')) {
            $key = $request->input('price');
            //  dd($this->priceSearch[$key]);
            $start = $this->priceSearch[$key]['start'];
            $end = $this->priceSearch[$key]['end'];
            //   dd($start);

            if ($start == 0 && $end) {
                $data = $data->where('price', '<=', $end);
            } elseif ($start && $end) {

                $data = $data->whereBetween('price', [$start, $end]);
            } elseif ($start && $end == null) {
                // dd($end);
                $data = $data->where('price', '>=', $start);
            }
            //  dd($end);
        }
        // dd($request->input('attribute_id'));
        if ($request->has('attribute_id') && $request->input('attribute_id')) {
            $productAttr =  $this->productAttribute;
            foreach ($request->input('attribute_id') as $key => $value) {
                // dd($request->input('attribute_id')[$key]);
                if ($value) {

                    $value = collect($value)->filter(function ($value, $key) {
                        return $value > 0;
                    });
                    if ($value->count()) {
                        $listIdPro = $productAttr->whereIn('attribute_id', $request->input('attribute_id')[$key])->pluck('product_id');
                        // dd($productAttr->get());
                        // dd($listIdPro);
                        $data = $data->whereIn('id', $listIdPro);
                    }
                }
            }
            // dd($listIdPro);
            // dd($data->get());
        }
        // dd($data->whereIn('category_id', $listIdChildren)->get());


        if ($request->has('orderby') && $request->input('orderby')) {
            if ($request->input('orderby') == 1) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderby('price');
            } elseif ($request->input('orderby') == 2) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('price');
            } elseif ($request->input('orderby') == 3) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderby('name');
            } elseif ($request->input('orderby') == 4) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('name');
            } elseif ($request->input('orderby') == 5) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderby('created_at');
            } elseif ($request->input('orderby') == 6) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('created_at');
            } elseif ($request->input('orderby') == 7) {
                $data =  $data->whereIn('category_id', $listIdChildren)->where('hot', 1)->orderByDesc('created_at');
            } else {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('name');
            }
        } else {
            $data =  $data->whereIn('category_id', $listIdChildren)->orderBy('order');
        }

        $countProduct = $data->count();

        $data = $data->latest()->paginate(12);

        return response()->json([
            "code" => 200,
            "html" => view('frontend.components.load-product-search', [
                'data' => $data,
                'unit' => $this->unit,
                'countProduct' => $countProduct
            ])->render(),
            "message" => "success"
        ], 200);
    }

    public function changeSize(Request $request)
    {

        // dd($request->all());
        $option_id  = $request->input('option_id');

        // dd($option_id);

        $sizes = ProductVariant::where('option_id', $option_id)->orderBy('created_at')->get();

        // dd($sizes);
        $output = '';
        foreach ($sizes as $key => $size) {
            $output .= '';
            if ($key == 0) {
                $output .=  '<li class="variable-item button-variable-item button-variable-item-35 btn-select-variant selected" data-size="' . $size['variant_value_name'] . '">
                <div class="variable-item-contents">
                <span class="variable-item-span variable-item-span-button">' . $size->variant_value_name . '</span></div>
            </li>';
            }
            $output .= ' <li class="variable-item button-variable-item button-variable-item-35 btn-select-variant">
                    <div class="variable-item-contents">
                    <span class="variable-item-span variable-item-span-button">' . $size->variant_value_name . '</span></div>
                </li>
            ';
        }

        return $output;
    }

    public function loadComment(Request $request)
    {
        if ($request->ajax()) {
            $idProduct = $request->idProduct;
            $dataProduct = $this->product->find($idProduct);



            $data = $dataProduct->stars()->where('active', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
            dd($data);
            $html = view('frontend.components.load-comment-product2', compact('data'))->render();
            return response()->json(['data' => $html]);
        }
    }
    public function rating($id, Request $request)
    {
        if ($id) {
            try {
                DB::beginTransaction();
                $title = 'Đánh giá sản phẩm';
    
                // Tạo dữ liệu đánh giá
                $dataRatingCreate = [
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'title' => $request->input('title') ?? "",
                    "parent_id" => $request->input('parent_id') ?? 0,
                    'star' => $request->input('rating') ?? "0",
                    'product_id' => $id,
                    'active' => 0,
                    'content' => $request->input('content') ?? "",
                ];
    
                $ratingUdate = ProductStar::create($dataRatingCreate);
    
                // Xử lý và lưu các ảnh
                $imageFields = ['image1', 'image2', 'image3'];
                foreach ($imageFields as $field) {
                    if ($request->hasFile($field)) {
                        $images = $request->file($field);
                        foreach ($images as $image) {
                            $imagePath = $this->storageTraitUploadMutiple($image, "star");
                            $ratingUdate->images()->create([
                                "name" => $imagePath["file_name"],
                                "image_path" => $imagePath["file_path"]
                            ]);
                        }
                    }
                }
    
                DB::commit();
                if ($ratingUdate->parent_id == 0) {
                    session()->flash('success', 'Đánh giá sao đã được gửi thành công');
                    return redirect()->back()->with('arlert', 'Gửi đánh giá thành công');
                } else {
                    session()->flash('success', 'Câu trả lời đã được gửi thành công');
                    return redirect()->back()->with('arlert', 'Câu trả lời đã được gửi thành công');
                }
            } catch (\Exception $exception) {
                DB::rollBack();
                dd($exception);
                return redirect()->back()->with('msg', 'Gửi đánh giá không thành công');
            }
        }
    }

    public function createComment(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataContactCreate = [
                'name' => $request->input('name') ?? "",
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'danh_xung' => $request->input('danh_xung') ?? null,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
                "parent_id" => $request->parent_id ? $request->parent_id : 0,
                'content' => $request->input('content') ?? null,
                'like' => 0,
                'share' => 0,
                'type_comment' => $request->type_comment ?? 0,
                'stars' => $request->star ?? 0,
            ];

            $comment = Comment::create($dataContactCreate);

            $product = Product::find($request->product_id);
            $product->comments()->attach($comment->id);

            $avgRating = 0;
            $dataRating = $product->comments()->where('type_comment', 2)->where('parent_id', 0);
            $sumRating = array_sum(array_column($dataRating->get()->toArray(), 'stars'));
            $countRating = $dataRating->count();
            if ($countRating != 0) {
                $avgRating = $sumRating / $countRating;
            }

            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => view('frontend.components.load-success-modal')->render(),
                'avgRating' => ceil($avgRating),
                'countRating' => $countRating,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            // dd($exception);
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "html" => view('frontend.components.load-error-modal')->render(),
                "message" => "fail"
            ], 500);
        }
    }

    public function filterComment(Request $request)
    {
        $data = $this->product->find($request->productId);
        $page = $request->page ?? 1;
        $type_comment = $request->type_comment;

        $data = $data->comments()
            ->where('type_comment', $request->type_comment) //bình luận (....)
            // ->where('active', 1)
            ->orderBy('id', 'desc')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * 5);
            })
            ->limit(5)
            ->get();

        $totalItems = $data->count();

        $html = view('frontend.components.load-comment-product', compact('data', 'totalItems'))->render();
        return response()->json([
            'data' => $html,
            'totalItems' => $totalItems,
        ]);
    }

    public function like(Request $request)
    {
        Comment::find($request->id)->increment('like');
    }
}
