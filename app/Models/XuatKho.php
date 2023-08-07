<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XuatKho extends Model
{
    //
    protected $table="xuat_kho";
    protected $guarded = [];

    public $listCondition = [
        0 => [
            'condition' => 0,
            'name' => 'Chờ xuất kho',
        ],
        1 => [
            'condition' => 1,
            'name' => 'Đang vận chuyển',
        ],
        2 => [
            'condition' => 2,
            'name' => 'Hoàn thành',
        ],
        3 => [
            'condition' => 3,
            'name' => 'Đã thu tiền',
        ],
        // -1 => [
        //     'condition' => -1,
        //     'name' => 'Hủy bỏ',
        // ],
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function adminDuyet()
    {
        return $this->belongsTo(Admin::class, 'admin_duyet', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(SanPhamXuat::class, 'xuat_kho_id', 'id');
    }
}
