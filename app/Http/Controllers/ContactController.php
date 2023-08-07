<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Contact;
use App\Models\Key;
use Illuminate\Http\Request;
use App\Models\Setting;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    private $setting;
    private $contact;
    public function __construct(Setting $setting, Contact $contact)
    {
        /*$this->middleware('auth');*/
        $this->setting=$setting;
        $this->contact=$contact;
    }
    public function index(){
        $resultCheckLang=checkRouteLanguage2();
        if($resultCheckLang){
            return $resultCheckLang;
        }


        $dataAddress=$this->setting->find(28);
        $map=$this->setting->find(33);
        $breadcrumbs= [
            [
                'name'=> __('home.lien_he'),
                'slug'=>makeLinkToLanguage('contact',null,null,\App::getLocale()),
            ],
        ];



        return view("frontend.pages.contact",[

            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'contact',
            'title' =>  "title_lienhe",

            'seo' => [
                'title' => __('contact.title_lienhe'),
                'keywords' => __('contact.keywords_lienhe'),
                'description' => __('contact.description_lienhe'),
                'image' =>  "",
				'abstract' => __('contact.abstract_lienhe'),
            ],

            "dataAddress"=>$dataAddress,
            "map"=>$map,
        ]);
    }
    public function storeAjaxLoad(Request $request){
     //   dd($request->name);
    // dd($request->ajax());
         try {
             DB::beginTransaction();
            $title='THÔNG TIN LIÊN HỆ';
            $dataContactCreate = [
                'name' => $request->input('name')??"",
                'phone' => $request->input('phone')??"",
                'email' => $request->input('email')??"",
                'active' => $request->input('active')??1,
                'status' => 1,
                'city_id' => $request->input('city_id')??null,
                'district_id' => $request->input('district_id')??null,
                'commune_id' => $request->input('commune_id')??null,
                'address_detail' => $request->input('address_detail')??null,
                'content'=>($request->input('title')??$title).'<br />'.'Vị trí ứng tuyển: '.$request->input('job_name').'<br />'.'Nội dung: '.$request->input('content'),
                'admin_id' => 0,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];
     
            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
          //  dd($contact);
            DB::commit();
            session()->flash('success', 'Đơn ứng tuyển của bạn đã gửi thành công. Chúng tôi sẽ phản hồi lại cho bạn trong thời gian sớm nhất!');
            return redirect()->back();
         } catch (\Exception $exception) {
             //throw $th;
             DB::rollBack();
             Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
             session()->flash('error', 'Đơn ứng tuyển của bạn chưa gửi được. Bạn vui lòng điền đầy đủ thông tin bắt buộc.');
             return redirect()->back();
         }
    }
    public function storeAjax(Request $request){
        //   dd($request->name);
       // dd($request->ajax());
            try {
                DB::beginTransaction();
               $title='THÔNG TIN LIÊN HỆ';
               $dataContactCreate = [
                   'name' => $request->input('name')??"",
                   'phone' => $request->input('phone')??"",
                   'email' => $request->input('email')??"",
                   'active' => $request->input('active')??1,
                   'status' => 1,
                   'city_id' => $request->input('city_id')??null,
                   'district_id' => $request->input('district_id')??null,
                   'commune_id' => $request->input('commune_id')??null,
                   'address_detail' => $request->input('address_detail')??null,
                   'content'=>($request->input('title')??$title).'<br />'.'Vị trí ứng tuyển: '.$request->input('job_name').'<br />'.'Nội dung: '.$request->input('content'),
                   'admin_id' => 0,
                   'user_id' => Auth::check() ? Auth::user()->id : 0,
               ];
        
               // Giới tính: '.$request->input('sex').'<br>
               // Từ: '.$request->input('from').'<br>
               // Đến: '.$request->input('to').'<br>
               // Từ: '.$request->input('service').'<br>
   
               $contact = $this->contact->create($dataContactCreate);
             //  dd($contact);
               DB::commit();
               return response()->json([
               "code" => 200,
               "html" => 'Gửi thông tin thành công',
               "message" => "success"
               ], 200);
   
            } catch (\Exception $exception) {
                //throw $th;
                DB::rollBack();
                Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                return response()->json([
                   "code" => 500,
                   'html'=>'Gửi thông tin không thành công',
                   "message" => "fail"
               ], 500);
   
            }
       }

    public function storeAjax2(Request $request){

         try {
             DB::beginTransaction();
            $title='HẸN LỊCH NGAY';
            $dataContactCreate = [
                'name' => $request->input('name')??"",
                'phone' => $request->input('phone')??"",
                'email' => $request->input('email')??"",
                'active' => $request->input('active')??1,
                'status' => 1,
                'city_id' => $request->input('city_id')??null,
                'district_id' => $request->input('district_id')??null,
                'commune_id' => $request->input('commune_id')??null,
                'address_detail' => $request->input('address_detail')??null,
                'content'=>($request->input('title')??$title).'<br />'.'Nội dung: '.$request->input('content').'<br />'.'Ngày đến: '.Carbon::parse($request->input('date_start'))->format('d/m/Y')??'',
                'admin_id' => 0,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];
     
            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
          //  dd($contact);
            DB::commit();
            return response()->json([
            "code" => 200,
            "html" => 'Gửi thông tin thành công',
            "message" => "success"
            ], 200);

         } catch (\Exception $exception) {
             //throw $th;
             DB::rollBack();
             Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
             return response()->json([
                "code" => 500,
                'html'=>'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);

         }
    }

    public function storeAjax1(Request $request){

         try {
             DB::beginTransaction();
            $title='ĐĂNG KÝ NGAY';
            $dataContactCreate = [
                'name' => $request->input('name')??"",
                'phone' => $request->input('phone')??"",
                'email' => $request->input('email')??"",
                'active' => $request->input('active')??1,
                'status' => 1,
                'city_id' => $request->input('city_id')??null,
                'district_id' => $request->input('district_id')??null,
                'commune_id' => $request->input('commune_id')??null,
                'address_detail' => $request->input('address_detail')??null,
                'content'=>($request->input('title')??$title).'
                <br />'.'Nội dung: '.$request->input('content2').'
                <br />'.'Sản phẩm: '.$request->input('content')??'',
                'admin_id' => 0,
                'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];
     
            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
          //  dd($contact);
            DB::commit();
            return response()->json([
            "code" => 200,
            "html" => 'Gửi thông tin thành công',
            "message" => "success"
            ], 200);

         } catch (\Exception $exception) {
             //throw $th;
             DB::rollBack();
             Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
             return response()->json([
                "code" => 500,
                'html'=>'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);

         }
    }

    public function diemBan(){

        $diem_ban = CategoryPost::find(135);

        return view("frontend.pages.diemban",[
            'diem_ban' => $diem_ban,

            'seo' => [
                'title' => "Điểm bán",
                'keywords' =>  "Điểm bán",
                'description' =>   "Điểm bán",
                'image' =>  "",
                'abstract' =>  "Điểm bán",
            ],

        ]);
    }
    public function diemBanChilds($slug){

        $breadcrumbs= [
            [
                'name'=> 'Điểm bán',
                'slug'=>makeLinkToLanguage('contact',null,null,\App::getLocale()),
            ],
        ];


        $translation = Key::where([
            ["slug", $slug],
        ])->first();
        $category = $translation->categoryPost;
        $categoryId = $category->id;
        $diem_ban_childs = CategoryPost::where([
            ['parent_id', $categoryId],
            ['active', 1]
        ])->orderBy('order')->get();




        return view("frontend.pages.diemban",[

            'category' => $category,
            'diem_ban_childs' => $diem_ban_childs,

            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'contact',
            'title' =>  "Thông tin liên hệ",

            'seo' => [
                'title' => "Điểm bán1",
                'keywords' =>  "Điểm bán1",
                'description' =>   "Điểm bán1",
                'image' =>  "",
                'abstract' =>  "Điểm bán1",
            ],

        ]);
    }
}
