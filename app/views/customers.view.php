<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
    <div class="page-header">
    <div class="page-title">
    <h4>Customer List</h4>
    <h6>Manage your Customers</h6>
    </div>
    <div class="page-btn">
    <a href="<?=ROOT?>/customers/add" class="btn btn-added"><img src="<?=ASSETS?>/img/icons/plus.svg" alt="img">Add Customer</a>
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
    <input type="text" placeholder="Enter Customer Code">
    </div>
    </div>
    <div class="col-lg-2 col-sm-6 col-12">
    <div class="form-group">
    <input type="text" placeholder="Enter Customer Name">
    </div>
    </div>
    <div class="col-lg-2 col-sm-6 col-12">
    <div class="form-group">
    <input type="text" placeholder="Enter Phone Number">
    </div>
    </div>
    <div class="col-lg-2 col-sm-6 col-12">
    <div class="form-group">
    <input type="text" placeholder="Enter Email">
    </div>
    </div>
    <div class="col-lg-1 col-sm-6 col-12  ms-auto">
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
    <th>code</th>
    <th>Customer</th>
    <th>Phone</th>
    <th>email</th>
    <th>Country</th>
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
    <img src="<?=ASSETS?>/img/customer/customer1.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Thomas</a>
    </td>
    <td>201</td>
    <td>Thomas</td>
    <td>+12163547758 </td>
    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1165797e7c7062517469707c617d743f727e7c">[email&#160;protected]</a></td>
    <td>USA</td>
    <td>
    <a class="me-3" href="editcustomer.html">
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
    <img src="<?=ASSETS?>/img/customer/customer2.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">Benjamin</a>
    </td>
    <td>202</td>
    <td>Benjamin</td>
    <td>123-456-888</td>
    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dcbfa9afa8b3b1b9ae9cb9a4bdb1acb0b9f2bfb3b1">[email&#160;protected]</a></td>
    <td>USA</td>
    <td>
    <a class="me-3" href="editcustomer.html">
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
    <img src="<?=ASSETS?>/img/customer/customer3.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">James</a>
    </td>
    <td>521</td>
    <td>James</td>
    <td>123-456-888</td>
    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6d0e181e190200081f2d08150c001d0108430e0200">[email&#160;protected]</a></td>
    <td>USA</td>
    <td>
    <a class="me-3" href="editcustomer.html">
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
    <img src="<?=ASSETS?>/img/customer/customer6.jpg" alt="product">
    </a>
    <a href="javascript:void(0);">James Stawberry</a>
    </td>
    <td>254</td>
    <td>James Stawberry</td>
    <td>+12163547758 </td>
    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="caa9bfb9bea5a7afb88aafb2aba7baa6afe4a9a5a7">[email&#160;protected]</a></td>
    <td>Angola</td>
    <td>
    <a class="me-3" href="editcustomer.html">
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
    <a href="javascript:void(0);" class="product-imgs">
    WC
    </a>
    <a href="javascript:void(0);">James Stawberry</a>
    </td>
    <td>681</td>
    <td>Fred john</td>
    <td>123-456-888</td>
    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6e040106002e0b160f031e020b400d0103">[email&#160;protected]</a></td>
    <td>Albania</td>
    <td>
    <a class="me-3" href="editcustomer.html">
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
    </div>


    <div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
    <td>$ 1500.00	</td>
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
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Create Payment</h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
    <div class="row">
    <div class="col-lg-6 col-sm-12 col-12">
    <div class="form-group">
    <label>Customer</label>
    <div class="input-group">
    <input type="text" value="2022-03-07" class="datetimepicker">
    <a class="scanner-set input-group-text">
    <img src="<?=ASSETS?>/img/icons/datepicker.svg" alt="img">
    </a>
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
    <input type="text" value="1500.00">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12 col-12">
    <div class="form-group">
    <label>Paying Amount</label>
    <input type="text" value="1500.00">
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
    <div class="form-group">
    <label>Note</label>
    <textarea class="form-control"></textarea>
    </div>
    </div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-submit">Submit</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>


    <div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
    <div class="input-group">
    <input type="text" value="2022-03-07" class="datetimepicker">
    <a class="scanner-set input-group-text">
    <img src="<?=ASSETS?>/img/icons/datepicker.svg" alt="img">
    </a>
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
    <input type="text" value="1500.00">
    </div>
    </div>
    <div class="col-lg-6 col-sm-12 col-12">
    <div class="form-group">
    <label>Paying Amount</label>
    <input type="text" value="1500.00">
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
    <div class="form-group">
    <label>Note</label>
    <textarea class="form-control"></textarea>
    </div>
    </div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-submit">Submit</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?>
