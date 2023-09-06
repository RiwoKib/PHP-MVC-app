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

        <div class="card">
            <div class="card-body">
                <form action="" enctype="multipart/form-data" method='post'>
                <div class="row">
                    <div class="card-header">
                        <h5 class="card-title">Product Details</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name:</label>
                                    <input type="text" value="<?=$row[0]->product_name?>" name="name" class="form-control">
                                    <?php if(isset($errors['product_name'])){?>
                                        <span class="text-danger" ><?=$errors['product_name']?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="cat" class="select">
                                        <option value="0">Choose Category</option>
                                        <?php foreach ($categories as $category){?>
                                            <option value="<?=$row[0]->category_ID?>"><?=$category->category_name?></option>
                                        <?php }?>
                                    </select>
                                    <?php if(isset($errors['category_ID'])){?>
                                        <span class="text-danger"><?=$errors['category_ID']?></span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subcategory</label>
                                    <select name="sub" class="select">
                                        <option value="0">Choose Sub Category</option>
                                        <?php foreach ($subcategories as $category){?>
                                            <option value="<?=$category->subcategory_ID?>"><?=$category->category_name?></option>
                                        <?php }?>
                                    </select>
                                    <?php if(isset($errors['sub_category'])){?>
                                        <span class="text-danger"><?=$errors['sub_category']?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand" class="select">
                                        <option value="0">Choose Brand</option>
                                        <?php foreach ($brands as $brand){?>
                                            <option value="<?=$brand->brand_name?>"><?=$brand->brand_name?></option>
                                        <?php }?>
                                    </select>
                                    <?php if(isset($errors['brand'])){?>
                                        <span class="text-danger"><?=$errors['brand']?></span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select name="unit" class="select">
                                        <option value="0">Choose Unit</option>
                                        <?php foreach ($units as $unit){?>
                                            <option value="<?=$unit->unit_name?>"><?=$unit->unit_name?></option>
                                        <?php }?>
                                    </select>
                                    <?php if(isset($errors['unit'])){?>
                                        <span class="text-danger"><?=$errors['unit']?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input value="<?=get_val('qty')?>" class="price"     name="qty" type="text">
                                    <?php if(isset($errors['product_quantity'])){?>
                                        <span class="text-danger"><?=$errors['product_quantity']?></span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Buying Price</label>
                                    <input value="<?=get_val('bp')?>" class="price" name="bp" type="text">
                                    <?php if(isset($errors['buying_price'])){?>
                                        <span class="text-danger"><?=$errors['buying_price']?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input value="<?=get_val('price')?>" class="price" name="price" type="text">
                                    <?php if(isset($errors['selling_price'])){?>
                                        <span class="text-danger"><?=$errors['selling_price']?></span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>VAT %</label>
                                    <select name="tax" class="select">
                                        <option value="">Choose Tax</option>
                                        <option value="16">16%</option>
                                    </select>
                                    <?php if(isset($errors['tax'])){?>
                                        <span class="text-danger"><?=$errors['tax']?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Discount %</label>
                                    <select name="discount" class="select">
                                        <option value="">Percentage</option>
                                        <option value="10">10%</option>
                                        <option value="20">20%</option>
                                    </select>
                                    <?php if(isset($errors['discount'])){?>
                                        <span class="text-danger"><?=$errors['discount']?></span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="d-block">Status:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1">
                                        <label class="form-check-label" for="open">Open</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="0">
                                        <label class="form-check-label" for="closed">Closed</label>
                                    </div>
                                    <?php if(isset($errors['status'])){?>
                                        <span class="text-danger"><?=$errors['status']?></span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quote Description</label>
                            <textarea name="desc" class="form-control"><?=get_val('desc')?></textarea>
                            <?php if(isset($errors['quote_description'])){?>
                                <span class="text-danger"><?=$errors['quote_description']?></span>
                            <?php }?>
                        </div>
                    </div>                        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Product Image</label>
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
                    
                    <div class="col-lg-12">
                        <button type="submit" name="updateProduct" class="btn btn-submit me-2">Update Product</button>
                        <a href="<?=ROOT?>/products" class="btn btn-cancel">Cancel</a>
                    </div>

                </div>
                </form>
            </div>
        </div>

    </div>
</div>


<?php $this->view('includes/footer'); ?>