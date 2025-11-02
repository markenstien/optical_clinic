<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>📦 <?php  echo $item->service?></h1>
		<p>Manage your product here</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service:show', $item->id)?>">
			<span>⬅️</span> Back
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content') ?>
    <div class="card">
        <?php Flash::show()?>
        <div class="card-header">
            <h1>Manage Stock Form</h1>
        </div>

        <div class="card-body">
            <?php echo $stock_form->start()?>
            <?php csrf()?>
            <?php echo $stock_form->getFormItems()?>
            <?php echo $stock_form->end()?>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo()?>