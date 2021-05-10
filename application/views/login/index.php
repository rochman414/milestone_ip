<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login Milestone Imani Prima</title>

    <!-- vendor css -->
    <link href="<?= base_url('assets/template') ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/lada_button/lada.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/lib/iziToast-master/dist/css/iziToast.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/css/bracket.css">
  </head>

  <body>
    <form method="POST" id="login">
      <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-400 wd-xs-400 pd-30 pd-xs-40 bg-white rounded shadow-base">
          <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Milestone Imani Prima <span class="tx-normal">]</span></div>
          <div class="tx-center mg-b-50">Imani Prima </div>

          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Enter your username" required>

          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" class="form-control mg-b-20" name="password" placeholder="Enter your password" required>
            <a href="" class="tx-info tx-12 d-block mg-t-10 mg-b-20">Forgot password?</a>
          </div><!-- form-group -->
          <button type="button" id="do_login" style="cursor: pointer;" class="btn btn-info btn-block btn-progress" data-style="zoom-in">Sign In</button>
          <div class="mg-t-60 tx-center"></div>
        </div><!-- login-wrapper -->
      </div><!-- d-flex -->
    </form>

    <script src="<?= base_url('assets/template') ?>/lib/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/popper.js/popper.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/bootstrap/bootstrap.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/lada_button/lada.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/iziToast-master/dist/js/iziToast.min.js"></script>
    <script>
        base_url='<?= base_url(); ?>';
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="<?=$this->security->get_csrf_token_name();?>"]').attr('content') },
            xhrFields: {
                withCredentials: true
            },
            dataType: 'json',
            cache: false
        });
        $('#do_login').on('click.ev',function (e) { 
          e.preventDefault();
          $('#do_login').addClass('ladda-button')
          var user = $('input[name="username"]').val();
          var password = $('input[name="password"]').val();
          if(user == "" || password == ""){
            iziToast.warning({
              title: 'Perhatian!',
              message: 'Username atau Password tidak boleh kosong!',
              position: 'center'
            })
            $('input[name="password"]').val('');
          } 
          if(user != "" && password != "") {
            $.ajax({
              type: "POST",
              url: "<?= $login ?>",
              data: {user: user, password : password},
              success: function (response) {
                if(response.type == 'link'){
                  window.location.replace(response.msg);
                }
                if(response.type == "msg"){
                  iziToast.error({
                    title: 'Gagal!',
                    message: response.msg,
                    position: 'center'
                  })
                  $('input[name="password"]').val('');
                }
              }
            });
          }
        });
    </script>
  </body>
</html>
