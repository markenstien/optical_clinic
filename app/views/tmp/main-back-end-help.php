<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - MICA Aesthetic Clinic</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo _path_asset('main-assets')?>/styles.css?v=1" />
    <style>
      /* MICA Brand-Consistent Admin Dashboard Styling */
      body {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      }
      
      .banner{
        background: linear-gradient(135deg, #9a6f46 0%, #b8824a 100%);
        color: #fff;
        border-radius: 24px;
        padding: 32px 36px;
        box-shadow: 0 20px 60px rgba(154, 111, 70, 0.3);
        position: relative;
        overflow: hidden;
        margin-bottom: 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .banner::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #9a6f46, #b8824a);
      }
      .banner::after{
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
      }
      .banner h2{
        margin: 0 0 8px 0;
        color: #fff;
        font-size: 32px;
        font-weight: 800;
        letter-spacing: -0.5px;
      }
      .banner p{
        position: relative;
        z-index: 1;
      }
      
      .grid-3{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
        margin-top: 24px;
      }
      
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
      .card::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #9a6f46, #b8824a);
        opacity: 0;
        transition: all 0.4s ease;
      }
      .card::after{
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(154,111,70,0.03), transparent);
        transform: rotate(45deg);
        transition: all 0.6s ease;
        opacity: 0;
      }
      .card:hover{
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0,0,0,.15);
        border-color: rgba(154,111,70,0.2);
      }
      .card:hover::before{
        opacity: 1;
      }
      .card:hover::after{
        opacity: 1;
        transform: rotate(45deg) translate(50%, 50%);
      }
      
      .muted-box{
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        border: 2px solid transparent;
        border-radius: 20px;
        padding: 24px;
        text-align: center;
        color: #2c3e50;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
      }
      .muted-box::before{
        content: '';
        position: absolute;
        inset: 0;
        padding: 2px;
        background: linear-gradient(135deg, #9a6f46, #b8824a);
        border-radius: inherit;
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask-composite: xor;
        opacity: 0;
        transition: opacity 0.4s ease;
      }
      .muted-box:hover{
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(154,111,70,.15);
      }
      .muted-box:hover::before{
        opacity: 1;
      }
      
      .kpi{
        font-size: 56px;
        font-weight: 900;
        background: linear-gradient(135deg, #9a6f46, #b8824a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        text-shadow: none;
        filter: drop-shadow(0 2px 4px rgba(154,111,70,.2));
      }
      
      .quote-card{
        background: linear-gradient(135deg, #9a6f46, #b8824a);
        color: #fff;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 20px 40px rgba(154,111,70,.25);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .quote-card::before{
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 150%;
        height: 150%;
        background: radial-gradient(circle, rgba(255,255,255,.15) 0%, transparent 60%);
        pointer-events: none;
        transition: all 0.6s ease;
      }
      .quote-card:hover{
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 30px 60px rgba(154,111,70,.35);
      }
      .quote-card:hover::before{
        transform: translate(-10%, -10%) scale(1.1);
      }
      
      .mica-card{
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #9a6f46, #b8824a);
        color: #fff;
        border-radius: 24px;
        min-height: 220px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(154,111,70,.3);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .mica-card::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('<?php echo $ASSET_BASE; ?>/assets/img/new logo.jpg') center/contain no-repeat;
        opacity: 0.08;
        pointer-events: none;
        transition: all 0.4s ease;
      }
      .mica-card::after{
        content: '';
        position: absolute;
        top: -100%;
        left: -100%;
        width: 300%;
        height: 300%;
        background: conic-gradient(from 0deg, transparent, rgba(255,255,255,0.1), transparent);
        animation: rotate 8s linear infinite;
      }
      .mica-card:hover{
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 30px 60px rgba(154,111,70,.4);
      }
      .mica-card:hover::before{
        opacity: 0.15;
        transform: scale(1.1);
      }
      .mica-card .txt{
        font-family: 'Playfair Display', serif;
        font-size: 26px;
        font-weight: 800;
        letter-spacing: 2px;
        line-height: 1.1;
        position: relative;
        z-index: 2;
        text-shadow: 0 2px 8px rgba(0,0,0,0.3);
      }
      
      @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      
      .notif-list{
        list-style: none;
        padding: 0;
        margin: 0;
      }
      .notif-list li{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        margin-bottom: 12px;
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        border-radius: 16px;
        border: 1px solid #e9ecef;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
      }
      .notif-list li::before{
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(135deg, #9a6f46, #b8824a);
        transform: scaleY(0);
        transition: transform 0.4s ease;
      }
      .notif-list li:hover{
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-color: rgba(154,111,70,0.3);
        transform: translateX(4px);
        box-shadow: 0 8px 25px rgba(154,111,70,.1);
      }
      .notif-list li:hover::before{
        transform: scaleY(1);
      }
      
      .badge{
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 12px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(0,0,0,.15);
        transition: all 0.3s ease;
      }
      .badge:hover{
        transform: scale(1.05);
      }
      .badge.red{
        background: linear-gradient(135deg, #ff6b6b, #ee5a52);
      }
      .badge.orange{
        background: linear-gradient(135deg, #ffa726, #ff9800);
      }
      
      /* Doctor Appointments Panel Styles */
      .doctor-panel {
        background: #fff;
        border-radius: 20px;
        padding: 24px;
        margin-bottom: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,.06);
        border: 1px solid rgba(154,111,70,0.1);
        transition: all 0.3s ease;
      }
      .doctor-panel:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(154,111,70,.15);
      }
      .doctor-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f8f9fa;
        cursor: pointer;
        user-select: none;
      }
      .doctor-avatar {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #9a6f46, #b8824a);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 18px;
        box-shadow: 0 4px 12px rgba(154,111,70,.3);
      }
      .doctor-info h4 {
        margin: 0;
        color: #2c3e50;
        font-size: 18px;
        font-weight: 700;
      }
      .doctor-info p {
        margin: 4px 0 0 0;
        color: #6c757d;
        font-size: 14px;
      }
      .appointment-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 16px;
        margin-bottom: 8px;
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        border-radius: 12px;
        border-left: 4px solid #9a6f46;
        transition: all 0.3s ease;
      }
      .appointment-item:hover {
        background: linear-gradient(135deg, #e9ecef, #f8f9fa);
        transform: translateX(4px);
      }
      .appointment-details {
        flex: 1;
      }
      .client-name {
        font-weight: 600;
        color: #2c3e50;
        font-size: 15px;
        margin-bottom: 4px;
      }
      .appointment-meta {
        display: flex;
        gap: 16px;
        font-size: 13px;
        color: #6c757d;
      }
      .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      .status-pending {
        background: linear-gradient(135deg, #ffc107, #ffb300);
        color: #fff;
      }
      .chevron {
        margin-left: auto;
        transition: transform .2s ease;
      }
      .collapsed .chevron { transform: rotate(-90deg); }
      .doctor-appointments { display: none; }
      .doctor-panel.expanded .doctor-appointments { display: block; }
      .status-approved {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: #fff;
      }
      .no-appointments {
        text-align: center;
        padding: 32px 16px;
        color: #6c757d;
        font-style: italic;
      }
      
      /* Responsive Design */
      @media (max-width: 960px){ 
        .grid-3{grid-template-columns: 1fr; gap: 16px}
        .banner{padding: 20px 24px; flex-direction: column; gap: 16px; text-align: center;}
        .banner h2{font-size: 24px}
        .card{padding: 20px}
      }
      
      @media (max-width: 640px){
        .grid-3{gap: 12px}
        .banner{padding: 16px 20px}
        .card{padding: 16px}
        .kpi{font-size: 36px}
        .doctor-panel{padding: 16px}
        .appointment-meta{flex-direction: column; gap: 4px}
      }
    </style>
  </head>
  <body>
    <header class="site-header" role="banner">
        <div class="site-header-inner">
            <a class="brand-left" href="/admin/dashboard.php" style="color: #fff; text-decoration: none;">
            <img src="<?php echo _path_asset('main-assets/img/new logo.jpg')?>" alt="Mica Aesthetic" class="brand-logo" width="32" height="32" />
            <span class="brand-name" style="color: #fff;">MICA AESTHETIC</span>
            </a>
            <div class="brand-center" style="color: #fff;">MICA AESTHETIC CLINIC</div>
            <div class="brand-right">
            <div class="header-icons">
                <a class="header-icon" href="admin/inventory.php" title="Low-stock products" data-toggle="low-dd">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 7V3h18v4H3Zm0 2h18v12H3V9Zm5 2v8h2v-8H8Zm6 0v8h2v-8h-2Z"/></svg>
                    <span class="header-badge red">#</span>
                </a>
                <div class="dropdown-panel" id="low-dd" hidden>
                    <div class="dd-header">Low-stock products</div>
                    <ul class="dd-list">
                    <li class="dd-empty">No low-stock items</li>
                    </ul>
                    <div class="dd-actions"><a class="btn ghost" href="admin/inventory.php">View all</a></div>
                </div>
                <a class="header-icon" href="admin/inventory.php" title="Near-expiry (30 days)" data-toggle="near-dd">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 15H5V9h14Z"/></svg>
                    <span class="header-badge orange">3</span>
                </a>
                <div class="dropdown-panel" id="near-dd" hidden>
                    <div class="dd-header">Near-expiry (30 days)</div>
                    <ul class="dd-list">
                    <li class="dd-empty">No near-expiry items</li>
                    </ul>
                    <div class="dd-actions"><a class="btn ghost" href="admin/inventory.php">View all</a></div>
                </div>
                <a class="header-icon" href="/auth/logout.php" title="Logout" onclick="return confirm('Are you sure you want to log out?');">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M10 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h5v-2H5V5h5V3Zm9.707 8.293L16.414 8l-1.414 1.414L16.586 11H9v2h7.586l-1.586 1.586L16.414 16l3.293-3.293a1 1 0 0 0 0-1.414Z"/></svg>
                </a>
            </div>
            </div>
        </div>
    </header>

    <div class="layout">
      <aside class="sidebar">
        <div class="brand">
          <span>MICA AESTHETIC CLINIC</span>
        </div>
        <nav>
          <a href="dashboard.php" class="nav-item {$dashboard}">
            <span class="icon">📊</span>
            <span>Dashboard</span>
          </a>
          <a href="appointment.php" class="nav-item {$appointment}" >
            <span class="icon">📅</span>
            <span>Appointments</span>
          </a>
          <a href="inventory.php" class="nav-item {$inventory}" >
            <span class="icon">📦</span>
            <span>Inventory</span>
          </a>
          <a href="inventory-transactions.php" class="nav-item {$inventoryTransactions}">
            <span class="icon">🔄</span>
            <span>Inventory Transactions</span>
          </a>
          <a href="inventory-deductions.php" class="nav-item {$inventoryDeductions}">
            <span class="icon">📉</span>
            <span>Inventory Deductions</span>
          </a>
          <a href="manage-account.php" class="nav-item {$manageAccount}">
            <span class="icon">👤</span>
            <span>Manage Account</span>
          </a>
          <a href="manage-doctor.php" class="nav-item {$manageDoctor}">
            <span class="icon">🩺</span>
            <span>Manage Doctor</span>
          </a>
          <a href="../auth/logout.php" class="nav-item danger">
            <span class="icon">🚪</span>
            <span>Logout</span>
          </a>
        </nav>
      </aside>

    <main class="content">
      <div class="banner">
        <div>
          <h2>📊 Admin Dashboard</h2>
          <p style="margin: 8px 0 0 0; opacity: 0.9; font-size: 16px;">Welcome to your clinic management center</p>
        </div>
        <div style="display: flex; align-items: center; gap: 16px;">
          <div style="text-align: right; color: rgba(255,255,255,0.9);">
            <div style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Today</div>
            <div style="font-size: 12px; opacity: 0.8;" id="current-date"></div>
          </div>
          <div style="width: 48px; height: 48px; background: rgba(255,255,255,0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
            🏥
          </div>
        </div>
      </div>

      <section>
        <div class="grid-3">
          <!-- Quick Stats Card -->
          <div class="card">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
              <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">📊</div>
              <div>
                <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">Quick Stats</h3>
                <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Today's performance metrics</p>
              </div>
            </div>
            <div class="muted-box">
              <div class="kpi"></div>
              <div style="font-weight: 600; color: #6c757d; font-size: 16px;">Appointments Today</div>
              <div style="margin-top: 8px; padding: 8px 16px; background: rgba(154,111,70,.1); border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">LIVE DATA</div>
            </div>
          </div>

          <!-- Recent Activity Card -->
          <div class="card">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
              <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">📈</div>
              <div>
                <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">Recent Activity</h3>
                <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Latest system updates</p>
              </div>
            </div>
            <div class="muted-box" style="text-align: center;">
              <div style="font-size: 48px; margin-bottom: 16px; opacity: 0.4;">📋</div>
              <div style="color: #6c757d; font-weight: 600; font-size: 16px;">No recent activities</div>
              <div style="margin-top: 8px; padding: 8px 16px; background: rgba(154,111,70,.1); border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">MONITORING</div>
            </div>
          </div>

          <!-- MICA Brand Card -->
          <div class="mica-card">
            <div class="txt">MICA<br/>AESTHETIC<br/>CLINIC</div>
          </div>

          <!-- Notifications Card -->
          <div class="card" style="grid-column: 1 / span 2;">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
              <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">🔔</div>
              <div>
                <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">System Notifications</h3>
                <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Inventory alerts and system status</p>
              </div>
              <div style="margin-left: auto; padding: 6px 12px; background: rgba(154,111,70,.1); border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">
                ALERTS
              </div>
            </div>
            <ul class="notif-list">
              <li>
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span style="font-size: 16px;">📦</span>
                  <span style="font-weight: 500;">Low-stock products</span>
                </div>
                <span class="badge red"></span>
                <span class="badge" style="background: linear-gradient(135deg, #28a745, #20c997);">OK</span>
              </li>
              <li>
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span style="font-size: 16px;">⏰</span>
                  <span style="font-weight: 500;">Near-expiry (30 days)</span>
                </div>
                <span class="badge orange"></span>
                <span class="badge" style="background: linear-gradient(135deg, #28a745, #20c997);">OK</span>
              </li>
            </ul>
          </div>

          <!-- Inspirational Quote Card -->
          <div class="quote-card">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
              <div style="width: 48px; height: 48px; background: rgba(255,255,255,.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">💫</div>
              <div style="color: rgba(255,255,255,.9); font-size: 14px; font-weight: 600;">DAILY INSPIRATION</div>
            </div>
            <div style="font-size: 56px; line-height: 1; opacity: 0.6; margin-bottom: 16px; position: relative; z-index: 1;">"</div>
            <div style="font-family: 'Playfair Display', serif; font-style: italic; font-size: 18px; line-height: 1.6; position: relative; z-index: 1;">
              True beauty is a radiant light that shines from within, illuminating the world and inspiring hearts with its grace and compassion.
            </div>
          </div>

          <!-- Doctor Appointments Panel -->
          <div class="card" style="grid-column: 1 / span 3;">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
              <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">👩‍⚕️</div>
              <div>
                <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">Doctor Appointments</h3>
                <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Current and upcoming appointments by doctor</p>
              </div>
              <div style="margin-left: auto; padding: 6px 12px; background: rgba(154,111,70,.1); border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">
              </div>
            </div>

          </div>

          <!-- Welcome Message Card -->
          <div class="quote-card" style="grid-column: 1 / span 3; background: linear-gradient(135deg, #9a6f46, #b8824a); min-height: 120px;">
            <div style="text-align: center; position: relative; z-index: 2;">
              <div style="font-size: 32px; margin-bottom: 12px;">🌟</div>
              <div style="font-size: 24px; font-weight: 800; margin-bottom: 8px; letter-spacing: 1px;">
                Welcome to MICA Aesthetic Clinic
              </div>
              <div style="font-size: 16px; line-height: 1.6; opacity: 0.95; max-width: 600px; margin: 0 auto;">
                Discover a world of transformative treatments and personalized care, designed to enhance your natural radiance and elevate your confidence.
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    </div>
    
  </body>
</html>