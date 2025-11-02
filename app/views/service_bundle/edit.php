<?php build('page-control')?>
	<a href="<?php echo _route('service-bundle:index')?>" 
		class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-list fa-sm text-white-50"></i> Back to <?php echo $service_bundle->name?> </a>
<?php endbuild()?>


<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>⚙️ <?php echo $service_bundle->name?></h1>
		<p>Modify Service Information</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service-bundle:show', $service_bundle->id)?>">
		<span>⬅️</span> Back
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h3>Service Form</h3>
			</div>
			<div class="card-body">

				<?php if( $service_bundle->price_custom != 0) :?>
					<div class="panel">
						<a href="<?php echo _route('service-bundle:removeCustomPrice' , $service_bundle->id)?>">Remove Custom Price</a>
					</div>
				<?php endif?>
				
				<?php __( $form->getForm() )?>
			<div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>