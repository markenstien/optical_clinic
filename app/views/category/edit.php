<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>⚙️ <?php echo $category->category?></h1>
		<p>Edit Category</p>
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
<div class="card">
	<div class="card-body">
		<?php __( $form->getForm() )?>
	</div>
</div>
<?php endbuild()?>
<?php loadTo()?>