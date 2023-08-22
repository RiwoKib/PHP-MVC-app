<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Sub Category list</h4>
                <h6>View/Search product Category</h6>
            </div>
            <div class="page-btn">
                <a href="<?=ROOT?>/subcategories/add" class="btn btn-added"><img src="<?=ASSETS?>/img/icons/plus.svg" class="me-2" alt="img"> Add Sub Category</a>
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
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a> </li>
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a> </li>
                            <li><a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a> </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="parent" class="select">
                                        <option value="">Choose Category</option>
                                        <?php foreach ($rows as $row) {?>
                                            <option value="<?=get_val('parent')?>"><?=$row->parent_category?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select name="subcategory" class="select">
                                        <option value="">Choose Sub Category</option>
                                        <?php foreach ($rows as $row) {?>
                                            <option value="<?=get_val('subcategory')?>"><?=$row->category_name?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Code</label>
                                    <select name="subsku" class="select">
                                        <option value="">e.g ct001</option>
                                        <?php foreach ($rows as $row) {?>
                                            <option value="<?=get_val('subsku')?>"><?=$row->sku?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                <div class="form-group">
                                    <label>&nbsp;</label>
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
                                <th>Category</th>
                                <th>Parent category</th>
                                <th>Category Code</th>
                                <th>Description</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row) {?>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <!-- </td>
                                    <td>
                                        <a class="product-img">
                                            <img src="<?=ASSETS?>/img/product/product1.jpg" alt="product">
                                        </a>
                                    </td> -->
                                    <td><?=$row->category_name?></td>
                                    <td><?=$row->parent_category?></td>
                                    <td><?=$row->subcategory_ID?></td>
                                    <td><?=$row->description?></td> 
                                    <td>
                                        <a class="me-3" href="<?=ROOT?>/subcategories/edit/<?=$row->id?>">
                                            <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
                                        </a>
                                        <button class="me-3 confirm-text" style="border: none; background:none" value="<?=$row->id?>">
                                            <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
                                        </button>
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