<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use App\Models\Code;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;
use App\Helper\CartHelper;
use App\Helper\CompareHelper;
use App\Models\Supplier;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Post;
use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

trait GetDataTrait
{
    public function getDataHeaderTrait($setting)
    {
        $cart = new CartHelper();
        $header['data-cart'] = $cart->cartItems;
        $totalQuantity =  $cart->getTotalQuantity();
        $compare = new CompareHelper();
        $totalCompareQuantity =  $compare->getTotalQuantity();
        $header['url'] = URL::to('/');
        $header['hotline'] = $setting->find(352);
        $header['email'] = $setting->find(3);
        $header['address'] = $setting->find(6);
        $header['title'] = $setting->find(89);
        $header['logo'] = $setting->find(13);
        $header['socialParent'] = $setting->find(11);
        $header['seo_home'] = $setting->find(211);
        $header['muahang'] = $setting->find(234);
        $header['tai_sao1'] = $setting->find(355);
        $header['search_top'] = $setting->find(368);
        $header['header_top'] = $setting->find(410);

        $header['tai_sao'] = $setting->find(238);
        $header['thuong_hieu'] = $setting->find(235);
        $header['uu_dai'] = $setting->find(236);
        $header['banhang'] = $setting->find(237);
        $header['hotline_top'] = $setting->find(238);
        $header['totalQuantity'] = $totalQuantity;
        $header['totalCompareQuantity'] = $totalCompareQuantity;

        $code = new Code();
        $header['google-anlytic'] = $code->find(1);
        $header['code-top'] = $code->find(2);
        $header['code-home'] = $code->find(4);
        $header['code-bottom'] = $code->find(3);

        $lang =   App::getLocale();

        $menuP = [];
        $categoryProduct = new CategoryProduct();


        // lấy megamenu
        $menuProduct = [];



        $categoryPost = new CategoryPost();
        // menu 1 
        $menuNew = [];
        $listCategoryPost = $categoryPost->whereIn(
            'id',
            [1,13]
        )->orderby('order')->pluck('id');

        foreach ($listCategoryPost as $id) {
            array_push($menuNew, menuRecusive($categoryPost, $id));
        }
        $header['menu'] = $categoryPost->with('childs.childs')->where('parent_id', 0)->where('active', 1)->orderBy('order')->get();


        return  $header;
    }

    public function getDataFooterTrait($setting)
    {
        $footer = [];
        $footer['dang_ky'] = $setting->where([
            'active' => 1
        ])->find(375);
        $footer['info'] = $setting->where([
            'active' => 1
        ])->find(377);
        $footer['copy_right'] = $setting->where([
            'active' => 1
        ])->find(423);
        $footer['sosial'] = $setting->where([
            'active' => 1
        ])->find(424);
        $categoryPost = new CategoryPost();
        $footer['lien_he'] = $categoryPost->where([
            'active' => 1
        ])->find(124);   
        return  $footer;
    }

    public function getDataSidebarTrait($categoryPost, $categoryProduct)
    {
        $sidebar = [];
        // lấy nhà cung cấp
        $supplier = new Supplier();
        $suppliers = $supplier->where('active', 1)->orderby('order')->get();
        $sidebar['supplier'] = $suppliers;
        // lấy thuộc tính
        $attribute = new Attribute();
        $attributes = $attribute->where([
            ['active', 1],
            ['parent_id', 0],
        ])->orderby('order')->get();
        $sidebar['attribute'] = $attributes;

        $setting = new Setting();
        // lấy sidebar
        $sidebar['banner'] = $setting->find(110);
        $sidebar['uudiem'] = $setting->find(108);
        $sidebar['slider'] = $setting->find(105);
        $sidebar['dichvu'] = $setting->find(287);
        $sidebar['support_online'] = $setting->find(269);
        // lấy product
        $product = new Product();
        $post = new Post();

        $pro1 = $product->where([
            ['active', 1]
        ])->orderByDesc('view')->limit(6)->get();

        $pro = $product->where([
            ['hot', 1],
            ['active', 1]
        ])->orderByDesc('created_at')->limit(6)->get();


        $sidebar['product'] = $pro;
        $sidebar['productViewHot'] = $pro1;
        $sidebar['categoryPost'] = $categoryPost->whereIn(
            'parent_id',
            [0]
        )->whereNotIn(
            'id',
            [14]
        )->get();

        $sidebar['categoryProduct']  = $categoryProduct->setAppends(['count_product'])->whereIn(
            'parent_id',
            [0]
        )->get();

        $sidebar['postsHot'] = $post->where([
            ['active', 1],
            ['hot', 1],
            ['category_id', 56],
        ])->orderby('order')->orderByDesc('created_at')->limit(5)->get();



        return  $sidebar;
    }
}
