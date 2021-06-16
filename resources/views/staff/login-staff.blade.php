<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>ComCart</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/assets/images/favicon.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign In</h3>
			<div class="login-form">
                <form method="post" action="{{ route('login-staff') }}">
					@csrf
					@error('email')
						<span style="color: red; font-size: 85%;">{{ $message  }}</span>
					@enderror
					@error('password')
						<span style="color: red; font-size: 85%;">{{ $message  }}</span>
					@enderror
                    <div class="form-group form-floating-label">
                        <input id="email" name="email" type="email" class="form-control input-border-bottom" value="{{ old('email') }}" required>
                        <label for="email" class="placeholder">Email</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control input-border-bottom" value="{{ old('password') }}" required>
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember_me">
                            <label class="custom-control-label" for="remember_me">Remember Me</label>
                        </div>
                        
                        <a href="/forgot" class="link float-right">Forget Password ?</a>
                    </div>
                    <div class="form-action mb-3">
                        <button class="btn btn-primary btn-rounded btn-login" type="submit">Sign In</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<script src="/assets/js/ready.js"></script>
</body>
</html>