<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Places Management</h4>
                <h6>Add Places</h6>
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
                                <label>City Name</label>
                                <input name="name" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Country Region</label>
                                <select name="region" class="select">
                                    <option>Choose County</option>
                                    <option value="nairobi">Nairobi</option>
                                    <option value="kisii">Kisii</option>
                                    <option value="kiambu">Kiambu</option>
                                    <option value="siaya">Siaya</option>
                                    <option value="kilifi">Kilifi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="select">
                                    <option>Choose Status</option>
                                    <option value="1">Operational</option>
                                    <option value="0">Not Operational</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button name="addCity" type="submit" class="btn btn-submit me-2">Add City</button>
                            <a href="<?=ROOT?>/cities" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php $this->view('includes/footer'); ?> 
