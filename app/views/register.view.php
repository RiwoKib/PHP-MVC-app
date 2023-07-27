<?php $this->view('includes/header'); ?>

  <div class="container pt-5">  
    <div class="row  justify-content-center align-items-center">
      <div class="col-md-4">
      <div class="card">
            <div class="card-header">
                <h4>Sign Up</h4>
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


            <div class="card-body">
                <form action="<?=ROOT?>/Register"  method="post">
                <div class="mb-3"> 
                        <input type="text" required value="<?=get_val('firstname')?>" name="firstname" class="form-control" placeholder='firstname'>
                        
                    </div>
                <div class="mb-3"> 
                        <input type="text" required  value="<?=get_val('lastname')?>" name="lastname" class="form-control" placeholder='lastname'>
                        
                    </div>
                    <div class="mb-3"> 
                        <input type="email" required  value="<?=get_val('email')?>" name="email" class="form-control" placeholder='info@bilkens.co.ke'>
                        
                    </div> 
                    <div class="mb-3"> 
                        <input type="tel" required  value="<?=get_val('phone')?>" name="phone" class="form-control" placeholder='+254 700 000 000'>
                        
                    </div> 
                    <div class="mb-3"> 
                      
                      <select name="rank"  class="form-control">
                        <option value="">--Select Rank--</option>
                        <option value="admin">Admin</option>
                        <option value="user" selected>User</option>
                      </select>
                  
                        
                    </div>
                    <div class="mb-3"> 
                        <input type="password" required  value="<?=get_val('password')?>" name="password" class="form-control" placeholder='password'>
                    </div>
                    <div class="mb-3"> 
                        <input type="password" required  value="<?=get_val('confirm')?>" name="confirm" class="form-control" placeholder='confirm password'>
                    </div>
                    
                    <button type="submit" name="registerBtn" class="btn btn-primary">Sign up</button>
                    
                    <button type="reset" name="resetBtn" class="btn btn-danger">Cancel</button>
                    <div class="form-text">
                        Go back >> <a href="<?=ROOT?>/dashboard">Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div> 