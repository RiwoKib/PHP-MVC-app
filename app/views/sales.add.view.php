<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content"> 

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

        <div class="card">
            <div class="card-body"> 
                <div class="row "> 
                    <div id="saveSelectedBtn" style="display: none;">
                        <button class="btn btn-sm btn-outline-warning">Save Selected</button>
                    </div>

                    <div style="display: none;" id="sendSelectedBtn" class="col-lg-12">
                        <div>
                            <button class="btn btn-sm btn-outline-success">Confirm Saved</button>
                        </div>

                        <div class="">
                            <span class="text-danger" style="font-size: 12px">Only confirm after you have finished searching for products</span>
                            <span class="text-info" style="font-size: 12px">Otherwise Continue Searching...</span>
                        </div>
                    </div>

                    <div class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <!-- <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                        </label> -->
                                    </th> 
                                    <th>Product Name</th> 
                                    <th>Quantity</th> 
                                    <th class="me-10">Price</th>
                                    <th class="text-center">Discount %</th>
                                    <th class="text-center">Tax %</th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="searchProductsResults"> 

                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>

        <div class="page-header">
            <div class="page-title">
                <h4>Add Sale</h4>
                <h6>Add your new sale</h6>
            </div>
        </div>  

        <div class="card">
            <div class="card-body"> 
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <select id="customersale" class="select">
                                            <option value="">Choose Customer</option>
                                            <option value="Walk-in-Customer">Walk-in-Customer</option>
                                            <?php foreach ($customers as $customer){?>
                                                <option value="<?=$customer->customer_code?>"><?=$customer->firstname?> <?=$customer->lastname?></option>
                                            <?php }?>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                        </div>  
                    </div> 
                    
                    <div class="row">  
                        <div class="table-responsive mb-3">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th>Product Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Discount %</th>
                                        <th class="text-center">Tax %</th>
                                        <th class="text-center">Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="selectedResults"> 

                                </tbody>
                            </table>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Order Tax</label>
                                <select id="saletax" class="select">
                                    <option value="">Choose Tax</option>
                                    <option value="2">2%</option>
                                    <option value="0.5">0.5%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <select id="salediscount" class="select">
                                    <option value="">Choose Discount</option>
                                    <option value="10">10%</option>
                                    <option value="30">30%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Shipping</label>
                                <select id="saleshipping" class="select">
                                    <option value="">Choose Shipping Cost</option>
                                    <option value="150">Boda  (150/-)</option>
                                    <option value="300">Cargo Courier  (300/-)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select id="salestatus" class="select">
                                    <option value="">Choose Status</option>
                                    <option value="1">Completed</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row "> 
                        <div class="col-lg-12">
                            <a id="addSale" class="btn btn-submit me-2">Add Sale</a>
                            <a href="<?=ROOT?>/sales" class="btn btn-cancel">Cancel</a>
                        </div>
                        
                    </div>  
            </div>
        </div>

        <div id="errorAlert" style="display: none" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Confirm All Fields Blanks Detected.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div id="successMessage" style="display: none" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> New Sale Added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>


<script> 
    const saveSelectedBtn = document.getElementById('saveSelectedBtn');
    const sendSelectedBtn = document.getElementById('sendSelectedBtn');
    const errorAlert = document.getElementById('errorAlert');
    const successMessage = document.getElementById('successMessage');
    const tableSeacrhBody = document.querySelector("#searchProductsResults")  
    const tableSelectedBody = document.querySelector('#selectedResults') 
    const addSaleBtn = document.querySelector('#addSale')
    const selectedData = []  

    function selected_data(data = {}, data2 = {}){
        let sendObject = {
            products: data,
            input: data2
        }

        var ajax = new XMLHttpRequest();

        ajax.addEventListener('readystatechange', function () { 
            if(ajax.readyState == 4 && ajax.status == 200){
                handle_new_sale(ajax.responseText);
            }
         }) 

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/addSale", true);
        ajax.send(JSON.stringify(sendObject));

        // console.log(sendObject)
    }

    function handle_new_sale(result){
        if(result != "" && typeof(JSON.parse(result)) == 'object'){ 
            successMessage.style.display = "block";
        }else{
            alert('error!! something went wrong')
        }
    }

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

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/searchProducts", true);
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
                    product_ID: row.querySelector(".product-checkbox").value,
                    product_quantity: row.querySelector(".input-qty").value,
                    price: row.querySelector('.price').value * row.querySelector(".input-qty").value,
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
                show_selected(ajax.responseText);
            }
         }) 

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/saveSelected/sales", true);
        ajax.send(JSON.stringify(data)); 
    }

    function show_selected(results){ 
        
        if(results != ""){

            let obj = JSON.parse(results)    

            addSaleBtn.addEventListener('click', function(){
                let customersale = document.querySelector('#customersale').value
                let saletax = document.querySelector('#saletax').value
                let salediscount = document.querySelector('#salediscount').value
                let saleshipping = document.querySelector('#saleshipping').value
                let salestatus = document.querySelector('#salestatus').value

                if(customersale == "" || saletax == "" || salediscount == "" || saleshipping == "" || salestatus == ""){
                    errorAlert.style.display = "block";
                }else{
                    errorAlert.style.display = "none";
                    let input = {
                        customer_code: customersale,
                        tax: saletax,
                        discount: salediscount,
                        shipping_cost: saleshipping,
                        status: salestatus
                    }


                    let products = selected_data(obj.selected, input)
                }

                
            });

            tableSelectedBody.innerHTML = obj.tbl_rows;
            // console.log(obj.selected)
        } 
    }


</script>

<?php $this->view('includes/footer'); ?> 
 