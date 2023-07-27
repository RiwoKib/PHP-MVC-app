<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Supplier List</h4>
                <h6>Manage your Supplier</h6>
            </div>
            <div class="page-btn">
                <a href="<?=ROOT?>/suppliers/add" class="btn btn-added"><img src="<?=ASSETS?>/img/icons/plus.svg" alt="img">Add Supplier</a>
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
                            <li>  <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>  </li>
                            <li> <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a>  <li>   <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>   </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Supplier Code">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Supplier">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Email">
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
                                <th>code</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $supplier){?>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td class="productimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="<?=ASSETS?>/img/product/noimage.png" alt="product">
                                        </a>
                                        <a href="javascript:void(0);"><?=$supplier->supplier_name?></a>
                                    </td>
                                    <td><?=$supplier->supplier_code?></td>
                                    <td>0<?=$supplier->phone_number?> </td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b8ccd0d7d5d9cbf8ddc0d9d5c8d4dd96dbd7d5">[email&#160;protected]</a></td>
                                    <td><?=$supplier->country?></td>
                                    <td><?=$supplier->city?></td>
                                    <td>
                                        <a class="me-3" href="<?=ROOT?>/suppliers/edit/<?=$supplier->id?>">
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