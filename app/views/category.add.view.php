<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add Category</h4>
                <h6>Create new product Category</h6>
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
                <form action="" method='post' enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input value="<?=get_val('name')?>" name="name" type="text">  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" class="form-control"><?=get_val('desc')?></textarea>  
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <div class="image-upload">
                                        <input id="imgInp" name="image" required type="file">
                                        <div class="image-uploads">
                                            <img src="<?=ASSETS?>/img/icons/upload.svg" alt="img">
                                            <h4>Drag and drop a file to upload</h4>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="productimgname">
                                    <div class="form-group">
                                        <label>Image Uploaded</label>
                                        <a href="javascript:void(0);" class="product-img img-fluid">
                                            <img src="<?=ASSETS?>/img/product/noimage.png" alt="product" id="blah">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="addCategory" class="btn btn-submit me-2">Add Category</button>
                            <a href="<?=ROOT?>/categories" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<?php $this->view('includes/footer'); ?> 