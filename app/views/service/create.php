<?php build('page-control')?>
	<a href="<?php echo _route('service:index')?>" 
		class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-list fa-sm text-white-50"></i> Products </a>
<?php endbuild()?>

<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>📦 Add Product</h1>
		<p>Set your product information here</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service:index')?>">
		<span>📂</span> Products
		</a>
	</div>
</div>
<?php endbuild()?>


<?php build('content')?>	
	<div class="col-md-7">
		<?php Flash::show()?>
		
		<div class="card">
			<div class="card-body">
				<h1>Add Inventory Item</h1>
				<?php __( $form->start() )?>

					<div class="form-group">
						<?php
							__( $form->getRow('service') );
						?>
					</div>

					<div class="form-group">
						<?php
							__( $form->getRow('category_id') );
						?>
					</div>
					

					<div class="form-group">
						<?php
							__( $form->getRow('status') );
						?>
					</div>
					

					<div class="form-group">
						<?php
							__( $form->getRow('description') );
						?>
					</div>

					<div class="form-group">
						<?php
							__( $form->get('submit') );
						?>
					</div>
				<?php __( $form->end() )?>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>