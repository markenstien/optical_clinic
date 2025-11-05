<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign Up - Mica Aesthetic Clinic</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo _path_asset('main-assets/styles.css?v=1'); ?>" />
    <style>
      body{background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.4)), url('<?php echo _path_asset('main-assets/img/solo background.jpg')?>') center/cover no-repeat fixed; background-size:cover} .auth-wrap{min-height:100vh; display:flex; flex-direction:column}
      .lp-header{background:#0f0f0f; color:#fff; border-bottom:1px solid rgba(255,255,255,.06)}
      .lp-nav{max-width:960px; margin:0 auto; padding:14px 16px; display:flex; align-items:center; gap:12px}
      .brand{display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none}
      .brand .logo{width:28px;height:28px;border-radius:50%; background:transparent; object-fit:cover}
      .spacer{flex:1}
      .container{max-width:960px; margin:0 auto; padding:18px 16px}
      .center{display:flex; align-items:center; justify-content:center; padding:40px 0}
      .auth-card{width:min(560px, 96vw)}
      .auth-card h1{margin:0 0 8px 0; color:#3b2b1f}
      .auth-sub{color:#5a5047; margin-bottom:16px}
      .form-grid{display:grid; grid-template-columns:1fr 1fr; gap:12px}
      .form-grid .full{grid-column:1/-1}
      .actions{display:flex; align-items:center; justify-content:space-between; margin-top:10px}
      .link{color:var(--primary); text-decoration:none}
      @media (max-width:680px){ .form-grid{grid-template-columns:1fr} }
    </style>
  </head>
  <body>
    <div class="auth-wrap">
      <header class="lp-header">
        <nav class="lp-nav">
          <a class="brand" href="<?php echo _route('page:index'); ?>">
            <img class="logo" src="<?php echo _path_asset('main-assets/img/new logo.jpg'); ?>" alt="MICA" />
            <strong>MICA</strong>
          </a>
          <div class="spacer"></div>
          <a class="btn" href="<?php echo _route('page:login'); ?>" style="background:rgba(255,255,255,.1); color:#fff; border-color:rgba(255,255,255,.18)">Login</a>
        </nav>
      </header>

      <main class="container center">
        <section class="card auth-card">
          <h1>Create User Account</h1>
          <div class="auth-sub">Sign up to book appointments and manage your profile.</div>
          <?php Flash::show()?>
          <form method="post" class="profile-form" action="<?php echo _route('user:register')?>">
            <input type="hidden" value="from_another_form">
            <input type="hidden" value="customer" name="user_type">
            <div class="form-grid">
              <label><span>First Name *</span>
                <?php
                  Form::text('first_name', $_POST['first_name'] ?? '', [
                    'required' => true
                  ]);
                ?>
              </label>
              <label><span>Last Name *</span>
                <?php
                  Form::text('last_name', $_POST['last_name'] ?? '', [
                    'required' => true
                  ]);
                ?>
              </label>
              <label><span>Phone</span>
                <?php
                  Form::text('phone', $_POST['phone'] ?? '', [
                  ]);
                ?>
              </label>
              <label><span>Email *</span>
                <?php
                  Form::email('email', $_POST['email'] ?? '', [
                    'required' => true
                  ]);
                ?>
              </label>
              <label>
                <span>Gender *</span>
                <select name="gender" required>
                  <option value="" <?php echo (!isset($_POST['gender']) || $_POST['gender'] === '') ? 'selected' : ''; ?>>-- Select Gender --</option>
                  <option value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                  <option value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>
              </label>
              <label class="password-field">
                <span>Password *</span>
                <div style="position: relative;">
                  <?php
                    Form::email('password', $_POST['password'] ?? '', [
                      'required' => true,
                      'id' => 'password',
                      'style' => 'padding-right: 40px; width: 100%;'
                    ]);
                  ?>

                  <!-- <input type="password" name="password" id="password" required style="padding-right: 40px; width: 100%;" /> -->

                  <button type="button" class="toggle-password" data-target="password" aria-label="Show password" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #666; cursor: pointer; padding: 5px;">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
              </label>
              <label class="password-field">
                <span>Confirm Password *</span>
                <div style="position: relative;">
                  <input type="password" name="confirm" id="confirm" required style="padding-right: 40px; width: 100%;" />
                  <button type="button" class="toggle-password" data-target="confirm" aria-label="Show password" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #666; cursor: pointer; padding: 5px;">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
              </label>
              <div class="full">
                <div id="password-feedback" style="display: none; background:#ffeaea; border:1px solid #ffb3b3; color:#cc3f3f; padding:8px 12px; border-radius:6px; margin-top:8px; font-size:13px; font-weight:500;">
                  <i class="fas fa-exclamation-triangle" style="margin-right:6px;"></i>
                  <span id="feedback-text"></span>
                </div>
                <div class="password-requirements" style="font-size: 12px; color: #666; margin-top: 8px; line-height: 1.4;">
                  Password must contain:
                  <ul style="margin: 2px 0 0 16px; padding: 0;">
                    <li id="req-length" style="color: #cc3f3f;">✗ Minimum 8 characters</li>
                    <li id="req-number" style="color: #cc3f3f;">✗ At least 1 number (0-9)</li>
                    <li id="req-special" style="color: #cc3f3f;">✗ At least 1 special character (!@#$%^&*)</li>
                  </ul>
                </div>
              </div>
              
              <script>
              // Password toggle functionality
            document.querySelectorAll('.toggle-password').forEach(button => {
              button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
              });
            });

            document.getElementById('password').addEventListener('input', function() {
                const password = this.value;
                const feedback = document.getElementById('password-feedback');
                const feedbackText = document.getElementById('feedback-text');
                const lengthReq = document.getElementById('req-length');
                const numberReq = document.getElementById('req-number');
                const specialReq = document.getElementById('req-special');
                
                let errors = [];
                let hasLength = password.length >= 8;
                let hasNumber = /[0-9]/.test(password);
                let hasSpecial = /[!@#$%^&*()_+\-=\[\]{};":,.\/<>?]/.test(password);
                
                // Update requirement indicators
                if (hasLength) {
                  lengthReq.style.color = '#2d7a3d';
                  lengthReq.innerHTML = '✓ Minimum 8 characters';
                } else {
                  lengthReq.style.color = '#cc3f3f';
                  lengthReq.innerHTML = '✗ Minimum 8 characters';
                  if (password.length > 0) errors.push('at least 8 characters');
                }
                
                if (hasNumber) {
                  numberReq.style.color = '#2d7a3d';
                  numberReq.innerHTML = '✓ At least 1 number (0-9)';
                } else {
                  numberReq.style.color = '#cc3f3f';
                  numberReq.innerHTML = '✗ At least 1 number (0-9)';
                  if (password.length > 0) errors.push('at least 1 number');
                }
                
                if (hasSpecial) {
                  specialReq.style.color = '#2d7a3d';
                  specialReq.innerHTML = '✓ At least 1 special character (!@#$%^&*)';
                } else {
                  specialReq.style.color = '#cc3f3f';
                  specialReq.innerHTML = '✗ At least 1 special character (!@#$%^&*)';
                  if (password.length > 0) errors.push('at least 1 special character');
                }
                
                // Show feedback message
                if (password.length > 0 && errors.length > 0) {
                  feedbackText.textContent = 'Password must contain ' + errors.join(', ') + '.';
                  feedback.style.display = 'block';
                } else {
                  feedback.style.display = 'none';
                }
              });
              </script>
            </div>
            <div class="actions">
              <a class="link" href="<?php echo _route('page:index')?>">Back to Home</a>
              <button class="btn primary" type="submit">Create Account</button>
            </div>
          </form>
        </section>
      </main>
    </div>
  </body>
</html>
