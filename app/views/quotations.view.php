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
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=ASSETS?>/img/icons/pdf.svg" alt="img"></a>
    </li>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=ASSETS?>/img/icons/excel.svg" alt="img"></a>
    </li>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=ASSETS?>/img/icons/printer.svg" alt="img"></a>
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
    <th>Product Name</th>
    <th>Reference</th>
    <th>Custmer Name</th>
    <th>Status</th>
    <th>Grand Total ($)</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product1.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Macbook pro</a>
    </td>
    <td>PT001</td>
    <td>walk-in-customer</td>
    <td><span class="badges bg-lightgreen">Sent</span></td>
    <td>550</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product2.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Orange</a>
    </td>
    <td>PT002</td>
    <td>walk-in-customer</td>
    <td><span class="badges bg-lightyellow">Ordered</span></td>
    <td>410</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product4.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Stawberry</a>
    </td>
    <td>PT003</td>
    <td>walk-in-customer</td>
    <td><span class="badges bg-lightred">Pending</span></td>
    <td>210</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product5.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Avocat</a>
    </td>
    <td>PT004</td>
    <td>John Smith</td>
    <td><span class="badges bg-lightgreen">Sent</span></td>
    <td>500</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product6.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Macbook Pro</a>
    </td>
    <td>PT005</td>
    <td>Beverly</td>
    <td><span class="badges bg-lightred">Pending</span></td>
    <td>1050</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product7.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Apple Earpods</a>
    </td>
    <td>PT006</td>
    <td>B. Huber</td>
    <td><span class="badges bg-lightgreen">Sent</span></td>
    <td>2530</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product8.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">iPhone 11	</a>
    </td>
    <td>PT007</td>
    <td>Thomas</td>
    <td><span class="badges bg-lightgreen">Sent</span></td>
    <td>550</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product9.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">samsung	</a>
    </td>
    <td>PT008</td>
    <td>Benjamin</td>
    <td><span class="badges bg-lightgreen">Ordered</span></td>
    <td>550</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product10.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Unpaired gray</a>
    </td>
    <td>PT0010</td>
    <td>James</td>
    <td><span class="badges bg-lightred">Pending</span></td>
    <td>210</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product7.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Apple Earpods</a>
    </td>
    <td>PT006</td>
    <td>B. Huber</td>
    <td><span class="badges bg-lightgreen">Sent</span></td>
    <td>2530</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product8.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">iPhone 11	</a>
    </td>
    <td>PT007</td>
    <td>Thomas</td>
    <td><span class="badges bg-lightgreen">Sent</span></td>
    <td>550</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="<?=ASSETS?>/img/icons/delete.svg" alt="img">
    </a>
    </td>
    </tr>
    <tr>
    <td>
    <label class="checkboxs">
    <input type="checkbox">
    <span class="checkmarks"></span>
    </label>
    </td>
    <td class="productimgname">
    <a href="javascript:void(0);" class="product-img">
    <img src="<?=ASSETS?>/img/product/product9.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">samsung	</a>
    </td>
    <td>PT008</td>
    <td>Benjamin</td>
    <td><span class="badges bg-lightgreen">Ordered</span></td>
    <td>550</td>
    <td>
    <a class="me-3" href="editquotation.html">
    <img src="<?=ASSETS?>/img/icons/edit.svg" alt="img">
    </a>
    <a class="me-3 confirm-text" href="javascript:void(0);">
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

<?php $this->view('includes/footer'); ?>