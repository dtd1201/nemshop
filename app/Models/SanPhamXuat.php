<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPhamXuat extends Model
{
    //
    protected $table="san_pham_xuat";
    protected $guarded = [];

    public function lohang()
    {
        return $this->belongsTo(LoHang::class, 'lo_hang_id', 'id');
    }

    public function phieuxuat()
    {
        return $this->belongsTo(XuatKho::class, 'xuat_kho_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'masp', 'masp');
    }
}
