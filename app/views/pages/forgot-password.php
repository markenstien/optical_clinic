<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Login - Mica Aesthetic Clinic</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo _path_asset('main-assets/styles.css?v=1') ?>/" />
    <style>
      body{background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.4)), url('<?php echo _path_asset('main-assets/img/solo background.jpg')?>') center/cover no-repeat fixed; background-size:cover}
      .auth-wrap{min-height:100vh; display:flex; flex-direction:column}
      .lp-header{background:#0f0f0f; color:#fff; border-bottom:1px solid rgba(255,255,255,.06)}
      .lp-nav{max-width:960px; margin:0 auto; padding:14px 16px; display:flex; align-items:center; gap:12px}
      .brand{display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none}
      .brand .logo{width:28px;height:28px;border-radius:50%; background:transparent; object-fit:cover}
      .spacer{flex:1}
      .container{max-width:960px; margin:0 auto; padding:18px 16px}
      .center{display:flex; align-items:center; justify-content:center; padding:40px 0}
      .auth-card{width:min(520px, 96vw)}
      .auth-card h1{margin:0 0 8px 0; color:#3b2b1f}
      .auth-sub{color:#5a5047; margin-bottom:16px}
      .form-grid{display:grid; grid-template-columns:1fr; gap:12px}
      .actions{display:flex; align-items:center; justify-content:space-between; margin-top:10px}
      .link{color:var(--primary); text-decoration:none}
    </style>
  </head>
  <body>
    <div class="auth-wrap">
      <header class="lp-header">
        <nav class="lp-nav">
          <a class="brand" href="<?php echo _route('page:index')?>">
            <img class="logo" src="<?php echo _path_asset('main-assets/img/new logo.jpg') ?>" alt="MICA" />
            <strong>MICA</strong>
          </a>
          <div class="spacer"></div>
          <a class="btn" href="<?php echo _route('page:register')?>" style="background:rgba(255,255,255,.1); color:#fff; border-color:rgba(255,255,255,.18)">Sign Up</a>
        </nav>
      </header>

      <main class="container center">
        <section class="card auth-card">
          <h1>Forget Password</h1>
          <div class="auth-sub">Use the email you used for your account</div>
          <?php Flash::show()?>
          <?php if(!$isSubmitted) :?>
            <div class="card-body">
                <?php
                    Form::open([
                        'method' => 'post'
                    ]);
                ?>
                    <div class="form-group">
                        <?php
                            Form::label('Email');
                            Form::email('email','', [
                                'class' => 'form-control',
                                'placeholder' => 'If you have account with us a reset password link will be sent to your email'
                            ]);
                        ?>
                    </div>

                    <div class="form-group mt-2">
                        <?php
                            Form::submit('btn_forget_password');
                        ?>
                    </div>
                <?php Form::close()?>
                <?php echo wDivider(25)?>
                <?php echo wLinkDefault(_route('auth:login'), 'Cancel Forgot Password')?>
            </div>
        <?php else:?>
            <div class="card-body">
                <p class="txt-warning">If Email exists, reset password instruction will be sent to the email.</p>
            </div>
        <?php endif?>
        </section>
      </main>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        if (togglePassword && password) {
          togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
          });
        }
      });
    </script>
  </body>
</html>
