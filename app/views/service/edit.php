<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>📦 <?php  echo $form->getValue('service')?></h1>
		<p>Edit Product</p>
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
				<?php __( $form->start() )?>
					<?php __($form->getId())?>
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