<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add</h4>
                <h6>Create new product</h6>
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
                <form action="" enctype="multipart/form-data" method='post'>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input value="<?=get_val('name')?>" name="name" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="cat" class="select">
                                    <option>Choose Category</option>
                                    <?php foreach ($categories as $category){?>
                                        <option value="<?=$category->category_name?>"><?=$category->category_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sub Category</label>
                                <select name="sub" class="select">
                                    <option>Choose Sub Category</option>
                                    <?php foreach ($subcategories as $category){?>
                                        <option value="<?=$category->category_name?>"><?=$category->category_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brand</label>
                                <select name="brand" class="select">
                                    <option>Choose Brand</option>
                                    <?php foreach ($brands as $brand){?>
                                        <option value="<?=$brand->brand_name?>"><?=$brand->brand_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Unit</label>
                                <select name="unit" class="select">
                                    <option value="">Choose Unit</option>
                                    <?php foreach ($units as $unit){?>
                                        <option value="<?=$unit->unit_name?>"><?=$unit->unit_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>                       
                        
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input value="<?=get_val('qty')?>" name="qty" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"><?=get_val('desc')?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tax</label>
                                <select name="tax" class="select">
                                    <option value="">Choose Tax</option>
                                    <option value="2">2%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select name="discount" class="select">
                                    <option value="">Percentage</option>
                                    <option value="10">10%</option>
                                    <option value="20">20%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Buying Price</label>
                                <input value="<?=get_val('bp')?>" name="bp" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input value="<?=get_val('price')?>" name="price" type="text">
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Status</label>
                                <select name="status" class="select">
                                    <option value="">Choose Status</option>
                                    <option value="0">Closed</option>
                                    <option value="1">Open</option>
                                </select>
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
                            <button type="submit" name="addProduct" class="btn btn-submit me-2">Add Product</button>
                            <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<?php $this->view('includes/footer'); ?>