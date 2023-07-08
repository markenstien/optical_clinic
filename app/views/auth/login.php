<?php build('page-control')?>
	<a href="<?php echo _route('user:index')?>" 
		class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-users fa-sm text-white-50"></i> Users </a>
<?php endbuild()?>


<?php build('content')?>
<section id="team" data-stellar-background-ratio="1">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<img src="https://www.neovisioneyecenters.com/wp-content/uploads/2020/10/neovision-october-2020-1.jpg"
					style="width:100%">
					</div>
				</div>
			</div>

			<div class="col-md-5">
				<?php __($form->start()) ?>
					<?php Form::hidden('user_type', 'patient')?>
					<div class="card card-theme-blue">
						<div class="card-header card-theme-blue">
							<h4 class="card-title">Login Form</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<?php __($form->getRow('email')); ?>
							</div>

							<div class="form-group">
								<?php __($form->getRow('password'));?>
							</div>

							<?php __($form->get('submit' , ['value' => 'Login']) )?>
						</div>
					</div>
				<?php __($form->end())?>
			</div>
		</div>
	</div>
</section>
<?php endbuild()?>
<?php loadTo('tmp/public')?>