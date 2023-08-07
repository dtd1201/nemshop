<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\NumberMin;
class ValidateAdduserReferral extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "code"=>[
                "required",
               "exists:\App\Models\User,code",
            ],
            "name" => "required|min:3|max:250",
            "email" =>  [
                "nullable",
                Rule::unique("App\Models\User",'email')->where(function ($query) {
                    return $query->where([
                        ['deleted_at','=', null]
                    ]);
                })
            ],
            "username" =>  [
                "required",
                Rule::unique("App\Models\User",'username')->where(function ($query) {
                    return $query->where([
                        ['deleted_at','=', null]
                    ]);
                })
            ],
            // "masp"=>[
            //     "required",
            //     "min:3",
            //     "max:250",
            //     "exists:\App\Models\Product,masp",
            // ],
            // "startpoint" =>[
            //     "required",
            //     new NumberMin(200)
            // ],
            "password" =>"required|min:6",
            "password_confirmation"=>"required|same:password",
            // "role_id"=>[
            //     "required",
            //     new ArrayValueExistDatabase(Role::all(),'id',request()->role_id)
            // ],
           // "active" => "required",
            "checkrobot" => "accepted"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Tên không được để trống",
            "name.min" => "Tên phải lớn hơn 3 ký tự",
            "name.max" => "Tên phải nhỏ hơn 250 ký tự",
            "email.required" => "Email không được để trống",
            "email.unique" => "Email đã tồn tại",
            "username.required" => "Tài khoản không được để trống",
            "username.unique" => "Tài khoản đã tồn tại",
            "password.required" => "Mật khẩu không được để trống",
            "password.min"=>"Mật khẩu phải lớn hơn 6 ký tự",
            "password_confirmation.required" => "Mật khẩu nhập lại không được để trống",
            "password_confirmation.same" => "Mật khẩu không giống mật khẩu",
            "active.required" => "active không được để trống",
            "checkrobot.accepted" => "check robot được chấp nhận",
            "masp.required" => "Mã sản phẩm là trường bắt buộc",
            "masp.min" => "Mã sản phẩm > 3",
            "masp.max" => "Mã sản phẩm < 250",
            "masp.exists" => "Mã sản phẩm không tồn tại",
        ];
    }
}
