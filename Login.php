<!doctype html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="CSS/lg.css"/>
<title>Dangnhap-Admin</title>
</head>

<body>
	
    <div class="admin1">
        <h1>NHÀ SÁCH CÓ ĐỦ CẢ</h1>
    </div>
    <div class="coduca">
		<img src="img/loginIcon.webp" width="172" height="143">
	</div>
    <div class="login">
        <form method="post" action="./LoginControl.php" class="login-form" autocomplete="on">
            <?php if (isset($data["result"])): ?>
                <?php if ($data["result"] == "true"): ?>
                    <h3 style="color: green;">Đăng nhập thành công!</h3>
                <?php else: ?>
                    <h3 style="color: red; font-size: 1.6rem;">
                        Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại.
                    </h3>
                <?php endif; ?>
            <?php endif; ?>
            <h1 class="login-heading">ĐĂNG NHẬP</h1>
            <div class="group">
                <i class="fa-solid fa-user-large"></i>
                <input type="text" name="txtEmail" placeholder="Email đăng nhập" id="email" required>              
            </div>
            <div class="group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="txtMatkhau" placeholder="Nhập mật khẩu" id="password" required>
                <i class="fa-regular fa-eye" onclick="changeTypePassword()" style="display: inline;"></i>
                <i class="fa-regular fa-eye-slash" onclick="changeTypePassword()" style="display: none;"></i>
                <label for="password"></label>
            </div>
            <button class="login-submit" type="submit" name="btnDanhnhap">Đăng nhập</button>
        </form>
    </div>
    <script>
        function changeTypePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcons = document.querySelectorAll('.fa-eye, .fa-eye-slash');
            passwordField.type = passwordField.type === 'text' ? 'password' : 'text';
            eyeIcons[0].style.display = passwordField.type === 'text' ? 'inline' : 'none';
            eyeIcons[1].style.display = passwordField.type === 'text' ? 'none' : 'inline';
        }
    </script>
</body>
</html>