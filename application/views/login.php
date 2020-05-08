<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url() ?>libs/dist/img/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libs/plugins/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libs/plugins/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libs/plugins/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libs/plugins/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libs/plugins/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libs/plugins/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libs/plugins/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
<main>
        <div class="main-content">
            <div class="icon">
                <img src="<?= base_url() ?>libs/dist/img/logo.png" alt="">
            </div>
            <div class="form-login">
                <form class="validate-form" action="<?= base_url() ?>usuario/entrarPost" method="post">
					
					<p >
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<input class="input100" type="text" placeholder="User" name="usuario" required data-validate = "Password is required">
					</p>
                    <p>
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						<input class="input100" type="password" placeholder="Password" name="senha" required data-validate = "Password is required">
					</p>
					
                    <button type="submit">Entrar</button>
                </form>
                <p> <a class="txt2 p-t-12" href="<?= base_url() ?>usuario/recuperar_senha"> Esqueceu a senha?</a></p>
            </div>
        </div>
    </main>
	
	

	
<!--===============================================================================================-->	
	<script src="<?= base_url() ?>libs/plugins/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>libs/plugins/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>libs/plugins/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>libs/plugins/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>libs/plugins/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 10
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>libs/plugins/login/js/main.js"></script>

</body>
</html>