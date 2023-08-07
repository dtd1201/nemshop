<?php

namespace App\Http\Controllers\Domain\FruitStore;

use App\Dictionaries\AppDomain;
use App\Dictionaries\Cms\CategoryType;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $name = false, $id = false)
    {
        //
        $listCategory = Category::getListCategoryByType(2);
        $domainID = AppDomain::FRUIT_STORE;
        $categoryType = CategoryType::FRUIT_STORE_PRODUCT;
        $categoryTypeImage = CategoryType::FRUIT_STORE_IMAGE;
        $categoryId = CategoryType::FRUIT_STORE_MEDIA;
        $getCID = $request->get('id');
        $getCName = $request->get('name');

        $query = Posts::query()
            ->leftJoin('blog_categories', 'blog_posts.category_id', '=', 'blog_categories.id')
            ->filter($request->only(['title', 'category_type']))
            ->where('blog_posts.domain_id', $domainID)
            ->where('blog_posts.category_type', $categoryType)
            //->where('blog_categories.category_type_all', $categoryTypeImage)
            ->select('blog_posts.*')
            ->orderBy('blog_posts.id', 'desc');

        //Filter by category
        if ($getCID) {
            $query->where('blog_posts.category_id', $getCID);
        }
        $postData = $query->paginate(50);
        foreach ($postData as $postDatum) {
            // dd($postDatum->slug);
        }
        $seo = [
            'title' => 'Saigon360 - Danh sách sản phẩm',
            'description' => 'Saigon360 - Danh sách sản phẩm',
            //'image' => url('/og_image.png'),
            'image' => 'https://res.cloudinary.com/dfeqcehdw/image/upload/w_1156,h_606,c_fill,q_auto,f_auto/v1635610469/yik50c1ikl06y9pvepn2.png',
            'type' => 'website',
            'image_w' => 345,
            'image_h' => 345,
        ];

        $data = [
            'title' => 'Title',
            'seo' => $seo,
            'listCategory' => $listCategory,
            'postData' => $postData
        ];

        // return view('domain.fruitstore.product.shop-3column', $data);
        return view('domain.fruitstore.product.product-all', $data);
    }

    public function loadCreateProduct(Request $request, $id)
    {
        $data = $this->product->findOrFail($id);
        $index = $data->id;
        return response()->json([
            'code' => 200,
            'html' => view('search.load-create-product', [
                'data' => $data,
                'index' => $index,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }

    public function category()
    {
        //
    }

    public function new()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Todo filter by category
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug, $id = false)
    {
        //
        //
        $getID = $request->get('id');
        /** @var Posts $postData */
        $postData = Posts::query()
            ->where('slug', $slug)
            ->orWhere('id', $id)
            ->orderBy('id', 'desc')
            ->first();

        if ($postData == false) {

            abort(404);
        }

        $postRelative = Posts::query()
            ->where('category_id', $postData->category_id)
            ->get();


        $postFile = $postData->files;


        $seo = [
            'title' => $postData->title,
            'description' => $postData->excerpt,
            'image' => $postData->getPostThumbnail(1, 1080, 1350),
            'type' => 'website',
            'image_w' => 345,
            'image_h' => 345,
        ];

        $data = [
            'title' => 'Title',
            'postFile' => $postFile,
            'seo' => $seo,
            'postData' => $postData,
            'postRelative' => $postRelative
        ];

        return view('domain.fruitstore.product.product-details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
