<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Transfer Details</h4>
                <h6>View transfer details</h6>
            </div>
        </div>


        <div class="card">
        <div class="card-body"> 
                <div class="table-top">
                    <h5 class="card-title">Transfer Details: <span style="color:#7367F0"><?=$transfer_ID?></span></h5>
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
                                <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Transfer Info</font></font><br>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">From: <?=$transfer_info['from']?></font></font><br>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">To: <?=$transfer_info['to']?></font></font><br>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:green;font-weight: 400;">Goods Worth: <?=$transfer_info['total']?></font></font><br>
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
                                    <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"><?=$transfer_ID?> 
                                    </font>
                                </font><br>
                                <?php 
                                    $colorQ = $transfer_info['status'] == 1 ? 'green' : ($transfer_info['status'] == '2' ? 'orange' : 'red');
                                    $paymentColor = $transfer_info['payment_status'] == 1 ? 'green' : ($transfer_info['payment_status'] == '2' ? 'orange' : 'red');
                                ?>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;font-size: 14px;color:<?=$paymentColor?>;font-weight: 400;"> 
                                        <?php 
                                            $paymentQ = $transfer_info['payment_status'] == 1 ? 'Paid' : ($transfer_info['payment_status'] == '2' ? 'Partial' : 'Unpaid');
                                        ?>
                                        <?=$paymentQ?>
                                    </font>
                                </font><br>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;font-size: 14px;color:<?=$colorQ?>;font-weight: 400;">  
                                        <?php 
                                            $statusQ = $transfer_info['status'] == 1 ? 'Completed' : ($transfer_info['status'] == '2' ? 'Pending' : 'Sent');
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
                                    <th>Quantity</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">VAT %</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-end text-center">Unit Cost</th>
                                    <th class="text-end text-center">Total Price</th>
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
                                            <td class="text-center"><?=$product['quote_description']?></td>
                                            <td class="text-center"><?=$product['tax']?></td>
                                            <td class="text-center"><?=$product['unit']?></td>
                                            <td class="text-center"><?=$product['price']?></td>
                                            <td class="text-center"><?=$product['total_price']?></td>
                                            <td>
                                                <a href="javascript:void(0);" class="delete-set"><img src="<?=ASSETS?>/img/icons/delete.svg" alt="svg"></a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                <?php }else{?>
                                    <div>
                                        <p class="text-info">** No Transfer Items for This Transfer **</p>
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
                                    <h4>Shipping</h4>
                                    <h5 class="text-success"><span style="font-size: 9px;">KSh</span> <?=$transfer_info['shipping_cost']?></h5>
                                </li>
                                <li class="total">
                                    <h4>Grand Total</h4>
                                    <h5 class="text-success"><span style="font-size: 9px;">KSh</span> <?=$transfer_info['grand_total']?></h5>
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