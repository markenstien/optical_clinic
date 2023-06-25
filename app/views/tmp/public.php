<!DOCTYPE html>
<html lang="en">
<head>
     <title><?php echo COMPANY_NAME?></title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?php echo _path_tmp('health/css/bootstrap.min.css')?>">
     <link rel="stylesheet" href="<?php echo _path_tmp('health/css/font-awesome.min.css')?>">
     <link rel="stylesheet" href="<?php echo _path_tmp('health/css/animate.css')?>">
     <link rel="stylesheet" href="<?php echo _path_tmp('health/css/owl.carousel.css')?>">
     <link rel="stylesheet" href="<?php echo _path_tmp('health/css/owl.theme.default.min.css')?>">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?php echo _path_tmp('health/css/tooplate-style.css')?>">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <!-- PRE LOADER -->
     <!-- <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section> -->
     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome to <?php echo COMPANY_NAME?></p>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i><?php echo TIME_SCHEDULE?>(<?php echo WORK_DAYS?>)</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></span>
                         <span>
                              <?php
                                   if(whoIs()) {
                                        echo wLinkDefault(_route('auth:logout'), 'Sign-Out', [
                                             'icon' => 'fa fa-sign-out'
                                        ]);
                                   } else {
                                        echo wLinkDefault(_route('auth:login'), 'Sign-In', [
                                             'icon' => 'fa fa-sign-in'
                                        ]);

                                        echo wLinkDefault(_route('user:register'), 'Sign-up', [
                                             'icon' => 'fa fa-user-plus'
                                        ]);
                                   }
                              ?>
                         </span>
                    </div>

               </div>
          </div>
     </header>
     <!-- MENU -->
     <?php grab('tmp/partial/navtop')?>
     <?php echo produce('content')?>

     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <p><?php echo COMPANY_ADDRESS?></p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                              </div>
                         </div>
                    </div>
                    

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p><?php echo WORK_DAYS?><span><?php echo TIME_SCHEDULE?></span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2018 Your Company 
                                   
                                   | Design: Tooplate</p>
                              </div>
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="<?php echo _path_tmp('health/js/jquery.js')?>"></script>
     <script src="<?php echo _path_tmp('health/js/bootstrap.min.js')?>"></script>
     <script src="<?php echo _path_tmp('health/js/jquery.sticky.js')?>"></script>
     <script src="<?php echo _path_tmp('health/js/jquery.stellar.min.js')?>"></script>
     <script src="<?php echo _path_tmp('health/js/wow.min.js')?>"></script>
     <script src="<?php echo _path_tmp('health/js/smoothscroll.js')?>"></script>
     <script src="<?php echo _path_tmp('health/js/owl.carousel.min.js')?>"></script>
     <script src="<?php echo _path_tmp('health/js/custom.js')?>"></script>
</body>
</html>