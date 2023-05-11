<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Halaman Login | DIGITAL EDUCATION SYSTEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
  <style type="text/css">
    body {
  background: #ABCDEF;
  font-family: Assistant, sans-serif;
  display: flex;
  min-height: 90vh;
    background-image: url('<?=base_url()?>/assets/img/bg-login.jpeg');
    background-size: cover;
    background-position: center;
}
.login {
  color: white;
  background: background: #136a8a;
  background: 
    -webkit-linear-gradient(to right, #267871, #136a8a);
  background: 
    linear-gradient(to right, #267871, #136a8a);
  margin: auto;
  box-shadow: 
    0px 2px 10px rgba(0,0,0,0.2), 
    0px 10px 20px rgba(0,0,0,0.3), 
    0px 30px 60px 1px rgba(0,0,0,0.5);
  border-radius: 8px;
  padding: 50px;

}
.login .head {
  display: flex;
  align-items: center;
  justify-content: center;
}
.login .head .company {
  font-size: 2.2em;
}
.login .msg {
  text-align: center;
}
.login .form input[type=text].text {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
}
.login .form .text::placeholder {
  color: #D3D3D3;
}
.login .form input[type=password].password {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
  margin-bottom: 20px;
  margin-top: 20px;
}
.login .form .password::placeholder {
  color: #D3D3D3;
}
.login .form .btn-login {
  background: none;
  text-decoration: none;
  color: white;
  box-shadow: 0px 0px 0px 2px white;
  border-radius: 3px;
  padding: 5px 2em;
  transition: 0.5s;
}
.login .form .btn-login:hover {
  background: white;
  color: dimgray;
  transition: 0.5s;
}
.login .forgot {
  text-decoration: none;
  color: white;
  float: right;
}
footer {
  position: absolute;
  color: #136a8a;
  bottom: 10px;
  padding-left: 20px;
}
footer p {
  display: inline;
}
footer a {
  color: green;
  text-decoration: none;
}
footer a:hover {
  text-decoration: underline;
}
footer .heart {
  color: #B22222;
  font-size: 1.5em
}
  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<section class='login' id='login'>
  <div class='head'>
  <img src="<?=base_url()?>/assets/img/AKPOL Logo.png" width="150">
  <h1 class='company'>SIAP AKPOL</h1>
  </div>
  <p class='msg'>SISTEM AKADEMIK DAN PENILAIAN
AKADEMI KEPOLISIAN</p>
  <div class='form'>
    <form  id="form1" name="form1" class="sign-in-form" method="post" enctype="multipart/form-data" autocomplete="off">
                                  <?=csrf_field()?>
      
      <input type="text" placeholder='Username' class='text' name="username" id='username' required><br>
      <input type="password" placeholder='••••••••••••••' class='password' name="password"><br>
      <input id="submit" type="submit" class="btn-login" name="" value="Login">
    </form>
  </div>
</section>
<!-- partial -->

        <script src="<?=base_url()?>/assets/libs/jquery/dist/jquery.min.js"></script>
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
