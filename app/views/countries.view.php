<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
    <div class="page-header">
    <div class="page-title">
    <h4>Country List</h4>
    <h6>Manage your Countries</h6>
    </div>
    <div class="page-btn">
    <a href="<?=ROOT?>/countries/add" class="btn btn-added">
    <img src="<?=ASSETS?>/img/icons/plus.svg" alt="img" class="me-2">Add Country
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
    <select class="select">
    <option>Choose Country</option>
    <option>USA</option>
    <option>India</option>
    </select>
    </div>
    </div>
    <div class="col-lg-2 col-sm-6 col-12">
    <div class="form-group">
    <select class="select">
    <option>Choose Region</option>
    <option>Region</option>
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
    <th>Country Name</th>
    <th>Region</th>
    <th>Status</th>
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
    <td>China</td>
    <td>Beijing </td>
    <td>
    <div class="status-toggle d-flex justify-content-between align-items-center">
    <input type="checkbox" id="user1" class="check">
    <label for="user1" class="checktoggle">checkbox</label>
    </div>
    </td>
    <td>
    <a class="me-3" href="editcountry.html">
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
    <td>USA</td>
    <td>Newyork </td>
    <td>
    <div class="status-toggle d-flex justify-content-between align-items-center">
    <input type="checkbox" id="user2" class="check" checked="">
    <label for="user2" class="checktoggle">checkbox</label>
    </div>
    </td>
    <td>
    <a class="me-3" href="editcountry.html">
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
    <td>Phuket island</td>
    <td>Mueang Phuket </td>
    <td>
    <div class="status-toggle d-flex justify-content-between align-items-center">
    <input type="checkbox" id="user10" class="check">
    <label for="user10" class="checktoggle">checkbox</label>
    </div>
    </td>
    <td>
    <a class="me-3" href="editcountry.html">
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
    <td>Germany</td>
    <td>Berlin</td>
    <td>
    <div class="status-toggle d-flex justify-content-between align-items-center">
    <input type="checkbox" id="user11" class="check">
    <label for="user11" class="checktoggle">checkbox</label>
    </div>
    </td>
    <td>
    <a class="me-3" href="editcountry.html">
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
    <td>Angola</td>
    <td>Luanda</td>
    <td>
    <div class="status-toggle d-flex justify-content-between align-items-center">
    <input type="checkbox" id="user12" class="check">
    <label for="user12" class="checktoggle">checkbox</label>
    </div>
    </td>
    <td>
    <a class="me-3" href="editcountry.html">
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
    <td>Albania</td>
    <td>Albania </td>
    <td>
    <div class="status-toggle d-flex justify-content-between align-items-center">
    <input type="checkbox" id="user15" class="check">
    <label for="user15" class="checktoggle">checkbox</label>
    </div>
    </td>
    <td>
    <a class="me-3" href="editcountry.html">
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


    </div>
</div>


<?php $this->view('includes/footer'); ?>  