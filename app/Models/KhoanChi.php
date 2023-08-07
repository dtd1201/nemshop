<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoanChi extends Model
{
    //
    protected $table="khoan_chi";
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function adminDuyet()
    {
        return $this->belongsTo(Admin::class, 'admin_duyet', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
