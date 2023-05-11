<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Halaman Login | DIGITAL EDUCATION SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/img/favico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/img/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/img/favico/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>/assets/img/favico/site.webmanifest">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f6f5f7;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: -20px 0 50px;
            background-image: url(<?= base_url() ?>/assets/img/bg-login-5.png);
            background-size: cover;
        }

        h1 {
            font-weight: bold;
            margin: 0;
            color: beige;
        }

        p {
            font-size: 14px;
            font-weight: bold;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
            color: beige;
        }

        a {
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .container {
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: absolute;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            opacity: 0.8;
        }

        .form-container form {
            background: rgba(45, 52, 54, 1.0);
            display: flex;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #ddd;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }


        .form-container input {
            background: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        button {
            border-radius: 20px;
            border: 1px solid #FFBE17;
            background: #FFBE17;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        input[type=text] {
            width: 240px;
            text-align: center;
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
            font-family: 'PLay', sans-serif;
            font-size: 16px;
            font-weight: 200px;
            padding: 10px 0;
            transition: border 0.5s;
            outline: none;
            color: #fff;
            font-weight: bold;
        }

        input[type=password] {
            width: 240px;
            text-align: center;
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
            font-family: 'PLay', sans-serif;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 0;
            transition: border 0.5s;
            outline: none;
            color: #fff;
        }

        input[type=email] {
            width: 240px;
            text-align: center;
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
            font-family: 'PLay', sans-serif;
            font-size: 16px;
            font-weight: 200px;
            padding: 10px 0;
            transition: border 0.5s;
            outline: none;
            color: #fff;
            font-weight: bold;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: :none;
        }

        button.ghost {
            border-color: #FFBE17;
            background-color: #FFBE17
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            z-index: 1;
            opacity: 0;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: solid;
            background: linear-gradient(to right, #FFBE17, #FFBE17) no repeat 0 0 /cover;
            color: #fff;
            position: absolute;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            text-align: center;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
            background: gray;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        /*....Animation....*/

        /*....Move signin to the right....*/
        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        /*....Move overlay to the left....*/
        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        /*....Bring sign up over sign in....*/
        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        /*...Move overlay back to right....*/
        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
    </style>

</head>

<body>
    <div class="container main-container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form id="form1" name="form1" class="sign-in-form" method="post" enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field() ?>
                <div class="d-flex flex align-items-center justify-content-center" style="display: flex; justify-content: center;">
                    <img src="<?= base_url() ?>/assets/img/AKPOL Logo-min.png" width="200">
                </div>
                <h1>Login</h1>
                <input type="text" placeholder="Username" id="username" name="username" required="">
                <input type="password" placeholder="Password" name="password" required="">
                <button type="submit" class="ghost" style="margin-top: 20px">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Registrasi</h1>
                    <p>Klik tombol dibawah ini untuk melakukan registrasi taruna</p>
                    <button class="ghost" id="signUp" style="margin-top: 20px">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>


    <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');


        signUpButton.addEventListener('click', () => {
            // container.classList.add("right-panel-active");
            window.open('<?= base_url() ?>/portal/registrasitaruna', '_blank').focus();
        });


        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        $("#form1").submit(function(event) {
            event.preventDefault();
            var $form = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Mohon ditunggu...",
                onOpen: function() {
                    Swal.showLoading()
                }
            })

            var url = '<?= base_url() ?>/auth/action/login';

            $.post(url, $form.serialize(), function(data) {
                var ret = $.parseJSON(data);
                swal.close();
                if (ret.success) {
                    window.location = "<?= base_url() ?>/main";
                } else {
                    Swal.fire({
                        title: ret.title,
                        text: ret.text,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }).fail(function(data) {
                swal.close();
                Swal.fire({
                    title: 'Error',
                    text: '404 Halaman Tidak Ditemukan',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2500
                })
            });
        });
    </script>


</body>

</html>