@extends('admin.layouts.main')
@section('title',"Sửa sản phẩm")

@section('css')
@endsection
@section('content')
<style>
	.card-body .form-group {
		margin-bottom: 5px;
	}
</style>
<div class="content-wrapper lb_template_product_edit">
    @include('admin.partials.content-header',['name'=>"Sản phẩm","key"=>"Sửa sản phẩm"])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session("alert"))
                    <div class="alert alert-success">
                        {{session("alert")}}
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-warning">
                        {{session("error")}}
                    </div>
                    @endif
                    {{-- <div class="box-link">
                        <a href="{{ route('admin.product.option',['product_id'=>$data->id]) }}" class="btn btn-sm btn-success">Danh sách option</a>
         
                    </div> --}}
                    <form class="form-horizontal" action="{{route('admin.product.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
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
                                       <h3 class="card-title">Thông tin sản phẩm</h3>
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
                                            <div id="tong_quan" class="container tab-pane active"><br>

                                                <ul class="nav nav-tabs">
                                                    @foreach ($langConfig as $langItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#tong_quan_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($langConfig as $langItem)
                                                    <div id="tong_quan_{{$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Tên sản phẩm</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control nameChange
                                                                    @error('name_'.$langItem['value']) is-invalid @enderror" id="nameChange" value="{{ old('name_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->name }}" name="name_{{$langItem['value']}}" placeholder="Nhập tên sản phẩm">
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
                                                                    <input type="text" class="form-control resultSlug1 changeAlias1
                                                                    @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" value="{{ old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug }}" name="slug_{{ $langItem['value'] }}" placeholder="Nhập slug">
                                                                    @error('slug_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link Shopee</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link1_'.$langItem['value']) is-invalid  @enderror" id="link1_{{ $langItem['value'] }}" value="{{ old('link1_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link1 }}" name="link1_{{ $langItem['value'] }}" placeholder="Nhập link">
                                                                    @error('link1_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link Lazada</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link2_'.$langItem['value']) is-invalid  @enderror" id="link2_{{ $langItem['value'] }}" value="{{ old('link2_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link2 }}" name="link2_{{ $langItem['value'] }}" placeholder="Nhập link">
                                                                    @error('link2_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link Tiki</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link3_'.$langItem['value']) is-invalid  @enderror" id="link3_{{ $langItem['value'] }}" value="{{ old('link3_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link3 }}" name="link3_{{ $langItem['value'] }}" placeholder="Nhập link">
                                                                    @error('link3_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Link Tiktok</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control changeAlias1
                                                                    @error('link4_'.$langItem['value']) is-invalid  @enderror" id="link4_{{ $langItem['value'] }}" value="{{ old('link4_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->link4 }}" name="link4_{{ $langItem['value'] }}" placeholder="Nhập link">
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
                                                                    @error('model_'.$langItem['value']) is-invalid @enderror" id="model_{{$langItem['value']}}" value="{{ old('model_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->model }}" name="model_{{$langItem['value']}}" placeholder="Nhập Thương hiệu">
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
                                                                    @error('tinhtrang_'.$langItem['value']) is-invalid @enderror" id="tinhtrang_{{$langItem['value']}}" value="{{ old('tinhtrang_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->tinhtrang }}" name="tinhtrang_{{$langItem['value']}}" placeholder="Nhập Trạng thái">
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
                                                                    @error('baohanh_'.$langItem['value']) is-invalid @enderror" id="baohanh_{{$langItem['value']}}" value="{{ old('baohanh_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->baohanh }}" name="baohanh_{{$langItem['value']}}" placeholder="Khuyến mại đặc biệt">
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
                                                                    @error('xuatsu_'.$langItem['value']) is-invalid @enderror" id="xuatsu_{{$langItem['value']}}" value="{{ old('xuatsu_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->xuatsu }}" name="xuatsu_{{$langItem['value']}}" placeholder="Nhập phụ kiện tặng kèm">
                                                                    @error('xuatsu_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        --}}


                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập giới thiệu</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('description_'.$langItem['value']) is-invalid @enderror" name="description_{{$langItem['value']}}" id="" rows="3"  placeholder="Nhập giới thiệu">{{ old('description_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description  }}</textarea>
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
                                                                    <textarea class="form-control tinymce_editor_init @error('content4_'.$langItem['value']) is-invalid @enderror" name="content4_{{$langItem['value']}}" id="" rows="3"  placeholder="Nhập giới thiệu phải">{{ old('content4_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content4  }}</textarea>
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
                                                                    <textarea class="form-control tinymce_editor_init @error('content3_'.$langItem['value']) is-invalid  @enderror" name="content3_{{$langItem['value']}}" id="" rows="3" value="" placeholder="Nhập khuyến mại sản phẩm">
                                                                    {{ old('content3_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content3 }}
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
                                                                    <textarea class="form-control tinymce_editor_init @error('content_'.$langItem['value']) is-invalid  @enderror" name="content_{{$langItem['value']}}" id="" rows="20" value="" placeholder="Nhập mô tả sản phẩm">
                                                                    {{ old('content_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content }}
                                                                    </textarea>
                                                                    @error('content_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-outline card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Xem trước kết quả tìm kiếm</h3>
                                                                    <button class="ui-button ui-button--link" type="button" name="button">Tùy chỉnh SEO</button>
                                                                </div>
                                                                <div class="card-body table-responsive p-3">
                                                                    <div class="card-header">
                                                                        <div class="google-preview" bind-show="shouldShowGooglePreview()">
                                                                            <span class="google__title ">
                                                                                <input type="text" class="resultTitle" value="{{optional($data->translationsLanguage($langItem['value'])->first())->title_seo}}" readonly>
                                                                            </span>
                                                                            <div class="google__url">
                                                                                {{ $url }}/<input type="text" class="resultUrl" value="{{optional($data->translationsLanguage($langItem['value'])->first())->slug}}" readonly>
                                                                                
                                                                            </div>
                                                                            <div class="google__description resultDescription" id="resultDescription">{{optional($data->translationsLanguage($langItem['value'])->first())->description_seo}}
                                                                            {{--<input type="text" class="resultDescription" value="{{optional($data->translationsLanguage($langItem['value'])->first())->description_seo}}" readonly>--}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-header form-input hidden">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control changeTitle
                                                                                    @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="title_seo" value="{{ old('title_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
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
                                                                                        class="form-control changeDescription
                                                                                        @error('description_seo_' . $langItem['value']) is-invalid  @enderror"
                                                                                        name="description_seo_{{ $langItem['value'] }}"
                                                                                        id="changeDescription" rows="3" value=""
                                                                                        >{{ old('description_seo_' . $langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}</textarea>
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
                                                                                    <input type="text" class="form-control resultKeyword
                                                                                    @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo  }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
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
                                                                                        <input type="text" class="next-input next-input--invisible resultSlug2 changeAlias2
                                                                                        @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" value="{{ old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug }}" name="slug_{{ $langItem['value'] }}">
                                                                                        @error('slug_'.$langItem['value'])
                                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>

                                                       {{-- <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập chính sách bảo hành</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content2_'.$langItem['value']) is-invalid  @enderror" name="content2_{{$langItem['value']}}" id="" rows="20" value="" placeholder="Nhập chính sách bảo hành">
                                                                    {{ old('content2_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content2 }}
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
                                                                <label class="col-sm-2 control-label" for="">Nhập chính sách bảo hành</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content4_'.$langItem['value']) is-invalid  @enderror" name="content4_{{$langItem['value']}}" id="" rows="20" value="" placeholder="Nhập chính sách bảo hành">
                                                                    {{ old('content4_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content4 }}
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
                                                        <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                                    </div>
                                                    @error('avatar_path')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                    @if ($data->avatar_path)
                                                    <img class="img-load border p-1 w-100" src="{{$data->avatar_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                    @endif
                                                </div>

                                                <hr>--}}


                                                <div class="wrap-load-image mb-3">
                                                    <label class="mb-3 w-100">Hình ảnh khác</label>

                                                    <span class="badge badge-success">Đã thêm</span>
                                                    <div class="list-image d-flex flex-wrap">
                                                        @foreach($data->images()->get() as $productImageItem)
                                                             <div class="col-image" style="width:20%;" >
                                                                <img class="" src="{{$productImageItem->image_path}}" alt="{{$productImageItem->name}}">
                                                                <a class="btn btn-sm btn-danger lb_delete_image"  data-url="{{ route('admin.product.destroy-image',['id'=>$productImageItem->id]) }}"><i class="far fa-trash-alt"></i></a>
                                                             </div>
                                                         @endforeach
                                                         @if (!$data->images()->get()->count())
                                                            Chưa thêm hình ảnh nào
                                                         @endif
                                                    </div>
                                                    <hr>
                                                    <span class="badge badge-primary mb-3">Thêm ảnh</span>
                                                    <div class="form-group">
                                                        {{-- <label for="">Thêm ảnh</label> --}}
                                                        <input type="file" class="form-control-file img-load-input-multiple border" id="" name="image[]" multiple>
                                                    </div>
                                                    @error('image')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                    <div class="load-multiple-img">
                                                        @if (!$data->images()->get()->count())
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}" alt="'no image">
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}" alt="'no image">
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}" alt="'no image">
                                                        @endif
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
                                                                        <input type="text" class="form-control @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="" value="{{ old('title_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
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
                                                                        <input type="text" class="form-control @error('description_seo_'.$langItem['value']) is-invalid @enderror" id="" value="{{ old('description_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}" name="description_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
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
                                                                        <input type="text" class="form-control @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="" value="{{ old('keyword_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo  }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
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
                                                                        
                                                                        <select class="form-control tag-select-choose" multiple="multiple" name="tags_{{$langItem['value']}}[]">
                                                                            @if (old('tags_'.$langItem['value']))
                                                                                @foreach (old('tags_'.$langItem['value']) as $tag)
                                                                                    <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                                                                @endforeach
                                                                            @else
                                                                            @foreach($data->tagsLanguage($langItem['value'])->get() as $tagItem)
                                                                             <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
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
                                                @php
                                                    $_selected = $data->questions->pluck('id')->toArray();
                                                @endphp
                                            @foreach ($questions as $key=> $question)

                                            <div class="form-group">
                                                <label class="control-label" for="">{{ $question->name }}</label>
                                                <select class="form-control tag-select-choose-question"  name="question[]" multiple>
                                                    <option value="0">--Chọn câu hỏi --</option>
                                                    @foreach ($question->childs()->orderby('order')->get() as $k=> $ques)
                                                        <option value="{{ $ques->id }}"
                                                            @if(in_array($ques->id,$_selected)) selected @endif
                                                        >
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
                                        <h3 class="card-title w-100">Đoạn văn đã thêm <a data-url="{{ route('admin.product.loadCreateParagraphProduct',['id'=>$data->id]) }}" class="btn  btn-info btn-md float-right " id="addParagraphAjax">+ Thêm đoạn văn</a></h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div id="loadListParagraph">
                                                @include('admin.components.paragraph.load-list-paragraph',[
                                                    'type'=>config('paragraph.products'),
                                                    'data'=>$data,
                                                    'routeDelete'=>'admin.product.destroyParagraphProduct',
                                                    'routeEdit'=>'admin.product.loadEditParagraphProduct',
                                                    ])
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
                                            <label class="control-label" for="">Nhập mã sản phẩm</label>
                                            <input type="text" min="0" class="form-control  @error('masp') is-invalid  @enderror"  value="{{ old('masp')??$data->masp }}" name="masp" placeholder="Nhập mã sản phẩm">
                                            @error('masp')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="control-label" for="">Nhập màu</label>
                                            <input type="text"   class="form-control  @error('file3') is-invalid  @enderror"  value="{{ old('file3')??$data->file3 }}" name="file3" placeholder="Nhập mầu">
                                            @error('file3')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label class=" control-label" for="">Chọn danh mục</label>
                                            <select class="form-control custom-select select-2-init @error('category_id')
                                                is-invalid
                                                @enderror" id="" value="{{ old('category_id') }}" name="category_id">

                                                <option value="0">--- Chọn danh mục cha ---</option>

                                                @if (old('category_id')||old('category_id')==='0')
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
                                                            @foreach($data_cate_ed as $item)
                                                            <div class="item-permission mt-2 mb-2">
                                                                <div class="form-check permission-title">
                                                                    <label class="form-check-label p-2">
                                                                        <input type="checkbox" class="form-check-input check-children" value="{{ $item->id }}" name="category[]"
                                                                        @if ($categoryProductOfAdmin->contains($item->id))
                                                                        {{ 'checked' }}
                                                                        @endif
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
                                                                            @if ($categoryProductOfAdmin->contains($itemChild->id))
                                                                                {{ 'checked' }}
                                                                            @endif
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
                                                                                    @if ($categoryProductOfAdmin->contains($itemChild2->id))
                                                                                    {{ 'checked' }}
                                                                                    @endif
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
                                                <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                            </div>
                                            @error('avatar_path')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            @if ($data->avatar_path)
                                            <img class="img-load border p-1 w-100" src="{{$data->avatar_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                            @endif
                                        </div>

                                          <div class="form-group">
                                            <label class="control-label" for="">Chọn nhà dược sĩ</label>
                                            <select class="form-control @error('supplier')
                                                is-invalid
                                                @enderror" id="" value="{{ old('supplier_id') }}" name="supplier_id">

                                                <option value="0">--- Chọn nhà dược sĩ ---</option>
                                                @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}" {{ (old('supplier')??$data->supplier_id)==  $item->id ?"selected":""}}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="">Số thứ tự</label>
                                            <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror"  value="{{ old('order')??$data->order }}" name="order" placeholder="Nhập số thứ tự">
                                            @error('order')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>


                                       {{-- <div class="form-group">
                                            <label class=" control-label" for="">Sale(%)</label>
                                            <input type="number" min="0" class="form-control  @error('sale') is-invalid  @enderror"  value="{{ old('sale')??$data->sale }}" name="sale" placeholder="Nhập sale">

                                            @error('sale')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>--}}
                                        <div class="form-group">
                                            <label class="control-label" for="">Chọn trạng thái được hiển thị</label>
                                            <select class="form-control @error('supplier')
                                                is-invalid
                                                @enderror" id="" value="{{ old('option_status') }}" name="option_status">

                                                <option value="0">--- Chọn trạng thái ---</option>

                                                <option value="1" {{ (old('option_status')??$data->option_status)==  1 ?"selected":""}}>Bán chạy</option>
                                                <option value="2" {{ (old('option_status')??$data->option_status)==  2 ?"selected":""}}>Freeship</option>
                                                <option value="3" {{ (old('option_status')??$data->option_status)==  3 ?"selected":""}}>Yêu thích</option>
                                                <option value="4" {{ (old('option_status')??$data->option_status)==  4 ?"selected":""}}>Giảm sốc</option>
                                            </select>
                                            @error('supplier_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="">Sản phẩm bán chạy</label>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('sp_ngoc') is-invalid
                                                        @enderror" value="1" name="hot" @if(old('hot')==="1"||$data->hot==1 ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('hot')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="">Sản phẩm sale</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('sp_km') is-invalid
                                                        @enderror" value="1" name="sp_km" @if(old('sp_km')==="1"||$data->sp_km==1 ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('sp_km')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{--<div class="form-group">
                                            <label class="control-label" for="">Sản phẩm tăng sức đề kháng</label>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('sp_ngoc') is-invalid
                                                        @enderror" value="1" name="sp_ngoc" @if(old('sp_ngoc')==="1"||$data->sp_ngoc==1 ) {{'checked'}} @endif>
                                                </label>
                                            </div>
                                            @error('sp_ngoc')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        
                                        <div class="form-group">
                                            <label class="control-label" for="">Bộ sưu tập</label>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('bo_suu_tap') is-invalid
                                                        @enderror" value="1" name="bo_suu_tap" @if(old('bo_suu_tap')==="1"||$data->bo_suu_tap==1 ) {{'checked'}} @endif>
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
                                                    <input type="checkbox" class="form-check-input @error('sp_ngoc') is-invalid
                                                        @enderror" value="1" name="sp_ngoc" @if(old('sp_ngoc')==="1"||$data->sp_ngoc==1 ) {{'checked'}} @endif>
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
                                                <input type="radio" class="form-check-input" value="1" name="active" @if(old('active')==='1' || $data->active==1) {{'checked'}} @endif>Hiện
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="0" @if(old('active')==="0" || $data->active==0){{'checked'}} @endif name="active">Ẩn
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
                                                        <option value="{{ $attr->id }}"
                                                            @if (old('attribute'))
                                                                @if ($attr->id==old('attribute')[$key])
                                                                    selected
                                                                @else
                                                                    {{ $data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':"" }}
                                                                @endif
                                                            @else
                                                            {{ $data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':"" }}
                                                            @endif
                                                        >
                                                            {{ $attr->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('attribute.'.$key)
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                         @endforeach
                                            <hr>
                                        {{--
                                        <div class="alert alert-light mt-3 mb-1">
                                            <strong>Upload file</strong>
                                          </div>

                                        <div class="form-group">
                                            <label for="">Brochure</label>
                                          <div>
                                            <a href="{{ $data->file }}" download>{{ $data->file }}</a>
                                          </div>
                                            <input type="file" class="form-control-file img-load-input border @error('file')
                                            is-invalid
                                            @enderror" id="" name="file">
                                            @error('file')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hướng dẫn sử dụng</label>
                                            <div>
                                                <a href="{{ $data->file2 }}" download>{{ $data->file2 }}</a>
                                            </div>
                                            <input type="file" class="form-control-file img-load-input border @error('file2')
                                            is-invalid
                                            @enderror" id="" name="file2">
                                            @error('file2')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Drive</label>
                                            <div>
                                                <a href="{{ $data->file3 }}" download>{{ $data->file3 }}</a>
                                            </div>
                                            <input type="file" class="form-control-file img-load-input border @error('file3')
                                            is-invalid
                                            @enderror" id="" name="file3">
                                            @error('file3')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        --}}
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
                                                    <input type="number" min="0" class="form-control  @error('price') is-invalid  @enderror"  value="{{ old('price')??$data->price }}" name="price" placeholder="Nhập giá">
                                                    @error('price')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Giá cũ</label>
                                                    <input type="number" min="0" class="form-control  @error('old_price') is-invalid  @enderror"  value="{{ old('old_price')??$data->old_price }}" name="old_price" placeholder="Nhập giá cũ">
                                                    @error('old_price')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label" for="">Đơn vị</label>
                                                    <input type="text" min="0" class="form-control  @error('size') is-invalid  @enderror"  value="{{ old('size')??$data->size }}" name="size" placeholder="Nhập đơn vị">
                                                    @error('size')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="list-item-option wrap-option mt-3">
                                                <h5>Các loại sản phẩm</h5>
                                                @foreach ($data->options()->latest()->get() as $key=>$item)
                                                <div class="item-price">
                                                    <div class="box-content-price">
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Nhập đơn vị</label>
                                                            <input type="text" min="0" class="form-control  @error('sizeOptionOld.'.$key) is-invalid  @enderror" value="{{  old('sizeOptionOld')[$key]??$item->size }}" name="sizeOptionOld[]" placeholder="Nhập đơn vị">
                                                            @error('sizeOptionOld.'.$key)
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label" for="">Giá</label>
                                                            <input type="hidden" name="idOption[]" value="{{ $item->id }}">
                                                            <input type="number" min="0" class="form-control  @error('priceOptionOld.'.$key) is-invalid  @enderror"  value="{{ old('priceOptionOld')[$key]??$item->price }}" name="priceOptionOld[]" placeholder="Nhập giá">
                                                            @error('priceOptionOld.'.$key)
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Giá cũ</label>
                                                            <input type="number" min="0" class="form-control  @error('old_priceOptionOld.'.$key) is-invalid  @enderror"  value="{{ old('old_priceOptionOld')[$key]??$item->old_price }}" name="old_priceOptionOld[]" placeholder="Nhập giá cũ">
                                                            @error('old_priceOptionOld.'.$key)
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <a  class="btn btn-sm btn-danger deleteOptionProductDB" data-url="{{ route('admin.product.destroyOptionProduct',['id'=>$item->id]) }}"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            
                                            <div class="">Thêm loại mới  <a data-url="{{ route('admin.product.loadOptionProduct') }}" class="btn  btn-info btn-md float-right " id="addOptionProduct">+ Thêm loại</a></div>
                                            <div class="list-item-option wrap-option mt-3" id="wrapOption">
                                                @if (old('priceOption')&&old('priceOption'))
                                                    @foreach (old('priceOption') as $key=>$value)
                                                    <div class="item-price">
                                                        <div class="box-content-price">

                                                            <div class="form-group">
                                                                <label class="control-label" for="">Nhập đơn vị</label>
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
                                                                <input type="number" min="0" class="form-control  @error('old_priceOption.'.$key) is-invalid  @enderror"  value="{{ $value }}" name="old_priceOption[]" placeholder="Nhập giá cũ">
                                                                @error('old_priceOption.'.$key)
                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="action">
                                                            <a  class="btn btn-sm btn-danger deleteOptionProduct"><i class="far fa-trash-alt"></i></a>
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

<div class="modal fade in" id="loadAjaxParent">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Đoạn văn</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="content p-3" id="loadContent">

         </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script>
     
    // đoạn văn
    $(document).on('click', '.addOptionProductSize', function() {
        // alert('a');
        let id = $(this).data('id');
        event.preventDefault();
        //  let wrapActive = $(this).parents('.wrap-load-active');
        let urlRequest = $(this).data("url");
        //let i = $('.wrap-paragraph tbody').find('tr').length;
        //  alert(urlRequest);
        $.ajax({
            type: "GET",
            url: urlRequest,
            // data: { i: i },
            success: function(data) {
                if (data.code == 200) {
                    let html = data.html;
                    $('#wrapOptionSize'+ id).append(html);
                    // if ($("textarea.tinymce_editor_init").length) {
                    //     tinymce.init(editor_config);
                    // }
                }
            }
        });
    });
    $(document).on('click', '.deleteOptionProductSize', function() {
        event.preventDefault();
        let $this = $(this);
        Swal.fire({
            title: "Bạn có muốn xóa option?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                $this.parents('.item-price').remove();
            }
        })
    });
     // load delete đáp án  khi đáp án chưa thêm database
     $(document).on('click', '.deleteOptionProductDB', function() {
        event.preventDefault();
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa option này',
            text: "Bạn sẽ không thể khôi phục điều này",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            mythis.parents(".item-price").remove();
                        }
                    },
                    error: function() {

                    }
                });
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
        })
    });
</script>
<script>
    $(document).on('click', '.ui-button', function() {
            // let id = $(this).data('id');
            $('.form-input').removeClass('hidden');
            $('.ui-button').addClass('hidden');
    });
    // Lấy slug theo name
    $(document).ready(function() {
        $('.nameChange').on('input', function() {
            let name = $('.nameChange').val();
            let name_change = document.getElementById("nameChange");
            let div = document.getElementById("resultDescription");
            div.innerHTML = name_change.value;
            $('.changeTitle').val(name);
            $('.resultTitle').val(name);
            $('.changeDescription').val(name);
            $('.resultKeyword').val(name);
            
        });
    });
    $(document).ready(function() {
        $('.changeAlias1').on('input', function() {
            let name = $('.changeAlias1').val();
            let slug = createSlug(name);
            $('.resultSlug2').val(slug);
            $('.resultUrl').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias2').on('input', function() {
            let name = $('.changeAlias2').val();
            let slug = createSlug(name);
            $('.resultSlug1').val(slug);
            $('.resultUrl').val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeTitle').on('input', function() {
            let name = $('.changeTitle').val();
            // let slug = createSlug(name);
            $('.resultTitle').val(name);
        });
    });
    $(document).ready(function() {
        $('.changeDescription').on('change', function() {
            let name = document.getElementById("changeDescription");
            let div = document.getElementById("resultDescription");
            //alert(name.value);
            // let slug = createSlug(name);
            //$('.resultDescription').val(name.value);
            div.innerHTML = name.value;
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
