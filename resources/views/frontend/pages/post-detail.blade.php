@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('css')
@endsection
@section('content')
@if($data && $data->count()>0)
<div class="main-rte">
    <div class="breadcrum">
        <img src="{{asset($data->avatar_path)}}" alt="{{ $data->avatar_path }}">
    </div>
    <div class="rte">
        <div class="container">
            <div class="row">
                
                <div class="rte-recruiment_left col-xl-8 col-lg-8 col-md-8 col-12">
                    <div class="detail-job">
                        <h1 class="title">{{ $data->name }}</h1>
                        <div class="detail-job-component">
                            <h3 class="sub-title">Mô tả công việc</h3>
                            {!! $data->value !!}
                        </div>

                        <div class="detail-job-component">
                            <h3 class="sub-title">Yêu cầu ứng viên</h3>
                            {!! $data->description !!}
                        </div>

                        <div class="detail-job-component">
                            <h3 class="sub-title">Quyền lợi ứng viên</h3>
                            {!! $data->content !!}
                        </div>
                        @if($lien_he)
                        <div class="detail-job-contact">
                            <h3 class="sub-title">{{ $lien_he->name }}</h3>
                            @if($lien_he->childs->count()>0)
                            <ul class="detail-job_sum">
                                @foreach($lien_he->childs()->where('active', 1)->orderBy('order')->get() as $item)
                                <li class="job_sum_item">{{ $item->name }}:<a href="{{ $item->slug??'#' }}"> {{ $item->value }}</a></li>
                                @endforeach
                                
                            </ul>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                <div class="rte-recruiment_right col-xl-4 col-lg-4 col-md-4 col-12">
                    <div class="offer-job">
                        <div class="offer-job_item">
                            <b>Thu nhập</b>
                            <p>{{ $data->range }}</p>
                        </div>
                        <div class="offer-job_item">
                            <b>Phòng ban</b>
                            <p>{{ $data->category->name }}</p>
                        </div>
                        <div class="offer-job_item">
                            <b>Hạn nộp hồ sơ</b>
                            <div class="icon">
                                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_115_129)">
                                    <path d="M7.46618 14.4999H6.53657C6.37497 14.4796 6.2131 14.4624 6.05205 14.4383C4.20598 14.1622 2.68366 13.3074 1.52343 11.8456C0.290886 10.2922 -0.194734 8.51108 0.070125 6.5495C0.32348 4.67392 1.2194 3.14043 2.71187 1.97805C4.25555 0.775964 6.01781 0.314465 7.95454 0.566441C9.33937 0.746659 10.5626 1.31251 11.6092 2.23825C12.8798 3.36173 13.6541 4.76403 13.9187 6.44296C13.9496 6.63988 13.9729 6.8379 13.9997 7.03565V7.96522C13.9786 8.1312 13.9606 8.29772 13.9365 8.46342C13.7357 9.83943 13.1882 11.0599 12.2679 12.1028C11.1435 13.3772 9.73926 14.154 8.05725 14.4188C7.86087 14.4498 7.66311 14.473 7.46591 14.4999H7.46618ZM6.99809 13.4098C10.2569 13.4123 12.903 10.7717 12.9102 7.51057C12.9173 4.24721 10.2698 1.59324 7.00494 1.59078C3.7461 1.58831 1.09998 4.22886 1.09286 7.49003C1.08574 10.7534 3.73323 13.4074 6.99809 13.4098Z" fill="#616161"/>
                                    <path d="M6.4564 5.90735C6.4564 5.36999 6.45393 4.83262 6.45749 4.29525C6.45941 4.0263 6.64785 3.80116 6.89436 3.75761C7.1521 3.71188 7.40162 3.83704 7.49557 4.0756C7.53117 4.16571 7.54405 4.26978 7.54459 4.36756C7.54815 5.29193 7.54843 6.2163 7.54459 7.14067C7.54405 7.23817 7.575 7.29541 7.65251 7.35293C8.26275 7.80594 8.86916 8.26415 9.47694 8.72017C9.66703 8.86259 9.74618 9.05431 9.69962 9.28301C9.65497 9.5013 9.51118 9.6418 9.29343 9.69822C9.13402 9.73958 8.98392 9.70781 8.85355 9.61058C8.12772 9.0691 7.40299 8.52598 6.67962 7.98122C6.52378 7.864 6.45558 7.70076 6.45585 7.50603C6.45695 6.97332 6.45612 6.44034 6.4564 5.90763V5.90735Z" fill="#616161"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_115_129">
                                    <rect width="14" height="14" fill="white" transform="translate(0 0.5)"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                <span>{{ $data->time }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="recruiment-form">
                        <h3 class="title-form">Nộp đơn ứng tuyển</h3>
                        
                        <form id="recruiment-form" action="{{ route('contact.storeAjax') }}"  data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                            @csrf
                            <input type="text" name="name" id="name" placeholder="Họ & tên*" required>
                            <input type="hidden" value="THÔNG TIN ỨNG TUYỂN" name="title">
                            <div class="form-mail-phone">
                                <input type="tel" name="phone" id="recruitmentphone" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" placeholder="Số điện thoại*" required>
                                <input type="email" name="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" placeholder="Email*" required>
                            </div>
                            <select name="job_name" id="choosejob">
                                <option value="" disabled hidden>Vị trí tuyển dụng*</option>
                                <option selected value="{{ $data->name }}
                                ">{{ $data->name }}
                            </option>
                            
                            </select>
                            {{--<div class="upload-file">
                                <span>CV của bạn</span>
                                <label for="recruimentfile">Click để chọn & tải CV của bạn</label>
                                <input type="file" name="recruimentfile" id="recruimentfile">
                            </div>--}}

                            <textarea name="content" id="recruimentnote" cols="30" rows="10" placeholder="Nội dung"></textarea>

                            <button class="button" type="submit">Nộp Đơn Ứng Tuyển</button>

                        </form>
                    </div>
                    @if (session('success'))
                    <div class="toast-offer toast-success">
                        <div class="box-toast">
                        <div class="box-toast_icon">
                            <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.0002 1.23676C20.8876 1.55265 20.6596 1.78417 20.4222 2.01529C16.1641 6.15386 11.908 10.2948 7.65405 14.4378C7.4166 14.6689 7.17874 14.8908 6.85419 15.0004H6.40312C6.06625 14.8832 5.82387 14.6457 5.5782 14.4062C3.85566 12.726 2.12983 11.0494 0.405643 9.37074C-0.0174953 8.95888 -0.109518 8.51584 0.132041 8.07359C0.436454 7.51698 1.18167 7.35944 1.69437 7.74571C1.77489 7.80648 1.84801 7.87726 1.92073 7.94763C3.43334 9.41832 4.94555 10.889 6.45735 12.3609C6.51034 12.4125 6.55512 12.4721 6.65495 12.5864C6.7215 12.4893 6.75971 12.4081 6.82051 12.3489C10.9102 8.36589 15.0031 4.38607 19.0936 0.40345C19.4029 0.102355 19.7464 -0.0743842 20.1937 0.0307794C20.5688 0.118749 20.8116 0.351868 20.9488 0.697348C20.9628 0.732136 20.9829 0.764925 21.0006 0.798513V1.23716L21.0002 1.23676Z" fill="white"/>
                            </svg>
                            
                        </div>
                        <div class="box-toast_messenger">
                            <span>{{session("success")}}</span>
                        </div>
                        </div>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="toast-offer toast-fail">
                        <div class="box-toast">
                        <div class="box-toast_icon">
                            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_115_296)">
                            <path d="M21.0001 16.954C20.8864 17.2537 20.8128 17.5775 20.6518 17.8481C20.1704 18.6576 19.431 19.0009 18.5043 18.9997C14.774 18.993 11.0438 18.9972 7.31356 18.9972C5.70127 18.9972 4.08899 18.9926 2.4767 18.9988C1.61736 19.0021 0.91206 18.6916 0.428579 17.964C-0.130896 17.1217 -0.132539 16.2471 0.366552 15.372C1.70896 13.0196 3.05342 10.6684 4.39707 8.31639C5.73414 5.97641 7.07244 3.63768 8.40663 1.29605C8.78413 0.633533 9.31321 0.191856 10.0707 0.0428319C10.9707 -0.13442 11.9389 0.236273 12.424 1.02623C13.0102 1.98015 13.5532 2.96147 14.1094 3.93407C16.2664 7.70576 18.4242 11.4766 20.5709 15.2537C20.7541 15.5762 20.8588 15.944 21.0001 16.2911V16.954ZM10.5036 17.7448C12.5941 17.7448 14.6845 17.7448 16.7753 17.7448C17.3903 17.7448 18.0052 17.7485 18.6197 17.7435C19.1336 17.7394 19.5099 17.4754 19.6898 16.9976C19.8331 16.6173 19.7309 16.2728 19.5386 15.9366C17.709 12.7381 15.8819 9.53847 14.0544 6.33922C13.2086 4.85894 12.364 3.37824 11.5166 1.89879C11.2163 1.37492 10.7628 1.16197 10.2321 1.28982C9.87392 1.37617 9.65046 1.62233 9.473 1.93283C8.01147 4.49447 6.54706 7.05404 5.08388 9.61444C3.8799 11.7211 2.67716 13.8291 1.47153 15.9349C1.2834 16.2637 1.17824 16.6016 1.31256 16.976C1.497 17.4903 1.87286 17.744 2.44918 17.744C5.13399 17.7448 7.81881 17.744 10.504 17.7444L10.5036 17.7448Z" fill="white"/>
                            <path d="M11.111 5.95349V12.3487H9.90747V5.95349H11.111Z" fill="white"/>
                            <path d="M11.3238 14.4312C11.325 14.8924 10.9689 15.2577 10.5146 15.2615C10.0492 15.2656 9.6844 14.8991 9.68604 14.4296C9.68768 13.975 10.057 13.6031 10.5055 13.6035C10.9545 13.6039 11.3222 13.9759 11.3234 14.4312H11.3238Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_115_296">
                            <rect width="21" height="19" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>
                            
                            
                        </div>
                        <div class="box-toast_messenger">
                            <span>{{session("error")}}</span>
                        </div>
                        </div>
                    </div>
                    @endif
                </div>
                @if($dataRelate && $dataRelate->count()>0)
                <div class="col-12">
                    <div class="recruitment-content-wrapper">
                        <article class="recruitment-content-container">
                            <h3 class="sub-title">{{ $data->category->name }}</h3>
                            <div class="recruitment-content-list">
                                <div class="row">
                                    @foreach($dataRelate as $item)
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="recruitment-content-item">
                                            <h4 class="recruitment-content-item-title">
                                            {{ $item->name }}
                                            </h4>
                                            <div class="recruitment-content-item-information">
                                                <div class="recruitment-content-item-information-text">
                                                    <div class="item">
                                                    <div class="icon">
                                                        <svg
                                                        width="14"
                                                        height="14"
                                                        viewBox="0 0 14 14"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                        <g clip-path="url(#clip0_9_1545)">
                                                            <path
                                                            d="M7.46616 13.9998H6.53655C6.37495 13.9795 6.21308 13.9623 6.05202 13.9382C4.20596 13.6621 2.68363 12.8073 1.5234 11.3456C0.290863 9.79207 -0.194757 8.01099 0.0701021 6.04941C0.323457 4.17383 1.21938 2.64034 2.71184 1.47796C4.25553 0.275873 6.01779 -0.185626 7.95452 0.0663495C9.33934 0.246567 10.5626 0.812417 11.6091 1.73815C12.8797 2.86164 13.6541 4.26394 13.9186 5.94287C13.9496 6.13979 13.9729 6.33781 13.9997 6.53556V7.46513C13.9786 7.6311 13.9605 7.79763 13.9364 7.96333C13.7357 9.33934 13.1882 10.5598 12.2679 11.6027C11.1435 12.8771 9.73923 13.6539 8.05723 13.9187C7.86084 13.9497 7.66309 13.973 7.46588 13.9998H7.46616ZM6.99807 12.9097C10.2569 12.9122 12.903 10.2716 12.9101 7.01048C12.9173 3.74711 10.2698 1.09315 7.00491 1.09069C3.74608 1.08822 1.09996 3.72876 1.09284 6.98994C1.08571 10.2533 3.73321 12.9073 6.99807 12.9097Z"
                                                            fill="#616161"
                                                            />
                                                            <path
                                                            d="M6.45631 5.40735C6.45631 4.86999 6.45385 4.33262 6.45741 3.79525C6.45933 3.5263 6.64777 3.30116 6.89428 3.25761C7.15201 3.21188 7.40153 3.33704 7.49548 3.5756C7.53109 3.66571 7.54396 3.76978 7.54451 3.86756C7.54807 4.79193 7.54834 5.7163 7.54451 6.64067C7.54396 6.73817 7.57491 6.79541 7.65242 6.85293C8.26267 7.30594 8.86908 7.76415 9.47686 8.22017C9.66694 8.36259 9.7461 8.55431 9.69954 8.78301C9.65489 9.0013 9.51109 9.1418 9.29334 9.19822C9.13394 9.23958 8.98384 9.20781 8.85347 9.11058C8.12764 8.5691 7.4029 8.02598 6.67954 7.48122C6.52369 7.364 6.45549 7.20076 6.45577 7.00603C6.45686 6.47332 6.45604 5.94034 6.45631 5.40763V5.40735Z"
                                                            fill="#616161"
                                                            />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_9_1545">
                                                            <rect width="14" height="14" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                        </svg>
                                                    </div>
                                                    <p class="text">{{ $item->time }}</p>
                                                    </div>
                                                    <div class="item">
                                                    <div class="icon">
                                                        <svg
                                                        width="11"
                                                        height="16"
                                                        viewBox="0 0 11 16"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                        <g clip-path="url(#clip0_9_1515)">
                                                            <path
                                                            d="M5.62254 15.7915H5.37807C5.26564 15.6867 5.13666 15.5946 5.04414 15.4748C4.86462 15.2422 4.70409 14.995 4.53774 14.7523C3.63368 13.4356 2.7091 12.1324 1.83354 10.7975C1.1712 9.78751 0.639363 8.70468 0.290424 7.54198C-0.0300241 6.47379 -0.109983 5.39736 0.175847 4.30691C0.8918 1.57637 3.61591 -0.217676 6.48861 0.295996C8.59633 0.672791 10.3726 2.33148 10.8474 4.41422C10.9112 4.69377 10.9498 4.97911 11.0003 5.2614V6.14394C10.9908 6.17198 10.9749 6.19973 10.9724 6.22838C10.9203 6.83259 10.7684 7.41455 10.5665 7.98371C10.1128 9.26256 9.44984 10.4365 8.69222 11.555C7.80165 12.8698 6.88074 14.1642 5.96597 15.4626C5.87651 15.5897 5.73834 15.6827 5.62285 15.7915H5.62254ZM5.48744 14.5194C5.52604 14.4749 5.54718 14.4542 5.56372 14.4307C6.31582 13.3594 7.08079 12.2967 7.81543 11.2139C8.55651 10.1219 9.22344 8.98575 9.67562 7.73861C10.0043 6.83168 10.1811 5.90433 10.02 4.93612C9.63059 2.60097 7.49437 0.936487 5.12134 1.14927C3.45446 1.29895 2.22077 2.13882 1.43374 3.60271C0.817661 4.74833 0.792234 5.95615 1.14669 7.18683C1.45457 8.25655 1.96067 9.23542 2.53049 10.1847C3.41954 11.6654 4.46299 13.0415 5.45405 14.4529C5.46538 14.4694 5.47243 14.4889 5.48744 14.5188V14.5194Z"
                                                            fill="#616161"
                                                            />
                                                            <path
                                                            d="M2.75138 5.68677C2.75138 4.16771 3.98017 2.948 5.50889 2.94922C7.02504 2.95044 8.24985 4.17441 8.24985 5.6883C8.24985 7.20737 7.02106 8.42738 5.49234 8.42616C3.9768 8.42494 2.75138 7.20005 2.75138 5.68677ZM5.50153 3.86103C4.50435 3.86042 3.67198 4.68534 3.66708 5.67854C3.66248 6.67784 4.49669 7.51313 5.49939 7.51374C6.49688 7.51405 7.32895 6.68943 7.33385 5.69562C7.33875 4.69632 6.50485 3.86133 5.50123 3.86103H5.50153Z"
                                                            fill="#616161"
                                                            />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_9_1515">
                                                            <rect
                                                                width="11"
                                                                height="15.5833"
                                                                fill="white"
                                                                transform="translate(0 0.208252)"
                                                            />
                                                            </clipPath>
                                                        </defs>
                                                        </svg>
                                                    </div>
                                                    <p class="text">{{ $item->dia_diem }}</p>
                                                    </div>
                                                </div>
                                                <a href="{{ $item->slug_full }}" class="button">Ứng tuyển</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('js')
<!-- Đặt đoạn mã JavaScript sau thẻ </body> để đảm bảo nó chạy sau khi trang đã tải hoàn tất -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Kiểm tra nếu có session success hoặc error
    // Nếu có, cuộn trang xuống phần có hiển thị session thông báo
    if ($('.toast-offer').length > 0) {
        var windowHeight = $(window).height();
        var toastPosition = $('.toast-offer').offset().top;
        var scrollToPosition = toastPosition - (windowHeight / 2);
        $('html, body').animate({scrollTop: scrollToPosition}, 800); // 800 là thời gian cuộn (milliseconds)
    }
});
</script>
@endsection
