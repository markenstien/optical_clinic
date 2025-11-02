<?php
  /**
   * BAD PRACTICE PRELOAD PHP HERE
   */
  $notifications = db_get_notifications([
    'recipient_id' => whoIs('id')
  ], 'desc', '10');
?>
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
      body {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
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

    <?php produce('styles')?>
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
                <a  href="#" class="header-icon openModalBtn" data-modal="notificationModal" title="Near-expiry (30 days)">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 15H5V9h14Z"/></svg>
                    <span class="header-badge orange">3</span>
                </a>
                <a class="header-icon" href="<?php echo _route('auth:logout')?>" title="Logout" onclick="return confirm('Are you sure you want to log out?');">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M10 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h5v-2H5V5h5V3Zm9.707 8.293L16.414 8l-1.414 1.414L16.586 11H9v2h7.586l-1.586 1.586L16.414 16l3.293-3.293a1 1 0 0 0 0-1.414Z"/></svg>
                </a>
            </div>
            </div>
        </div>
    </header>

    <div class="layout">
      <aside class="sidebar">
        <div class="brand">
           <img src="<?php echo _path_asset('main-assets/img/new logo.jpg')?>" alt="MICA" width="32" height="32" style="border-radius: 6px;" />
          <span>MICA AESTHETIC CLINIC</span>
        </div>
        <nav>
          <a href="<?php echo _route('user:admin')?>" class="nav-item ">
            <span class="icon">📊</span>
            <span>Dashboard</span>
          </a>
          <a href="<?php echo _route('category:index')?>" class="nav-item" >
            <span class="icon">⚙️</span>
            <span>Categories</span>
          </a>
          <a href="<?php echo _route('service:index')?>" class="nav-item" >
            <span class="icon">📦</span>
            <span>Inventory</span>
          </a>
          <a href="<?php echo _route('service-bundle:index')?>" class="nav-item" >
            <span class="icon">🧰</span>
            <span>Services</span>
          </a>
          <a href="<?php echo _route('appointment:index')?>" class="nav-item" >
            <span class="icon">📅</span>
            <span>Appointments</span>
          </a>
          <a href="<?php echo _route('user:index')?>" class="nav-item">
            <span class="icon">👤</span>
            <span>Manage Account</span>
          </a>
          <a href="<?php echo _route('auth:logout')?>" class="nav-item danger">
            <span class="icon">🚪</span>
            <span>Logout</span>
          </a>
        </nav>
      </aside>

      <main class="content">
        <?php  produce('page-control')?>
        <?php  produce('content')?>


        <div id="notificationModal" class="modal-overlay">
          <div class="modal">
            <span class="close-btn">&times;</span>
            <h2>Notifications</h2>
            
            <div class="card">
              <div class="card-body">
                <?php if($notifications ?? '') :?>
                <div class="table-wrap">
                  <table class="table">
                  <?php foreach($notifications as $key => $row) :?>
                    <tr>
                      <td>
                        <?php if($row->href) :?>
                          <a href="<?php echo $row->href?>"><?php echo $row->message?></a>
                          <?php else:?>
                            <?php echo $row->message?>
                        <?php endif?>
                      </td>
                    </tr>
                  <?php endforeach?>
                </table>
                </div>
                <?php else :?>
                <p class="text-center">....</p>
                <?php endif?>
              </div>
            </div>
          </div>
        </div>


        <div id="overlay"></div>
      </main>
    </div>

    <script type="text/javascript" src="<?php echo _path_public('js/core.js')?>"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo _path_public('js/global.js')?>"></script>
    <script>
      setTimeout(() => {
        document.querySelectorAll('.flash').forEach(flash => {
          flash.style.animation = 'fadeOut 0.3s forwards';
          setTimeout(() => flash.style.display = 'none', 300);
        });
      }, 2000);

      // Search filter for inventory table
      (function(){
        var input = document.getElementById('inv-search');
        var table = document.getElementById('inv-table');
        if (!input || !table) return;
        var body = table.querySelector('tbody');
        input.addEventListener('input', function(){
        var q = (this.value || '').toLowerCase().trim();
        Array.from(body.querySelectorAll('tr')).forEach(function(tr){
          var cols = tr.querySelectorAll('td');
          if (!cols || cols.length < 5) return;
          var hay = (cols[0].textContent + ' ' + cols[1].textContent + ' ' + cols[2].textContent).toLowerCase();
          tr.style.display = hay.indexOf(q) !== -1 ? '' : 'none';
        });
        });
      })();

      // Select all open buttons, overlays, and close buttons
      const openButtons = document.querySelectorAll('.openModalBtn');
      const modals = document.querySelectorAll('.modal-overlay');
      const closeButtons = document.querySelectorAll('.close-btn');

      // Open corresponding modal
      openButtons.forEach(button => {
        button.addEventListener('click', () => {
          const modalId = button.getAttribute('data-modal');
          const modal = document.getElementById(modalId);
          modal.classList.add('active');
        });
      });

      // Close when clicking X
      closeButtons.forEach(btn => {
        btn.addEventListener('click', e => {
          const modal = e.target.closest('.modal-overlay');
          modal.classList.remove('active');
        });
      });

      // Close when clicking outside modal
      modals.forEach(modal => {
        modal.addEventListener('click', e => {
          if (e.target === modal) {
            modal.classList.remove('active');
          }
        });
      });

    </script>
    <?php produce('scripts')?>
  </body>
</html>
