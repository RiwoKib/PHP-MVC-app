<?php
$currentURL = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/'; 
$urlSegments = explode('/', trim($currentURL, '/'));

//Get the last item
$active_nav = $urlSegments[count($urlSegments) - 1]; 
// Get the second last item
$controller = $urlSegments[count($urlSegments) - 2] . "/". $active_nav;
?>
  

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                <a <?= $active_nav == 'dashboard' ? 'class="active"' : ''?> href="<?=ROOT?>/dashboard"><img src="<?=ASSETS?>/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/product.svg" alt="img"><span> Product</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a <?= $active_nav == 'products' ? 'class="active"' : ''?> href="<?=ROOT?>/products">Product List</a></li>
                        <li><a <?= $controller == 'products/add' ? 'class="active"' : ''?> href="<?=ROOT?>/products/add ">Add Product</a></li>
                        <li><a <?= $active_nav == 'categories' ? 'class="active"' : ''?> href="<?=ROOT?>/categories">Category List</a></li>
                        <li><a <?= $controller == 'categories/add' ? 'class="active"' : ''?> href="<?=ROOT?>/categories/add">Add Category</a></li>
                        <li><a <?= $active_nav == 'subcategories' ? 'class="active"' : ''?> href="<?=ROOT?>/subcategories">Sub Category List</a></li>
                        <li><a <?= $controller == 'subcategories/add' ? 'class="active"' : ''?> href="<?=ROOT?>/subcategories/add">Add Sub Category</a></li>
                        <li><a <?= $active_nav == 'brands' ? 'class="active"' : ''?> href="<?=ROOT?>/brands ">Brand List</a></li>
                        <li><a <?= $controller == 'brands/add' ? 'class="active"' : ''?> href="<?=ROOT?>/brands/add">Add Brand</a></li>
                        <li><a <?= $controller == 'products/import' ? 'class="active"' : ''?> href="<?=ROOT?>/products/import">Import Products</a></li>
                        <li><a <?= $controller == 'products/barcode' ? 'class="active"' : ''?> href="<?=ROOT?>/products/barcode">Print Barcode</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/sales1.svg" alt="img"><span> Sales</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a <?= $active_nav == 'sales' ? 'class="active"' : ''?> href="<?=ROOT?>/sales">Sales List</a></li>
                        <li><a href="<?=ROOT?>/pos">POS</a></li>
                        <li><a href="<?=ROOT?>/sales/add" <?= $controller == 'sales/add' ? 'class="active"' : ''?>>New Sales</a></li>
                       </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/purchase1.svg" alt="img"><span> Purchase</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?=ROOT?>/purchases" <?= $active_nav == 'purchases' ? 'class="active"' : ''?>>Purchase List</a></li>
                        <li><a href="<?=ROOT?>/purchases/add" <?= $controller == 'purchases/add' ? 'class="active"' : ''?>>Add Purchase</a></li>
                        <li><a href="<?=ROOT?>/purchases/import" <?= $controller == 'purchases/import' ? 'class="active"' : ''?>>Import Purchase</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/expense1.svg" alt="img"><span> Expense</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?=ROOT?>/expenses" <?= $active_nav == 'expenses' ? 'class="active"' : ''?>>Expense List</a></li>
                        <li><a href="<?=ROOT?>/expenses/add" <?= $controller == 'expenses/add' ? 'class="active"' : ''?>>Add Expense</a></li> 
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/quotation1.svg" alt="img"><span> Quotation</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?=ROOT?>/quotations" <?= $active_nav == 'quotations' ? 'class="active"' : ''?>>Quotation List</a></li>
                        <li><a href="<?=ROOT?>/quotations/add" <?= $controller == 'quotations/add' ? 'class="active"' : ''?>>Add Quotation</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/transfer1.svg" alt="img"><span> Transfer</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?=ROOT?>/transfers" <?= $active_nav == 'transfers' ? 'class="active"' : ''?>>Transfer List</a></li>
                        <li><a href="<?=ROOT?>/transfers/add" <?= $controller == 'transfers/add' ? 'class="active"' : ''?>>Add Transfer </a></li>
                        <li><a href="<?=ROOT?>/transfers/import" <?= $controller == 'transfers/import' ? 'class="active"' : ''?>>Import Transfer </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/return1.svg" alt="img"><span> Return</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul> 
                        <li><a href="<?=ROOT?>/salesreturn" <?= $active_nav == 'salesreturn' ? 'class="active"' : ''?>>Sales Return List</a></li>
                        <li><a href="<?=ROOT?>/salesreturn/add" <?= $controller == 'salesreturn/add' ? 'class="active"' : ''?>>New Sales Return</a></li>
                        <li><a href="<?=ROOT?>/purchasereturns" <?= $active_nav == 'purchasereturns' ? 'class="active"' : ''?>>Purchase Return List</a></li>
                        <li><a href="<?=ROOT?>/purchasereturns/add" <?= $controller == 'purchasereturns/add' ? 'class="active"' : ''?>>Add Purchase Return </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/users1.svg" alt="img"><span> People</span> 
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?=ROOT?>/customers" <?= $active_nav == 'customers' ? 'class="active"' : ''?>>Customer List</a></li>
                        <li><a href="<?=ROOT?>/customers/add" <?= $controller == 'customers/add' ? 'class="active"' : ''?>>Add Customer </a></li>
                        <li><a href="<?=ROOT?>/suppliers" <?= $active_nav == 'suppliers' ? 'class="active"' : ''?>>Supplier List</a></li>
                        <li><a href="<?=ROOT?>/suppliers/add" <?= $controller == 'suppliers/add' ? 'class="active"' : ''?>>Add Supplier </a></li>  
                    </ul>
                </li>
                
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="<?=ASSETS?>/img/icons/places.svg" alt="img"><span> Places</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?=ROOT?>/countries/add" <?= $controller == 'countries/add' ? 'class="active"' : ''?>>New Country</a></li>
                        <li><a href="<?=ROOT?>/countries" <?= $active_nav == 'countries' ? 'class="active"' : ''?>>Countries list</a></li>
                        <li><a href="<?=ROOT?>/cities/add" <?= $controller == 'cities/add' ? 'class="active"' : ''?>>New City </a></li>
                        <li><a href="<?=ROOT?>/cities" <?= $active_nav == 'cities' ? 'class="active"' : ''?>>City list</a></li>
                    </ul>
                </li>
        
        
        
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/time.svg" alt="img">
                        <span> Report</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?=ROOT?>/purchases/report" <?= $controller == 'purchases/report' ? 'class="active"' : ''?>>Purchase order report</a></li>
                        <li><a href="<?=ROOT?>/inventory" <?= $active_nav == 'inventory' ? 'class="active"' : ''?>>Inventory Report</a></li>
                        <li><a href="<?=ROOT?>/sales/report" <?= $controller == 'sales/report' ? 'class="active"' : ''?>>Sales Report</a></li>
                        <li><a href="<?=ROOT?>/sales/invoice" <?= $controller == 'sales/invoice' ? 'class="active"' : ''?>>Invoice Report</a></li> 
                        <li><a href="<?=ROOT?>/suppliers/report" <?= $controller == 'suppliers/report' ? 'class="active"' : ''?>>Supplier Report</a></li>
                        <li><a href="<?=ROOT?>/customers/report" <?= $controller == 'customers/report' ? 'class="active"' : ''?>>Customer Report</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/users1.svg" alt="img">
                        <span> Users</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?=ROOT?>/users" <?= $active_nav == 'users' ? 'class="active"' : ''?>>User List</a></li>
                        <li><a href="<?=ROOT?>/register">New User </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="<?=ASSETS?>/img/icons/settings.svg" alt="img"><span> Settings</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="<?=ROOT?>/settings/general" >>General Settings</a></li>
                        <li><a href="<?=ROOT?>/settings/email" >Email Settings</a></li>
                        <li><a href="<?=ROOT?>/settings/payment">Payment Settings</a></li>
                        <li><a href="<?=ROOT?>/settings/currency">Currency Settings</a></li>
                        <li><a href="<?=ROOT?>/settings/authorize">Group Permissions</a></li>
                        <li><a href="<?=ROOT?>/settings/taxRates">Tax Rates</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div> 