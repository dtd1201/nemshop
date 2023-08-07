@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')

@section('content')
    <div class="content-wrapper">
        <div class="main">
            @isset($breadcrumbs,$typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset

            <div class="wrap-content-main wrap-template-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-infor" style="background: #fff">
                                <div class="infor">
                                    @isset($dataAddress)
                                        <div class="address">
                                            <div class="footer-layer">
                                                <div class="title">
                                                {{ $dataAddress->value }}
                                                </div>
                                                <ul class="pt_list_addres">
                                                @foreach ($dataAddress->childs as $item)
                                                <li>{!! $item->slug !!} {{ $item->value }}</li>
                                                @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($map)
                                        <div class="map">
                                            {!! $map->description !!}
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
						
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-form" style="background: #fff; padding-top: 0px;">
                                <div class="form">
                                    <p>{{ __('contact.full_info') }}</p>
                                    <form  action="{{ route('contact.storeAjax') }}"  data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        @csrf
										<div class="row">
											<div class="col-md-6 col-sm-12 col-xs-12">
												<label>Họ tên <span>*</span></label>
												<input type="text" placeholder="{{ __('contact.name') }}" required="required" name="name">
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<label>Điện thoại <span>*</span></label>
												<input type="text" placeholder="{{ __('contact.phone') }}" required="required" name="phone">
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Nội dung tư vấn</label>
												<textarea name="content" placeholder="{{ __('contact.content') }}" id="noidung" cols="30" rows="5"></textarea>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<button class="hvr-float-shadow">{{ __('contact.send_info') }}</button>
											</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in" id="modalAjax">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Chi tiết đơn hàng</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
             <div class="content" id="content">

             </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('js')
@endsection
