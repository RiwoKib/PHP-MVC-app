<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Expense Add</h4>
                <h6>Add/Update Expenses</h6>
            </div>
        </div> 

        <?php if(count($errors) > 0):?>
            <div class="alert alert-warning alert-dismissible fade show p-1 mx-2" role="alert">
            <strong class="text-danger">Error!</strong>
                <?php foreach($errors as $error):?>
                <br><?=$error?>
            <?php endforeach;?>
            <span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </span>
            </div>
        <?php endif;?>


        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Category</label>
                                <input  value="<?=get_val('category_name',$row[0]->category_name)?>" type="text" name="name">
                            </div>
                        </div> 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Start Date </label>
                                <div class="input-groupicon">
                                    <input name="start" type="text"  value="<?=$row[0]->start_date?>" placeholder="Choose Date" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="<?=ASSETS?>/img/icons/calendars.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expiry Date </label>
                                <div class="input-groupicon">
                                    <input name="end" type="text" value="<?=$row[0]->expiry_date?>" placeholder="Choose Date" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="<?=ASSETS?>/img/icons/calendars.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Amount</label>
                                <div class="input-groupicon">
                                    <input name="amount" value="<?=$row[0]->amount?>" type="text">
                                    <div class="addonset">
                                        <img src="<?=ASSETS?>/img/icons/dollar.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"><?=$row[0]->description?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Set Status  <span class="text-info" style="font-size: 12px">inactive by default</span></label>
                                <select name="status" class="select">
                                    <option value="1">Active</option>
                                    <option value="0" selected>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="updateExpense" class="btn btn-submit me-2">Update Expense</button>
                            <a href="<?=ROOT?>/expenses" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?> 
