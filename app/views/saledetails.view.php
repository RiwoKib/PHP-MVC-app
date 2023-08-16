<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sale Details</h4>
                <h6>View sale details</h6>
            </div>
        </div>


        <div class="card">
        <div class="card-body"> 
                <div class="table-top">
                    <h5 class="card-title">Sale Details: <span style="color:#7367F0"><?=$sale_ID?></span></h5>
                    <div class="wordset">
                        <ul>
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/edit.svg" alt="img"></a>
                            </li>
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>  
                
                <table style="width: 100%;line-height: inherit;text-align: left;">
                    <tbody>
                        <tr>
                            <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Customer Info</font></font><br>
                               <?php if(isset($customer_info['firstname']) && $customer_info){?>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?=$customer_info['firstname']?> <?=$customer_info['lastname']?></font></font><br>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3a4d5b565117535417594f494e55575f487a5f425b574a565f14595557">[email&#160;protected]</a></font></font><br>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">0<?=$customer_info['phone_number']?></font></font><br>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"><?=$customer_info['city']?></font></font><br>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"><?=$customer_info['address']?></font></font><br>
                                <?php }else{?>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">Walk-in-Customer</font></font><br>
                                <?php }?>
                            </td>
                            <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Invoice Info</font></font><br>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Reference </font></font><br>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Payment Status</font></font><br>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Status</font></font><br>
                            </td>
                            <td style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px">
                                <font style="vertical-align: inherit;margin-bottom:25px;">
                                    <font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">&nbsp;
                                    </font>
                                </font><br>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"><?=$sale_ID?> 
                                    </font>
                                </font><br>
                                <?php 
                                    $colorQ = $customer_info['status'] == 1 ? 'green' : 'red';
                                    $paymentColor = $customer_info['payment_status'] == 1 ? 'green' : ($customer_info['payment_status'] == '2' ? 'orange' : 'red');
                                ?>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;font-size: 14px;color:<?=$paymentColor?>;font-weight: 400;"> 
                                        <?php 
                                            $paymentQ = $customer_info['payment_status'] == 1 ? 'Paid' : ($customer_info['payment_status'] == '2' ? 'Partial' : 'Unpaid');
                                        ?>
                                        <?=$paymentQ?>
                                    </font>
                                </font><br>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;font-size: 14px;color:<?=$colorQ?>;font-weight: 400;">  
                                        <?php 
                                            $statusQ = $customer_info['status'] == 1 ? 'Completed' : 'Pending';
                                        ?>
                                        <?=$statusQ?>
                                    </font>
                                </font><br>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr> 
                                    <th>Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Discount %</th>
                                    <th class="text-center">VAT %</th>
                                    <th class="text-center">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($rows) && $rows){?>
                                    <?php foreach($rows as $product){?>
                                        <tr>
                                        <td class="productimgname">
                                            <a class="product-img">
                                                <img src="<?=UPLOADED?>/<?=$product['image']?>" alt="product">
                                            </a>
                                            <a href="javascript:void(0);"><?=$product['product_name']?></a>
                                        </td>
                                        <td class="text-center"><?=$product['amount']?></td>
                                        <td class="text-center"><?=$product['unit']?></td>
                                        <td class="text-center"><?=$product['price']?></td>
                                        <td class="text-center"><?=$product['total_price']?></td>
                                        <td class="text-center"><?=$product['tax']?></td>
                                        <td class="text-center"><?=$product['discount']* 100?></td>
                                        <td class="text-center"><?=$product['subtotal']?></td> 
                                        <td>
                                            <a href="javascript:void(0);" class="delete-set"><img src="<?=ASSETS?>/img/icons/delete.svg" alt="svg"></a>
                                        </td>      
                                        </tr>
                                    <?php }?>
                                <?php }else{?>
                                    <div>
                                        <p class="text-info">** No Sold Items for This Sale **</p>
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
                                    <h4>Discount</h4>
                                    <h5 class="text-success"><span style="font-size: 9px;">KSh</span> <?=$customer_info['discount']?></h5>
                                </li>
                                <li>
                                    <h4>Shipping</h4>
                                    <h5 class="text-success"><span style="font-size: 9px;">KSh</span> <?=$customer_info['shipping_cost']?></h5>
                                </li>
                                <li class="total">
                                    <h4>Grand Total</h4>
                                    <h5 class="text-success"><span style="font-size: 9px;">KSh</span> <?=$customer_info['grand_total']?></h5>
                                </li>
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->view('includes/footer'); ?> 