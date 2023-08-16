<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Transfer List</h4>
                <h6>Transfer your stocks from one store to another store.</h6>
            </div>
            <div class="page-btn">
                <a href="<?=ROOT?>/transfers/add" class="btn btn-added"><img src="<?=ASSETS?>/img/icons/plus.svg" alt="img" class="me-2">Add Transfer</a>
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
                            <a class="btn btn-searchset">
                                <img src="<?=ASSETS?>/img/icons/search-white.svg" alt="img">
                            </a>
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
                                    <input type="text" placeholder="Enter Reference">
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
                                <th>Date</th>
                                <th>Reference</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Goods total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($rows) && $rows){?>
                                <?php foreach($rows as $transfer){?>
                                    <tr>

                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td><?=$transfer->created_on?></td>
                                        <td><?=$transfer->transfer_ID?></td>
                                        <td><?=$transfer->from_store?></td>
                                        <td><?=$transfer->to_store?></td>
                                        <td class="text-green"><span style="font-size: 9px;">KSh</span> <?=$transfer->goods_total?></td>
                                        <td>
                                            <?php 
                                                $statusT = $transfer->status == 1 ? 'Completed' : ($transfer->status == 2 ? 'Pending' : 'Sent');
                                                $classT = $transfer->status == 1 ? 'bg-lightgreen' : ($transfer->status == 2 ? 'bg-lightyellow' : 'bg-lightred');
                                            ?>
                                            <span class="badges <?=$classT?>"><?=$statusT?></span>
                                        </td>
                                        <td>
                                            <a class="me-3" href="<?=ROOT?>/transfers/transfer_details/<?=$transfer->id?>">
                                                <img src="<?=ASSETS?>/img/icons/eye.svg" alt="img">
                                            </a>
                                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php }else{?>
                                <div>
                                    <p class="text-info">** No Transfer Made Yet **</p>
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