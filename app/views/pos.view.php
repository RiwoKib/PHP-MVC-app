<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?> 


<div class="page-wrapper ms-0">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-sm-12 tabs_wrapper">
                <div class="page-header ">
                    <div class="page-title">
                        <h4>Categories</h4>
                        <h6>Manage your purchases</h6>
                    </div>
                </div>

                <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                    <?php foreach ($rows as $category) {?>
                        <li class="<?= $category->id == 2 ? 'active' : '' ?>" id="<?=$category->id?>">
                            <div class="product-details ">
                                <!-- <img src="<?=ASSETS?>/img/product/product62.png" alt="img"> -->
                                <h6><?=$category->category_name?></h6>
                            </div>
                        </li>
                    <?php }?>
                </ul>

                <div class="tabs_container">
                    
                    <?php foreach ($rows as $category){?>
                        <div id="productSet" class="tab_content <?= $category->id == 2 ? 'active' : ''?>" data-tab="<?=$category->id?>">
                            <div class="row ">
                                
                                <?php foreach ($products as $product){?>
                                    <?php if($product['category_name'] == $category->category_name){?>
                                        <div class="col-lg-3 col-sm-6 d-flex ">
                                            <div  class="productset flex-fill">
                                                <div class="productsetimg">
                                                    <img src="<?=UPLOADED?>/<?=$product['image']?>" alt="img">
                                                    <h6>QTY: <?=$product['product_qty']?></h6>
                                                    <div class="check-product">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="productsetcontent">
                                                    <h5><?=$product['category_name']?></h5>
                                                    <h4><?=$product['product_name']?></h4>
                                                    <h6><?=number_format($product['price'])?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                <?php }?>

                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12 ">
                <div class="order-list">
                    <div class="orderid">
                        <h4>Order List</h4>
                        <h5>Transaction id : #65565</h5>
                    </div>
                    <div class="actionproducts">
                        <ul>
                            <li> <a href="javascript:void(0);" class="deletebg confirm-text"><img src="<?=ASSETS?>/img/icons/delete-2.svg" alt="img"></a>
                            </li>
                            <li> 
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                                    <img src="<?=ASSETS?>/img/icons/ellipise1.svg" alt="img">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-end">
                                    <li>  <a href="#" class="dropdown-item">Action</a>  </li>
                                    <li> <a href="#" class="dropdown-item">Another Action</a>  </li>
                                    <li> <a href="#" class="dropdown-item">Something Elses</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card card-order">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal" data-bs-target="#create">
                                    <i class="fa fa-plus me-2"></i>Add Customer
                                </a>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="select-split">
                                    <div class="select-group w-100">
                                        <select class="select">
                                            <option>Walk-in Customer</option>
                                            <option>Chris Moris</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="select-split">
                                    <div class="select-group w-100">
                                        <select class="select">
                                            <option>Product </option>
                                            <option>Barcode</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-end">
                                    <a class="btn btn-scanner-set"><img src="<?=ASSETS?>/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="split-card"></div>
                    
                    <div class="card-body pt-0">
                        <div class="totalitem">
                            <h4>Total items : 4</h4>
                            <a href="javascript:void(0);">Clear all</a>
                        </div>

                        <div class="product-table">
                            <ul class="product-lists">
                                <li>
                                    <div class="productimg">
                                        <div class="productimgs">
                                            <img src="<?=ASSETS?>/img/product/product30.jpg" alt="img">
                                        </div>
                                        <div class="productcontet">
                                            <h4>Pineapple
                                            <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="<?=ASSETS?>/img/icons/edit-5.svg" alt="img"></a>
                                            </h4>
                                            <div class="productlinkset">
                                                <h5>PT001</h5>
                                            </div>
                                            <div class="increment-decrement">
                                                <div class="input-groups">
                                                    <input type="button" value="-" class="button-minus dec button">
                                                    <input type="text" name="qty" value="0" class="quantity-field">
                                                    <input type="button" value="+" class="button-plus inc button ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>3000.00	</li>
                                <li><a class="confirm-text" href="javascript:void(0);"><img src="<?=ASSETS?>/img/icons/delete-2.svg" alt="img"></a></li>
                            </ul>
                        
                            <ul class="product-lists">
                                <li>
                                    <div class="productimg">
                                        <div class="productimgs">
                                            <img src="<?=ASSETS?>/img/product/product34.jpg" alt="img">
                                        </div>
                                        <div class="productcontet">
                                            <h4>Green Nike
                                                <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="<?=ASSETS?>/img/icons/edit-5.svg" alt="img"></a>
                                            </h4>
                                            <div class="productlinkset">
                                                <h5>PT001</h5>
                                            </div>
                                            <div class="increment-decrement">
                                                <div class="input-groups">
                                                    <input type="button" value="-" class="button-minus dec button">
                                                    <input type="text" name="child" value="0" class="quantity-field">
                                                    <input type="button" value="+" class="button-plus inc button ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>3000.00	</li>
                                <li><a class="confirm-text" href="javascript:void(0);"><img src="<?=ASSETS?>/img/icons/delete-2.svg" alt="img"></a></li>
                            </ul>

                            <ul class="product-lists">
                                <li>
                                    <div class="productimg">
                                        <div class="productimgs">
                                            <img src="<?=ASSETS?>/img/product/product35.jpg" alt="img">
                                        </div>
                                        <div class="productcontet">
                                            <h4>Banana
                                                <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="<?=ASSETS?>/img/icons/edit-5.svg" alt="img"></a>
                                            </h4>
                                            <div class="productlinkset">
                                                <h5>PT001</h5>
                                            </div>
                                            <div class="increment-decrement">
                                                <div class="input-groups">
                                                    <input type="button" value="-" class="button-minus dec button">
                                                    <input type="text" name="child" value="0" class="quantity-field">
                                                    <input type="button" value="+" class="button-plus inc button ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>3000.00	</li>
                                <li><a class="confirm-text" href="javascript:void(0);"><img src="<?=ASSETS?>/img/icons/delete-2.svg" alt="img"></a></li>
                            </ul>

                            <ul class="product-lists">
                                <li>
                                    <div class="productimg">
                                        <div class="productimgs">
                                            <img src="<?=ASSETS?>/img/product/product31.jpg" alt="img">
                                        </div>
                                        <div class="productcontet">
                                            <h4>Strawberry
                                                <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="<?=ASSETS?>/img/icons/edit-5.svg" alt="img"></a>
                                            </h4>
                                            <div class="productlinkset">
                                                <h5>PT001</h5>
                                            </div>
                                            <div class="increment-decrement">
                                                <div class="input-groups">
                                                    <input type="button" value="-" class="button-minus dec button">
                                                    <input type="text" name="child" value="0" class="quantity-field">
                                                    <input type="button" value="+" class="button-plus inc button ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>3000.00	</li>
                                <li><a class="confirm-text" href="javascript:void(0);"><img src="<?=ASSETS?>/img/icons/delete-2.svg" alt="img"></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="split-card"></div>

                    <div class="card-body pt-0 pb-2">
                        <div class="setvalue">
                            <ul>
                                <li>
                                    <h5>Subtotal </h5>
                                    <h6>55.00$</h6>
                                </li>
                                <li>
                                    <h5>Tax </h5>
                                    <h6>5.00$</h6>
                                </li>
                                <li class="total-value">
                                    <h5>Total </h5>
                                    <h6>60.00$</h6>
                                </li>
                            </ul>
                        </div>

                        <div class="setvaluecash">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="paymentmethod">
                                        <img src="<?=ASSETS?>/img/icons/cash.svg" alt="img" class="me-2">
                                        Cash
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="paymentmethod">
                                        <img src="<?=ASSETS?>/img/icons/debitcard.svg" alt="img" class="me-2">
                                        Debit
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="paymentmethod">
                                        <img src="<?=ASSETS?>/img/icons/scan.svg" alt="img" class="me-2">
                                        Scan
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <button type="submit" class="btn-totallabel col-12">
                            <h5>Checkout</h5>
                            <h6>60.00$</h6>
                        </button>

                        <div class="btn-pos">
                            <ul>
                                <li>  <a class="btn"><img src="<?=ASSETS?>/img/icons/pause1.svg" alt="img" class="me-1">Hold</a></li>
                                <li> <a class="btn"><img src="<?=ASSETS?>/img/icons/edit-6.svg" alt="img" class="me-1">Quotation</a>  </li>
                                <li><a class="btn"><img src="<?=ASSETS?>/img/icons/trash12.svg" alt="img" class="me-1">Void</a> </li>
                                <li><a class="btn"><img src="<?=ASSETS?>/img/icons/wallet1.svg" alt="img" class="me-1">Payment</a> </li>
                                <li><a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img src="<?=ASSETS?>/img/icons/transcation.svg" alt="img" class="me-1"> Transaction</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Define Quantity</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="calculator-set">
                        <div class="calculatortotal">
                            <h4>0</h4>
                        </div>
                        <ul>
                            <li> <a href="javascript:void(0);">1</a></li>
                            <li> <a href="javascript:void(0);">2</a></li>
                            <li><a href="javascript:void(0);">3</a></li>
                            <li><a href="javascript:void(0);">4</a></li>
                            <li> <a href="javascript:void(0);">5</a></li>
                            <li><a href="javascript:void(0);">6</a></li>
                            <li><a href="javascript:void(0);">7</a> </li>
                            <li><a href="javascript:void(0);">8</a> </li>
                            <li> <a href="javascript:void(0);">9</a> </li>
                            <li><a href="javascript:void(0);" class="btn btn-closes"><img src="<?=ASSETS?>/img/icons/close-circle.svg" alt="img"></a> </li>
                            <li><a href="javascript:void(0);">0</a></li>
                            <li><a href="javascript:void(0);" class="btn btn-reverse"><img src="<?=ASSETS?>/img/icons/reverse.svg" alt="img"></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="hold-order">
                        <h2>4500.00</h2>
                    </div>
                    <div class="form-group">
                        <label>Order Reference</label>
                        <input type="text">
                    </div>
                    <div class="para-set">
                        <p>The current order will be set on hold. You can retreive this order from the pending order button. Providing a reference to it might help you to identify the order more quickly.</p>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <select class="select">
                                    <option>Exclusive</option>
                                    <option>Inclusive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label> Tax</label>
                                <div class="input-group">
                                    <input type="text">
                                    <a class="scanner-set input-group-text">%</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select class="select">
                                    <option>Fixed</option>
                                    <option>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Sales Unit</label>
                                <select class="select">
                                    <option>Kilogram</option>
                                    <option>Grams</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a class="btn btn-submit me-2">Submit</a>
                            <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a class="btn btn-submit me-2">Submit</a>
                            <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Deletion</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="delete-order">
                        <img src="<?=ASSETS?>/img/icons/close-circle1.svg" alt="img">
                    </div>
                    <div class="para-set text-center">
                        <p>The current order will be deleted as no payment has been <br> made so far.</p>
                    </div>
                    <div class="col-lg-12 text-center">
                        <a class="btn btn-danger me-2">Yes</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recent Transactions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tabs-sets">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" aria-controls="purchase" aria-selected="true" role="tab">Purchase</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" aria-controls="payment" aria-selected="false" role="tab">Payment</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" aria-controls="return" aria-selected="false" role="tab">Return</button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="<?=ASSETS?>/img/icons/search-white.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>
                                            </li>
                                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a>
                                            </li>
                                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount	</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07	</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="payment" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="<?=ASSETS?>/img/icons/search-white.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>  <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a> </li>
                                            <li>  <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a> </li>
                                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>  </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount	</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07	</td>
                                                <td>0105</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                                </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07	</td>
                                                <td>0106</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                                </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07	</td>
                                                <td>0107</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                                </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="return" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="<?=ASSETS?>/img/icons/search-white.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>
                                            </li>
                                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a>
                                            </li>
                                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount	</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07	</td>
                                                <td>0106</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                                </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07	</td>
                                                <td>0107</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                                </a>
                                                <a class="me-3" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                                </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    const products = document.querySelector('#productSet')

    products.addEventListener('change', function(e){
        alert('hello')
    })
                                    



</script>

<?=$this->view('includes/footer');?>