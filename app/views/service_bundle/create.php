<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>⚙️ Add New Service</h1>
		<p>Products automatically deducted for each service</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service-bundle:index')?>">
		<span>📂</span> Services
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>
	<div class="col-md-7">
		<?php Flash::show()?>
		<div class="card">
			<div class="card-body">
				<h1>Service Bundle Form</h1>
				<?php __( $form->getForm() )?>
			<div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>