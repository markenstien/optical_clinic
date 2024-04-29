<?php build('content')?>


	<!-- HOME -->
	<section id="home" class="slider" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="owl-carousel owl-theme">
						<div class="item item-first">
							<div class="caption">
								<div class="col-md-offset-1 col-md-10">
									<h3>Wherever you are, we’ll bring expert eye care to you.</h3>
									<h1>Excellent Eye Care</h1>
									<a href="#team" class="section-btn btn btn-default smoothScroll">More About Us</a>
								</div>
							</div>
						</div>

						<div class="item item-second">
							<div class="caption">
								<div class="col-md-offset-1 col-md-10">
									<h3>Our doctors specialize in you</h3>
									<h1>New Lifestyle</h1>
									<a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">Meet Our Doctors</a>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>


	<!-- ABOUT -->
	<section id="about">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-6">
						<div class="about-info">
							<h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Your <i class="fa fa-eye"></i><?php echo COMPANY_NAME?></h2>
							<div class="wow fadeInUp" data-wow-delay="0.8s">
								<p>Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi vitae velit volutpat venenatis.</p>
								<p>Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut placerat, diam a tempus vehicula.</p>
							</div>
							<figure class="profile wow fadeInUp" data-wow-delay="1s">
								<img src="images/author-image.jpg" class="img-responsive" alt="">
								<figcaption>
									<h3>Dr. Neil Jackson</h3>
									<p>General Principal</p>
								</figcaption>
							</figure>
						</div>
				</div>
				
			</div>
		</div>
	</section>


	<!-- TEAM -->
	<section id="team" data-stellar-background-ratio="1">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-6">
					<div class="about-info">
						<h2 class="wow fadeInUp" data-wow-delay="0.1s">Our People</h2>
					</div>
				</div>
				<div class="clearfix"></div>
				
				<?php foreach($physicians as $key => $row) :?>
					<div class="col-md-4 col-sm-6">
						<div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
							<img src="<?php echo $row->profile?>" class="img-responsive" alt="">
								<div class="team-info">
									<h3><?php echo $row->first_name .  ' ' .$row->last_name?></h3>
									<p><?php echo isEqual($row->user_preference, 'physician') ? 'Physician' : 'Attending Staff'?></p>

									<div class="team-contact-info">
										<p><i class="fa fa-phone"></i><?php echo $row->phone_number?></p>
										<p><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $row->email?></a></p>
									</div>
								</div>

								
						</div>
					</div>
				<?php endforeach?>
			</div>
		</div>
	</section>

	<!-- MAKE AN APPOINTMENT -->
	<section id="appointment" data-stellar-background-ratio="3">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-6">
						<img src="<?php echo _path_tmp('health/images/appointment-image.jpg')?>" class="img-responsive" alt="">
				</div>

				<div class="col-md-6 col-sm-6">
					<div id="appointment" action="#" style="padding: 40px;">
							<!-- SECTION TITLE -->
							<div class="section-title" data-wow-delay="0.4s">
								<h2>Make an appointment</h2>
							</div>

							<div class="" data-wow-delay="0.8s">
								<?php Flash::show()?>
								<?php if(!$whoIs || isEqual($whoIs->user_type , 'patient')) :?>
									<?php __( [$form->start() ] )?>
									<?php Form::hidden('returnTo', seal(_route('home:index').'#appointment'))?>
											<?php
												if($whoIs){
													$form->add(['type' => 'hidden' , 'value' => $whoIs->id , 'name' => 'user_id']);
													__( $form->get('user_id') );


													$full_name = $whoIs->first_name . ' ' . $whoIs->last_name;
													$email = $whoIs->email;
													$phone_number = $whoIs->phone_number;
												}
												
											?>
											<div class="form-group row">
												<div class="col-md-6">
													<?php  __($form->getCol('date',['value' => date('Y-m-d') ]));?>
												</div>
												<div class="col-md-6">
													<?php  __($form->getCol('start_time',['value' => date('h:i:s', strtotime('+3 hours' .nowMilitary())) ]));?>
												</div>
											</div>
											<div class="form-group">
												<?php
													$form->setValue('guest_name' , $full_name ?? '');
													__( $form->getRow('guest_name'));
												?>
											</div>

											<div class="form-group">
												<?php
													$form->setValue('guest_email' , $email ?? '');
													__( $form->getRow('guest_email'));
												?>
											</div>

											<div class="form-group">
												<?php
													$form->setValue('guest_phone' , $phone_number ?? '');
													__( $form->getRow('guest_phone'));
												?>
											</div>

											<div class="form-group">
												<?php
													$form->setValue('notes' , $phone_number ?? '');
													__( $form->getRow('notes'));
												?>
											</div>

											<?php if($reservationFee->is_active) :?>
												<div class="form-group">
													<div class="row">
														<div class="col-md-3"><?php Form::label($reservationFee->display_name);?></div>
														<div class="col-md-9">
																<?php Form::text('reservation_fee', $reservationFee->amount_fee, [
																	'class' => 'form-control',
																	'required' => true,
																	'readonly' => true
																]);?>
														</div>
													</div>
												</div>
											<?php endif?>

											<div>
												<?php __( $form->get('submit' , ['value' => 'Create Appointment'])) ?>
											</div>

									<?php __( $form->end() )?>

								<?php else:?>
									<?php
											$form->setValue('date' , date('Y-m-d'));
											// $form->setValue('type' , 'walk-in');

											__( $form->getForm() );
									?>
								<?php endif?>
							</div>
					</div>
				</div>

			</div>
		</div>
	</section>

<?php endbuild()?>
<?php loadTo('tmp/public')?>