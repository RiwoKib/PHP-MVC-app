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
                                    <th>Price</th>
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
                <h4>Purchase Add</h4>
                <h6>Add Purchase</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Supplier Name</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    <select id="supplierName" class="select">
                                        <option value="">Select Supplier</option> 
                                        <?php foreach($suppliers as $supplier){?>
                                            <option value="<?=$supplier->supplier_code?>"><?=$supplier->supplier_name?></option>
                                        <?php }?> 
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Purchase Date</label>
                            <div class="input-groupicon">
                                <input id="date" type="text" placeholder="DD-MM-YYYY" class="datetimepicker">
                                <div class="addonset">
                                    <img src="<?=ASSETS?>/img/icons/calendars.svg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div> 
                   
                </div> 

                <div class="row">
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr> 
                                    <th>Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center">Purchase Price</th>
                                    <th class="text-end text-center">Total Cost</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="purchaseSelected">
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Revenue Tax</label>
                            <select id="pTax" class="select">
                                <option value="">Choose Tax</option>
                                <option value="8">8%</option>
                                <option value="10">10%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Purchase Discount</label>
                            <select id="discount" class="select">
                                <option value="">Choose Discount</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="30">30%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Shipping</label>
                            <select id="shippingCost" class="select">
                                <option value="">Choose Shipping Cost</option>
                                <option value="150">Boda  (150/-)</option>
                                <option value="300">Cargo Courier  (300/-)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status <span class="text-info" style="font-size: 11px;">Ordered by default</span></label>
                            <select id="status" class="select">
                                <option value="">Choose Status</option>
                                <option value="1">Delivered</option>
                                <option value="2">Pending</option>
                                <option value="0" selected>Ordered</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row "> 
                    <div class="col-lg-12">
                        <a id="addPurchase" class="btn btn-submit me-2">Add Purchase</a>
                        <a href="<?=ROOT?>/purchases" class="btn btn-cancel">Cancel</a>
                    </div>  
                </div> 
            </div>
        </div>

        <div id="errorAlert" style="display: none" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Confirm All Fields Blanks Detected.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div id="successMessage" style="display: none" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> New Purchase Added.
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
    const tableSelectedBody = document.querySelector('#purchaseSelected') 
    const addPurchaseBtn = document.querySelector('#addPurchase')
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

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/searchProducts/purchase", true);
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
        
        const priceInputs = document.querySelectorAll('.price');
    
        priceInputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                formatNumberInput(this);
            });
        });

        function formatNumberInput(input) {
            const inputValue = input.value.replace(/\D/g, ''); // Remove non-digit characters
            
            // Insert commas from the right
            let formattedValue = inputValue;
            if (inputValue.length > 3) {
                formattedValue = inputValue.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            
            input.value = formattedValue;
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
                    buying_price: row.querySelector('.price').value.replace(/,/g, ''),
                    total_price: row.querySelector('.price').value.replace(/,/g, '') * row.querySelector(".input-qty").value,
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

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/saveSelected/purchase", true);
        ajax.send(JSON.stringify(data)); 
    }

    function show_selected(results){ 
        
        if(results != ""){

            let obj = JSON.parse(results)    

            addPurchaseBtn.addEventListener('click', function(){
                let supplierName = document.querySelector('#supplierName').value
                let pTax = document.querySelector('#pTax').value
                let shippingCost = document.querySelector('#shippingCost').value
                let status = document.querySelector('#status').value
                let date = document.querySelector('#date').value
                let discount = document.querySelector('#discount').value

             
                if(supplierName == "" || pTax == "" || shippingCost == "" || status == "" || date == "" || discount == ""){
                    errorAlert.style.display = "block";
                }else{
                    errorAlert.style.display = "none";
                    let input = {
                        supplier_code: supplierName,
                        tax: pTax,
                        shipping_cost: shippingCost,
                        status: status,
                        date: date,
                        discount: discount,
                    }

                    let products = obj.selected

                    selected_purchase_data(products, input)
                    }

                    // console.log(input, products)
                
            });

            tableSelectedBody.innerHTML = obj.tbl_rows;
        } 
    }

    function selected_purchase_data(data = {}, data2 = {}){
        let sendObject = {
            products: data,
            input: data2
        }

        var ajax = new XMLHttpRequest();

        ajax.addEventListener('readystatechange', function () { 
            if(ajax.readyState == 4 && ajax.status == 200){
                handle_new_purchase(ajax.responseText);
            }
         }) 

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/addPurchase", true);
        ajax.send(JSON.stringify(sendObject));

        // console.log(sendObject)
    }   

    function handle_new_purchase(result){
        if(result != "" && typeof(JSON.parse(result)) == 'object'){ 
            successMessage.style.display = "block";
            //console.log(result)
        }else{
            alert('error!! something went wrong')
        }
    }


</script>

<?php $this->view('includes/footer'); ?>
