<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>PURCHASE LIST</h4>
                <h6>Manage your purchases</h6>
            </div>
            <div class="page-btn">
                <a href="<?=ROOT?>/purchases/add" class="btn btn-added">
                    <img src="<?=ASSETS?>/img/icons/plus.svg" alt="img">Add New Purchases
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="<?=ASSETS?>/img/icons/filter.svg" alt="img">
                                <span><img src="<?=ASSETS?>/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="<?=ASSETS?>/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>  </li>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a> </li>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>  </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference">
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Supplier</option>
                                        <option>Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Payment Status</option>
                                        <option>Payment Status</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="<?=ASSETS?>/img/icons/search-whites.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Supplier Name</th>
                                <th>Reference</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Grand Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $purchase){?>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td class="text-bolds"></td>
                                    <td><?=$purchase->purchase_code?></td>
                                    <td><?=$purchase->created_on?></td>
                                    <td>
                                        <?php 
                                            $status = $purchase->status == 'received' ? 'received' : ($purchase->status == 'pending' ? 'pending' : 'ordered');
                                            
                                            $class = $purchase->status == 'received' ? 'bg-lightgreen' : ($purchase->status == 'pending' ? 'bg-lightred' : 'bg-lightyellow') 
                                        ?> 
                                        <span class="badges <?=$class?>"><?=$status?></span>
                                    </td>
                                    <td><span class="text-success" style="font-size: 9px">KSh</span> <?=$purchase->total?></td>
                                    <td><span class="text-success" style="font-size: 9px">KSh</span> <?=$purchase->paid?></td>
                                    <td><span class="text-success" style="font-size: 9px">KSh</span> <?=$purchase->due?></td>
                                    <td>
                                        <?php 
                                            $paymentStatus = $purchase->payment_status == 'paid' ? 'paid' : ($purchase->payment_status == 'partial' ? 'partial' : 'unpaid');
                                            
                                            $paymentClass = $purchase->payment_status == 'paid' ? 'bg-lightgreen' : ($purchase->payment_status == 'unpaid' ? 'bg-lightred' : 'bg-lightyellow') 
                                        ?> 
                                        <span class="badges <?=$paymentClass?>"><?=$paymentStatus?></span>
                                    </td>
                                    <td>
                                        <a class="me-3" href="editpurchase.html">
                                            <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                        </a>
                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                            <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                        </a>
                                    </td>
                                </tr>
                            <?php }?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->view('includes/footer'); ?> 