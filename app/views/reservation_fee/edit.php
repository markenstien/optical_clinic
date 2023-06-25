<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Reservation Fee Settings</h4>
			<?php echo wLinkDefault(_route('setting:index') , 'Back to Settings')?>
		</div>

		<div class="card-body">
			<?php
				Form::open([
					'method' => 'post',
					'action' => ''
				]);

				Form::hidden('id', $reservationFee->id);
			?>
				<div class="form-group">
					<?php
						Form::label('Display Name');
						Form::text('display_name', $reservationFee->display_name, [
							'class' => 'form-control',
							'required' => true
						]);
					?>
				</div>

				<div class="form-group">
					<?php
						Form::label('Amount Fee');
						Form::text('amount_fee', $reservationFee->amount_fee, [
							'class' => 'form-control',
							'required' => true
						]);
					?>
				</div>

				<div class="form-group">
					<?php
						Form::label('Description');
						Form::text('description', $reservationFee->description, [
							'class' => 'form-control',
						]);
					?>
				</div>

				<div class="form-group">
					<?php
						Form::label('Enable Fee');
						Form::select('is_active',[
							'1' => 'Enabled',
							'0' => 'Disabled'
						], $reservationFee->is_active, [
							'class' => 'form-control',
						]);
					?>
				</div>

				<div class="form-group">
					<?php Form::submit('', 'Update Settings')?>
				</div>
			<?php
				Form::close();
			?>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>