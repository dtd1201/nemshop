<header id="header">
	<div class="container">
		<div class="header-content">
			@if($header['logo'])
			<a href="{{ makeLink('home') }}" class="logo">
				<img src="{{ asset($header['logo']->image_path) }}" alt="{{ $header['logo']->name }}" />
			</a>
			@endif
			@if($header['menu'])
			<nav class="header-nav">
				@foreach($header['menu'] as $item)
				<a href="{{$header['url']}}#{{ $item->slug }}" class="header-nav-link">{{ $item->name }}</a>
				@endforeach
				
				@if($header['hotline'])
				<a href="tel:{{ $header['hotline']->slug }}" class="header-nav-item">
					<div class="icon">
					<img src="./assets/images/icon/phone.svg" alt="phone" />
					</div>
					<p class="text">{{ $header['hotline']->value }}</p>
				</a>
				@endif
			</nav>
			<nav class="header-nav-mobile">
				<div class="close-button">
					<i class="fa-solid fa-xmark"></i>
				</div>
				@foreach($header['menu'] as $item)
				<a href="{{$header['url']}}#{{ $item->slug }}" class="header-nav-link">{{ $item->name }}</a>
				@endforeach
				
				@if($header['hotline'])
				<a href="tel:{{ $header['hotline']->slug }}" class="header-nav-item">
					<div class="icon">
					<img src="./assets/images/icon/phone.svg" alt="phone" />
					</div>
					<p class="text">{{ $header['hotline']->value }}</p>
				</a>
				@endif
			</nav>
			@endif
			<div class="menu-button">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>
	</div>
</header>
