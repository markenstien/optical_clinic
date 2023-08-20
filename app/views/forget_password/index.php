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
				<div class="card card-theme-blue">
					<?php if(!$isSubmitted) :?>
						<div class="card-header card-theme-blue">
							<h4 class="card-title">Forgot password</h4>
							<?php echo wLinkDefault(_route('auth:login'), 'Cancel Forgot Password')?>
							<?php Flash::show()?>
						</div>
						<div class="card-body">
							<?php
								Form::open([
									'method' => 'post'
								]);
							?>
								<div class="form-group">
									<?php
										Form::label('Email');
										Form::email('email','', [
											'class' => 'form-control',
											'placeholder' => 'If you have account with us a reset password link will be sent to your email'
										]);
									?>
								</div>

								<div class="form-group mt-2">
									<?php
										Form::submit('btn_forget_password');
									?>
								</div>
							<?php Form::close()?>
						</div>
					<?php else:?>
						<div class="card-body">
							<p class="txt-warning">If Email exists, reset password instruction will be sent to the email.</p>
						</div>
					<?php endif?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endbuild()?>
<?php loadTo('tmp/public')?>