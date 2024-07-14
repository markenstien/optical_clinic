<section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="#" class="navbar-brand"><i class="fa fa-eye"></i><?php echo COMPANY_NAME?></a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                    <?php if(whoIs()) :?>
                        <li><a href="<?php echo _route('appointment:index')?>" class="smoothScroll">
                            <span class="badge badge-primary">Back to my account</span> </a>
                        </li>
                    <?php else :?>
                        <li><a href="<?php echo _route('home:index')?>#top" class="smoothScroll">Home</a></li>
                    <?php endif?>
                    <li><a href="<?php echo _route('home:index')?>#about" class="smoothScroll">About Us</a></li>
                    <li><a href="<?php echo _route('home:index')?>#team" class="smoothScroll">Staffs</a></li>
                    <li><a href="<?php echo _route('home:index')?>#google-map" class="smoothScroll">Contact</a></li>
                    <li class="btn-blue"><a href="<?php echo _route('home:index')?>#appointment" style="color: #fff;">Make an appointment</a></li>
            </ul>
        </div>

    </div>
</section>