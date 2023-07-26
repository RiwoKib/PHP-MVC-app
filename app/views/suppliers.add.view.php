<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
    <div class="page-header">
    <div class="page-title">
    <h4>Supplier Management</h4>
    <h6>Add/Update Customer</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Supplier Name</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Email</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Phone</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Choose Country</label>
    <select class="select">
    <option>Choose Country</option>
    <option>India</option>
    <option>USA</option>
    </select>
    </div>
    </div>
    <div class="col-lg-6 col-12">
    <div class="form-group">
    <label>Address</label>
    <textarea class="form-control"></textarea>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>City</label>
    <select class="select">
    <option>Choose City</option>
    <option>City 1</option>
    <option>City 2</option>
    </select>
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Description</label>
    <textarea class="form-control"></textarea>
    </div>
    </div> 
    <div class="col-lg-12">
    <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
    <a href="<?=ROOT?>/suppliers" class="btn btn-cancel">Cancel</a>
    </div>
    </div>
    </div>
    </div>

    </div>
</div>


<?php $this->view('includes/footer'); ?> 