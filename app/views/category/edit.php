<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>⚙️ <?php echo $category->category?></h1>
		<p>Edit Category</p>
	</div>
	<div class="header-actions">
		<?php if($category->is_disabled) :?>
		<a class="btn secondary" href="<?php echo _route('category:enable', $category->id)?>">
			<span>❌</span> Un-Archive
		</a>
		<?php endif?>
		
		<?php if(!$category->is_disabled) :?>
		<a class="btn secondary" href="<?php echo _route('category:disable', $category->id)?>">
			<span>✅</span> Archive
		</a>
		<?php endif?>

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
		<h1>Category Form 
			<?php if($category->is_disabled) :?>
				<span style="background-color: red; color:#fff">Archived</span>
			<?php endif?>
		</h1>
		<?php __( $form->getForm() )?>
	</div>
</div>
<?php endbuild()?>
<?php loadTo()?>