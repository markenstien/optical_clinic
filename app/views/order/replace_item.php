<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Replace Item</h4>
		</div>

		<div class="card-body">
			<?php
				Form::open([
					'method' => 'post'
				]);
			?>
				<div class="form-group">
					<?php
						Form::label('Reason');
						Form::select('', ['DEFECTIVE_ITEM', 'CHANGE_ITEM'], '', [
							'class' => 'form-control'
						])
					?>
				</div>

				<div class="form-group">
					<?php
						Form::label('Notes');
						Form::textarea('notes', '', [
							'class' => 'form-control'
						])
					?>
				</div>

				<div class="form-group">
					<input type="submit" name="">
				</div>
			<?php Form::close()?>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>