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
			<div class="page-wrap">
	<div class="container" id="content">
		<div class="row">
            @isset($diem_ban)
			<div class="col-12 col-sm-12 col-md-12 left-content">
				<h1>{{ $diem_ban->name }}</h1>
				<div class="location">
					<div class="location-wrap">
                        @foreach($diem_ban->childs()->where('active', 1)->orderBy('order')->get() as $item)
						<div class="region-name">{{ $item->name }}</div>
						<ul>
							@foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $item_2)
								<li><a href="/diem-ban/{{ $item_2->slug }}">{{ $item_2->name }}</a></li>
							@endforeach
						</ul>
                        @endforeach
					</div>
				</div>
			</div>
            @endisset
            @isset($diem_ban_childs)
            <div class="col-12 col-sm-12 col-md-12 left-content">
                <h1>Điểm bán tại {{ $category->name }} </h1>
                <div>
                    {!! $category->content !!}
                </div>
                <div class="location">
                    <div class="location-wrap">
                        <ul>
                            @foreach($diem_ban_childs as $item_2)
                                <li><a href="/diem-ban/{{ $item_2->slug }}">{{ $item_2->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endisset
</div>
            
            {{--<div class="wrap-content-main wrap-template-contact template-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-form">
                                <div class="form" >
                                    <p>Quý khách vui lòng điền đầy đủ các thông tin vào các ô dưới đây để gửi thông tin đến chúng tôi !</p>
                                    <form  action="{{ route('contact.storeAjax') }}"  data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        @csrf
                                        <input type="text" placeholder="Họ và tên" required="required" name="name">
                                        <input type="email" placeholder="Email" pattern="[a-z0-9._%+-]+@gmail\.com" required="required" name="email">
                                        <input type="tel" class="form-control" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" name="phone" required placeholder="Số điện thoại">
                                        <textarea name="content" placeholder="Thông tin thêm" id="noidung" cols="30" rows="5"></textarea>
                                        <button class="hvr-float-shadow"  >Gửi thông tin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-infor">
                                <div class="infor">
                                    @isset($dataAddress)
                                        <div class="address">
                                            <div class="footer-layer">
                                                <div class="title">
                                                {{ $dataAddress->value }}
                                                </div>
                                                {!! $dataAddress->description !!}
                                                <ul class="pt_list_addres">
                                                

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
                    </div>
                </div>
            </div>--}}

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
