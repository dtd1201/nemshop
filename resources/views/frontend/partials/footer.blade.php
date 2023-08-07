<footer id="footer">
    <div class="top" id="{{ $footer['lien_he']->slug }}">
        <div class="container">
            <div class="row">
                @if($footer['dang_ky'])
                <div class="col-lg-6 col-md-6 col-12">
                    <article class="cta-container">
                        <h2 class="sub-title">{{ $footer['dang_ky']->name }}</h2>
                        <p class="desc">
                            {{ $footer['dang_ky']->value }}
                        </p>
                        <form id="recruiment-form" action="{{ route('contact.storeAjax') }}"  data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                            @csrf
                            <input type="email" name="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" placeholder="Email..." required>
                            <button class="button" type="submit">Đăng kí</button>
                        </form>
                    </article>
                </div>
                @endif
                @if($footer['info'])
                <div class="col-lg-6 col-md-6 col-12">
                    <article class="information-container">
                    <h2 class="sub-title">
                        {{ $footer['info']->name }}
                    </h2>
                    @if($footer['info']->childs->count()>0)
                    <ul class="information-list">
                        @foreach($footer['info']->childs()->where('active', 1)->orderBy('order')->get() as $item)
                        <li class="item"><a href="{{ $item->slug??'#' }}">{{ $item->name }}: {{ $item->value }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    </article>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="copyrights">
    <div class="container">
        <div class="row">
            @if($footer['copy_right'])
            <div class="col-lg-6 col-md-6 col-12">
                <div class="copyrights-text">
                <p>{{ $footer['copy_right']->name }}</p>
                </div>
            </div>
            @endif
            @if($footer['sosial'] && $footer['sosial']->childs->count()>0)
            <div class="col-lg-6 col-md-6 col-12">
                <div class="social-container">
                    @foreach($footer['sosial']->childs()->where('active', 1)->orderBy('order')->get() as $item)
                    <a href="{{ $item->slug??'#' }}" class="social-item">
                        <img src="{{ $item->image_path }}" alt="{{ $item->name }}" />
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
</footer>



