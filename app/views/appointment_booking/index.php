<?php
$globalKey = _asset_key('PRODUCT_IMAGES');
$services = db_get_service_bundles([
    'is_visible' => true
  ]);
$maxServicesDisplay = 4;
?>
<?php build('content') ?>
    <section id="services" class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2>Our Services</h2>
              <p class="lead">Advanced Aesthetic Treatments by Expert Hands.</p>
              <div class="services">
                <?php foreach($services as $key => $service) :?>
                  <?php
                    $image = db_get_images($globalKey, $service->id)[0]->full_url ?? '';
                    $defaultImage = _path_asset('main-assets/img/Brown And Cream Beige Beauty Facial Skincare Instagram Story.png');
                  ?>
                  <div class="service"  onclick="window.location.href='<?php echo _route('appointment:create', [
                        'page' => 'customize-appointment',
                        'service_id' => $service->id
                    ])?>'">
                    <img class="service-img" src="<?php echo  $image == '' ? $defaultImage : $image?>" alt="RF Facial" />
                    <div class="service-content">
                      <h3><?php echo $service->name?></h3>
                      <p><?php echo $service->description?></p>
                    </div>
                  </div>
                <?php endforeach?>
              </div>
          </div>

          <div class="col-md-4">
            <h2>Cart</h2>
          </div>
        </div>
      </div>
    </section>
<?php endbuild()?>
<?php loadTo('appointment_booking/base')?>