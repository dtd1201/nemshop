<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SettingTranslation;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Attribute;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;
use App\Models\PostTranslation;
use App\Models\ProductTranslation;
use App\Models\CategoryPostTranslation;
use App\Models\ProductAttribute;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $product;
    private $setting;
    private $settingTranslation;
    private $slider;
    private $attribute;
    private $productAttribute;
    private $post;
    private $categoryPost;
    private $categoryProduct;
    private $postTranslation;
    private $categoryPostTranslation;
    private $productTranslation;
    private $productSearchLimit  = 4;
    private $postSearchLimit     = 6;
    private $idCategoryProductRoot = 185;
    private $limitProduct = 12;

    private $productHotLimit     = 10;
    private $productNgocLimit     = 8;
    private $productSaleLimit     = 8;
    private $productNewLimit     = 8;
    private $phukienLimit     = 4;
    private $productViewLimit    = 8;
    private $productPayLimit     = 8;
    private $sliderLimit         = 8;
    private $postsHotLimit       = 8;
    private $unit                = 'đ';
    public function __construct(
        Product $product,
        Setting $setting,
        Slider $slider,
        Post $post,
        Attribute $attribute,
        ProductAttribute $productAttribute,
        CategoryPost $categoryPost,
        CategoryProduct $categoryProduct,
        PostTranslation $postTranslation,
        CategoryPostTranslation $categoryPostTranslation,
        ProductTranslation $productTranslation,
        SettingTranslation $settingTranslation
    ) {
        /*$this->middleware('auth');*/
        $this->product = $product;
        $this->setting = $setting;
        $this->settingTranslation = $settingTranslation;
        $this->slider = $slider;
        $this->post = $post;
        $this->attribute = $attribute;
        $this->productAttribute = $productAttribute;
        $this->categoryPost = $categoryPost;
        $this->categoryProduct = $categoryProduct;
        $this->postTranslation = $postTranslation;
        $this->categoryPostTranslation = $categoryPostTranslation;
        $this->productTranslation = $productTranslation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index(Request $request)
    {

        $banner = $this->setting->where('parent_id', 288)->where('active', 1)->orderBy('order')->orderByDesc('created_at')->get();
        // // lấy slider
        $sliders = $this->slider->where([
            ['active', 1],
        ])->orderBy('order')->orderByDesc('created_at')->limit($this->sliderLimit)->get();
        // slidersMob
        $slidersM = $this->setting->where([
            ['active', 1],
            ['parent_id', 290],
        ])->orderBy('order')->orderByDesc('created_at')->limit($this->sliderLimit)->get();

        // // bài viết nổi bật
        $postsHot = $this->post->where([
            ['active', 1],
            ['hot', 1],
            ['category_id', 56],
        ])->orderby('order')->orderByDesc('created_at')->limit(5)->get();


        $cate = $this->categoryProduct->getALlCategoryChildrenAndSelf(1);


        $listCateHot = $this->categoryProduct->where('active', 1)->where('hot', 1)->orderBy('order')->orderByDesc('created_at')->get();
        $postNew = $this->post->whereIn('category_id', $cate)->where('active', '1')->orderByDesc('created_at')->limit(6)->get();

        $about_us = $this->categoryPost->where('active', 1)->find(13);
        $NEM = $this->setting->with('childs.childs')->where('active', 1)->find(400);
        $tuyen_dung = $this->categoryPost->where('active', 1)->find(1);
        return view('frontend.pages.home', [
            'tuyen_dung' => $tuyen_dung,
            'about_us' => $about_us,
            'NEM' => $NEM,
            'listCateHot' => $listCateHot,
            'postsHot'  => $postsHot,
            'postNew' => $postNew,
            "slider" => $sliders,
            "unit" => $this->unit,
            "banner" => $banner,
            "slidersM" => $slidersM,
        ]);
    }

    public function renderProductView(Request $request)
    {
        if ($request->ajax()) {
            $listId = $request->id;
            $products = $this->product->whereIn('id', $listId)->where('active', 1)->limit(8)->get();
            //  dd($products);

            $html = view('frontend.components.load-view-product', compact('products'))->render();
            return response()->json(['data' => $html]);
        }
    }

    public function aboutUs(Request $request)
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }
        $data = $this->categoryPost->find(13);

        // $postCateLeft = $this->post->whereIn('id', [24, 25, 26, 27, 28])->orderBy('id', 'ASC')->get();

        $breadcrumbs = [[
            'id' => $data->id,
            'name' => $data->name,
            'slug' => makeLinkToLanguage('about-us', null, null, \App::getLocale()),
        ]];

        //Về chúng tôi
        $about_us = $this->categoryPost->where('active', '1')->findOrFail(13);

        $partner = $this->setting->where('parent_id', '70')->orderBy('created_at', 'ASC')->limit(10)->get();

        return view("frontend.pages.about-us", [
            "data" => $data,
            // 'postCateLeft' => $postCateLeft,
            'breadcrumbs' => $breadcrumbs,
            'about_us' => $about_us,
            'partner' => $partner,
            'typeBreadcrumb' => 'about-us',
            'title' => $data ? $data->name : "",
            'category' => $data->category ?? null,
            'seo' => [
                'title' =>  $data->title_seo ?? "",
                'keywords' =>  $data->keywords_seo ?? "",
                'description' =>  $data->description_seo ?? "",
                'image' => $data->avatar_path ?? "",
                'abstract' =>  $data->description_seo ?? "",
            ]
        ]);
    }
    public function heThong(Request $request)
    {
        // $resultCheckLang = checkRouteLanguage2();
        // if ($resultCheckLang) {
        //     return $resultCheckLang;
        // }
        $data = $this->setting->find(440);
        // $list_id = $this->setting->getALlCategoryProductChildren(440);
        // $list_name = $this->settingTranslation->whereIn('setting_id', $list_id)->get();
        // if ($request->input('keyword')) {
        //     $keyword = $request->input('keyword');
        //     $d = $this->setting->where(function ($query) use ($list_name, $keyword) {
        //         dd($list_name->where('name', 'like', '%' . $keyword . '%')->pluck('id'));
        //         $idProTran = $list_name->where('name', 'like', '%' . $keyword . '%')->pluck('setting_id');
        //         dd('b');
        //         $query->whereIn('id', $idProTran);
        //     })->get();
        // }
        // dd($d);
        // $breadcrumbs = [[
        //     'id' => $data->id,
        //     'name' => $data->name,
        //     'slug' => makeLinkToLanguage('about-us', null, null, \App::getLocale()),
        // ]];

        // //Về chúng tôi
        // $about_us = $this->categoryPost->where('active', '1')->findOrFail(71);

        // $partner = $this->setting->where('parent_id', '70')->orderBy('created_at', 'ASC')->limit(10)->get();

        return view("frontend.pages.he-thong-nha-thuoc", [
            "data" => $data,
            // 'postCateLeft' => $postCateLeft,
            // 'breadcrumbs' => $breadcrumbs,
            // 'about_us' => $about_us,
            // 'partner' => $partner,
            'keyword' => $request->input('keyword')??'n',
            'typeBreadcrumb' => 'he-thong',
            'title' => $data ? $data->name : "",
            // 'category' => $data->category ?? null,
            'seo' => [
                'title' =>  'Hệ thống cửa hàng trên toàn quốc',
                'keywords' =>  'Hệ thống cửa hàng trên toàn quốc',
                'description' =>  'Hệ thống cửa hàng trên toàn quốc',
                // 'image' => $data->avatar_path ?? "",
                'abstract' =>  'Hệ thống cửa hàng trên toàn quốc',
            ]
        ]);
    }

    public function drugStore(Request $request)
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }

        $listSystem = $this->setting->where('active', 1)->where('parent_id', 389)->orderBy('order')->latest()->get();

        $dataAddress = $this->setting->find(28);
        $map = $this->setting->find(33);
        $breadcrumbs = [
            [
                'name' => __('Hệ thống nhà thuốc'),
                'slug' => makeLinkToLanguage('drug-store', null, null, \App::getLocale()),
            ],
        ];

        if ($request->ajax()) {

            if ($request->id_address) {
                $id_address = $request->id_address;
                $map_selected = $this->setting->find($id_address);

                $output = $map_selected->description;

                echo $output;
            }
            if ($request->id_address_city) {
                $id_address_city = $request->id_address_city;

                $data = $this->setting->getALlCategoryProductChildren($id_address_city);
                $map_selected = $this->setting->find($data[0]);

                $output = $map_selected->description;
                echo $output;
            }
        } else {
            return view("frontend.pages.he-thong-nha-thuoc", [

                'breadcrumbs' => $breadcrumbs,
                'listSystem' => $listSystem,
                'typeBreadcrumb' => 'drug-store',
                'title' =>  "Hệ thống nhà thuốc",

                'seo' => [
                    'title' => "Hệ thống nhà thuốc",
                    'keywords' =>  "Hệ thống nhà thuốc",
                    'description' =>   "Hệ thống nhà thuốc",
                    'image' =>  "",
                    'abstract' =>  "Hệ thống nhà thuốc",
                ],

                "dataAddress" => $dataAddress,
                "map" => $map,
            ]);
        }
    }

    public function tuyen_dung(Request $request)
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }
        $data = $this->categoryPost->find(39);

        $breadcrumbs = [[
            'id' => $data->id,
            'name' => $data->name,
            'slug' => makeLinkToLanguage('tuyen-dung', null, null, \App::getLocale()),
        ]];

        $categoryAll =  $this->post->where('category_id', $data->id)->paginate(9);

        $post_hot =  $this->post->where('category_id', $data->id)->where('hot', 1)->limit(4)->get();

        return view("frontend.pages.tuyendung", [
            "data" => $data,
            "categoryAll" => $categoryAll,
            "post_hot" => $post_hot,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'tuyen-dung',
            'title' => $data ? $data->name : "",
            'category' => $data->category ?? null,
            'seo' => [
                'title' =>  $data->title_seo ?? "",
                'keywords' =>  $data->keywords_seo ?? "",
                'description' =>  $data->description_seo ?? "",
                'image' => $data->avatar_path ?? "",
                'abstract' =>  $data->description_seo ?? "",
            ]
        ]);
    }

    public function tuyendungDetail($slug)
    {
        $resultCheckLang = checkRouteLanguage2($slug);
        if ($resultCheckLang) {
            return $resultCheckLang;
        }

        $breadcrumbs = [];
        $data = [];

        $translation = $this->postTranslation->where([
            ["slug", $slug],
        ])->first();

        if ($translation) {
            $data = $translation->post;
            if (checkRouteLanguage($slug, $data)) {
                return checkRouteLanguage($slug, $data);
            }

            $categoryId = $data->category_id;
            $listIdChildren = $this->categoryPost->getALlCategoryChildrenAndSelf($categoryId);
            $dataRelate =  $this->post->whereIn('category_id', $listIdChildren)->where([
                ["id", "<>", $data->id],
            ])->limit(5)->get();
            $listIdParent = $this->categoryPost->getALlCategoryParentAndSelf($categoryId);
            foreach ($listIdParent as $parent) {
                $breadcrumbs[] = $this->categoryPost->select('id', 'name', 'slug')->find($parent)->toArray();
            }
            //Tin noi bat
            $post_hot =  $this->post->where('hot', 1)->orderByDesc('created_at')->limit(4)->get();

            return view('frontend.pages.tuyendung-detail', [
                'data' => $data,
                'post_hot' => $post_hot,
                "dataRelate" => $dataRelate,
                'breadcrumbs' => $breadcrumbs,
                'typeBreadcrumb' => 'tuyen-dung',
                'title' => $data ? $data->name : "",
                'category' => $data->category ?? null,
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

    public function camnhan(Request $request)
    {
        $resultCheckLang = checkRouteLanguage2();
        if ($resultCheckLang) {
            return $resultCheckLang;
        }
        $camnhan = $this->setting->find(93);
        $breadcrumbs = [[
            'name' => 'Cảm nhận của khách hàng',
            'slug' => makeLinkToLanguage('camnhan', null, null, \App::getLocale()),
        ]];

        $listCategoryHome = $this->categoryProduct->where('parent_id', '76')->where('active', 1)->orderBy('created_at', 'ASC')->limit(4)->get();

        return view("frontend.pages.camnhan", [
            "data" => $camnhan,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'camnhan',
            'seo' => [
                'title' =>  "Cảm nhận của khách hàng",
                'keywords' =>   "Cảm nhận của khách hàng",
                'description' =>    "Cảm nhận của khách hàng",
                'image' =>   "Cảm nhận của khách hàng",
                'abstract' =>   "Cảm nhận của khách hàng",
            ]
        ]);
    }

    public function storeAjax(Request $request)
    {
        //   dd($request->name);
        // dd($request->ajax());
        try {
            DB::beginTransaction();

            $dataContactCreate = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'sex' => $request->input('sex') ?? 1,
                'from' => $request->input('from') ?? "",
                'to' => $request->input('to') ?? "",
                'service' => $request->input('service') ?? "",
                'content' => $request->input('content') ?? null,
            ];
            //  dd($dataContactCreate);
            $contact = $this->contact->create($dataContactCreate);
            //  dd($contact);
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => 'ສົ່ງຂໍ້ຄວາມສຳເລັດ',
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html' => 'ສົ່ງຂໍ້ຄວາມສຳເລັດ',
                "message" => "fail"
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $dataProduct = $this->product;
        $dataPost = $this->post;
        $where = [];
        $req = [];
        if ($request->has('category_id')) {
            $categoryId = $request->category_id;
            $listIdChildren = $this->categoryProduct->getALlCategoryChildrenAndSelf($categoryId);
            $dataProduct =  $this->product->whereIn('category_id', $listIdChildren);
        }
        //  dd($dataProduct->get());
        if ($request->input('keyword')) {

            $dataProduct = $dataProduct->where(function ($query) {
                $idProTran = $this->productTranslation->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('product_id');
                // dd($idProTran);
                $query->whereIn('id', $idProTran)->orWhere([
                    ['masp', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
        }
        // if ($where) {
        //     $dataProduct = $dataProduct->where($where)->orderBy("created_at", "DESC");
        //     $dataPost = $dataPost->where($where)->orderBy("created_at", "DESC");
        // }
        $dataProduct = $dataProduct->orderBy("order", "ASC")->orderBy("created_at", "DESC")->paginate($this->productSearchLimit);
        //   $dataPost = $dataPost->paginate($this->postSearchLimit);
        $breadcrumbs = [[
            'id' => null,
            'name' => __('search.ket_qua_tim_kiem'),
            //'slug' => makeLink('search', null, null, $req),
            'slug' => "",
        ]];
        // dd($dataProduct);
        return view("frontend.pages.search", [
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'search',
            'dataProduct' => $dataProduct,
            // 'dataPost' => $dataPost,
            'unit' => $this->unit,
            'seo' => [
                'title' =>  __('search.ket_qua_tim_kiem'),
                'keywords' => __('search.ket_qua_tim_kiem'),
                'description' => __('search.ket_qua_tim_kiem'),
                'image' => __('search.ket_qua_tim_kiem'),
                'abstract' => __('search.ket_qua_tim_kiem'),
            ]
        ]);
    }

    public function search_daily(Request $request)
    {

        $dataAddress = $this->setting->find(28);
        $map = $this->setting->find(33);
        $breadcrumbs = [
            [
                'name' => "ຕິດຕໍ່",
                'slug' => makeLink('contact'),
            ],
        ];

        // Thông tin mục hệ thống
        $system = $this->setting->where('id', '57')->where('active', 1)->orderByDesc('created_at')->first();

        // Thông tin item mục hệ thống
        $systemChilds = $this->setting->where('parent_id', '57')->where('active', 1)->orderByDesc('created_at')->limit(2)->get();

        $data = $request->all();
        $key = $request->input('keyword');
        if ($key) {
            $listAddress = $this->setting->where('parent_id', '28')->where('name', 'LIKE', '%' . $key . '%')->get();
        }

        return view("frontend.pages.contact", [

            'breadcrumbs' => $breadcrumbs,
            'systemChilds' => $systemChilds,
            'system' => $system,
            'listAddress' => $listAddress,
            'typeBreadcrumb' => 'contact',
            'title' =>  "Thông tin liên hệ",

            'seo' => [
                'title' => "Thông tin liên hệ",
                'keywords' =>  "Thông tin liên hệ",
                'description' =>   "Thông tin liên hệ",
                'image' =>  "",
                'abstract' =>  "Thông tin liên hệ",
            ],

            "dataAddress" => $dataAddress,
            "map" => $map,
        ]);
    }
}
