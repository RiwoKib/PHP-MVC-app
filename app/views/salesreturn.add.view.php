<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Create Sales Return</h4>
                <h6>Add/Update Sales Return</h6>
            </div>
        </div>

        <form method="post">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Product</label>
                    <div class="input-groupicon">
                        <input type="text" name="searchData" placeholder="Search Product name /category code and select...">
                        <div class="addonset">
                            <button style="background:none; border:none" name="searchProduct"><img src="<?=ASSETS?>/img/icons/search.svg" alt=""></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    <select class="select ">
                                        <option value="">Select Customer</option>
                                        <option value="Walk-in-Customer">Walk-in-Customer</option>
                                        <?php foreach($customers as $customer){?>
                                            <option value="<?=$customer->firstname?> <?=$customer->lastname?>"><?=$customer->firstname?> <?=$customer->lastname?></option>
                                        <?php }?> 
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sale Return Date</label>
                            <div class="input-groupicon">
                                <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker">
                                <div class="addonset">
                                    <img src="<?=ASSETS?>/img/icons/calendars.svg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sale Reference No.</label>
                            <input type="text">
                        </div>
                    </div>
                   
                </div>

                <div class="row">
                    <div id="saveSelectedBtn" style="display: none;">
                        <button type="submit" name="save_selected" class="btn btn-sm btn-outline-warning">Save Selected</button>
                    </div>
                    <div class="table-responsive ">
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
                                    <th>Net Unit Price($)</th> 
                                    <th>QTY	</th>
                                    <th>Discount(KES)	</th>
                                    <th>Tax % </th>
                                    <th>Subtotal (KES)	</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($results) && $results){?>
                                    <?php
                                        $subtotal = 0; 
                                        foreach ($results as $product){?>
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox" name="selected" class="product-checkbox" value="<?=$product->product_ID?>">
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
                                            <td><?=$product->product_quantity?></td>
                                            <td><?=$product->discount?></td>
                                            <td><?=$product->tax?></td>
                                            <td><?=$subtotal?></td>
                                            <td>
                                                <a class="delete-set"><img src="<?=ASSETS?>/img/icons/delete.svg" alt="svg"></a>
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

                <div class="row ">
                    <div class="col-lg-12 float-md-right">
                        <div class="total-order">
                            <ul>
                                <li>
                                    <h4>Order Tax</h4>
                                    <h5 class="text-success">KES 0.00 (0.00%)</h5>
                                </li>
                                <li>
                                    <h4>Discount</h4>
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
                </div>

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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                        <a href="salesreturnlist.html" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?>
 
<script> 

    const saveSelectedBtn = document.getElementById('saveSelectedBtn');
    const checkboxes = document.querySelectorAll('.product-checkbox');

    // Add a change event listener to each checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Check if at least one checkbox is checked
            const atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

            
            if (atLeastOneChecked) {
                saveSelectedBtn.style.display = 'block';
            } else {
                saveSelectedBtn.style.display = 'none';
            }
        });
    });
</script>
