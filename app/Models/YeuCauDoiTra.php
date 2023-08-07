<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YeuCauDoiTra extends Model
{
    //
    protected $table="yeu_cau_doi_tra";
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
