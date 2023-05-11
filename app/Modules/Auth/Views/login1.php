<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Halaman Login | SIAP AKPOL</title>
        <meta name="description" content="Sistem Akademik Kepolisian" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- style -->
        <!-- build:css ../assets/css/site.min.css -->
        <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>/assets/css/theme.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css" type="text/css" />
        <style>
            .login-box {
              position: absolute;
              top: 50%;
              left: 50%;
              width: 400px;
              padding: 40px;
              transform: translate(-50%, -50%);
              background: rgba(0,0,0,.5);
              box-sizing: border-box;
              box-shadow: 0 15px 25px rgba(0,0,0,.6);
              border-radius: 10px;
            }

            .login-box h2 {
              margin: 0 0 30px;
              padding: 0;
              color: #fff;
              text-align: center;
            }

            .login-box .user-box {
              position: relative;
            }

            .login-box .user-box input {
              width: 100%;
              padding: 10px 0;
              font-size: 16px;
              color: #fff;
              margin-bottom: 30px;
              border: none;
              border-bottom: 1px solid #fff;
              outline: none;
              background: transparent;
            }
            .login-box .user-box label {
              position: absolute;
              top:0;
              left: 0;
              padding: 10px 0;
              font-size: 16px;
              color: #fff;
              pointer-events: none;
              transition: .5s;
            }

            .login-box .user-box input:focus ~ label,
            .login-box .user-box input:valid ~ label {
              top: -20px;
              left: 0;
              color: #03e9f4;
              font-size: 12px;
            }

            .login-box form a {
              position: relative;
              display: inline-block;
              padding: 10px 20px;
              color: #03e9f4;
              font-size: 16px;
              text-decoration: none;
              text-transform: uppercase;
              overflow: hidden;
              transition: .5s;
              margin-top: 40px;
              letter-spacing: 4px
            }

            .login-box a:hover {
              background: #03e9f4;
              color: #fff;
              border-radius: 5px;
              box-shadow: 0 0 5px #03e9f4,
                          0 0 25px #03e9f4,
                          0 0 50px #03e9f4,
                          0 0 100px #03e9f4;
            }

            .login-box a span {
              position: absolute;
              display: block;
            }

            .login-box a span:nth-child(1) {
              top: 0;
              left: -100%;
              width: 100%;
              height: 2px;
              background: linear-gradient(90deg, transparent, #03e9f4);
              animation: btn-anim1 1s linear infinite;
            }

            @keyframes btn-anim1 {
              0% {
                left: -100%;
              }
              50%,100% {
                left: 100%;
              }
            }

            .login-box a span:nth-child(2) {
              top: -100%;
              right: 0;
              width: 2px;
              height: 100%;
              background: linear-gradient(180deg, transparent, #03e9f4);
              animation: btn-anim2 1s linear infinite;
              animation-delay: .25s
            }

            @keyframes btn-anim2 {
              0% {
                top: -100%;
              }
              50%,100% {
                top: 100%;
              }
            }

            .login-box a span:nth-child(3) {
              bottom: 0;
              right: -100%;
              width: 100%;
              height: 2px;
              background: linear-gradient(270deg, transparent, #03e9f4);
              animation: btn-anim3 1s linear infinite;
              animation-delay: .5s
            }

            @keyframes btn-anim3 {
              0% {
                right: -100%;
              }
              50%,100% {
                right: 100%;
              }
            }

            .login-box a span:nth-child(4) {
              bottom: -100%;
              left: 0;
              width: 2px;
              height: 100%;
              background: linear-gradient(360deg, transparent, #03e9f4);
              animation: btn-anim4 1s linear infinite;
              animation-delay: .75s
            }

            @keyframes btn-anim4 {
              0% {
                bottom: -100%;
              }
              50%,100% {
                bottom: 100%;
              }
            }

        </style>
        <!-- endbuild -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <!-- <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.ico"/> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
    <body class="layout-row">
        <div class="d-flex flex-column flex">
            <div class="row no-gutters h-100">
                <!-- <div class="col-md-6 bg-primary" style=" background-image: url(http://111.68.31.157/public/img/bglogin.jpg); background-size: cover; "> -->
                <div class="col-md-6 " style=" background-image: url(<?=base_url()?>/assets/img/bg-login.jpeg); background-size: cover; ">
                    <div class="p-3 p-md-5 d-flex flex-column h-100">
<!--                         <h4 class="mb-3 akpol">SIAP AKPOL</h4>
                        <div class="text-fade">SISTEM AKADEMIK DAN PENILAIAN AKADEMI KEPOLISIAN</div>
                        <div class="d-flex flex align-items-center justify-content-center">
                          <img src="<?=base_url()?>/assets/img/Illustrasi - Online Learning.png">
                        </div> -->
<!--                         <div class="d-flex text-sm text-fade">
                            <a href="index.html" class="text-white">About</a>
                            <span class="flex"></span>
                            <a href="#" class="text-white mx-1">Terms</a>
                            <a href="#" class="text-white mx-1">Policy</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="content-body">
                        <div class="p-3 p-md-5">
                            <!--
                            <div class="login-box">
                              <h2>Login</h2>
                              <form id="form1" name="form1" class="sign-in-form" method="post" enctype="multipart/form-data" autocomplete="off">  
                                <?=csrf_field()?>
                                <div class="user-box">
                                  <input type="text" class="form-control" placeholder="Username" id="username" name="username" required="">
                                  <label>Username</label>
                                </div>
                                <div class="user-box">
                                  <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="">
                                  <label>Password</label>
                                </div>
                                <a href="#">
                                  <span></span>
                                  <span></span>
                                  <span></span>
                                  <span></span>
                                  Submit
                                </a>
                              </form>
                            </div>
                            -->
                            <div class="d-flex flex align-items-center justify-content-center">
                              <img src="<?=base_url()?>/assets/img/AKPOL Logo.png" width="150">
                            </div>
                            <h4 class="mb-3 akpol" align="center">SIAP AKPOL</h4>
                            <div class="text-fade" align="center">SISTEM AKADEMIK DAN PENILAIAN</div>
                            <div class="text-fade" align="center">AKADEMI KEPOLISIAN</div>
                            <br>
                            <div style="width: 60%; margin: auto;">
                              
                              <form id="form1" name="form1" class="sign-in-form" method="post" enctype="multipart/form-data" autocomplete="off">
                                  <?=csrf_field()?>
                                  <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" class="form-control" placeholder="Username" id="username" name="username" required="">
                                  </div>
                                  <div class="form-group">
                                      <label>Password</label>
                                      <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="">
                                  </div>
                                  <button type="submit" class="btn btn-primary mb-4 anim-this"><span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    Masuk
                                </button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- build:js ../assets/js/site.min.js -->
        <!-- jQuery -->
        <script src="<?=base_url()?>/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?=base_url()?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?=base_url()?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- ajax page -->
        <script src="<?=base_url()?>/assets/libs/pjax/pjax.min.js"></script>
        <script src="<?=base_url()?>/assets/js/ajax.js"></script>
        <!-- lazyload plugin -->
        <script src="<?=base_url()?>/assets/js/lazyload.config.js"></script>
        <script src="<?=base_url()?>/assets/js/lazyload.js"></script>
        <script src="<?=base_url()?>/assets/js/plugin.js"></script>
        <!-- scrollreveal -->
        <script src="<?=base_url()?>/assets/libs/scrollreveal/dist/scrollreveal.min.js"></script>
        <!-- feathericon -->
        <script src="<?=base_url()?>/assets/libs/feather-icons/dist/feather.min.js"></script>
        <script src="<?=base_url()?>/assets/js/plugins/feathericon.js"></script>
        <!-- theme -->
        <script src="<?=base_url()?>/assets/js/theme.js"></script>
        <script src="<?=base_url()?>/assets/js/utils.js"></script>
        <!-- endbuild -->
        <script type="text/javascript">
        $(document).ready(function(){
            $("#form1").submit(function(event) {
                event.preventDefault();
                var $form = $( this );

                Swal.fire({
                    title: "",
                    icon: "info",
                    text: "Mohon ditunggu...",
                    onOpen: function() {
                        Swal.showLoading()
                    }
                })

                var url = '<?=base_url()?>/auth/action/login';

                $.post(url, $form.serialize(), function(data) {
                    var ret = $.parseJSON(data);
                    swal.close();
                    if(ret.success) { 
                        window.location = "<?=base_url()?>/main";
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
        });
        </script>
    </body>
</html>