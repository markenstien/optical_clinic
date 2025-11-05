<?php build('content') ?>
<div class="banner">
    <div>
        <h2>📊 Dashboard</h2>
        <p style="margin: 8px 0 0 0; opacity: 0.9; font-size: 16px;">Welcome to your clinic management center</p>
    </div>
    <div style="display: flex; align-items: center; gap: 16px;">
        <div style="text-align: right; color: rgba(255,255,255,0.9);">
            <div style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Today</div>
            <div style="font-size: 12px; opacity: 0.8;"><?php echo date('l, F j, Y')?></div>
        </div>
        <div style="width: 48px; height: 48px; background: rgba(255,255,255,0.2); border-radius: 12px; display: flex; 
            align-items: center; justify-content: center; font-size: 20px;">
            🏥
        </div>
    </div>
</div>

<section>
    <?php Flash::show()?>
    <div class="grid-3">
        <!-- Quick Stats Card -->
        <div class="card">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
                <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); 
                    border-radius: 16px; display: flex; align-items: center; justify-content: center; 
                    font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">📊</div>
                <div>
                <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">Quick Stats</h3>
                <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Today's performance metrics</p>
                </div>
            </div>
            <div class="muted-box">
                <div class="kpi"><?php echo $todaysAppointmentCount; ?></div>
                <div style="font-weight: 600; color: #6c757d; font-size: 16px;">Appointments Today</div>
                <div style="margin-top: 8px; padding: 8px 16px; background: rgba(154,111,70,.1); 
                border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">LIVE DATA</div>
            </div>
        </div>

        <!-- Recent Activity Card -->
        <div class="card">
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
            <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); 
            border-radius: 16px; display: flex; align-items: center; justify-content: center; 
            font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">📈</div>
            <div>
            <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">Recent Activity</h3>
            <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Latest system updates</p>
            </div>
        </div>
        <div class="muted-box" style="text-align: center;">
            <div style="font-size: 48px; margin-bottom: 16px; opacity: 0.4;">📋</div>
            <div style="color: #6c757d; font-weight: 600; font-size: 16px;">No recent activities</div>
            <div style="margin-top: 8px; padding: 8px 16px; background: rgba(154,111,70,.1); border-radius: 20px; 
            color: #9a6f46; font-size: 12px; font-weight: 600;">MONITORING</div>
        </div>
        </div>

        <!-- MICA Brand Card -->
        <div class="mica-card">
            <div class="txt">MICA<br/>AESTHETIC<br/>CLINIC</div>
        </div>
        <?php if(isEqual(whoIs('user_type'), [USER_TYPES['ADMIN']])) :?>
        <!-- Notifications Card -->
        <div class="card" style="grid-column: 1 / span 2;">
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                    <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a);
                        border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; 
                        box-shadow: 0 8px 20px rgba(154,111,70,.3);">🔔
                        </div>
                    <div>
                        <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">System Notifications</h3>
                        <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Inventory alerts and system status</p>
                    </div>
                    <div style="margin-left: auto; padding: 6px 12px; background: rgba(154,111,70,.1); border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">
                        3 ALERTS
                    </div>
                </div>
            <ul class="notif-list">
                <li>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 16px;">📦</span>
                    <span style="font-weight: 500;">Low-stock products</span>
                </div>
                <?php if ($lowCount > 0): ?>
                    <span class="badge red"><?php echo $lowCount; ?></span>
                <?php else: ?>
                    <span class="badge" style="background: linear-gradient(135deg, #28a745, #20c997);">OK</span>
                <?php endif; ?>
                </li>
                <li>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 16px;">⏰</span>
                    <span style="font-weight: 500;">Near-expiry (20 days)</span>
                </div>
                <?php if ($nearExpiryCount > 0): ?>
                    <span class="badge orange"><?php echo $nearExpiryCount; ?></span>
                <?php else: ?>
                    <span class="badge" style="background: linear-gradient(135deg, #28a745, #20c997);" onclick="window.location.href='<?php echo _route('service:index')?>'">OK</span>
                <?php endif; ?>
                </li>
            </ul>
        </div>
        <?php endif?>

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

        <?php if(isEqual(whoIs('user_type'), USER_TYPES['DOCTOR'])) :?>
        <div class="card" style="grid-column: 1 / span 3;">
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
            <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">👩‍⚕️</div>
            <div>
            <h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">Doctor Appointments</h3>
            <p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Current and upcoming appointments by doctor</p>
            </div>
            <div style="margin-left: auto; padding: 6px 12px; background: rgba(154,111,70,.1);
             border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">
                <?php echo count($appointments)?>
            </div>
        </div>
        <?php endif?>
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
<?php endbuild()?>

<?php build('scripts')?>

<?php endbuild()?>
<?php loadTo()?>