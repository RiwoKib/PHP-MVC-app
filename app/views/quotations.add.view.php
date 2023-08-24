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
                        <button style="background:none; border:none" onclick="collect_search_data(event)" name="searchProduct"><img src="<?=ASSETS?>/img/icons/search.svg" alt=""></button>
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
                                    <th class="text-center">VAT %</th> 
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
                <h4>New Quotation</h4>
                <h6>Select Company Information</h6>
            </div>
        </div> 

        <div class="row mx-5 px-5">
            <div class="col-lg-12 col-sm-12 tabs_wrapper">
                <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                    <li class="active" id="fruits">
                        <div class="product-details ">
                            <h6>Tatu City</h6>
                        </div>
                    </li>
                    <li id="headphone">
                        <div class="product-details "> 
                            <h6>Richard's Camp</h6>
                        </div>
                    </li>
                    <li id="Accessories">
                        <div class="product-details"> 
                            <h6>Garmin Kenya</h6>
                        </div>
                    </li>
                    <li id="Shoes">
                        <a class="product-details"> 
                            <h6>Two Way Comms</h6>
                        </a>
                    </li>
                    <li id="computer">
                        <a class="product-details"> 
                            <h6>Motorola US</h6>
                        </a>
                    </li>
                    <li id="Snacks">
                        <a class="product-details"> 
                            <h6>Garmin International</h6>
                        </a>
                    </li>
                    <li id="watch">
                        <a class="product-details"> 
                            <h6>GiveDirect</h6>
                        </a>
                    </li>
                    <li id="cycle">
                        <a class="product-details"> 
                            <h6>MTN</h6>
                        </a>
                    </li>
                    <li id="fruits1">
                        <div class="product-details "> 
                            <h6>TechnoBit</h6>
                        </div>
                    </li>
                    <li id="headphone1">
                        <div class="product-details "> 
                            <h6>Huawei</h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <h5 class="card-title">Company Details</h5>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="companyName" placeholder="Bilkens Enterprises">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">City</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="select" id="city">
                                                <option value="">Select City</option>
                                                <?php foreach($cities as $city){?>
                                                    <option value="<?=$city->city_name?>"><?=$city->city_name?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="ZIP code" class="form-control" id="zipCode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Address</label>
                            <div class="col-lg-9">
                                <textarea rows="4" cols="5" class="form-control" id="address" placeholder="Enter Location Address"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <h5 class="card-title">Personal details</h5>
                        <div class="row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="First Name" class="form-control" id="firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Last Name" class="form-control" id="lastname">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Phone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="phone" placeholder="0711 000 000">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">email</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="email" placeholder="info@orderit.co.ke">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Quotation Date</label>
                            <div class="col-lg-9">
                                <div class="input-groupicon">
                                    <input type="text" id="date" placeholder="DD-MM-YYYY" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="<?=ASSETS?>/img/icons/calendars.svg" alt="img">
                                    </div>
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
                                    <th>Quantity</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">VAT %</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-end text-center">Unit Cost</th>
                                    <th class="text-end text-center">Total Cost</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="quoteProducts">
                                                            
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-5"> 
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Shipping Cost</label>
                            <select class="select" id="shippingCost">
                                <option value="">Choose Cost</option>
                                <option value="150">Boda  (150/-)</option>
                                <option value="300">Cargo Courier  (300/-)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="select" id="status">
                                <option value="">Choose Status</option>
                                <option value="1">Send</option>
                                <option value="2">Pending</option>
                                <option value="0">Ordered</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a id="addQuote" class="btn btn-submit me-2">Add Quotation</a>
                        <a href="<?=ROOT?>/quotations" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="errorAlert" style="display: none" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Confirm All Fields Blanks Detected.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div id="successMessage" style="display: none" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> New Quote Added.
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
    const tableSelectedBody = document.querySelector('#quoteProducts') 
    const addQuoteBtn = document.querySelector('#addQuote')
    const selectedData = [] 

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

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/saveSelected/quote", true);
        ajax.send(JSON.stringify(data)); 
    }

     function collect_search_data(){
        var spanSearch = document.querySelector('#searchText');
        var searchInput = document.querySelector('#searchInput');

        let searchData = searchInput.value.trim();

        if(searchData == ""){
            spanSearch.style.display="block";
        }else{
            spanSearch.style.display="none";  
            send_search_data({data : searchData})
            searchInput.value = ""
        } 

        
    }

    function send_search_data(data = {}){
        var ajax = new XMLHttpRequest();

        ajax.addEventListener('readystatechange', function () { 
            if(ajax.readyState == 4 && ajax.status == 200){
                search_results(ajax.responseText);
            }
         }) 

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/searchProducts/regular", true);
        ajax.send(JSON.stringify(data)); 
    }

    function search_results(results){
        
        if(results != ""){

            let obj = JSON.parse(results)  

            tableSeacrhBody.innerHTML = obj.tbl_rows;
            // console.log(obj.product_info)
        } 
    } 

    function selected_quote_data(data = {}, data2 = {}){
        let sendObject = {
            products: data,
            input: data2
        }

        var ajax = new XMLHttpRequest();

        ajax.addEventListener('readystatechange', function () { 
            if(ajax.readyState == 4 && ajax.status == 200){
                handle_new_quote(ajax.responseText);
            }
         }) 

        ajax.open('POST', "<?=ROOT?>/AjaxRequests/addQuote", true);
        ajax.send(JSON.stringify(sendObject));

        // console.log(sendObject)
    }   

    function handle_new_quote(result){
        if(result != "" && typeof(JSON.parse(result)) == 'object'){ 
            successMessage.style.display = "block";
        }else{
            alert('error!! something went wrong')
        }
    }

    

    function show_selected(results){ 
        
        if(results != ""){

            let obj = JSON.parse(results)    

            addQuoteBtn.addEventListener('click', function(){
                let companyName = document.querySelector('#companyName').value
                let date = document.querySelector('#date').value
                let shippingCost = document.querySelector('#shippingCost').value
                let status = document.querySelector('#status').value
                let address = document.querySelector('#address').value
                let firstname = document.querySelector('#firstname').value
                let lastname = document.querySelector('#lastname').value
                let phone = document.querySelector('#phone').value
                let email = document.querySelector('#email').value
                let city = document.querySelector('#city').value 
                let zipCode = document.querySelector('#zipCode').value

                if(companyName == "" || date == "" || shippingCost == "" || status == "" || address == ""){
                    errorAlert.style.display = "block";
                    console.log('error empty')
                }else{
                    errorAlert.style.display = "none";
                    let input = {
                        company_name: companyName,
                        date: date,
                        shipping_cost: shippingCost,
                        status: status,
                        address: address,
                        firstname: firstname,
                        lastname: lastname,
                        phone_number: phone,
                        email: email,
                        city: city, 
                        zipcode: zipCode
                    }


                    let products = obj.selected

                    selected_quote_data(products, input)

                    // console.log(input, products)
                }
                
            });

            tableSelectedBody.innerHTML = obj.tbl_rows;
        } 
    }

</script>

<?php $this->view('includes/footer'); ?> 