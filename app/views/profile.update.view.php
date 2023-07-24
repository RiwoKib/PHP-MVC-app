<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>Update Profile</h6>
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
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="profile-set">
                        <!-- <div class="profile-head"></div> --> 
                        <div class="profile-top">
                            <div class="profile-content">
                                <div class="profile-contentimg">
                                    <img src="<?=UPLOADED?>/<?=$row[0]->image?>" class="img-fluid alt="img" id="blah">
                                    <div class="profileupload">
                                        <input type="file" name="image" id="imgInp">
                                        <a href="javascript:void(0);"><img src="<?=ASSETS?>/img/icons/edit-set.svg" alt="img"></a>
                                    </div>
                                </div>

                                <div class="profile-contentname">
                                    <h2 style="text-transform: capitalize"><?=esc($row[0]->firstname)?> <?=esc($row[0]->lastname)?> <span style="font-size: 12px" class="text-danger p-1 float-end mx-3 form-text fw-light border rounded-pill">Admin</span></h2>
                                    <h4>Updates Your Photo and Personal Details.</h4>
                                </div>
                            </div>

                            <div class="ms-auto"> 
                                <button type="submit" name="updateProfile" class="btn btn-submit">Save</button>
                                <a href="<?=ROOT?>/profile" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>

            
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" value="<?=esc($row[0]->firstname); ?>" name="fname">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" value="<?=esc($row[0]->lastname);?>" name="lname">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" value="<?=esc($row[0]->email);?>" name="email">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" value="<?=esc($row[0]->phone_number);?>" name="phone">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" value="<?=esc($row[0]->user_id);?>" name="username">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" value="<?=esc($row[0]->password);?>" class="pass-input" name="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                        </div> 

                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>


<?php $this->view('includes/footer'); ?>