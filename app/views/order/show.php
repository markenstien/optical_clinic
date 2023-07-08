<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Order Preview</h4>
		</div>

		<div class="card-body">
			<?php echo wLinkDefault('#', 'Replace Order')?>
			<section>
				<h4>Payment</h4>
				<h5>Current Balance : 3000</h5>
				<?php __($formPayment->start())?>
					<div class="form-group">
						<?php __($formPayment->getRow('amount', [
							'value' => 3000
						]))?>
					</div>
					<div class="form-group">
						<?php __($formPayment->getRow('method'))?>
					</div>
					<div class="form-group">
						<?php __($formPayment->getRow('org'))?>
					</div>
					<div class="form-group">
						<?php __($formPayment->getRow('external_reference'))?>
					</div>

					<div class="form-group">
						<?php Form::submit('', 'Add Payment')?>
					</div>
				<?php __($formPayment->end())?>
			</section>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>