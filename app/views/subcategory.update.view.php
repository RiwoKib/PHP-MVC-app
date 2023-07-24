<?= $this->view('includes/header')?>
<?= $this->view('includes/navbar')?>
<?= $this->view('includes/sidebar')?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product sub Category</h4>
                <h6>Update Category</h6>
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
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="select" name="parent">
                                    <option value="">Choose Category</option>
                                    <?php foreach ($categories as $parent) {?>
                                            <option value="<?=$parent->category_name?>"><?=$parent->category_name?></option>
                                        <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input value="<?=$row[0]->category_name?>" name="name" type="text">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input value="<?=$row[0]->sku?>" name="sku" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"><?=$row[0]->description?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="updateSubCategory" class="btn btn-submit me-2">Submit</button>
                            <a href="<?=ROOT?>/subcategories" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->view('includes/footer')?>