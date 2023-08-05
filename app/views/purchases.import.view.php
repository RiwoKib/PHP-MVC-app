<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Import Purchase</h4>
                <h6>Add/Update Purchase</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <a class="btn btn-submit w-100">Download Sample File</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Upload CSV File</label>
                                <div class="image-upload">
                                    <input name="purchases_import" type="file">
                                    <div class="image-uploads">
                                        <img src="<?=ASSETS?>/img/icons/upload.svg" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-12">
                            <div class="productdetails productdetailnew">
                                <ul class="product-bar">
                                    <li>
                                        <h4>Supplier Code</h4>
                                        <h6 class="manitorygreen">This Field is required</h6>
                                    </li>
                                    <li>
                                        <h4>Product ID</h4>
                                        <h6 class="manitorygreen">This Field is required</h6>
                                    </li>
                                    <li>
                                        <h4>Category ID</h4>
                                        <h6 class="manitorygreen">This Field is required</h6>
                                    </li> 
                                    <li>
                                        <h4>Total</h4>
                                        <h6 class="manitorygreen">This Field is required</h6>
                                    </li>
                                    <li>
                                        <h4>Amount Paid</h4>
                                        <h6 class="manitorygreen">This Field is required</h6>
                                    </li>
                                    <li>
                                        <h4>Amount Due</h4>
                                        <h6 class="manitorygreen">This Field is required</h6>
                                    </li>
                                    <li>
                                        <h4>Description</h4>
                                        <h6 class="manitoryblue">Field optional</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="productdetails productdetailnew">
                                <ul class="product-bar"> 
                                    <li>
                                        <h4>Payment Status</h4>
                                        <h6 class="manitoryblue">Field optional</h6>
                                    </li>
                                    <li>
                                        <h4>Status</h4>
                                        <h6 class="manitoryblue">Field optional</h6>
                                    </li>
                                    <li>
                                        <h4>Shipping</h4>
                                        <h6 class="manitoryblue">Field optional</h6>
                                    </li>
                                    <li>
                                        <h4>Tax</h4>
                                        <h6 class="manitoryblue">Field optional</h6>
                                    </li>
                                    <li>
                                        <h4>Discount Type</h4>
                                        <h6 class="manitoryblue">Field optional</h6>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="importPurchases" class="btn btn-submit me-2">Import</button>
                            <a href="<?=ROOT?>/purchases" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?>