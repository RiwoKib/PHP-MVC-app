<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Supplier Management</h4>
                <h6>Add Supplier</h6>
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
                                <label>Supplier Name</label>
                                <input name="name" value="<?=$row[0]->supplier_name?>" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input value="<?=$row[0]->email?>" name="email" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input value="<?=$row[0]->phone_number?>" name="phone" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Country</label>
                                <select name="country" class="select">
                                    <option value="">Choose Country</option>
                                    <?php foreach ($countries as $country){?>
                                        <option value="<?=$country->country_name?>"><?=$country->country_name?></option>
                                    <?php }?>
                                </select>
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
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"><?=$row[0]->description?></textarea>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <button type="submit" name="updateSupplier" class="btn btn-submit me-2">Update Supplier</button>
                            <a href="<?=ROOT?>/suppliers" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<?php $this->view('includes/footer'); ?> 