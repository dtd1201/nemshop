@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
<style>
    .AddressesOfBranches{
        display: none;
    }
    .AddressesOfBranches.active{
        display: block;
    }
</style>
@section('content')
@isset($breadcrumbs,$typeBreadcrumb)
            @include('frontend.components.breadcrumbs',[
            'breadcrumbs'=>$breadcrumbs,
            'type'=>$typeBreadcrumb,
            ])
        @endisset
@if($data)
<div class="AddressesOfBranches active">
    <div class="container">
        <div class="Addresses">
            <div class="Addresses__info">
                <h3 class="title__Addresses">{{ $data->name }}</h3>
                <div class="search_hethong">
                    <form action="{{ route('home.he-thong') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kếm...">
                            <div class="input-group-append">
                                <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                
                @if($data->childs->count()>0)
                <div class="find__address">
                    <div class="find__city">

                        <select name="" id="" class="option_city">
                            <option data-id="0" value="0">Chọn tỉnh thành</option>
                            @foreach($data->childs()->where('active', 1)->orderBy('order')->get() as $item)
                            <option data-id="{{$item->id}}" value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="find__district option_district active" id="0">
                            <select name="" id="">
                                <option value="">Quận huyện</option>
                            </select>
                    </div>
                    @foreach($data->childs()->where('active', 1)->orderBy('order')->get() as $item)
                    <div class="find__district option_district" id="{{ $item->id }}">
                            @if($item->childs->count()>0)
                            <select name="" id="">
                                <option value="">Quận huyện</option>
                                @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                                <option data-id="{{$i->id}}" value="{{ $i->id }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                            @endif
                    </div>
                    @endforeach
                </div>
                <div class="option_parent active" id="parent-0">
                @foreach($footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get() as $item)
                    @if($item->childs->count()>0)
                        
                        @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                            @if($i->childs->count()>0)
                                
                                <div class="active">
                                    @php
                                        $filteredAddresses = $i->childs()
                                            ->where('active', 1)
                                            ->orderBy('order')
                                            ->get()
                                            ->filter(function ($s) use ($keyword) {
                                                return stripos($s->name, $keyword) !== false;
                                            });
                                    @endphp
                                    @foreach($filteredAddresses as $s)
                                    <div class="item__addresses js--item__addresses " >
                                        <h4 class="title__item__addresses">
                                            {{ $s->name }}
                                        </h4>
                                        <ul class="info__addresses__details">
                                            <li class="detail__addresse">
                                                <i class="ti-location-pin icon-addresse"></i>
                                                <span>{{ $s->slug }}</span>
                                            </li>
                                            <li class="detail__addresse">
                                                <i class="fas fa-phone-volume"></i>
                                                <span>{{ $s->content1 }}</span>
                                            </li>
                                            <li class="detail__addresse">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $s->content2 }}</span>
                                            </li>
                                        </ul>
                                        <div class="link__addresses">
                                            <a href="https://zalo.me/{{$s->content3}}" target="_blank" class="link__addresses__a">
                                                Chat Zalo
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                    <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                            <a href="{{$s->value}}" target="_blank" class="link__addresses__a link__addresses__a--red">
                                                Xem chỉ đường
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                    <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                               
                                
                            @endif
                        @endforeach
                        
                    @endif
                @endforeach
                </div>
                @foreach($data->childs()->where('active', 1)->orderBy('order')->get() as $item)
                    @if($item->childs->count()>0)
                        <div class="option_parent" id="parent-{{ $item->id }}">
                        @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                            @if($i->childs->count()>0)
                                @if($loop->first)
                                <div class="option_address {{$item->id}} active" id="{{$i->id}}">
                                    @php
                                        $filteredAddresses = $i->childs()
                                            ->where('active', 1)
                                            ->orderBy('order')
                                            ->get()
                                            ->filter(function ($s) use ($keyword) {
                                                return stripos($s->name, $keyword) !== false;
                                            });
                                    @endphp
                                    @foreach($filteredAddresses as $s)
                                    <div class="item__addresses js--item__addresses " >
                                        <h4 class="title__item__addresses">
                                            {{ $s->name }}
                                        </h4>
                                        <ul class="info__addresses__details">
                                            <li class="detail__addresse">
                                                <i class="ti-location-pin icon-addresse"></i>
                                                <span>{{ $s->slug }}</span>
                                            </li>
                                            <li class="detail__addresse">
                                                <i class="fas fa-phone-volume"></i>
                                                <span>{{ $s->content1 }}</span>
                                            </li>
                                            <li class="detail__addresse">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $s->content2 }}</span>
                                            </li>
                                        </ul>
                                        <div class="link__addresses">
                                            <a href="https://zalo.me/{{$s->content3}}" target="_blank" class="link__addresses__a">
                                                Chat Zalo
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                    <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                            <a href="{{$s->value}}" target="_blank" class="link__addresses__a link__addresses__a--red">
                                                Xem chỉ đường
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                    <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="option_address {{$item->id}} active" id="{{$i->id}}">
                                    @php
                                        $filteredAddresses = $i->childs()
                                            ->where('active', 1)
                                            ->orderBy('order')
                                            ->get()
                                            ->filter(function ($s) use ($keyword) {
                                                return stripos($s->name, $keyword) !== false;
                                            });
                                    @endphp
                                    @foreach($filteredAddresses as $s)
                                    <div class="item__addresses js--item__addresses " >
                                        <h4 class="title__item__addresses">
                                            {{ $s->name }}
                                        </h4>
                                        <ul class="info__addresses__details">
                                            <li class="detail__addresse">
                                                <i class="ti-location-pin icon-addresse"></i>
                                                <span>{{ $s->slug }}</span>
                                            </li>
                                            <li class="detail__addresse">
                                                <i class="fas fa-phone-volume"></i>
                                                <span>{{ $s->content1 }}</span>
                                            </li>
                                            <li class="detail__addresse">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $s->content2 }}</span>
                                            </li>
                                        </ul>
                                        <div class="link__addresses">
                                            <a href="https://zalo.me/{{$s->content3}}" target="_blank" class="link__addresses__a">
                                                Chat Zalo
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                    <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                            <a href="{{$s->value}}" target="_blank" class="link__addresses__a link__addresses__a--red">
                                                Xem chỉ đường
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none" data-v-2c86b0c1="">
                                                    <path d="M1.74198 9.80211L6.18789 5.36939C6.24066 5.31662 6.27795 5.25945 6.29976 5.19789C6.32193 5.13632 6.33301 5.07036 6.33301 5C6.33301 4.92964 6.32193 4.86368 6.29976 4.80211C6.27795 4.74055 6.24066 4.68338 6.18789 4.63061L1.74198 0.184697C1.61885 0.0615655 1.46493 0 1.28024 0C1.09554 0 0.93723 0.0659631 0.805304 0.197889C0.673378 0.329815 0.607415 0.483729 0.607415 0.659631C0.607415 0.835532 0.673378 0.989446 0.805304 1.12137L4.68393 5L0.805304 8.87863C0.682173 9.00176 0.620607 9.15339 0.620607 9.33351C0.620607 9.51398 0.68657 9.67019 0.818496 9.80211C0.950422 9.93404 1.10434 10 1.28024 10C1.45614 10 1.61005 9.93404 1.74198 9.80211Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            @endif
                        @endforeach
                        </div>
                    @endif
                @endforeach
                @endif
            </div>

            <div class="Addresses__map">
            @foreach($footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get() as $item)
                    @if($loop->first)
                    <div class="op_map" id="map-0">
                        @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                            @if($i->childs->count()>0)
                                @foreach($i->childs()->where('active', 1)->orderBy('order')->get() as $s)
                                @if($loop->first)
                                <div class="map__1 0 active" id="map-0">
                                    {!! $s->description !!}
                                </div>
                                @else
                                <div class="map__1 0" id="map-0">
                                    {!! $s->description !!}
                                </div>
                                @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    @else
                    <div class="op_map">
                        @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                            @if($i->childs->count()>0)
                                @foreach($i->childs()->where('active', 1)->orderBy('order')->get() as $s)
                                @if($loop->first)
                                <div class="map__1 0 active" >
                                    {!! $s->description !!}
                                </div>
                                @else
                                <div class="map__1 0">
                                    {!! $s->description !!}
                                </div>
                                @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    @endif
            @endforeach
            @foreach($footer['he_thong']->childs()->where('active', 1)->orderBy('order')->get() as $item)
                @if($item->childs->count()>0)
                    @if($loop->first)
                    <div class="op_map active" id="map-{{ $item->id }}">
                        @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                            @if($i->childs->count()>0)
                                @foreach($i->childs()->where('active', 1)->orderBy('order')->get() as $s)
                                @if($loop->first)
                                <div class="map__1 {{$item->id}} active" id="map-{{$i->id}}">
                                    {!! $s->description !!}
                                </div>
                                @else
                                <div class="map__1 {{$item->id}}" id="map-{{$i->id}}">
                                    {!! $s->description !!}
                                </div>
                                @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    @else
                    <div class="op_map" id="map-{{ $item->id }}">
                        @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                            @if($i->childs->count()>0)
                                @foreach($i->childs()->where('active', 1)->orderBy('order')->get() as $s)
                                @if($loop->first)
                                <div class="map__1 {{$item->id}} active" id="map-{{$i->id}}">
                                    {!! $s->description !!}
                                </div>
                                @else
                                <div class="map__1 {{$item->id}}" id="map-{{$i->id}}">
                                    {!! $s->description !!}
                                </div>
                                @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    @endif
                @endif
            @endforeach
            </div>
        </div>

    </div>
</div>
@endif
{{--<div class="content-wrapper">
    <div class="main">
        @isset($breadcrumbs,$typeBreadcrumb)
            @include('frontend.components.breadcrumbs',[
            'breadcrumbs'=>$breadcrumbs,
            'type'=>$typeBreadcrumb,
            ])
        @endisset

        <style>
            .tab-drug-store{
                display: none;
            }
            .tab-drug-store.current{
                display: block !important;
            }

            .info-contact::before {
                content: "\f35a";
                font-family: "Font Awesome 5 Free";
                position: absolute;
                left: 0;
                font-weight: 900;
                top: 3px;
                color: #FA0000;
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-smoothing: antialiased;
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                line-height: 1;
            }

            .info-contact .address a {
                font-style: normal;
                font-weight: normal;
                font-size: 16px;
                line-height: 19px;
                color: #000000;
            }

            .info-contact {
                margin-bottom: 20px;
                padding-bottom: 20px;
                border-bottom: 1px dashed #CACACA;
                padding-left: 20px;
                position: relative;
            }

            h2.contact-title {
                font-style: normal;
                font-weight: 700;
                font-size: 30px;
                line-height: 35px;
                text-align: center;
                text-transform: uppercase;
                color: #000000;
                margin: 85px 0px 66px;
            }
        </style>

        @if( isset($listSystem) && $listSystem->count()>0 )
        <div class="wrap-contact-front">
            <div class="container">
                 <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Hệ thống nhà thuốc &amp; Trung tâm dịch vụ</h2>
                    </div>

                    <div class="contact-info col-12 col-md-6 col-lg-4 offset-lg-2 offset-md-1">
                        @php
                        $i=0;
                        $j=0;
                        @endphp
                        <div class="title-drug-store">
                            <h4>Chọn vị trí nhà thuốc</h4>
                        </div>
                        <select name="tabs" class="option_address form-control">
                            @foreach( $listSystem as $item)
                                @php
                                $i++;
                                @endphp
                                <option value="{{ $item->id }}" id="tab{{ $i }}" data-tab="content{{$i}}" @if($loop->first) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach

                        </select>

                        @foreach( $listSystem as $item)
                        @php
                        $j++;
                        @endphp
                        <div class="tab-drug-store content{{$j}} @if($loop->first) current @endif mt-5">
                            <div class="title-drug-store-count">
                                <h6> Có {{$item->childs()->count()}} nhà thuốc tại {{$item->name}}</h6>
                            </div>
                           
                            @foreach( $item->childs()->where('active',1)->orderBy('order')->latest()->get() as $itemChild)
                            <div class="info-contact">
                                <div class="address">
                                    <a class="select_address" href="javascript:;" data-id_address="{{ $itemChild->id }}">{{ $itemChild->name }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach

                    </div>
                    <div class="contact-map col-12 col-md-6 col-lg-6">
                        <div id="maps">
                            @foreach( $listSystem as $item)
                            @if($loop->first)
                            @php
                            $itemChild = $item->childs()->where('active',1)->orderBy('order')->latest()->first();
                            @endphp

                            {!! $itemChild->description !!}
                            @endif
                            @endforeach
                        </div>

                    </div>

                </div> 
                Đang cập nhật nội dung !
            </div>
        </div>
        @endif
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
</div>--}}
@endsection
@section('js')
<script type="text/javascript">
    $(document).on('click', '.select_address', function() {
        let id_address = $(this).data('id_address');

        let urlRequest = window.location;

        urlRequest = urlRequest + '?' + 'id_address' + '=' + id_address;

        if (id_address != '') {
            $.ajax({
                url: urlRequest,
                method: "GET",

                success: function(data) {

                    $('#maps').html(data);
                }
            })
        }
    });

    $(document).on('change', '.option_address', function() {
        //tab
        var tab_id = $('option:selected', this).attr('data-tab');
        var el = $("#" + tab_id);
        $('.tab-drug-store').removeClass('current');
        $("." + tab_id).addClass('current');

        let id_address_city = $(this).val();
        let urlRequest = window.location;

        urlRequest = urlRequest + '?' + 'id_address_city' + '=' + id_address_city;

        if (id_address_city != '') {
            $.ajax({
                url: urlRequest,
                method: "GET",

                success: function(data) {

                    $('#maps').html(data);
                }
            })
        }
    });
</script>
@endsection