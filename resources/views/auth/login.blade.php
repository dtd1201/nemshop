@extends('layouts.app')

@section('content')
<style>
	body {
		font-family: 'Open Sans', sans-serif;
		background-color: #fff!important;
	}
	@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
	.box_container {
		display: flex;
		align-items: center;
		justify-content: center;
		height: calc(100vh - 64px);
	}
	.card-header {
		text-align: left;
		text-transform:uppercase;
		font-weight: 700;
		font-size: 20px;
	}
	.navbar-brand {
		font-size: 25px;
		font-weight:700; 
	}
	.container {
	}
	.card {
		background: #eee;
		margin-top: 50px;
	}
	.card-header {
		background: #0b8189;
		text-align: center;
		color: #fff;
	}
	.card-body {
	}
	.navbar-light .navbar-brand {
		color: #0b8189
	}
	label:not(.form-check-label):not(.custom-file-label) {
		font-weight: 600;
	}
	.btn-primary {
		background: #0b8189;
		border: 0;
		padding: 5px 20px;
	}
	.btn-link {
		font-weight: 400;
		color: #0b8189;
		font-size: 15px;
		text-decoration: none;
	}
</style>
<div class="box_container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					{{-- <div class="card-header">{{ __('Login') }}</div> --}}
					<div class="card-header">Hệ thống đăng nhập</div>
					<div class="card-body">
						@isset($url)
						<form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
						@else
						<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
						@endisset
						{{-- <form method="POST" action="{{ route('login') }}"> --}}
							@csrf

							<div class="form-group row">
								<label for="username" class="col-md-4 col-form-label text-md-right">Tên đăng nhập</label>

								<div class="col-md-6">
									<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

									@error('username')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-6 offset-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											Ghi nhớ đăng nhập
										</label>
									</div>
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary">
										Đăng nhập
									</button>

									@if (Route::has('password.request'))
										<a class="btn btn-link" href="{{ route('password.request') }}">
											Quên mật khẩu?
										</a>
									@endif
								</div>
								<div class="col-md-8 offset-md-4">
									<div class="dang_ky">
										Nếu bạn chưa có tài khoản vui lòng đăng ký <a href="{{ route('register') }}">tại đây</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
