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

        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select class="select" name="parent">
                                        <option value="0">Choose Category</option>
                                        <?php foreach ($categories as $parentCategory) {?>
                                                <option value="<?=$parentCategory->category_name?>"><?=$parentCategory->category_name?></option>
                                            <?php }?>
                                    </select>
                                    <?php if(isset($errors['parent_category'])){?>
                                        <span class="text-danger"><?=$errors['parent_category']?></span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input value="<?=$row[0]->category_name?>" name="name" type="text">
                                    <?php if(isset($errors['category_name'])){?>
                                        <span class="text-danger"><?=$errors['category_name']?></span>
                                    <?php }?>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"><?=$row[0]->description?></textarea>
                                <?php if(isset($errors['description'])){?>
                                    <span class="text-danger"><?=$errors['description']?></span>
                                <?php }?>
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