<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>⚙️ Add Category</h1>
		<p>Category Management</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('category:index')?>">
		<span>📂</span> Categories
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>
<?php Flash::show()?>
<div class="col-md-7">
	<div class="card">
		<div class="card-body">
			<?php __( $form->start() )?>
				<div class="form-group">
					<?php __( $form->getRow('category') )?>
				</div>
				<div class="form-group">
					<?php __( $form->getRow('cat_key') )?>
				</div>
				<div>
					<?php __( $form->get('submit') )?>
				</div>
			<?php __( $form->end() )?>
		</div>	
	</div>
</div>
<?php endbuild()?>
<?php loadTo()?>