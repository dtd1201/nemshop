<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Components\Recusive;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    //
    //use SoftDeletes;
    protected $table = "products";
    public $parentId = "parent_id";
    // public $fillable =['name'];
    protected $guarded = [];

    //  protected $appends = ['price_after_sale', 'slug_full', 'number_pay', 'name', 'slug', 'description', 'description_seo', 'keyword_seo', 'title_seo', 'content', 'language','model','tinhtrang','baohanh','xuatsu','content1','content2','content3','content4'];
    public function getPriceAfterSaleAttribute()
    {
        if ($this->attributes['sale']) {
            return   $this->attributes['price'] * (100 - $this->attributes['sale']) / 100;
        } else {
            return $this->attributes['price'];
        }
    }
    // tạo thêm thuộc tính slug_full
    public function getSlugFullAttribute()
    {
        return makeLink('checkKey', $this->attributes['id'], $this->getSlugAttribute());
    }

    // tạo thêm thuộc tính name
    public function getNameAttribute()
    {
        //  dd($this->translationsLanguage()->first()->name);
        return optional($this->translationsLanguage()->first())->name;
    }

    // tạo thêm thuộc tính slug
    public function getSlugAttribute()
    {
        return optional($this->key()->first())->slug;
    }
    // tạo thêm thuộc tính description
    public function getDescriptionAttribute()
    {
        return optional($this->translationsLanguage()->first())->description;
    }
    // tạo thêm thuộc tính description_seo
    public function getDescriptionSeoAttribute()
    {
        return optional($this->translationsLanguage()->first())->description_seo;
    }

    // tạo thêm thuộc tính keyword_seo
    public function getKeywordSeoAttribute()
    {
        return optional($this->translationsLanguage()->first())->keyword_seo;
    }


    // tạo thêm thuộc tính title_seo
    public function getTitleSeoAttribute()
    {
        return optional($this->translationsLanguage()->first())->title_seo;
    }

    // tạo thêm thuộc tính content mô tả sản phẩm
    public function getContentAttribute()
    {
        return optional($this->translationsLanguage()->first())->content;
    }
    // tạo thêm thuộc tính content2 thông số kỹ thuật
    public function getContent2Attribute()
    {
        return optional($this->translationsLanguage()->first())->content2;
    }
    // tạo thêm thuộc tính content3 chính sách vận chuyển
    public function getContent3Attribute()
    {
        return optional($this->translationsLanguage()->first())->content3;
    }
    // tạo thêm thuộc tính content4 chính sách vận chuyển
    public function getContent4Attribute()
    {
        return optional($this->translationsLanguage()->first())->content4;
    }
    // tạo thêm thuộc tính link
    public function getlink1Attribute()
    {
        return optional($this->translationsLanguage()->first())->link1;
    }
    public function getlink2Attribute()
    {
        return optional($this->translationsLanguage()->first())->link2;
    }
    public function getlink3Attribute()
    {
        return optional($this->translationsLanguage()->first())->link3;
    }
    public function getlink4Attribute()
    {
        return optional($this->translationsLanguage()->first())->link4;
    }

    // tạo thêm thuộc tính model
    public function getModelAttribute()
    {
        return optional($this->translationsLanguage()->first())->model;
    }
    // tạo thêm thuộc tính tình trạng
    public function getTinhtrangAttribute()
    {
        return optional($this->translationsLanguage()->first())->tinhtrang;
    }

    // tạo thêm thuộc tính bảo hành
    public function getBaohanhAttribute()
    {
        return optional($this->translationsLanguage()->first())->baohanh;
    }
    // tạo thêm thuộc tính bảo hành
    public function getXuatsuAttribute()
    {
        return optional($this->translationsLanguage()->first())->xuatsu;
    }

    // tạo thêm thuộc tính content
    public function getLanguageAttribute()
    {
        return optional($this->translationsLanguage()->first())->language;
    }
    // tạo thêm thuộc tính so sp ban dc
    public function getNumberPayAttribute()
    {
        //  dd($this);
        $total =  $this->stores()->whereIn('type', [2, 3])->select(\App\Models\Store::raw('SUM(quantity) as total'))->first()->total;
        if ($total) {
            return $total;
        } else {
            return 0;
        }
    }

    // get images by relationship 1-nhieu  1 product có nhiều images sử dụng hasMany
    public function images()
    {
        return $this->hasMany(ProductImage::class, "product_id", "id");
    }
    // get tags by relationship nhieu-nhieu by table trung gian product_tags
    // 1 product có nhiều product_tags
    // 1 tag có nhiều product_tags
    // table trung gian product_tags chứa column product_id và tag_id
    public function tags()
    {
        return $this
            ->belongsToMany(Tag::class, ProductTag::class, 'product_id', 'tag_id')
            ->withTimestamps();
    }
    public function tagsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(Tag::class, ProductTag::class, 'product_id', 'tag_id')
            ->withTimestamps()->where('language', '=', $language);
    }

    public function productscate()
    {
        return $this
            ->belongsToMany(CategoryProduct::class, ProductForCategory::class, 'product_id', 'category_id')
            ->withTimestamps();
    }
    public function productscateLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(CategoryProduct::class, ProductForCategory::class, 'product_id', 'category_id')
            ->withTimestamps()->where('language', '=', $language);
    }
    // lấy thuộc tính sản phẩm
    public function attributes()
    {
        return $this
            ->belongsToMany(Attribute::class, ProductAttribute::class, 'product_id', 'attribute_id')
            ->withTimestamps();
    }
    public function attributesLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(Attribute::class, ProductAttribute::class, 'product_id', 'attribute_id')
            ->withTimestamps()->where('language', '=', $language);
    }

    public function questions()
    {
        return $this
            ->belongsToMany(Question::class, ProductQuestion::class, 'product_id', 'question_id')
            ->withTimestamps();
    }


    public function stars()
    {
        return $this->hasMany(ProductStar::class, 'product_id', 'id');
    }

    // get category by relationship 1 - nhieu
    // 1 category_products có nhiều product
    // 1 product có 1 category_products
    // use belongsTo để truy xuất ngược từ product lấy data trong table category
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function stores()
    {
        return $this->hasMany(Store::class, "product_id", "id");
    }

    public function comments()
    {
        return $this
            ->belongsToMany(Comment::class, ProductComment::class, 'product_id', 'comment_id')
            ->withTimestamps();
    }

    public function getTotalProductStore($id)
    {

        return $this->find($id)->stores()->select(\App\Models\Store::raw('SUM(quantity) as total'))->first()->total;
    }

    public function translationsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(ProductTranslation::class, "product_id", "id")->where('language', '=', $language);
    }
    public function translations()
    {
        return $this->hasMany(ProductTranslation::class, "product_id", "id");
    }

    public function productStars()
    {
        return $this->hasMany(ProductStar::class, 'product_id', 'id');
    }

    public static function getHtmlOption($parentId = "")
    {
        $data = self::all();
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }

    public function options()
    {
        return $this->hasMany(Option::class, "product_id", "id");
    }
    public static function mergeOption($idOption)
    {
        $s = 'options.size as size,
        options.price as price,
        options.id as option_id,
        ';
        $s2 = 'products.*';

        // if(count($selectMy)>0){
        //     $s2=collect($selectMy);
        //     $stringKey = $s2->map(function ($item, $key) {
        //         return "category_programs." . $item ." as ".$item;
        //     });

        //     $s2=$stringKey->implode(' ');
        // }
        return self::join('options', function ($join) {
            $join->on('products.id', '=', 'options.product_id');
        })->where('options.id', '=', $idOption)
            ->select(
                $s2,
                DB::raw($s)
            );
    }

    // lấy đoạn văn

    public function paragraphs()
    {
        return $this
            ->hasMany(ParagraphProduct::class, 'product_id', 'id');
    }
    public function paragraphsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->hasMany(ParagraphProduct::class, 'product_id', 'id')->where('language', '=', $language);
    }
    public function key($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(Key::class, "key_id", "id")->where('type', 4)->where('language', '=', $language);
    }
}
