
<?= $this->view('includes/header')?>
<?= $this->view('includes/navbar')?>
<?= $this->view('includes/sidebar')?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add sub Category</h4>
                <h6>Create new product Category</h6>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select name="parent" class="select" name="parent">
                                    <option>Choose Category</option>
                                    <?php foreach ($rows as $row) {?>
                                            <option value="<?=get_val('parent')?>"><?=$row->category_name?></option>
                                        <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input name="name" type="text">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input name="sku" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="addSubCategory" class="btn btn-submit me-2">Submit</button>
                            <a href="<?=ROOT?>/subcategories" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->view('includes/footer')?>