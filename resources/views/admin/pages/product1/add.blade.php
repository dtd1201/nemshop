@extends('admin.layouts.main')
@section('title',"Thêm Sản phẩm")

@section('css')
{{-- <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        bacđơn vịround-color: #000 !important;
    }

    .select2-container .select2-selection--single {
        height: auto;
    }
    .tinymce_editor_init{
        height: 300px !important;
    }
	.card-body .form-group {
		margin-bottom: 5px;
	}
</style> --}}
@endsection
@section('content')


<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Sản phẩm","key"=>"Thêm Sản phẩm"])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session()->has("alert"))
                    <div class="alert alert-success">
                        {{session()->get("alert")}}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-warning">
                        {{session("error")}}
                    </div>
                    @endif
                    <form class="form-horizontal" action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-header">
                                    @foreach ($errors->all() as $message)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @endforeach
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-tool p-3 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg">Chấp nhận</button>
                                    <button type="reset" class="btn btn-danger btn-lg">Làm lại</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-8">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                       <h3 class="card-title">Thông tin Sản phẩm</h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
										<ul class="nav nav-tabs">
                                            <li class="nav-item">
                                              <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng quan</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                            </li> -->
                                            <li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh liên quan</a>
                                            </li>
                                            {{--<li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                            </li>--}}
                                        </ul>

                                        <div class="tab-content">
                                            <!-- START Tổng Quan -->
                                            <div id="tong_quan" class="container tab-pane active "><br>

                                                <ul class="nav nav-tabs">
                                                    @foreach ($langConfig as $langItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#tong_quan_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($langConfig as $langItem)
                                                    <div id="tong_quan_{{$langItem['value']}}" class="container wrapChangeSlug tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Tên Sản phẩm</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control nameChangeSlug
                                                                    @error('name_'.$langItem['value']) is-invalid @enderror" id="name_{{$langItem['value']}}" value="{{ old('name_'.$langItem['value']) }}" name="name_{{$langItem['value']}}" placeholder="Nhập tên sản phẩm">
                                                                    @error('name_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Slug</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control resultSlug changeAlias1
                                                                    @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" value="{{ old('slug_'.$langItem['value']) }}" name="slug_{{ $langItem['value'] }}" placeholder="Nhập slug">
                                                                    @error('slug_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link 01</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link1_'.$langItem['value']) is-invalid  @enderror" id="link1_{{ $langItem['value'] }}" value="{{ old('link1_'.$langItem['value']) }}" name="link1_{{ $langItem['value'] }}" placeholder="Nhập link">
                                                                    @error('link1_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link 02</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link2_'.$langItem['value']) is-invalid  @enderror" id="link2_{{ $langItem['value'] }}" value="{{ old('link2_'.$langItem['value']) }}" name="link2_{{ $langItem['value'] }}" placeholder="Nhập link">
                                                                    @error('link2_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link 03</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link3_'.$langItem['value']) is-invalid  @enderror" id="link3_{{ $langItem['value'] }}" value="{{ old('link3_'.$langItem['value']) }}" name="link3_{{ $langItem['value'] }}" placeholder="Nhập link">
                                                                    @error('link3_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link 04</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link4_'.$langItem['value']) is-invalid  @enderror" id="link4_{{ $langItem['value'] }}" value="{{ old('link4_'.$langItem['value']) }}" name="link4_{{ $langItem['value'] }}" placeholder="Nhập link">
                                                                    @error('link4_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Thương hiệu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control
                                                                    @error('model_'.$langItem['value']) is-invalid @enderror" id="model_{{$langItem['value']}}" value="{{ old('model_'.$langItem['value']) }}" name="model_{{$langItem['value']}}" placeholder="Nhập thương hiệu">
                                                                    @error('model_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Trạng thái</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control
                                                                    @error('tinhtrang_'.$langItem['value']) is-invalid @enderror" id="tinhtrang_{{$langItem['value']}}" value="{{ old('tinhtrang_'.$langItem['value']) }}" name="tinhtrang_{{$langItem['value']}}" placeholder="Nhập trạng thái">
                                                                    @error('tinhtrang_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Khuyến mại đặc biệt</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control
                                                                    @error('baohanh_'.$langItem['value']) is-invalid @enderror" id="baohanh_{{$langItem['value']}}" value="{{ old('baohanh_'.$langItem['value']) }}" name="baohanh_{{$langItem['value']}}" placeholder="Khuyến mại đặc biệt">
                                                                    @error('baohanh_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        
                                                        {{--
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Phụ kiện tặng kèm</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control
                                                                    @error('xuatsu_'.$langItem['value']) is-invalid @enderror" id="xuatsu_{{$langItem['value']}}" value="{{ old('xuatsu_'.$langItem['value']) }}" name="xuatsu_{{$langItem['value']}}" placeholder="Nhập phụ kiện tặng kèm">
                                                                    @error('xuatsu_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        --}}

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập giới thiệu trái</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('description_'.$langItem['value']) is-invalid @enderror" name="description_{{$langItem['value']}}" id="" rows="3"  placeholder="Nhập giới thiệu trái">{{ old('description_'.$langItem['value']) }}</textarea>
                                                                    @error('description_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập giới thiệu phải</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content4_'.$langItem['value']) is-invalid @enderror" name="content4_{{$langItem['value']}}" id="" rows="3"  placeholder="Nhập giới thiệu phải">{{ old('content4_'.$langItem['value']) }}</textarea>
                                                                    @error('content4_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Khuyến mại sản phẩm</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content3_'.$langItem['value']) is-invalid  @enderror" name="content3_{{$langItem['value']}}" id="" rows="3" value=""  placeholder="Nhập khuyến mại sản phẩm" >
                                                                    {{ old('content3_'.$langItem['value']) }}
                                                                    </textarea>
                                                                    @error('content3_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập mô tả sản phẩm</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content_'.$langItem['value']) is-invalid  @enderror" name="content_{{$langItem['value']}}" id="" rows="20" value=""  placeholder="Nhập mô tả sản phẩm" >
                                                                    {{ old('content_'.$langItem['value']) }}
                                                                    </textarea>
                                                                    @error('content_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="title_seo" value="{{ old('title_seo_'.$langItem['value']) }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
                                                                    @error('title_seo_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                <div class="col-sm-10">
                                                                    <textarea
                                                                        class="form-control @error('description_seo_' . $langItem['value']) is-invalid  @enderror"
                                                                        id="description_seo"
                                                                        name="description_seo_{{ $langItem['value'] }}"
                                                                        id="" rows="3" value=""
                                                                        placeholder="Mô tả">
                                                                        {{ old('description_seo_' . $langItem['value']) }}
                                                                    </textarea>
                                                                    
                                                                    @error('description_seo_' . $langItem['value'])
                                                                        <div class="invalid-feedback d-block">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value']) }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                    @error('keyword_seo_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Đường dẫn / Alias</label>
                                                                <div class="col-sm-10">
                                                                    <div class="next-input--stylized">
                                                                        <span class="next-input__add-on next-input__add-on--before" style="padding-right:0">{{ $url }}/</span>
                                                                        <input type="text" class="next-input next-input--invisible resultSlug changeAlias2
                                                                        @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" value="{{ old('slug_'.$langItem['value']) }}" name="slug_{{ $langItem['value'] }}">
                                                                        @error('slug_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Chính sách bảo hành</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content2_'.$langItem['value']) is-invalid  @enderror" name="content2_{{$langItem['value']}}" id="" rows="20" value=""  placeholder="Nhập chính sách bảo hành" >
                                                                    {{ old('content2_'.$langItem['value']) }}
                                                                    </textarea>
                                                                    @error('content2_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        
                                                        {{--
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for=""> Nhập chính sách bảo hành</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content4_'.$langItem['value']) is-invalid  @enderror" name="content4_{{$langItem['value']}}" id="" rows="20" value=""  placeholder="Nhập chính sách bảo hành" >
                                                                    {{ old('content4_'.$langItem['value']) }}
                                                                    </textarea>
                                                                    @error('content4_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                            
                                            <!-- END Tổng Quan -->

                                            <!-- START Dữ Liệu -->
                                            <!-- <div id="du_lieu" class="container tab-pane fade"><br>

                                            </div> -->
                                            <!-- END Dữ Liệu -->

                                            <!-- START Hình Ảnh -->
                                            <div id="hinh_anh" class="container tab-pane fade"><br>
                                            {{--<div class="wrap-load-image mb-3">
                                                    <div class="form-group">
                                                        <label for="">Ảnh đại diện</label>
                                                        <input type="file" class="form-control-file img-load-input border @error('avatar_path')
                                                        is-invalid
                                                        @enderror" id="" name="avatar_path">
                                                        @error('avatar_path')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                </div>--}}
                                                <div class="wrap-load-image mb-3">
                                                    <div class="form-group">
                                                        <label for="">Ảnh liên quan</label>
                                                        <input type="file" class="form-control-file img-load-input-multiple border @error('image')
                                                            is-invalid
                                                            @enderror" id="" name="image[]" multiple>
                                                    </div>
                                                    @error('image')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                    <div class="load-multiple-img">
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Hình Ảnh -->

                                            <!-- START Seo -->
                                            {{--<div id="seo" class="container tab-pane fade"><br>
                                                <ul class="nav nav-tabs">
                                                    @foreach ($langConfig as $langItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#seo_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($langConfig as $langItem)
                                                        <div id="seo_{{$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="" value="{{ old('title_seo_'.$langItem['value']) }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
                                                                        @error('title_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('description_seo_'.$langItem['value']) is-invalid @enderror" id="" value="{{ old('description_seo_'.$langItem['value']) }}" name="description_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                        @error('description_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="" value="{{ old('keyword_seo_'.$langItem['value']) }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                        @error('keyword_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập tags</label>
                                                                    <div class="col-sm-10">
                                                                        
                                                                        <select class="form-control tag-select-choose-question w-100" multiple="multiple" name="tags_{{$langItem['value']}}[]">
                                                                            @if (old('tags_'.$langItem['value']))
                                                                                @foreach (old('tags_'.$langItem['value']) as $tag)
                                                                                    <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                        @error('title_seo')
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>


                                            </div>--}}
                                            <!-- END Seo -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Câu hỏi thường gặp</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            @foreach ($questions as $key=> $question)
                                            <div class="form-group">
                                                <label class="control-label" for="">{{ $question->name }}</label>
                                                <select class="form-control tag-select-choose select-question"  name="question[]" multiple>
                                                    <option value="0">-- Chọn câu hỏi --</option>
                                                    @foreach ($question->childs()->orderby('order')->get() as $k=> $ques)
                                                        <option value="{{ $ques->id }}">
                                                            {{ $ques->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('question.'.$key)
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                        <h3 class="card-title w-100">Thêm đoạn văn   <a data-url="{{ route('admin.product.loadParagraphProduct') }}" class="btn  btn-info btn-md float-right " id="addParagraph">+ Thêm đoạn văn</a></h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="wrap-paragraph">
                                                <table class="table table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th style="width:calc(100% - 50px);">Nhập thông tin đoạn văn</th>
                                                            <th style="width:50px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (old('typeParagraph')&&old('typeParagraph'))
                                                            @foreach (old('typeParagraph') as $key=>$value)
                                                            <tr class="paragraph">
                                                                <td class="" style="width:calc(100% - 50px);">
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <ul class="nav nav-tabs">
                                                                                @foreach ($langConfig as $langItem)
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#thong_tin_paragraph_{{$key.$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                @foreach ($langConfig as $langItem)
                                                                                <div id="thong_tin_paragraph_{{$key.$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 control-label" for="">Tên đoạn</label>
                                                                                            <div class="col-sm-10">
                                                                                                <input type="text" class="form-control @error('nameParagraph_'.$langItem['value'].'.'.$key) is-invalid @enderror"  value="{{ old('nameParagraph_'.$langItem['value'])[$key] }}" name="nameParagraph_{{$langItem['value']}}[]" placeholder="Nhập tên" required>
                                                                                                @error('nameParagraph_'.$langItem['value'].'.'.$key)
                                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 control-label" for="">Nhập nội dung đoạn</label>
                                                                                            <div class="col-sm-10">
                                                                                                <textarea class="form-control tinymce_editor_init @error('valueParagraph_'.$langItem['value'].'.'.$key) is-invalid  @enderror" name="valueParagraph_{{$langItem['value']}}[]" id="" rows="15" value=""  placeholder="Nhập nội dung đoạn văn" >{{  old('valueParagraph_'.$langItem['value'])[$key]  }}</textarea>
                                                                                                @error('valueParagraph_'.$langItem['value'].'.'.$key)
                                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="wrap-load-image mb-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Ảnh đại diện</label>
                                                                                    <input type="file" class="form-control-file img-load-input border" id="" name="image_path_paragraph[]">
                                                                                </div>
                                                                                <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 150px;object-fit:cover; max-width: 200px;">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label" for="">Chọn kiểu</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control" id="" value="" name="typeParagraph[]" required>
                                                                                            <option value="">--- Chọn kiểu đoạn ---</option>
                                                                                            @foreach (config('paragraph.products') as $keyC=> $valueC)
                                                                                                <option value="{{ $keyC }}" {{  old('typeParagraph')[$key]==$keyC?"selected":"" }}> {{ $valueC }} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('typeParagraph.'.$key)
                                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label" for="">Số thứ tự</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="number" min="0" class="form-control"  value="{{ old('orderParagraph')[$key]  }}" name="orderParagraph[]" placeholder="Nhập số thứ tự">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label" for="">Trạng thái</label>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                            <input type="checkbox" class="form-check-input checkParagraph" value="1" name="activeParagraph[]" {{ old('activeParagraph')[$key]==1?"checked":"" }}>Hiện
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                                <input type="checkbox" class="form-check-input checkParagraph" value="0" name="activeParagraph[]" {{ old('activeParagraph')[$key]==0?"checked":"" }}>Ẩn
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td style="width:50px;">
                                                                    <a  class="btn btn-sm btn-danger deleteParagraph"><i class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                    @else
                                                        
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin khác</h3>
                                     </div>
                                     <div class="card-body table-responsive p-3">
                                        <div class="form-group">
                                            <label class="control-label" for="">Mã sản phẩm</label>
                                            <input type="text" min="0" class="form-control  @error('masp') is-invalid  @enderror"  value="{{ old('masp') }}" name="masp" placeholder="Nhập mã sản phẩm">
                                            @error('masp')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="form-group">
                                            <label class="control-label" for="">Màu</label>
                                            <input type="text" min="0" class="form-control  @error('file3') is-invalid  @enderror"  value="{{ old('file3') }}" name="file3" placeholder="Nhập màu">
                                            @error('file3')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div> 

                                        <div class="form-group">
                                            <label class="control-label" for="">Chọn danh mục</label>
                                            <select class="form-control custom-select select-2-init @error('category_id')
                                                is-invalid
                                                @enderror" id="" value="{{ old('category_id') }}" name="category_id">

                                                <option value="0">--- Chọn danh mục cha ---</option>

                                                @if (old('category_id'))
                                                    {!! \App\Models\CategoryProduct::getHtmlOption(old('category_id')) !!}
                                                @else
                                                {!!$option!!}
                                                @endif
                                            </select>
                                            @error('category_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>--}}
                                        <div class="form-group wrap-permission">
                                            <div style="border: 1px solid; padding: 5px;">
                                                <label class="control-label" for="">Lựa chọn chuyên mục</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                            @foreach($data_cate as $item)
                                                            <div class="item-permission mt-2 mb-2">
                                                                <div class="form-check permission-title">
                                                                    <label class="form-check-label p-2">
                                                                        <input type="checkbox" class="form-check-input check-parent" value="{{ $item->id }}" name="category[]"
                                                                        
                                                                        >{{ $item->name }}
                                                                    </label>
                                                                </div>
                                                                @if(count($item->childs)>0)
                                                                <div class="list-permission p-2 pl-4">
                                                                    <div class="row">
                                                                        @foreach($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild)
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild->id }}"
                                                                            
                                                                            >{{ $itemChild->name }}
                                                                            </label>
                                                                        </div>
                                                                        @if(count($itemChild->childs)>0)
                                                                        <div class="row">
                                                                            @foreach($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild2)
                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                <div class="form-check pl-5">
                                                                                    <label class="form-check-label">
                                                                                    <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild2->id }}"
                                                                                    
                                                                                    >{{ $itemChild2->name }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @endif
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-load-image mb-3">
                                            <div class="form-group">
                                                <label for="">Ảnh đại diện</label>
                                                <input type="file" class="form-control-file img-load-input border @error('avatar_path')
                                                is-invalid
                                                @enderror" id="" name="avatar_path">
                                                @error('avatar_path')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                        </div>
                                        

                                         <div class="form-group">
                                            <label class="control-label" for="">Chọn dược sĩ</label>
                                            <select class="form-control @error('supplier_id')
                                                is-invalid
                                                @enderror" id="" value="{{ old('supplier_id') }}" name="supplier_id">

                                                <option value="0">--- Chọn dược sĩ ---</option>
                                                @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}" @if (old('supplier_id')) {{ old('supplier_id')==  $item->id ?"selected":""}} @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="">Số thứ tự</label>

                                            <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror"  value="{{ old('order') }}" name="order" placeholder="Nhập số thứ tự">

                                            @error('order')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                       {{-- <div class="form-group">
                                            <label class=" control-label" for="">Sale(%)</label>
                                            <input type="number" min="0" class="form-control  @error('sale') is-invalid  @enderror"  value="{{ old('sale') }}" name="sale" placeholder="Nhập sale">

                                            @error('sale')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>--}}

                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="">Sản phẩm bán chạy</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('hot')
                                                        is-invalid
                                                        @enderror" value="1" name="hot" @if(old('hot')==="1" ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('hot')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="">Sản phẩm Combo</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('sp_km')
                                                        is-invalid
                                                        @enderror" value="1" name="sp_km" @if(old('sp_km')==="1" ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('sp_km')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        
                                        <div class="form-group">
                                            <label class="control-label" for="">Sản phẩm tăng sức đề kháng</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('sp_ngoc')
                                                        is-invalid
                                                        @enderror" value="1" name="sp_ngoc" @if(old('sp_ngoc')==="1" ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('sp_ngoc')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
{{--
                                        <div class="form-group">
                                            <label class="control-label" for="">Bộ sưu tập</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('bo_suu_tap')
                                                        is-invalid
                                                        @enderror" value="1" name="bo_suu_tap" @if(old('bo_suu_tap')==="1" ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('bo_suu_tap')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="">Sản phẩm Ngọc</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('sp_ngoc')
                                                        is-invalid
                                                        @enderror" value="1" name="sp_ngoc" @if(old('sp_ngoc')==="1" ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('sp_ngoc')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        --}}
                                        <div class="form-group">
                                            <label class="control-label" for="">Trạng thái</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="1" name="active" @if(old('active')==='1' ||old('active')===null) {{'checked'}} @endif>Hiện
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="0" @if(old('active')==="0" ){{'checked'}} @endif name="active">Ẩn
                                                </label>
                                            </div>
                                            @error('active')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <hr>
                                        <div class="alert alert-light  mt-3 mb-1">
                                            <strong>Chọn thuộc tính</strong>
                                          </div>

                                         @foreach ($attributes as $key=> $attribute)

                                            <div class="form-group">
                                                <label class="control-label" for="">{{ $attribute->name }}</label>
                                                <select class="form-control"  name="attribute[]" >
                                                    <option value="0">--Chọn--</option>
                                                    @foreach ($attribute->childs()->orderby('order')->get() as $k=> $attr)
                                                        <option value="{{ $attr->id }}" @if (old('attribute')) {{ $attr->id== old('attribute')[$key]?'selected':"" }} @endif>{{ $attr->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('attribute.'.$key)
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                         @endforeach
                                            <hr>

                                            {{-- <div class="form-group">
                                                <label class="control-label" for="">Giá</label>
                                                <input type="number" min="0" class="form-control  @error('price') is-invalid  @enderror"  value="{{ old('price') }}" name="price" placeholder="Nhập giá">
                                                @error('price')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                        {{--
                                        <div class="alert alert-light mt-3 mb-1">
                                            <strong>Upload file</strong>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Brochure</label>
                                            <input type="file" class="form-control-file img-load-input border @error('file')
                                            is-invalid
                                            @enderror" id="" name="file">
                                            @error('file')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hướng dẫn sử dụng</label>
                                            <input type="file" class="form-control-file img-load-input border @error('file2')
                                            is-invalid
                                            @enderror" id="" name="file2">
                                            @error('file2')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Drive</label>
                                            <input type="file" class="form-control-file img-load-input border @error('file3')
                                            is-invalid
                                            @enderror" id="" name="file3">
                                            @error('file3')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div> --}}


                                     </div>
                                </div>
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Nhập giá sản phẩm</h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
                                        <div class="item-price-default">
                                            {{--<h3>Mặc định</h3>--}}
                                            <div class="form-group">
                                                <label class="control-label" for="">Giá</label>
                                                <input type="number" min="0" class="form-control  @error('price') is-invalid  @enderror"  value="{{ old('price') }}" name="price" placeholder="Nhập giá">
                                                @error('price')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Giá cũ</label>
                                                <input type="number" min="0" class="form-control  @error('old_price') is-invalid  @enderror"  value="{{ old('old_price') }}" name="old_price" placeholder="Nhập giá cũ">
                                                @error('old_price')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                          
                                            <div class="form-group">
                                                <label class="control-label" for="">Đơn vị</label>
                                                <input type="text" min="0" class="form-control  @error('size') is-invalid  @enderror"  value="{{ old('size') }}" name="size" placeholder="Nhập đơn vị">
                                                @error('size')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="">Thêm loại <a data-url="{{ route('admin.product.loadOptionProduct') }}" class="btn  btn-info btn-md float-right " id="addOptionProduct">+ Thêm loại</a></div>
                                        <div class="list-item-option wrap-option mt-3" id="wrapOption">
                                            @if (old('priceOption')&&old('priceOption'))
                                                @foreach (old('priceOption') as $key=>$value)
                                                <div class="item-price">
                                                    <div class="box-content-price">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Đơn vị</label>
                                                            <input type="text" min="0" class="form-control  @error('sizeOption.'.$key) is-invalid  @enderror"  value="{{ old('sizeOption')[$key] }}" name="sizeOption[]" placeholder="Nhập đơn vị">
                                                            @error('sizeOption.'.$key)
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Giá</label>
                                                            <input type="number" min="0" class="form-control  @error('priceOption.'.$key) is-invalid  @enderror"  value="{{ $value }}" name="priceOption[]" placeholder="Nhập giá">
                                                            @error('priceOption.'.$key)
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Giá cũ</label>
                                                            <input type="number" min="0" class="form-control  @error('old_priceOption.'.$key) is-invalid  @enderror"  value="{{ old('old_priceOption')[$key] }}" name="old_priceOption[]" placeholder="Nhập giá cũ">
                                                            @error('old_priceOption.'.$key)
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <a class="btn btn-sm btn-danger deleteOptionProduct"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>

                                     </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // Lấy slug theo name
    $(document).ready(function() {
        $('.nameChangeSlug').on('input', function() {
            let name = $('.nameChangeSlug').val();
            let slug = createSlug(name);
            $('.resultSlug').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias1').on('input', function() {
            let name = $('.changeAlias1').val();
            let slug = createSlug(name);
            $('.resultSlug').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias2').on('input', function() {
            let name = $('.changeAlias2').val();
            let slug = createSlug(name);
            $('.resultSlug').val(slug);
        });
    });

    function createSlug(name) {
        return name
            // Loại bỏ khoảng trắng đầu và cuối chuỗi
            .trim()
            .toLowerCase()
            // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
            .replace(/^-+|-+$/g, '')
            //Đổi ký tự có dấu thành không dấu
            .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
            .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
            .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
            .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
            .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
            .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
            .replace(/đ/gi, 'd')
            //Xóa các ký tự đặt biệt
            .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
            //Đổi khoảng trắng thành ký tự gạch ngang
            .replace(/ /gi, "-")
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            .replace(/\-\-\-\-\-/gi, '-')
            .replace(/\-\-\-\-/gi, '-')
            .replace(/\-\-\-/gi, '-')
            .replace(/\-\-/gi, '-');
    }
</script>
@endsection
