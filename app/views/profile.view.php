<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navbar'); ?>
<?php $this->view('includes/sidebar'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head"></div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                <img src="<?=UPLOADED?>/<?=$row[0]->image?>" alt="profile image" class="img-fluid" id="blah">
                                <div class="profileupload">
                                    <input type="file" id="imgInp">
                                    <a href="javascript:void(0);"><img src="<?=ASSETS?>/img/icons/edit-set.svg" alt="img"></a>
                                </div>
                            </div>

                            <div class="profile-contentname">
                                <h2 style="text-transform: capitalize"><?=esc($row[0]->firstname)?> <?=esc($row[0]->lastname)?> <span style="font-size: 12px" class="text-danger p-1 float-end mx-3 form-text fw-light border rounded-pill">Admin</span></h2>
                                <h4>Updates Your Photo and Personal Details.</h4>
                            </div>
                        </div>

                        <div class="ms-auto"> 
                            <a href="<?=ROOT?>/dashboard" class="btn btn-cancel">Dashboard</a>
                            <a href="<?=ROOT?>/profile/edit/<?=$row[0]->id?>" class="btn btn-submit">Update Profile</a>
                        </div>
                    </div>
                </div>

        
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" value="<?=esc($row[0]->firstname); ?>" placeholder="William">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" value="<?=esc($row[0]->lastname);?>" placeholder="Castilo">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="<?=esc($row[0]->email);?>" placeholder="william@example.com">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" value="<?=esc($row[0]->phone_number);?>" placeholder="+1452 876 5432">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" value="<?=esc($row[0]->user_id);?>" placeholder="+1452 876 5432">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" value="<?=esc($row[0]->password);?>" class=" pass-input">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                    </div> 

                </div>

            </div>
        </div> 
    </div>
</div>


<?php $this->view('includes/footer'); ?>