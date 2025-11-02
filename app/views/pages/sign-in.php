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
          <h1>User Login</h1>
          <div class="auth-sub">Login to your account to book appointments and manage your profile.</div>
          <?php Flash::show()?>
          <form method="post" class="profile-form" action="<?php echo _route('auth:login')?>">
            <div class="form-grid">
              <label><span>Email</span><input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required /></label>
              <label class="password-field">
                <span>Password</span>
                <div style="position: relative;">
                  <input type="password" name="password" id="password" required style="padding-right: 40px; width: 100%;" />
                  <button type="button" id="togglePassword" class="password-toggle" aria-label="Show password" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #666; cursor: pointer; padding: 5px;">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
              </label>
            </div>
            <div class="actions" style="justify-content: space-between;">
              <a class="link" href="<?php echo _route('page:index')?>">Back to Home</a>
              <a href="forgot-password.php" class="link">Forgot Password?</a>
            </div>
            <div class="actions" style="justify-content: flex-end; margin-top: 10px;">
              <button class="btn primary" type="submit">Login</button>
            </div>
          </form>
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
