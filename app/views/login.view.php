<?php $this->view('includes/header'); ?>


  <div class="container pt-5">  
    <div class="row  justify-content-center align-items-center">
      <div class="col-md-4">
      <div class="card">
            <div class="card-header">
                <h3>Login</h3>
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
                <form action=""  method="post"> 
                    <div class="mb-3">
                        <label  class="form-label">Email address</label>
                        <input type="email" value="<?=get_val('email')?>" required name="email" class="form-control">
                        
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" value="<?=get_val('password')?>" required name="password" class="form-control" >
                    </div> 
                    
                    <button type="submit" name="loginBtn" class="btn btn-primary col-12 rounded-pill">Login</button>
                    
                    <div class="form-text mt-3">
                        Dont have an Account? <a href="<?=ROOT?>/register">Join Us</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
 