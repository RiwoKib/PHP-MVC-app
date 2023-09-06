<?php

use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

 $this->view('includes/header'); ?> 
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Print Barcode</h4>
                <h6>Print product barcodes</h6>
            </div>
        </div>

        <div id="successMessage" style="display: none" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <p class="message" style="font-size: 14px;"></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">

                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Search Product Name</label>
                            <div class="input-groupicon">
                                <input type="text" id="searchInput" autofocus placeholder="Please type product name/category code and select...">
                                <div class="addonset">
                                    <button style="background:none; border:none" onclick="collect_data(event)" name="searchProduct"><img src="<?=ASSETS?>/img/icons/search.svg" alt=""></button>
                                </div> 
                            </div> 
                                <span id="searchText" class="text-danger" style="display: none;">Type Something to search...</span> 
                        </div> 
                    </div>   
                        
                    <div class="col-lg-2">
                        <a href="<?=ROOT?>/products" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>

                <div class="row">
                    <div id="saveSelectedBtn" style="display: none;">
                        <button class="btn btn-sm btn-outline-warning">Save Selected</button>
                    </div>

                    <div style="display: none;" id="sendSelectedBtn" class="col-lg-12">
                        <div>
                            <button class="btn btn-sm btn-outline-success">Generate Barcodes</button>
                        </div>

                        <div class="">
                            <span class="text-danger" style="font-size: 12px">Only generate after you have finished searching for products</span>
                            <span class="text-info" style="font-size: 12px">Otherwise Continue Searching...</span>
                        </div>
                    </div>

                    <div class="table-responsive mb-5">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <!-- <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                        </label> -->
                                    </th>
                                    <th>Name</th>
                                    <th class="text-center">Product ID</th>
                                    <th class="text-center">Qty</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="searchResults">

                            </tbody>
                        </table>
                    </div>
                
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Paper Size</label>
                            <select class="select">
                                <option>36mm (1.4 inch)</option>
                                <option>12mm (1 inch)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    const saveSelectedBtn = document.getElementById('saveSelectedBtn');
    const sendSelectedBtn = document.getElementById('sendSelectedBtn');
    const errorAlert = document.getElementById('errorAlert');
    const successMessage = document.getElementById('successMessage');
    const tableSeacrhBody = document.querySelector("#searchResults")  
    //const tableSelectedBody = document.querySelector('#purchaseSelected') 
    const messageTxt = document.querySelector('.message')
    const selectedData = []

    

    function collect_data(e){
        var spanSearch = document.querySelector('#searchText');
        var searchInput = document.querySelector('#searchInput');

        let searchData = searchInput.value.trim();

        if(searchData == ""){
            spanSearch.style.display="block";
        }else{
            spanSearch.style.display="none";  
            send_data({data : searchData})
            searchInput.value = ""
        } 

        
    }

    function send_data(data = {}){
        var ajax = new XMLHttpRequest();

        ajax.addEventListener('readystatechange', function () { 
            if(ajax.readyState == 4 && ajax.status == 200){
                handle_results(ajax.responseText);
            }
         }) 

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/searchProducts/barcodes", true);
        ajax.send(JSON.stringify(data)); 
    }

    function handle_results(results){
        
        if(results != ""){

            let obj = JSON.parse(results)  

            tableSeacrhBody.innerHTML = obj.tbl_rows;
            // console.log(obj.product_info)
        } 
    } 

    tableSeacrhBody.addEventListener("change", function(event) {

        sendSelectedBtn.style.display = "none";

        const checkboxes = document.querySelectorAll('.product-checkbox'); 
        const checkedBoxes = Array.from(checkboxes).filter(function(cb) {
            return cb.checked;
        });

        if (checkedBoxes.length > 0) {
            saveSelectedBtn.style.display = "block";
        } else {
            saveSelectedBtn.style.display = "none";
        }
    }); 


    saveSelectedBtn.addEventListener("click", function(e) { 
        e.preventDefault();

        saveSelectedBtn.style.display = "none";
        sendSelectedBtn.style.display = "block";

        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                var row = checkbox.closest("tr");
                var rowData = {
                    product_ID: row.querySelector(".product-checkbox").value
                };
                selectedData.push(rowData);
            }
        });

        // console.log(selectedData)
    });   

    

    sendSelectedBtn.addEventListener('click', function (e) { 
        e.preventDefault()

        handle_selected(selectedData)
        sendSelectedBtn.style.display = "none";
        tableSeacrhBody.innerHTML = "";
        
    })

    function handle_selected(data = {}){ 
        let ajax = new XMLHttpRequest();

        ajax.addEventListener('readystatechange', function () { 
            if(ajax.readyState == 4 && ajax.status == 200){
                show_results(ajax.responseText);
            }
         }) 

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/generateBarcodes", true);
        ajax.send(JSON.stringify(data)); 
    }

    function show_results(results){
        if(results != "" && typeof(JSON.parse(results)) == 'object'){ 
            obj = JSON.parse(results)
            successMessage.style.display = "block";
            messageTxt.innerHTML = obj.message
            //console.log(result)
        }else{
            alert('error!! something went wrong')
        }
    }
</script>

<?php $this->view('includes/footer'); ?>