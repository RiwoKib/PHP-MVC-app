<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Customer Management</h4>
                <h6>Update Customer</h6>
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
                                <label>First Name</label>
                                <input name="fname" value="<?=$row[0]->firstname?>" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="lname" value="<?=$row[0]->lastname?>" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="<?=$row[0]->email?>" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" value="<?=$row[0]->phone_number?>" type="text">
                            </div>
                        </div> 
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control"><?=$row[0]->address?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>City</label>
                                <select name="city" class="select">
                                    <option value="">Choose City</option>
                                    <?php foreach ($cities as $city){?>
                                        <option value="<?=$city->city_name?>"><?=$city->city_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <button type="submit" name="updateCustomer" class="btn btn-submit me-2">Update Customer</button>
                            <a href="<?=ROOT?>/customers" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php $this->view('includes/footer'); ?>
