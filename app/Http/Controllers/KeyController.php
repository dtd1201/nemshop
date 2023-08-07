<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Key;

use App\Models\Post;
use App\Models\PostCate;
use App\Models\CategoryPost;
use App\Models\PostTranslation;
use App\Models\CategoryPostTranslation;

use App\Models\ProductTranslation;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductForCategory;
use App\Models\CategoryProductTranslation;

use App\Models\Attribute;
// use App\Models\ProductStar;
use App\Models\ProductAttribute;

use App\Models\Slider;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Support\Str;
use DB;

class KeyController extends Controller
{
    //

    private $post;
    private $product;
    private $key;
    private $categoryPost;
    private $categoryProduct;
    // private $productStar;
    private $unit = 'đ';
    
    private $limitPost = 12;
    private $limitPostRelate = 5;
    private $idCategoryPostRoot = 21;
    private $limitProduct = 12;
    private $sliderLimit = 8;
    private $limitProductRelate = 6;
    private $idCategoryProductRoot = 185;
    private $attribute;
    private $productAttribute;
    private $postTranslation;
    private $productTranslation;
    private $categoryPostTranslation;
    private $categoryProductTranslation;
    private $setting;
    private $breadcrumbFirst = [];
    public function __construct(
        Post $post,
        Product $product,
        Key $key,
        Attribute $attribute,
        ProductAttribute $productAttribute,
        // ProductStar $productStar,
        CategoryPost $categoryPost,
        CategoryProduct $categoryProduct,
        PostTranslation $postTranslation,
        ProductTranslation $productTranslation,
        CategoryPostTranslation $categoryPostTranslation,
        CategoryProductTranslation $categoryProductTranslation,
        Setting $setting
    ) {
        $this->post = $post;
        $this->product = $product;
        // $this->productStar = $productStar;
        $this->key = $key;
        $this->attribute = $attribute;
        $this->productAttribute = $productAttribute;
        $this->categoryPost = $categoryPost;
        $this->categoryProduct = $categoryProduct;
        $this->postTranslation = $postTranslation;
        $this->productTranslation = $productTranslation;
        $this->categoryPostTranslation = $categoryPostTranslation;
        $this->categoryProductTranslation = $categoryProductTranslation;
        $this->setting = $setting;
        $this->priceSearch = config('web_default.priceSearch');
        $this->breadcrumbFirst = [
            'name' => 'Tin tức',
            'slug' => makeLink("post_all"),
            'id' => null,
        ];
    }


    public function checkKey($slug, Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        $translation = $this->key->where([
            ["slug", $slug],
        ])->first();

        if ($translation) {
            if($translation->type == 1){
                // Danh sách tin tức
                $gioiThieuM = $this->setting->where('active', 1)->find(223);

                $category = $translation->categoryPost;
                if (checkRouteLanguage($slug, $category)) {
                    return checkRouteLanguage($slug, $category);
                }
                $listId_tuyendung = $this->categoryPost->getALlCategoryChildrenAndSelf(116);

                if ($category) {
                    if ($category->count()) {
                        if(in_array($category->id, $listId_tuyendung)){
                            $categoryId = $category->id;
                            $listIdChildren = $this->categoryPost->getALlCategoryChildrenAndSelf($categoryId);
                            $listId_postCate = PostCate::where('category_id', $categoryId)->get()->pluck('post_id');
                            // $data =  $this->post->whereIn('id', $listId_postCate)->where('active', 1)->orderBy('id', 'DESC')->paginate($this->limitPost);
                            $data = $this->post->where('active', 1)
                                ->whereIn('id', function ($query) use ($item) {
                                    $query->select('post_id')
                                        ->from('posts_cate')
                                        ->whereIn('category_id', function ($subQuery) use ($item) {
                                            $subQuery->select('id')
                                              ->from('category_posts')
                                                ->where('id', $item->id)
                                                ->orWhere('parent_id', $item->id);
                                        });
                                })
                                ->orderByDesc('id')
                                // ->limit(10)
                                ->paginate($this->limitPost);
                            $listIdParent = $this->categoryPost->getALlCategoryParentAndSelf($categoryId);
                            // lấy category sidebar theo danh mục
                            $categoryNew = $this->categoryPost->whereIn(
                                'id',
                                [$listIdParent[0]]
                            )->get();
                            foreach ($listIdParent as $parent) {
                                $breadcrumbs[] = $this->categoryPost->select('id')->find($parent)->toArray();
                            }
                            $categoryAll =  $this->post->where('category_id', $category->id)->paginate(9);

                            $post_hot =  $this->post->where('category_id', $category->id)->where('hot', 1)->limit(4)->get();

                            return view('frontend.pages.tuyendung', [
                                'gioiThieuM' => $gioiThieuM,
                                'data' => $data,
                                'categoryAll' => $categoryAll,
                                'post_hot' => $post_hot,
                                'unit' => $this->unit,
                                'breadcrumbs' => $breadcrumbs,
                                'categoryPostSidebar' => $categoryNew,
                                'typeBreadcrumb' => 'checkKey',
                                'category' => $category,
                                'seo' => [
                                    'title' =>  $category->title_seo ?? "",
                                    'keywords' =>  $category->keyword_seo ?? "",
                                    'description' =>  $category->description_seo ?? "",
                                    'image' => $category->avatar_path ?? "",
                                    'abstract' =>  $category->description_seo ?? "",
                                ]
                            ]);
                        }else{
                            $categoryId = $category->id;
                            $listIdChildren = $this->categoryPost->getALlCategoryChildrenAndSelf($categoryId);
                            $listId_postCate = PostCate::where('category_id', $categoryId)->get()->pluck('post_id');
                            
                            $data =  $this->post->whereIn('id', $listId_postCate)->where('active', 1)->orderBy('id', 'DESC')->paginate($this->limitPost);
                            // dd($data->count());
                            $listIdParent = $this->categoryPost->getALlCategoryParentAndSelf($categoryId);
                            // lấy category sidebar theo danh mục
                            $categoryNew = $this->categoryPost->whereIn(
                                'id',
                                [$listIdParent[0]]
                            )->get();
                            foreach ($listIdParent as $parent) {
                                $breadcrumbs[] = $this->categoryPost->select('id')->find($parent)->toArray();
                            }
    
                            return view('frontend.pages.post-by-category', [
                                'gioiThieuM' => $gioiThieuM,
                                'data' => $data,
                                'unit' => $this->unit,
                                'breadcrumbs' => $breadcrumbs,
                                'categoryPostSidebar' => $categoryNew,
                                'typeBreadcrumb' => 'checkKey',
                                'category' => $category,
                                'seo' => [
                                    'title' =>  $category->title_seo ?? "",
                                    'keywords' =>  $category->keyword_seo ?? "",
                                    'description' =>  $category->description_seo ?? "",
                                    'image' => $category->avatar_path ?? "",
                                    'abstract' =>  $category->description_seo ?? "",
                                ]
                            ]);
                        }
                        
                    }
                }
            }
            elseif ($translation->type == 2) {
                // Chi tiết tin tức
                $data = $translation->post;
                if (checkRouteLanguage($slug, $data)) {
                    return checkRouteLanguage($slug, $data);
                }

                $viewUpdate = $data->view;
                if ($data->view) {
                    $viewUpdate++;
                } else {
                    $viewUpdate = 1;
                }
                $data->update([
                    'view' => $viewUpdate,
                ]);
                $categoryId = $data->category_id;

                $listIdChildren = $this->categoryPost->getALlCategoryChildrenAndSelf($categoryId);

                $dataRelate =  $this->post->whereIn('category_id', $listIdChildren)->where([
                    ["id", "<>", $data->id],
                ])->limit($this->limitPostRelate)->get();

                $listIdParent = $this->categoryPost->getALlCategoryParentAndSelf($categoryId);

                // lấy category sidebar theo danh mục
                $categoryNew = $this->categoryPost->whereIn(
                    'id',
                    [$listIdParent[0]]
                )->get();
                // dd($categoryNew);

                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->categoryPost->select('id')->find($parent)->toArray();
                }
                //Tin noi bat
                $lien_he = $this->setting->where('active', 1)->find(379);

                return view('frontend.pages.post-detail', [
                    // 'count_comment' =>  $count_comment,
                    // 'list_comment' => $list_comment,
                    'data' => $data,
                    'categoryPostSidebar' => $categoryNew,
                    "dataRelate" => $dataRelate,
                    'lien_he' => $lien_he,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'checkKey',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'seo' => [
                        'title' =>  $data->title_seo ?? "",
                        'keywords' =>  $data->keyword_seo ?? "",
                        'description' =>  $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' =>  $data->description_seo ?? "",

                    ]
                ]);
                

            }
            elseif ($translation->type == 3) {
                // Danh sách sản phẩm
                if ($translation->count()) {
                    $category = $translation->categoryProduct;
                    if ($request->ajax()) {
                        return $this->filter($category, $request);
                    }

                    $category = $translation->categoryProduct;
                    if (checkRouteLanguage($slug, $category)) {
                        return checkRouteLanguage($slug, $category);
                    }
                    if ($request->ajax()) {
                        $listId = $request->id;
                        //dd($listId);
                        $data = $this->product->whereIn('id', $listId)->where('active', 1)->limit(5)->get();
                        $html = view('frontend.components.load-view-product', compact('data'))->render();
                        return response()->json(['data' => $html]);
                    }
                    

                    $data = $this->product;
                    
                    
                    // $data =  $this->product->where('active', '1')->whereIn('category_id', $listIdChildren)->orderBy('order')->orderByDesc('created_at')->paginate($this->limitProduct);

                    if($category){
                        $categoryId = $category->id;
                        $listId_productCate = ProductForCategory::where('category_id', $categoryId)->get()->pluck('product_id');
                        
                        $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
                        $countProduct = $data->whereIn('id', $listId_productCate)->count();
                        $listIdChildren[] = (int)($categoryId);
                        $data =  $data->whereIn('id', $listId_productCate);
                    }
                    $price = $data->max('price');
                    $where = [];
                    $orWhere = null;
                    if($request->input('price_range_min') || $request->input('price_range_max')){
                        $data->where('price','>=', $request->input('price_range_min'))->where('price', '<=', $request->input('price_range_max'));
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
                        $data = $data->orderBy("id", "DESC");
                        //dd($data);
                    }
                    
                    $data = $data->where('active', 1)->orderBy('order')->latest()->paginate($this->limitProduct);
                    $listIdParent = $this->categoryProduct->getALlCategoryParentAndSelf($categoryId);
                    $listIdActive = $listIdParent;
                    foreach ($listIdParent as $parent) {
                        $breadcrumbs[] = $this->categoryProduct->select('id')->find($parent)->toArray();
                    }
                    $products = $this->categoryProduct->where('active', 1)->find(185);
                    $cateAll = $this->categoryProduct->where('active', 1)->find(2);
                    $listIdActiveProduct = $this->categoryProduct->getALlCategoryChildrenAndSelf(185);
                    // dd($products);
                    $categoryProductHome = $this->categoryProduct->find(2);
                    return view('frontend.pages.product-by-category', [
                        'data' => $data,
                        'price_max' => $price,
                        'countProduct' => $countProduct,
                        'categoryProductHome' => $categoryProductHome,
                        'cateAll' => $cateAll,
                        'nameCategory' => $category->name,
                        'products' => $products,
                        'listIdActiveProduct' => $listIdActiveProduct,
                        'price_range_min' => $request->input('price_range_min') ? $request->input('price_range_min') : 0,
                        'price_range_max' => $request->input('price_range_max') ? $request->input('price_range_max') : 0,
                        'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                        // 'countProduct' => $countProduct,
                        'unit' => $this->unit,
                        'breadcrumbs' => $breadcrumbs,
                        'typeBreadcrumb' => 'checkKey',
                        'category' => $category,
                        'categoryProductActive' => $listIdActive,
                        'seo' => [
                            'title' =>  $category->title_seo ?? "",
                            'keywords' =>  $category->keyword_seo ?? "",
                            'description' =>  $category->description_seo ?? "",
                            'image' => $category->avatar_path ?? "",
                            'abstract' =>  $category->description_seo ?? "",
                        ]
                    ]);
                }

            }
            elseif ($translation->type == 4) {
                // Chi tiết sản phẩm
                $data = $translation->product;

                $view = $data->view;

                $data->update([
                    'view' => $view + 1,
                ]);

                if (checkRouteLanguage($slug, $data)) {
                    return checkRouteLanguage($slug, $data);
                }

                if ($request->ajax()) {

                    if ($request->color_id) {

                        $color_id = $request->color_id;

                        $dataColor = $data->options()->find($color_id);
                        // dd($dataColor);
                        $view_color = view('frontend.components.load-product-color', [
                            'data' => $dataColor,
                            'product' => $data,
                        ])->render();

                        $view_size = view('frontend.components.load-product-size', [
                            'data' => $dataColor,
                        ])->render();

                        return response()->json([
                            'code' => 200,
                            'view_color' => $view_color,
                            'view_size' => $view_size,
                            'messange' => 'success'
                        ], 200);
                    }
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
                $sliders = Slider::where([
                    ['active', 1],
                ])->orderBy('order')->orderByDesc('created_at')->limit($this->sliderLimit)->get();

                $featuredelly = $this->setting->where('active', 1)->find(337);
                $huongDanMuaHang = $this->setting->where('active', 1)->find(333);
                $quyTrinh = $this->setting->where('active', 1)->find(334);
                $huongDanChonSize = $this->setting->where('active', 1)->find(335);

                $saleSideBar = $this->product->where('active', 1)->where('sale', '>', 0)->orWhere('old_price', '!=', 0)->limit(6)->get();
                $daXemSideBar = $this->product->where('active', 1)->orderBy('view', 'DESC')->limit(6)->get();

                $policy = $this->setting->where('active', 1)->find(429);

                $productSale = $this->product->where([
                    ['active', 1],
                    ['old_price', '>', 0],
                ])->latest()->orderBy('old_price', 'desc')->get();

                $avgRating = 0;
                $sumRating = array_sum(array_column($data->stars()->where('hot', 1)->get()->toArray(), 'star'));
                $countRating = count($data->stars()->where('hot', 1)->get());
                if ($countRating != 0) {
                    $avgRating = round($sumRating / $countRating, 2);
                }

                $star5 = $data->stars()->where([
                    ['hot', 1],
                    ['star', 5],
                ])->get();

                $star4 = $data->stars()->where([
                    ['hot', 1],
                    ['star', 4],
                ])->get();

                $star3 = $data->stars()->where([
                    ['hot', 1],
                    ['star', 3],
                ])->get();

                $star2 = $data->stars()->where([
                    ['hot', 1],
                    ['star', 2],
                ])->get();

                $star1 = $data->stars()->where([
                    ['hot', 1],
                    ['star', 1],
                ])->get();
                $banner_right = $this->setting->find(423);
                $goi_dat_hang = $this->setting->find(336);
                $cam_ket = $this->setting->find(328);

                $thuoc_tinh = $this->attribute->whereIn('id',[2,5,8])->get();
               
                return view('frontend.pages.product-detail', [
                    'data' => $data,
                    'thuoc_tinh'=>$thuoc_tinh,
                    'star5' => $star5,
                    'star4' => $star4,
                    'star3' => $star3,
                    'star2' => $star2,
                    'star1' => $star1,
                    'avgRating' => $avgRating,
                    'countRating' => $countRating,
                    'policy' => $policy,
                    'productSale' => $productSale,
                    'slider' => $sliders,
                    'saleSideBar' => $saleSideBar,
                    'daXemSideBar' => $daXemSideBar,
                    'featuredelly' => $featuredelly,
                    'huongDanMuaHang' => $huongDanMuaHang,
                    'huongDanChonSize' => $huongDanChonSize,
                    'quyTrinh' => $quyTrinh,
                    'categoryAll' => $categoryAll,
                    'unit' => $this->unit,
                    "dataRelate" => $dataRelate,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'checkKey',
                    'title' => $data ? $data->name : "",
                    'category' => $data->category ?? null,
                    'categoryProductActive' => $listIdActive,
                    'giaohang' => $giaohang,
                    'chinhSach' => $chinhSach,
                    'huongDan' => $huongDan,
                    'banner_right' => $banner_right,
                    'goi_dat_hang' => $goi_dat_hang,
                    'cam_ket' => $cam_ket,

                'seo' => [
                        'title' =>  $data->title_seo ?? "",
                        'keywords' =>  $data->keyword_seo ?? "",
                        'description' =>  $data->description_seo ?? "",
                        'image' => $data->avatar_path ?? "",
                        'abstract' =>  $data->description_seo ?? "",
                    ]
                ]);
            }
            else{
                abort(404);
            }
        }
        else{
            abort(404);
        }
    }


    public function filter($category, $request)
    {
        // dd($request->all());
        $q = $request->input('keywords');
        // dd($request->all());
        $categoryId = $category->id;
        $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
        $data =  $this->product;
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

        $data = $data->latest()->paginate($this->limitProduct);

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
}
