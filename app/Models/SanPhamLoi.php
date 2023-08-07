<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPhamLoi extends Model
{
    //
    protected $table="san_pham_loi";
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function lohang()
    {
        return $this->belongsTo(LoHang::class, 'lo_hang_id', 'id');
    }
}
