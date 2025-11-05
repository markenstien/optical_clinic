 <?php build('page-control')?>
    <div class="page-header">
        <div>
            <h1>Inventory Logs</h1>
            <p>records of your inventory movements</p>
        </div>
        <div class="header-actions">
            <a class="btn secondary" href="<?php echo _route('service:index')?>">
                <span>⬅️</span> Back
            </a>
        </div>
    </div>
    <?php endbuild()?>

<?php build('content') ?>
    <div class="card">
        <?php Flash::show()?>
        <div class="card-body">
            <h4 class="card-title">Logs</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Service</th>
                        <th>Quantity</th>
                        <th>Origin</th>
                        <th>Remarks</th>
                        <th>Date</th>
                        <th>Expiry</th>
                        <th>Record Stamp</th>
                    </thead>

                    <tbody>
                        <?php foreach($logs as $key => $row) :?>
                            <tr>
                                <td><?php echo ++$key?></td>
                                <td><?php echo $row->service?></td>
                                <td><?php echo amountHTML($row->quantity) ?></td>
                                <td><?php echo $row->entry_origin?></td>
                                <td><?php echo $row->remarks?></td>
                                <td><?php echo $row->date?></td>
                                <td><?php echo $row->expiry_date?></td>
                                <td><?php echo $row->created_at?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo()?>