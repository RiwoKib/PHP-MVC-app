<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Quotation List</h4>
                <h6>Manage your Quotations</h6>
            </div>
            <div class="page-btn">
                <a href="<?=ROOT?>/quotations/add" class="btn btn-added">
                <img src="<?=ASSETS?>/img/icons/plus.svg" alt="img" class="me-2"> Add Quotation
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
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference ">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Customer</option>
                                        <option>Customer1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Inprogress</option>
                                        <option>Complete</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ms-auto">
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
                                <th>Reference</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Grand Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($rows) && $rows){?>
                                <?php foreach($rows as $quote){?>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td><?=$quote->quote_ID?></td>
                                        <td><?=$quote->company_name?></td>
                                        <td>
                                            <?php 
                                                $status = $quote->status == 1 ? 'Sent' : ($quote->status == 2 ? 'Pending' : 'Ordered'); 
                                                $Qclass = $quote->status == 1 ? 'bg-lightgreen' : ($quote->status == 2 ? 'bg-lightyellow' : 'bg-lightred')
                                            ?>
                                            <span class="badges <?=$Qclass?>"><?=$status?></span>
                                        </td>
                                        <td class="text-green"><span style="font-size: 9px">KSh</span> <?=$quote->total?></td>
                                        <td>
                                            <a class="me-3" title="details" href="<?=ROOT?>/quotations/quote_details/<?=$quote->id?>">
                                                <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                            </a>
                                            <a class="me-3" title="delete" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php }else{?>
                                    <div>
                                        <p class="text-info">** No Quotations Made Yet **</p>
                                    </div>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->view('includes/footer'); ?>