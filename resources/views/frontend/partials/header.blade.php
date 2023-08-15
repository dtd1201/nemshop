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
				<div class="open-button">
					<svg
						id="Layer_1"
						enable-background="new 0 0 512 512"
						height="24"
						viewBox="0 0 512 512"
						width="24"
						xmlns="http://www.w3.org/2000/svg"
					>
						<g>
						<g>
							<path
							d="m473.1 106.1h-434.2c-7.8 0-14.1-6.3-14.1-14.1s6.3-14.1 14.1-14.1h434.3c7.8 0 14.1 6.3 14.1 14.1s-6.4 14.1-14.2 14.1z"
							/>
						</g>
						<g>
							<path
							d="m473.1 270.1h-434.2c-7.8 0-14.1-6.3-14.1-14.1s6.3-14.1 14.1-14.1h434.3c7.8 0 14.1 6.3 14.1 14.1s-6.4 14.1-14.2 14.1z"
							/>
						</g>
						<g>
							<path
							d="m473.1 434.1h-434.2c-7.8 0-14.1-6.3-14.1-14.1s6.3-14.1 14.1-14.1h434.3c7.8 0 14.1 6.3 14.1 14.1s-6.4 14.1-14.2 14.1z"
							/>
						</g>
						</g>
					</svg>
				</div>
				<div class="close-button d-none">
					<svg
						id="Icons"
						height="24"
						viewBox="0 0 64 64"
						width="24"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
						d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z"
						/>
					</svg>
				</div>
			</nav>
			@endif
			
		</div>
	</div>
</header>
@if($header['menu'])
<div class="nav-mobile d-none">
	<div class="nav-mobile_show">
		
		<nav class="nav-mobile_main d-flex">
			@foreach($header['menu'] as $item)
			<a href="{{$header['url']}}#{{ $item->slug }}" class="header-nav-link">{{ $item->name }}</a>
			@endforeach
		</nav>
		
		@if($header['hotline'])
		<div class="nav-mobile_hotline">
			<img src="./assets/images/icon/phone.svg" alt="phone" />
			<a class="text" href="tel:{{ $header['hotline']->slug }}">{{ $header['hotline']->value }}</a>
		</div>
		@endif
	</div>
	<div class="nav-mobile_fade"></div>
</div>
@endif