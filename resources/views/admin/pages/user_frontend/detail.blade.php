@extends('admin.layouts.main')
@section('title',"Edit user")
@section('css')
<link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" />
<style>
   .select2-container--default .select2-selection--multiple .select2-selection__choice{
   background-color: #000 !important;
   }
   .select2-container .select2-selection--single{
   height: auto;
   }
</style>
@endsection

@section('content')
<div class="content-wrapper">
   @include('admin.partials.content-header',['name'=>"Thành viên","key"=>"Thông tin thành viên"])
   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
         
            @if ($user->active==0)
            <div class="col-md-12">
                <div class="alert alert-danger" style=" font-size: 150%;">
                    <strong>warning!</strong> Tài khoản này chưa được kích hoạt <br>
                    <span style="font-size: 14px;">(Các thông số tài khoản sẽ là thông số của tài khoản sau khi được kích hoạt)</span>
                  </div>
            </div>
            @elseif($user->active==2)
            <div class="col-md-12">
                <div class="alert alert-danger" style=" font-size: 150%;">
                    <strong>warning!</strong> Tài khoản này đã bị khóa <br>
                  </div>
            </div>
            @endif

            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số điểm có thể rút</span>
                        <span class="info-box-number">{{ $sumPointCurrent  }}</span>
                    </div>
                </div>
            </div>
            @foreach ($sumEachType as $item)
                @if($item['type'] == 4 || $item['type'] == 6)
                            
                @else
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ $typePoint[$item->type]['name']  }}</span>
                            <span class="info-box-number">{{ $item->total  }}</span>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="col-12" style="font-size: 13px;">
               <div class="row">
                   <div class="col-md-12 col-lg-6">
                        <div class="wrap-user-frontend">
                            {!! $htmlUserFrontend !!}
                        </div>
                   </div>
                   <div class="col-md-12 col-lg-6">
                        <div class="wrap-rose-user-frontend">
                            {!! $htmlRoseUserFrontend !!}
                        </div>
                   </div>
               </div>


            </div>

         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
@endsection
@section('js')

<script>
   $(function(){
    $(document).on('click','.pagination a',function(){
        event.preventDefault();
        let href=$(this).attr('href');
        //alert(href);
        $.ajax({
            type: "Get",
            url: href,
           // data: "data",
            dataType: "JSON",
            success: function (response) {
                if(response.type=='rose-user_frontend'){
                    $('.wrap-rose-user-frontend').html(response.html);
                } else if(response.type=='user_frontend'){
                    $('.wrap-user-frontend').html(response.html);
                }

            }
        });
    });
   })
</script>
@endsection
