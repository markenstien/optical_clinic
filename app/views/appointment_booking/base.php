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
      
      /* Subtle pulse animation for CTA button */
      @keyframes ctaPulse {
        0%, 100% { box-shadow:0 8px 25px rgba(154,111,70,.4); }
        50% { box-shadow:0 10px 30px rgba(154,111,70,.5); }
      }
      .cta-btn{
        animation:ctaPulse 3s ease-in-out infinite;
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

        /* Cards and surfaces */
    .card{padding:12px;border-radius:12px}
    .card-header{flex-direction:column;align-items:flex-start;gap:8px}
    .card{background:var(--panel);border:1px solid var(--line);border-radius:16px;padding:14px 14px 16px;box-shadow:0 6px 18px rgba(0,0,0,.06)}
    .card+.card{margin-top:16px}
    .card-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
    .card-header h2{margin:0;font-size:16px;color:#3b2b1f}
    .card{
        background: #fff;
        border-radius: 24px;
        padding: 28px;
        box-shadow: 0 4px 20px rgba(0,0,0,.06);
        border: 1px solid rgba(255,255,255,0.8);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .card-header {
    padding: 28px 32px 24px;
    border-bottom: 1px solid #f1f3f4;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    }
    .header-content h2 {
    margin: 0 0 4px 0;
    color: #2c3e50;
    font-size: 24px;
    font-weight: 700;
    }
    .header-subtitle {
    margin: 0;
    color: #6c757d;
    font-size: 14px;
    opacity: 0.8;
    }

    .form-control {
      width: 100%;
      padding: 12px;
      border-radius: 5px;
      border: 1px solid #eee;
    }

    div.form-group{
      margin-bottom: 8px;
    }

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

    <?php produce('styles')?>
  </head>
  <body>
    <header class="lp-header">
      <nav class="lp-nav">
        <div class="brand">
          <img class="logo" src="<?php echo _path_asset('main-assets/img/new logo.jpg') ?>" alt="MICA logo" />
          <div class="name">MICA</div>
        </div>
        <?php if(!whoIs()):?>
        <div class="nav-actions">
          <a class="btn" href="<?php echo _route('page:login')?>" id="loginBtn" 
            style="background:rgba(255,255,255,.1); color:#fff; border-color:rgba(255,255,255,.18)">Login</a>
          <a class="btn" href="<?php echo _route('page:register')?>"
            style="background:rgba(255,255,255,.1); color:#fff; border-color:rgba(255,255,255,.18)" id="signupBtn">Sign Up</a>
        </div>
        <?php else:?>
            <div class="nav-actions">
                <a class="btn" href="<?php echo _route('appointment:index')?>" id="loginBtn" 
                    style="background:rgba(255,255,255,.1); color:#fff; border-color:rgba(255,255,255,.18)">Back to profile</a>
            </div>
        <?php endif?>
      </nav>
    </header>

    <main>
        <?php produce('content')?>
    </main>
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
    <?php produce('scripts')?>
  </body>
</html>
