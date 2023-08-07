<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoHang extends Model
{
    //
    protected $table="kho_hang";
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function lohang()
    {
        return $this->belongsTo(LoHang::class, 'lo_hang_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'masp', 'masp');
    }
}
