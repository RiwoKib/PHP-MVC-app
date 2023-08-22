
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
                <form action="" method="post">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select class="select" name="parent">
                                        <option>Choose Category</option>
                                        <?php foreach ($rows as $row) {?>
                                                <option value="<?=$row->category_name?>"><?=$row->category_name?></option>
                                            <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input name="name" type="text">
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
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