<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sales List</h4>
                <h6>Manage your sales</h6>
            </div>
            <div class="page-btn">
                <a href="<?=ROOT?>/sales/add" class="btn btn-added"><img src="<?=ASSETS?>/img/icons/plus.svg" alt="img" class="me-1">Add Sales</a>
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
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a></li>
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a></li>
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a> </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference No">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Completed</option>
                                        <option>Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="<?=ASSETS?>/img/icons/search-whites.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Reference</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Biller</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $sale){?>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td><?=$sale->customer_code?></td>
                                    <td><?=$sale->created_on?></td>
                                    <td><?=$sale->sale_ID?></td>
                                    <td>
                                        <?php 
                                            $status = $sale->status ? "Completed" : "Pending";
                                            $classStatus = $sale->status ? 'bg-lightgreen' : 'bg-lightred';
                                        ?>
                                        <span class="badges <?=$classStatus?>"><?=$status?></span>
                                    </td>
                                    <td>
                                        <?php 
                                            $paymentStatus = $sale->payment_status == 1 ? 'Paid' : ($sale->payment_status == 2 ? 'Partial' : 'Unpaid');
                                            $classPayment = $sale->payment_status == 1 ? 'bg-lightgreen' : ($sale->payment_status == 2 ? 'bg-lightyellow' : 'bg-lightred');
                                        ?>
                                        <span class="badges <?=$classPayment?>"><?=$paymentStatus?></span>
                                    </td>
                                    <td class="text-green"><span style="font-size: 9px;">KSh</span> <?=$sale->total?></td>
                                    <td class="text-green"><?=$sale->paid?></td>
                                    <td><?=$sale->amount_due?></td>
                                    <td>Admin</td>
                                    <td class="text-center">
                                        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?=ROOT?>/sales/sale_details/<?=$sale->id?>" class="dropdown-item"><img src="<?=ASSETS?>/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
                                            </li>
                                            <li><a href="edit-sales.html" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editpayment"><img src="<?=ASSETS?>/img/icons/edit.svg" class="me-2" alt="img">Edit Payment</a>
                                            </li>
                                            <li><a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="<?=ASSETS?>/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
                                            </li>
                                            <li><a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="<?=ASSETS?>/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
                                            </li>
                                            <li><a href="javascript:void(0);" class="dropdown-item"><img src="<?=ASSETS?>/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
                                            </li>
                                            <li><a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="<?=ASSETS?>/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Show Payments</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Reference</th>
                                <th>Amount	</th>
                                <th>Paid By	</th>
                                <th>Paid By	</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bor-b1">
                                <td>2022-03-07	</td>
                                <td>INV/SL0101</td>
                                <td>$ 0.00	</td>
                                <td>Cash</td>
                                <td>
                                    <a class="me-2" href="javascript:void(0);">
                                        <img src="<?=ASSETS?>/img/icons/printer.svg" alt="img">
                                    </a>
                                    <a class="me-2" href="javascript:void(0);" data-bs-target="#editpayment" data-bs-toggle="modal" data-bs-dismiss="modal">
                                        <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="me-2 confirm-text" href="javascript:void(0);">
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


<div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Customer</label>
                            <div class="input-groupicon">
                                <input type="text" value="2022-03-07" class="datetimepicker">
                                <div class="addonset">
                                    <img src="<?=ASSETS?>/img/icons/calendars.svg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Reference</label>
                            <input type="text" value="INV/SL0101">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Received Amount</label>
                            <input type="text" value="0.00">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Paying Amount</label>
                            <input type="text" value="0.00">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Payment type</label>
                            <select class="select">
                                <option>Cash</option>
                                <option>Online</option>
                                <option>Inprogress</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-0">
                            <label>Note</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit">Submit</button>
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Payment</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Customer</label>
                            <div class="input-groupicon">
                                <input type="text" value="2022-03-07" class="datetimepicker">
                                <div class="addonset">
                                    <img src="<?=ASSETS?>/img/icons/datepicker.svg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Reference</label>
                            <input type="text" value="INV/SL0101">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Received Amount</label>
                            <input type="text" value="0.00">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Paying Amount</label>
                            <input type="text" value="0.00">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Payment type</label>
                            <select class="select">
                                <option>Cash</option>
                                <option>Online</option>
                                <option>Inprogress</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-0">
                            <label>Note</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit">Submit</button>
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?=$this->view('includes/footer')?>