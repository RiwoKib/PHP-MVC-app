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

        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input name="name" value="<?=$row[0]->brand_name?>" type="text">
                                <?php if(isset($errors['brand_name'])){?>
                                    <span class="text-danger mx-2"><?=$errors['brand_name']?></span>
                                <?php }?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" class="form-control"><?=$row[0]->description?></textarea>
                                    <?php if(isset($errors['description'])){?>
                                        <span class="text-danger mx-2"><?=$errors['description']?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label> Brand Image</label>
                                    <div class="image-upload">
                                        <input id="imgInp" name="image" type="file">
                                        <div class="image-uploads">
                                            <img src="<?=ASSETS?>/img/icons/upload.svg" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                        <?php if(isset($errors['image'])){?>
                                            <span class="text-danger mx-2"><?=$errors['image']?></span>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="productimgname">
                                    <div class="form-group">
                                        <label>Current Image</label>
                                        <a href="javascript:void(0);" class="product-img img-fluid">
                                            <img src="<?=UPLOADED?>/<?=$row[0]->image?>" alt="product" id="blah">
                                        </a>
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