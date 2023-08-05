<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Sale</h4>
                <h6>Add your new sale</h6>
            </div>
        </div>

        
        
        <form action="" method="post">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Search Product Name</label>
                    <div class="input-groupicon">
                        <input type="text" id="searchInput" name="searchData" placeholder="Please type product name/category code and select...">
                        <div class="addonset">
                            <button style="background:none; border:none" name="searchProduct"><img src="<?=ASSETS?>/img/icons/search.svg" alt=""></button>
                        </div> 
                    </div>
                    <?php if(count($errors) > 0){?>
                        <span class="text-danger"><?=$errors[0]?></span>
                    <?php }?>
                </div> 
            </div> 
            
        </form>  
    
        <?php //show($selected) ?>

        <div class="card">
            <div class="card-body">
                <form id="saveSelected" method="post"> 
                    <div class="row "> 
                        <div id="saveSelectedBtn" style="display: none;">
                            <button type="submit" name="save_selected" class="btn btn-sm btn-outline-warning">Save Selected</button>
                        </div>

                        <div class="table-responsive mb-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <!-- <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                            </label> -->
                                        </th> 
                                        <th>Product Name</th> 
                                        <th class="me-10">Price</th>
                                        <th class="text-center">Discount %</th>
                                        <th class="text-center">Tax %</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        if(isset($results) && $results){?>
                                        <?php foreach($results as $product){?>
                                            <tr> 

                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox" name="selected[]" class="product-checkbox" value="<?=$product->product_ID?>">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>   
                                                <td class="productimgname">
                                                    <a class="product-img">
                                                        <img src="<?=UPLOADED?>/<?=$product->image?>" alt="product">
                                                    </a>
                                                    <a href="javascript:void(0);"><?=$product->product_name?></a>
                                                </td>
                                                <td><?=$product->selling_price?></td>
                                                <td class="text-center"><?=$product->discount * 100?></td>
                                                <td class="text-center"><?=$product->tax * 100?></td> 
                                                <td>
                                                    <a href="javascript:void(0);" class="delete-set"><img src="<?=ASSETS?>/img/icons/delete.svg" alt="svg"></a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    <?php }else{?>
                                        <div>
                                            <p class="text-info">** Search for Products Above **</p>
                                        </div>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <!-- <form action="" method="post"> -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <select name="customer" class="select">
                                            <option value="">Choose Customer</option>
                                            <option value="Walk-in-Customer">Walk-in-Customer</option>
                                            <?php foreach ($customers as $customer){?>
                                                <option value="<?=$customer->firstname?> <?=$customer->lastname?>"><?=$customer->firstname?> <?=$customer->lastname?></option>
                                            <?php }?>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                        </div>  
                    </div> 
                    
                    <!-- <form method="post">  -->
                        <div class="row">  
                            <div class="table-responsive mb-3">
                                <table class="table">
                                    <thead>
                                        <tr> 
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Discount %</th>
                                            <th class="text-center">Tax %</th>
                                            <th class="text-center">Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sub_total = 0;
                                            if(isset($selected)){?>
                                            <?php foreach($selected as $product){?> 
                                                <tr>   
                                                    <td class="productimgname">
                                                        <a class="product-img">
                                                            <img src="<?=UPLOADED?>/<?=$product['image']?>" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);"><?=$product['product_name']?></a>
                                                    </td>
                                                    <td class="product_data">
                                                        <div class="input-group form-group mb-0">
                                                            <input type="hidden" class="prod_id" value="<?=$product['id']?>">
                                                            <a class="scanner-set incrementBtn input-group-text">
                                                                <img src="<?=ASSETS?>/img/icons/plus1.svg" alt="img">
                                                            </a>
                                                            <input disabled type="text" value="1" class="calc-no input-qty">
                                                            <a class="scanner-set decrementBtn input-group-text">
                                                                <img src="<?=ASSETS?>/img/icons/minus.svg" alt="img">
                                                            </a>
                                                        </div> 
                                                    </td>
                                                    <td class="text-center"><?=$product['unit']?></td>
                                                    <td class="text-center"><?=$product['price']?></td>
                                                    <td class="text-center"><?=$product['discount'] * 100?></td>
                                                    <td class="text-center"><?=$product['tax'] * 100?></td>
                                                    <td class="text-center"><?=$sub_total?></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="delete-set"><img src="<?=ASSETS?>/img/icons/delete.svg" alt="svg"></a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        <?php }else{?>
                                            <div>
                                                <p class="text-warning">** No Products Selected **</p>
                                            </div>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!-- </form> -->

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Order Tax</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Shipping</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select">
                                    <option>Choose Status</option>
                                    <option>Completed</option>
                                    <option>Inprogress</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row "> 
                        <div class="col-lg-12 float-md-right">
                            <div class="total-order ">
                                <ul>
                                    <li>
                                        <h4>Order Tax</h4>
                                        <h5 class="text-success">KES 0.00 (0.00%)</h5>
                                    </li>
                                    <li>
                                        <h4>Discount	</h4>
                                        <h5 class="text-success">KES 0.00</h5>
                                    </li>
                                    <li>
                                        <h4>Shipping</h4>
                                        <h5 class="text-success">KES 0.00</h5>
                                    </li>
                                    <li class="total">
                                        <h4>Grand Total</h4>
                                        <h5 class="text-success">KES 0.00</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" name="addSale" class="btn btn-submit me-2">Add Sale</button>
                            <a href="<?=ROOT?>/sales" class="btn btn-cancel">Cancel</a>
                        </div>
                        
                    </div> 
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?> 
 