<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>



<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>State List</h4>
                <h6>Manage your State</h6>
            </div>
            <div class="page-btn">
                <a href="<?=ROOT?>/cities/add" class="btn btn-added"><img src="<?=ASSETS?>/img/icons/plus.svg" alt="img" class="me-2">Add State</a>
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
                            <li>  <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>  </li>
                            <li>  <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a>   </li>
                            <li>  <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a> </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose State</option>
                                        <option>Beijing</option>
                                        <option>Newyork</option>
                                        <option>Greece</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Country</option>
                                        <option>China</option>
                                        <option>USA</option>
                                        <option>Athens</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Disable</option>
                                        <option>Enable</option>
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
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>City Name</th>
                                <th>County Name</th>
                                <!-- <th>Status</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $city){?>
                                <tr>

                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td><?=$city->city_name?> </td>
                                    <td><?=$city->region_name?> </td>
                                    <!-- <td>
                                        <?php $status = $city->status ? 'checktoggle' : 'checktoggle' ?>
                                        <div class="status-toggle d-flex justify-content-between align-items-center">
                                            <input type="checkbox" id="user1" class="check">
                                            <label for="user1" class="<?=$status?>">checkbox</label>
                                        </div>
                                    </td> -->
                                    <td>
                                        <a class="me-3" href="<?=ROOT?>/cities/edit/<?=$city->id?>">
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
