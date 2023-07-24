<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Brands</h4>
                <h6>Update Brand</h6>
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input value="<?=esc($row[0]->brand_name); ?>" name="name" type="text">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="desc" class="form-control"><?=esc($row[0]->description); ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Product Image</label>
                            <div class="image-upload">
                                <input name="image" type="file">
                                <div class="image-uploads">
                                    <img src="<?=ASSETS?>/img/icons/upload.svg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" name="updateBrand" class="btn btn-submit me-2">Update Brand</button>
                        <a href="<?=ROOT?>/brands" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
</div>

<?=$this->view('includes/footer')?>