<?php
  $globalKey = _asset_key('PRODUCT_IMAGES');
  $services = db_get_service_bundles([
    'is_visible' => true
  ]);
  $maxServicesDisplay = 4;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes" />
    <meta name="theme-color" content="#0f0f0f" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <title>Mica - Aesthetic Clinic</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
    integrity="sha512-7QJ4zv3A2r37n5zS9V3V1Z2O3aAqg2h3m9qf0xvA1Yx9jUu5Hq6b3e8uoB+eQ4oQvI3o5M6s1qO1s3n6jB5B7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      :root{
        /* Align with admin.php earthy palette */
        --lp-bg:#f6efe6; /* matches styles.css --bg */
        --lp-surface:#fffaf3; /* matches styles.css --panel */
        --lp-text:#1f1a14; /* styles.css --text */
        --lp-muted:#5a5047; /* styles.css --muted */
        --lp-line:#e3d7c9; /* styles.css --line */
        --lp-primary:#9a6f46; /* styles.css --primary */
        --lp-header:#0f0f0f; /* header dark */
      }
      html,body{background:var(--lp-bg); color:var(--lp-text); font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;}
      .container{max-width:1200px;margin:0 auto;padding:0 16px}

      /* Header / Nav */
      .lp-header{position:sticky; top:0; z-index:40; background:#0f0f0f; color:#fff; border-bottom:1px solid rgba(255,255,255,.06)}
      .lp-nav{max-width:1200px; margin:0 auto; padding:12px 16px; display:flex; align-items:center; justify-content:space-between}
      .brand{display:flex; align-items:center; gap:10px; font-weight:800; letter-spacing:.4px; order:2}
      .brand .logo{width:40px;height:40px;border-radius:50%; background:transparent; object-fit:cover; display:block}
      .brand .name{font-weight:800; color:#e6d6c4}
      .nav-links{display:flex; align-items:center; gap:18px; order:1}
      .nav-links a{color:#fff; text-decoration:none; font-weight:500; opacity:.9; transition:opacity 0.2s ease}
      .nav-links a:hover{opacity:1}
      .nav-actions{display:flex; align-items:center; gap:8px; order:3}
      /* Enhanced CTA Button (Sign Up) */
      .cta-btn{
        background:linear-gradient(135deg, var(--lp-primary) 0%, #d4955f 50%, #b8824a 100%); 
        color:#fff; 
        border:1px solid var(--lp-primary); 
        padding:12px 24px; 
        border-radius:25px; 
        font-weight:700; 
        box-shadow:0 8px 25px rgba(154,111,70,.4); 
        transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration:none;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        position:relative;
        overflow:hidden;
        transform:translateY(0);
        letter-spacing:0.5px;
        text-transform:uppercase;
        font-size:14px;
      }
      .cta-btn::before{
        content:'';
        position:absolute;
        top:0;
        left:-100%;
        width:100%;
        height:100%;
        background:linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition:left 0.5s ease;
      }
      .cta-btn:hover::before{
        left:100%;
      }
      .cta-btn:hover{
        transform:translateY(-3px) scale(1.02);
        box-shadow:0 12px 35px rgba(154,111,70,.5);
        filter:brightness(1.1) saturate(1.1);
      }
      .cta-btn:active{
        transform:translateY(-1px) scale(0.98);
        box-shadow:0 6px 20px rgba(154,111,70,.35);
      }
      
      /* Subtle pulse animation for CTA button */
      @keyframes ctaPulse {
        0%, 100% { box-shadow:0 8px 25px rgba(154,111,70,.4); }
        50% { box-shadow:0 10px 30px rgba(154,111,70,.5); }
      }
      .cta-btn{
        animation:ctaPulse 3s ease-in-out infinite;
      }
      /* Enhanced Hamburger Button */
      .hamburger{
        display:none; 
        background:rgba(255,255,255,.08); 
        color:#fff; 
        border:1px solid rgba(255,255,255,.12); 
        width:44px; 
        height:44px; 
        border-radius:8px; 
        align-items:center; 
        justify-content:center; 
        cursor:pointer; 
        transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position:relative;
        overflow:hidden;
      }
      .hamburger::before{
        content:'';
        position:absolute;
        inset:0;
        background:rgba(255,255,255,.1);
        border-radius:8px;
        transform:scale(0);
        transition:transform 0.3s ease;
      }
      .hamburger:hover::before{
        transform:scale(1);
      }
      .hamburger:hover{
        background:rgba(255,255,255,.15);
        transform:scale(1.05);
        box-shadow:0 4px 12px rgba(0,0,0,.2);
      }
      .hamburger.active{
        background:var(--lp-primary);
        transform:rotate(90deg);
        box-shadow:0 6px 16px rgba(154,111,70,.3);
      }
      .hamburger:active{
        transform:scale(0.95);
      }
      .mobile-menu{display:none; flex-direction:column; gap:12px; padding:16px; background:#121212; border-top:1px solid rgba(255,255,255,.06); position:absolute; top:100%; left:0; right:0; box-shadow:0 4px 12px rgba(0,0,0,.3)}
      .mobile-menu.show{display:flex; animation:slideDown 0.3s ease}
      .mobile-menu a{color:#fff; text-decoration:none; opacity:.9; padding:12px 16px; border-radius:8px; transition:all 0.2s ease}
      .mobile-menu a:hover{opacity:1; background:rgba(255,255,255,.08)}
      @keyframes slideDown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}

      /* Hero with Carousel */
      .hero{position:relative; color:#fff; border-bottom:1px solid var(--lp-line); min-height:85vh; overflow:hidden}
      .hero-carousel{position:absolute; inset:0; z-index:0}
      .hero-slide{position:absolute; inset:0; opacity:0; transition:opacity 1.5s ease-in-out; background-size:cover; background-position:center center; background-repeat:no-repeat}
      .hero-slide.active{opacity:1}
      .hero-slide::before{content:''; position:absolute; inset:0; background:linear-gradient(180deg, rgba(0,0,0,.5), rgba(0,0,0,.4))}
      .hero .inner{position:relative; z-index:1; max-width:1200px; margin:0 auto; padding:120px 16px; text-align:center; display:flex; flex-direction:column; align-items:center; justify-content:center; min-height:85vh}
      .hero h1{font-size:64px; line-height:1.1; margin:0 0 20px 0; font-weight:800; letter-spacing:1.5px; text-shadow:3px 3px 12px rgba(0,0,0,.7)}
      .hero p{max-width:750px; margin:0 auto 28px auto; color:#fff; font-size:20px; line-height:1.7; font-weight:400; text-shadow:2px 2px 6px rgba(0,0,0,.6)}
      .hero-actions{display:flex; gap:14px; justify-content:center}
      .carousel-dots{position:absolute; bottom:30px; left:50%; transform:translateX(-50%); z-index:2; display:flex; gap:10px}
      .carousel-dot{
        width:12px; 
        height:12px; 
        border-radius:50%; 
        background:rgba(255,255,255,.5); 
        border:2px solid rgba(255,255,255,.7); 
        cursor:pointer; 
        transition:all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        box-shadow:0 2px 8px rgba(0,0,0,.3);
        position:relative;
        overflow:hidden;
      }
      .carousel-dot::before{
        content:'';
        position:absolute;
        inset:0;
        background:rgba(255,255,255,.3);
        border-radius:50%;
        transform:scale(0);
        transition:transform 0.3s ease;
      }
      .carousel-dot:hover::before{
        transform:scale(1);
      }
      .carousel-dot:hover{
        background:rgba(255,255,255,.8); 
        transform:scale(1.2);
        box-shadow:0 4px 15px rgba(0,0,0,.4);
      }
      .carousel-dot.active{
        background:rgba(255,255,255,.95); 
        transform:scale(1.4); 
        border-color:#fff;
        box-shadow:0 6px 20px rgba(0,0,0,.5);
      }
      /* Enhanced Button Styles with Animations */
      .btn{
        background:#fff; 
        border:1px solid var(--lp-line); 
        color:#3b2b1f; 
        padding:12px 20px; 
        border-radius:12px; 
        cursor:pointer; 
        transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        font-weight:600;
        position:relative;
        overflow:hidden;
        transform:translateY(0);
        box-shadow:0 4px 12px rgba(0,0,0,0.08);
        text-decoration:none;
        display:inline-flex;
        align-items:center;
        justify-content:center;
      }
      .btn::before{
        content:'';
        position:absolute;
        top:0;
        left:-100%;
        width:100%;
        height:100%;
        background:linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition:left 0.6s ease;
      }
      .btn:hover::before{
        left:100%;
      }
      .btn:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 25px rgba(0,0,0,0.15);
        filter:brightness(1.05);
      }
      .btn:active{
        transform:translateY(0) scale(0.98);
        box-shadow:0 2px 8px rgba(0,0,0,0.1);
      }
      .btn.primary{
        background:linear-gradient(135deg, var(--lp-primary) 0%, #b8824a 100%); 
        border-color:var(--lp-primary); 
        color:#fff;
        box-shadow:0 6px 20px rgba(154,111,70,0.25);
      }
      .btn.primary:hover{
        box-shadow:0 10px 30px rgba(154,111,70,0.35);
        transform:translateY(-3px);
      }
      .btn.ghost{
        background:rgba(255,255,255,0.1); 
        color:#fff; 
        border-color:rgba(255,255,255,.4);
        backdrop-filter:blur(10px);
      }
      .btn.ghost:hover{
        background:rgba(255,255,255,0.2);
        border-color:rgba(255,255,255,.6);
      }

      /* Services */
      .section{padding:56px 0}
      .section h2{margin:0 0 8px 0; font-size:28px; color:#3b2b1f}
      .section p.lead{color:var(--lp-muted); margin:0 0 24px 0}
      .services{display:grid; grid-template-columns:repeat(4,1fr); gap:20px; margin-bottom:24px}
      .service{
        background:#fff; 
        border:1px solid var(--lp-line); 
        border-radius:16px; 
        padding:0; 
        text-align:center; 
        box-shadow:0 6px 18px rgba(0,0,0,.06); 
        overflow:hidden;
        transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor:pointer;
        transform:translateY(0);
      }
      .service:hover{
        transform:translateY(-8px);
        box-shadow:0 15px 35px rgba(0,0,0,.12);
        border-color:var(--lp-primary);
      }
      .service:active{
        transform:translateY(-4px) scale(0.98);
      }
      .service .service-img{
        width:100%; 
        height:200px; 
        object-fit:cover; 
        display:block;
        transition:transform 0.3s ease;
      }
      .service:hover .service-img{
        transform:scale(1.05);
      }
      .service .service-content{padding:18px}
      .service h3{margin:0 0 8px 0; font-size:16px; color:#3b2b1f; font-weight:600}
      .service p{margin:0; color:var(--lp-muted); font-size:13px; line-height:1.5}
      
      /* Staggered entrance animation for services */
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      .service {
        animation: fadeInUp 0.6s ease-out forwards;
      }
      .service:nth-child(1) { animation-delay: 0.1s; }
      .service:nth-child(2) { animation-delay: 0.2s; }
      .service:nth-child(3) { animation-delay: 0.3s; }
      .service:nth-child(4) { animation-delay: 0.4s; }

      /* About */
      .about{display:grid; grid-template-columns:1.2fr .8fr; gap:18px; align-items:center}
      .about .images{display:grid; grid-template-columns:1fr 1fr; gap:12px}
      .img-card{border-radius:14px; overflow:hidden; border:1px solid var(--lp-line); box-shadow:0 10px 28px rgba(0,0,0,.08)}
      .img-card img{display:block; width:100%; height:100%; object-fit:cover}
      .about .text{background:var(--lp-surface); border:1px solid var(--lp-line); border-radius:16px; padding:20px}

      /* Footer */
      footer{background:#0f0f0f; color:#fff; margin-top:40px; border-top:1px solid rgba(255,255,255,.06)}
      .footer-inner{max-width:1200px; margin:0 auto; padding:28px 16px; display:grid; grid-template-columns:2fr 1fr 1fr; gap:18px}
      .footer-links{display:flex; flex-direction:column; gap:8px}
      .social{display:flex; gap:10px; margin-top:10px}
      .social a{width:32px; height:32px; display:inline-flex; align-items:center; justify-content:center; color:#fff; border:1px solid rgba(255,255,255,.14); border-radius:8px}

      /* Modal */
      .modal{position:fixed; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(0,0,0,.45)}
      .modal[aria-hidden="true"]{display:none}
      .modal-content{background:#fff; border:1px solid var(--lp-line); border-radius:16px; padding:16px; width:min(560px,92vw); box-shadow:0 18px 40px rgba(0,0,0,.22); color:#3b2b1f}
      .modal-content h3{margin:0 0 12px 0}
      .form-grid{display:grid; grid-template-columns:1fr 1fr; gap:12px}
      .form-grid label{display:flex; flex-direction:column; gap:6px}
      .form-grid textarea{min-height:100px}
      .form-actions{margin-top:10px; display:flex; justify-content:flex-end; gap:10px}

      /* Tables */
      .table-wrap{overflow:auto;border:1px solid var(--line);border-radius:12px;background:#fff}
      .table-wrap{max-height:65vh}
      .table-wrap::-webkit-scrollbar{width:12px}
      .table-wrap::-webkit-scrollbar-track{background:#2b2b2b;border-left:1px solid #1f1f1f}
      .table-wrap::-webkit-scrollbar-thumb{background:#9f9f9f;border-radius:10px;border:2px solid #2b2b2b}
      .table-wrap::-webkit-scrollbar-thumb:hover{background:#b8b8b8}
      .table-wrap{scrollbar-width:thin; scrollbar-color:#9f9f9f #2b2b2b}
      .table{width:100%;border-collapse:collapse}
      .table th,.table td{padding:10px 12px;border-bottom:1px solid var(--line);text-align:left;color:#3b2b1f}
      .table thead th{position:sticky;top:0;background:#0f0f0f;color:#fff}
      .table a{color:#3b2b1f;text-decoration:none}
      .table a:hover{color:var(--primary);text-decoration:underline}
      tr.selected{background:#fbf5ee}

      /* Responsive Design - Mobile First */
      @media (max-width: 960px){
        .services{grid-template-columns:repeat(2,1fr)}
        .about{grid-template-columns:1fr}
        .footer-inner{grid-template-columns:1fr 1fr; gap:24px}
      }
      
      @media (max-width: 768px){
        /* Navigation */
        .lp-nav{padding:10px 12px; position:relative}
        .nav-links{display:none}
        .hamburger{display:inline-flex; order:1}
        .brand{order:2; margin:0 auto}
        .nav-actions{order:3}
        
        /* Layout */
        .services{grid-template-columns:1fr; gap:16px}
        .container{padding:0 12px}
        .section{padding:40px 0}
        
        /* Hero Section */
        .hero .inner{padding:80px 16px 60px}
        .hero h1{font-size:36px; line-height:1.2; margin-bottom:16px}
        .hero p{font-size:17px; margin-bottom:28px; line-height:1.6}
        .hero-actions{gap:12px; justify-content:center; flex-wrap:wrap}
        
        /* Services */
        .service .service-img{height:200px}
        .service{margin-bottom:16px}
        
        /* About Section */
        .about .images{grid-template-columns:1fr; gap:16px}
        .about .text{padding:16px}
        
        /* Buttons */
        .btn{padding:12px 20px; font-size:16px; min-height:48px; display:flex; align-items:center; justify-content:center}
        .cta-btn{padding:12px 20px; min-height:48px}
        
        /* Header Elements */
        .brand .logo{width:36px; height:36px}
        .brand .name{font-size:16px}
        
        /* Carousel */
        .carousel-dots{bottom:20px}
        .carousel-dot{width:12px; height:12px}
        
        /* Forms */
        .form-grid{grid-template-columns:1fr}
        .modal-content{width:min(400px,90vw); margin:20px}
        
        /* Footer */
        .footer-inner{grid-template-columns:1fr; gap:20px; text-align:center}
      }
      
      @media (max-width: 480px){
        /* Hero adjustments for small screens */
        .hero h1{font-size:28px; letter-spacing:1px}
        .hero p{font-size:16px; line-height:1.5}
        .hero .inner{padding:60px 12px 40px}
        .hero-actions{flex-direction:column; gap:12px; width:100%; max-width:280px; margin:0 auto}
        .hero-actions .btn{width:100%; text-align:center; padding:14px 20px}
        
        /* Typography */
        .section{padding:32px 0}
        .section h2{font-size:22px}
        .service h3{font-size:15px}
        .service p{font-size:13px; line-height:1.4}
        
        /* UI Elements */
        .modal-content{padding:16px; margin:16px; width:min(340px,92vw)}
        .brand .name{font-size:15px}
        .hamburger{width:40px; height:40px}
        .carousel-dot{width:10px; height:10px}
        
        /* Improved spacing */
        .container{padding:0 8px}
        .services{gap:12px}
      }
      
      /* Touch device optimizations */
      @media (hover: none) and (pointer: coarse) {
        .btn, .cta-btn{padding:14px 20px; font-size:16px; min-height:48px}
        .hamburger{width:48px; height:48px}
        .service{transition:transform 0.2s ease}
        .service:active{transform:scale(0.98)}
        .carousel-dot{width:16px; height:16px; border-width:3px}
        .nav-links a, .mobile-menu a{padding:12px 16px; min-height:44px; display:flex; align-items:center}
        .mobile-menu a:active{background:rgba(255,255,255,.15); transform:scale(0.98)}
        .btn:active, .cta-btn:active{transform:scale(0.98)}
      }
      
      /* Mobile menu animations */
      .mobile-menu{transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1)}
      .hamburger .fa-bars, .hamburger .fa-times{transition:all 0.3s ease}
      
      /* Accessibility improvements */
      .btn:focus, .cta-btn:focus, .hamburger:focus{
        outline:2px solid var(--lp-primary); outline-offset:2px
      }
      .nav-links a:focus, .mobile-menu a:focus{
        outline:2px solid rgba(255,255,255,.5); outline-offset:2px
      }
      
      /* Prevent zoom on input focus for iOS */
      @media screen and (-webkit-min-device-pixel-ratio:0) {
        select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"] {
          font-size: 16px;
        }
      }
      
      /* Reduce motion for accessibility */
      @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
          animation-duration: 0.01ms !important;
          animation-iteration-count: 1 !important;
          transition-duration: 0.01ms !important;
        }
        .hero-slide{transition:none !important}
        .mobile-menu{transition:none !important}
      }

      .success-banner{position:fixed; bottom:16px; left:50%; transform:translateX(-50%); background:#1f7a1f; color:#fff; padding:10px 14px; border-radius:10px; box-shadow:0 10px 28px rgba(0,0,0,.2)}
    </style>
  </head>
  <body>
    <header class="lp-header">
      <nav class="lp-nav">
        <button class="hamburger" id="hamburger" aria-label="Toggle Menu" aria-expanded="false">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="brand">
          <img class="logo" src="<?php echo _path_asset('main-assets/img/new logo.jpg') ?>" alt="MICA logo" />
          <div class="name">MICA</div>
        </div>
        <div class="nav-actions">
          <a class="btn" href="<?php echo _route('page:login')?>" id="loginBtn" style="background:rgba(255,255,255,.1); color:#fff; border-color:rgba(255,255,255,.18)">Login</a>
          <a class="cta-btn" href="<?php echo _route('page:register')?>" id="signupBtn">Sign Up</a>
        </div>
        <div class="nav-links" id="navLinks">
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#services">Services</a>
          <a href="#contact">Contact</a>
        </div>
      </nav>
      <div class="mobile-menu" id="mobileMenu">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#contact">Contact</a>
        <div style="display:flex; flex-direction:column; gap:8px; margin-top:12px;">
          <a href="auth/user-login.php" class="btn" style="background:rgba(255,255,255,.1); color:#fff; border-color:rgba(255,255,255,.18); text-align:center">Login</a>
          <a href="auth/signup.php" class="cta-btn" style="text-align:center">Sign Up</a>
        </div>
      </div>
    </header>

    <!-- Hero -->
    <section id="home" class="hero">
      <div class="hero-carousel">
        <div class="hero-slide active" style="background-image: url('<?php echo _path_public('assets/main-assets/img/solo background.jpg') ?>')"></div>
        <div class="hero-slide" style="background-image: url('<?php echo _path_public('assets/main-assets/img/bg.jpg') ?>')"></div>
      </div>
      <div class="carousel-dots">
        <div class="carousel-dot active" data-slide="0"></div>
        <div class="carousel-dot" data-slide="1"></div>
      </div>
      <div class="inner">
        <h1>MICA AESTHETIC CLINIC</h1>
        <p>Enhancing natural beauty with precision and care, our clinic is dedicated to helping you look and feel your best. Where expertise meets artistry, for a radiant you.</p>
        <div class="hero-actions">
          <a class="btn primary" href="#services">All Services</a>
          <a class="btn ghost" href="#about">Other Features</a>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section id="services" class="section">
      <div class="container">
        <h2>Our Services</h2>
        <p class="lead">Advanced Aesthetic Treatments by Expert Hands.</p>
        <div class="services">
          <?php foreach($services as $key => $service) :?>
            <?php
                if($key > 3) break;
                $image = db_get_images($globalKey, $service->id)[0]->full_url ?? '';
                $defaultImage = _path_asset('main-assets/img/Brown And Cream Beige Beauty Facial Skincare Instagram Story.png');
              ?>
            <div class="service">
              <img class="service-img" src="<?php echo  $image == '' ? $defaultImage : $image?>" alt="RF Facial" />
              <div class="service-content">
                <h3><?php echo $service->name?></h3>
                <p><?php echo $service->description?></p>
              </div>
            </div>
          <?php endforeach?>
        </div>
        <div style="text-align:center; margin-top:24px;">
          <a href="#" class="btn primary" id="viewAllBtn" style="padding:12px 32px; font-size:16px;">View All Services</a>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="section">
      <div class="container about">
        <div class="images">
          <div class="img-card"><img alt="Doctor Team" src="<?php echo _path_asset('main-assets/img/4 doc.jpg')?>" /></div>
          <div class="img-card"><img alt="Doctor" src="<?php echo _path_asset('main-assets/img/solo doc.jpg')?>" /></div>
        </div>
        <div class="text">
          <h2>We are Mica Aesthetic Clinic — your trusted partner in beauty and confidence.</h2>
          <p class="lead">Our mission is to empower every individual to look and feel their best through expert care and innovative aesthetic solutions.</p>
          <p>With state-of-the-art facilities and a team of skilled professionals, we offer a full range of treatments — from rejuvenating skincare and laser procedures to advanced non-surgical enhancements. At Mica Aesthetic Clinic, your safety, satisfaction, and confidence are at the heart of everything we do.</p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
      <div class="footer-inner">
        <div>
          <div style="font-weight:800; margin-bottom:8px">MICA</div>
          <div style="opacity:.9">Aesthetic Clinic</div>
          <div class="social">
            <a href="https://www.facebook.com/share/1CEW5YoshU/?mibextid=wwXIfr" aria-label="Facebook" target="_blank" rel="noopener">
              <!-- Facebook circular blue icon -->
              <svg width="24" height="24" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="24" cy="24" r="24" fill="#1877F2"/>
                <path d="M26.7 16.8h3.4V12h-3.9c-4.7 0-6.7 2.9-6.7 6.2v3.1h-3.1v4.7h3.1V36h4.9v-9.9h3.8l.7-4.7h-4.5v-2.4c0-1.4.7-2.2 2.3-2.2z" fill="#fff"/>
              </svg>
            </a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div>
          <div style="font-weight:700; margin-bottom:8px">Quick Links</div>
          <div class="footer-links">
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
          </div>
        </div>
        <div>
          <div style="font-weight:700; margin-bottom:8px">Contact</div>
          <div>
            <a href="https://www.google.com/maps?q=0069+National+Rd.+Kalawaan+Binangonan+Rizal,+Binangonan,+Philippines" target="_blank" rel="noopener" style="color:#fff; text-decoration:underline">0069 National Rd. Kalawaan Binangonan Rizal, Binangonan, Philippines</a>
          </div>
          <div>(+63) 995 322 5898</div>
        </div>
      </div>
    </footer>

    <!-- Appointment Modal -->
    <div class="modal" id="aptModal" aria-hidden="true" role="dialog" aria-labelledby="aptTitle">
      <div class="modal-content">
        <h3 id="aptTitle">Get Appointment</h3>
        <form method="post" action="admin/appointment.php">
          <input type="hidden" name="publicLanding" value="1" />
          <div class="form-grid">
            <label>
              <span>Name</span>
              <input name="name" required />
            </label>
            <label>
              <span>Email</span>
              <input type="email" name="email" required />
            </label>
            <label>
              <span>Phone</span>
              <input name="phone" required />
            </label>
            <label>
              <span>Service</span>
              <select name="service" required>
                <option value="Liposuction">Liposuction</option>
                <option value="Non-Surgical">Non-Surgical</option>
                <option value="Breast Implants">Breast Implants</option>
                <option value="Lipo Surgery">Lipo Surgery</option>
                <option value="Powder Linty">Powder Linty</option>
              </select>
            </label>
            <label style="grid-column:1/-1">
              <span>Message</span>
              <textarea name="message" placeholder="Tell us your goals or questions..."></textarea>
            </label>
          </div>
          <div class="form-actions">
            <button class="btn" type="button" data-close>Cancel</button>
            <button class="btn primary" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Services Gallery Modal -->
    <div class="modal" id="galleryModal" aria-hidden="true" role="dialog" aria-labelledby="galleryTitle">
      <div class="modal-content" style="width:min(1200px,96vw); max-height:90vh; overflow:auto">
        <h3 id="galleryTitle">All Services</h3>
        <table class="table">
          <thead>
            <th>Service</th>
            <th>Price</th>
            <th>Description</th>
          </thead>
          <tbody>
            <?php foreach($services as $key => $service) :?>
              <tr>
                <td><?php echo $service->name?></td>
                <td><?php echo $service->price_custom?></td>
                <td><?php echo $service->description?></td>
              </tr>
            <?php endforeach?>
          </tbody>
        </table>
        <div class="form-actions"><button class="btn" type="button" data-close>Close</button></div>
      </div>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
      <div class="success-banner" id="successBanner">Your appointment request was sent. We'll contact you shortly.</div>
    <?php endif; ?>

    <script>
      // Enhanced Mobile menu toggle
      const hamburger = document.getElementById('hamburger');
      const mobileMenu = document.getElementById('mobileMenu');
      const hamburgerIcon = hamburger?.querySelector('i');
      
      function toggleMobileMenu() {
        const isOpen = mobileMenu.classList.contains('show');
        
        if (isOpen) {
          mobileMenu.classList.remove('show');
          hamburger.classList.remove('active');
          hamburger.setAttribute('aria-expanded', 'false');
          hamburgerIcon.className = 'fa-solid fa-bars';
          document.body.style.overflow = '';
        } else {
          mobileMenu.classList.add('show');
          hamburger.classList.add('active');
          hamburger.setAttribute('aria-expanded', 'true');
          hamburgerIcon.className = 'fa-solid fa-times';
          document.body.style.overflow = 'hidden';
        }
      }
      
      hamburger && hamburger.addEventListener('click', toggleMobileMenu);
      
      // Close mobile menu when clicking on links
      const mobileMenuLinks = mobileMenu?.querySelectorAll('a');
      mobileMenuLinks?.forEach(link => {
        link.addEventListener('click', () => {
          if (mobileMenu.classList.contains('show')) {
            toggleMobileMenu();
          }
        });
      });
      
      // Close mobile menu on window resize
      window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && mobileMenu?.classList.contains('show')) {
          toggleMobileMenu();
        }
      });
      
      // Close mobile menu on escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenu?.classList.contains('show')) {
          toggleMobileMenu();
        }
      });

      // Modals open/close
      const modal = document.getElementById('aptModal');
      function openModal(){ modal && modal.setAttribute('aria-hidden','false'); }
      function closeModal(){ modal && modal.setAttribute('aria-hidden','true'); }
      document.getElementById('openModal')?.addEventListener('click', openModal);
      document.getElementById('openModal2')?.addEventListener('click', openModal);
      document.getElementById('openModalMobile')?.addEventListener('click', function(e){ e.preventDefault(); openModal(); });

      const galleryModal = document.getElementById('galleryModal');
      const viewAllBtn = document.getElementById('viewAllBtn');
      function openGallery(){ galleryModal && galleryModal.setAttribute('aria-hidden','false'); }
      function closeGallery(){ galleryModal && galleryModal.setAttribute('aria-hidden','true'); }
      viewAllBtn && viewAllBtn.addEventListener('click', function(e){ e.preventDefault(); openGallery(); });

      // Close gallery when clicking the overlay or any image
      galleryModal && galleryModal.addEventListener('click', function(e){
        if (e.target === galleryModal) { closeGallery(); }
      });
      galleryModal && galleryModal.querySelectorAll('img').forEach(function(img){
        img.addEventListener('click', closeGallery);
      });

      document.querySelectorAll('[data-close]').forEach(btn=>btn.addEventListener('click', function(){ closeModal(); closeGallery(); }));
      document.addEventListener('keydown', (e)=>{ if (e.key==='Escape') { closeModal(); closeGallery(); } });

      // Auto-hide success banner
      const sb = document.getElementById('successBanner');
      if (sb) setTimeout(()=> sb.remove(), 2600);

      // Hero Carousel
      (function() {
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.carousel-dot');
        let currentSlide = 0;
        const slideCount = slides.length;

        function showSlide(index) {
          slides.forEach(slide => slide.classList.remove('active'));
          dots.forEach(dot => dot.classList.remove('active'));
          
          slides[index].classList.add('active');
          dots[index].classList.add('active');
        }

        function nextSlide() {
          currentSlide = (currentSlide + 1) % slideCount;
          showSlide(currentSlide);
        }

        // Auto-advance every 5 seconds
        setInterval(nextSlide, 5000);

        // Dot click handlers
        dots.forEach((dot, index) => {
          dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
          });
        });
      })();
    </script>
  </body>
</html>
