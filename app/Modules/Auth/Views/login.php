<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Halaman Login | DIGITAL EDUCATION SYSTEM</title>

  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/favico/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/img/favico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/img/favico/favicon-16x16.png">
  <link rel="manifest" href="<?=base_url()?>/assets/img/favico/site.webmanifest">

  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    * {
      font-family: 'Open Sans', sans-serif;
      /*background-color: black;*/
    }

    body {
      margin: 0;
      padding: 0;
    }

    .main-container {
      width: 100%;
      height: 100vh;
      /*background: url(<?=base_url()?>/assets/img/bg-login.jpeg);*/
      /*background-image: url(<?=base_url()?>/assets/img/bg-login.jpeg); */
      background-image: url(<?=base_url()?>/assets/img/Frame.png); 
      background-size: cover;
      background-position: center;
      transition: 0.4s linear;
    }

    .box {
      width: 400px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255, 255, 255, 1);
      /*background: rgba(255, 255, 255, .8);*/
      /*background: rgba(0, 0, 0, .8);*/
      padding: 40px;
      box-sizing: border-box;
      box-shadow: 0px 15px 25px rgba(0, 0, 0, .5);
      border-radius: 10px;
    }

    .box h2 {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
      text-align: center;
    }

    .box p {
      margin-bottom: 0;
    }

    .box p:nth-child(even) {
      margin-top: 0;
    }

    .box a {
      color: #9a9d9e;
      font-size: 14px;
      text-decoration: none;
    }

    .box .input-box {
      position: relative;
    }

    .box .input-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      margin-bottom: 30px;
      color: black;
      border: 1px solid #fff;
      border: none;
      border-bottom-style: solid;
      border-bottom: 2px solid black;
      outline: none;
      letter-spacing: 1px;
      background: transparent;
    }

    .box .input-box label {
      position: absolute;
      color: black;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      pointer-events: none;
      transition: .5s;
    }

    .box .input-box input:focus~label,
    .box .input-box input:valid~label {
      top: -18px;
      left: 0;
      color: black;
      font-size: 12px;
    }

    .box input[type=submit] {
      background: transparent;
      border: none;
      outline: none;
      background: #FFBE17;
      color: #fff;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      font-weight: bold;
    }

    #logged-in {
      width: 100%;
      height: auto;
      text-align: center;
      margin: auto;
      position: absolute;
      top: 50px;
      display: none;
    }

    .login-true {
      opacity: 0;
    }
  </style>
</head>
<body>
<div id="main" class="main-container">
   <div class="box">
      <div class="d-flex flex align-items-center justify-content-center" style="display: flex; justify-content: center;">
         <img src="<?=base_url()?>/assets/img/AKPOL Logo-min.png" width="150">
      </div>
      <h4 style="text-align: center; color: black">SSISTEM AKADEMIK DAN PENILAIAN
         AKADEMI KEPOLISIAN
      </h4>
      <form id="form1" name="form1" class="sign-in-form" method="post" enctype="multipart/form-data" autocomplete="off">
         <?=csrf_field()?>
         <div class="input-box">
            <input id="username" type="text" name="username" required="">
            <label>Username</label>
         </div>
         <div class="input-box">
            <input id="password" type="password" name="password" required="">
            <label>Password</label>
         </div>
         <input id="submit" type="submit" name="" value="LOGIN">
      </form>
   </div>
</div>
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
                      icon: ret.title=='info'? 'info':'error',
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
