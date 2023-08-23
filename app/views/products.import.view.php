<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Import Products</h4>
                <h6>Bulk upload your products</h6>
            </div>
        </div>

        <?php if(count($errors) > 0):?>
            <div class="alert alert-warning alert-dismissible fade show p-1 mx-2" role="alert">
            <strong class="text-danger">Error!</strong>
                <?php foreach($errors as $error):?>
                <br><?=$error?>
            <?php endforeach;?>
            <span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </span>
            </div>
        <?php endif;?>

        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="requiredfield">
                        <h4>Field must be in csv format</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <a class="btn btn-submit w-100">Download Sample File</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Upload CSV File</label>
                                    <div class="image-upload">
                                        <input id="products_import" accept=".xls, .xlsx" type="file">
                                        <div class="image-uploads">
                                            <img src="<?=ASSETS?>/img/icons/upload.svg" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                    <span class="text-danger spanText" style="display: none;">** Upload an Excel File **</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="productdetails productdetailnew">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Product Name</h4>
                                            <h6 class="manitorygreen">This Field is required</h6>
                                        </li>
                                        <li>
                                            <h4>Product Image</h4>
                                            <h6 class="manitorygreen">This Field is required</h6>
                                        </li>
                                        <li>
                                            <h4>Category</h4>
                                            <h6 class="manitorygreen">This Field is required</h6>
                                        </li> 
                                        <li>
                                            <h4>Product Cost</h4>
                                            <h6 class="manitorygreen">This Field is required</h6>
                                        </li>
                                        <li>
                                            <h4>Product Price</h4>
                                            <h6 class="manitorygreen">This Field is required</h6>
                                        </li>
                                        <li>
                                            <h4>Quote Description</h4>
                                            <h6 class="manitorygreen">This Field is required</h6>
                                        </li>
                                        <li>
                                            <h4>Product Unit</h4>
                                            <h6 class="manitoryblue">Field optional</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="productdetails productdetailnew">
                                    <ul class="product-bar"> 
                                        <li>
                                            <h4>Quantity</h4>
                                            <h6 class="manitoryblue">Field optional</h6>
                                        </li>
                                        <li>
                                            <h4>Sub Category</h4>
                                            <h6 class="manitoryblue">Field optional</h6>
                                        </li>
                                        <li>
                                            <h4>Tax</h4>
                                            <h6 class="manitoryblue">Field optional</h6>
                                        </li>
                                        <li>
                                            <h4>Discount Type</h4>
                                            <h6 class="manitoryblue">Field optional</h6>
                                        </li>
                                        <li>
                                            <h4>Brand</h4>
                                            <h6 class="manitoryblue">Field optional</h6>
                                        </li> 
                                        <li>
                                            <h4>Status</h4>
                                            <h6 class="manitoryblue">Field optional</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <button id="addBulk" class="btn btn-submit me-2">Add File</button>
                                <a href="<?=ROOT?>/products" id="cancelAjax" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>

                        <div class="col-12 py-5">
                            <div >
                                <div id="progress" style="display: none;" class="progress-bar bg-info" aria-valuemin="0"  aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="successMessage" style="display: none" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <span id="message"></span>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>


<script>
    const addBulkBtn = document.querySelector('#addBulk')
    const excelFile = document.querySelector('#products_import')
    const spanText = document.querySelector('.spanText')
    const progressBar = document.querySelector('#progress')
    const cancelBtn = document.querySelector('#cancelAjax')
    const message = document.querySelector('#message')
    const successMessage = document.querySelector('#successMessage')
    

    addBulkBtn.addEventListener('click', function(e){
        e.preventDefault();
        
        progressBar.style.display = "block";

        const selectedFile = excelFile.files[0];

        if (!selectedFile) {
           spanText.style.display = "block";
        }else{
            spanText.style.display = "none";

            const formData = new FormData();
            formData.append('excelFile', selectedFile);

            let ajax = new XMLHttpRequest();
            ajax.open('POST', "<?=ROOT?>/AjaxRequests/importProducts", true);

            ajax.onload = function(){
                if(ajax.status === 200){
                    progressBar.style.width = '100%';
                    progressBar.innerHTML = '100%';

                    // console.log(ajax.responseText)
                    let obj = JSON.parse(ajax.responseText);
                    progressBar.style.display = "none";
                    successMessage.style.display = "block";
                    message.innerHTML = obj.message;
                    clearInterval(timer);
                }
            }

            ajax.send(formData); 
            timer = setInterval(show_progress, 100);
        }           
    })

    function show_progress(){

        let ajax2 = new XMLHttpRequest();
        ajax2.open('POST', "<?=ROOT?>/AjaxRequests/checkProgress", true);

        ajax2.onload = function(){
            if(ajax2.status === 200){
                progressBar.style.width = ajax2.responseText + '%';
                progressBar.setAttribute('aria-valuenow', ajax2.responseText)
                progressBar.innerHTML = ajax2.responseText + '%';
            }
        }

        ajax2.send(); 
    }

</script>



<?php $this->view('includes/footer'); ?>