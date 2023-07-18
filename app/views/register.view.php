<?php $this->view('includes/header'); ?>

  <div class="container pt-5">  
    <div class="row  justify-content-center align-items-center">
      <div class="col-md-4">
      <div class="card">
            <div class="card-header">
                <h4>Sign Up</h4>
            </div>
            <div class="card-body">
                <form action=""  method="post">
                <div class="mb-3"> 
                        <input type="text" required name="firstname" class="form-control" placeholder='enter firstname'>
                        
                    </div>
                <div class="mb-3"> 
                        <input type="text" required name="lastname" class="form-control" placeholder='enter lastname'>
                        
                    </div>
                    <div class="mb-3"> 
                        <input type="email" required name="email" class="form-control" placeholder='enter email'>
                        
                    </div>
                    <div class="mb-3"> 
                      
                      <select name="gender" class="form-control">
                        <option value="">--Select Gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                  
                        
                    </div>
                    <div class="mb-3"> 
                      
                      <select name="rank"  class="form-control">
                        <option value="">--Select Rank--</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                      </select>
                  
                        
                    </div>
                    <div class="mb-3"> 
                        <input type="password" required name="password" class="form-control" placeholder='enter password'>
                    </div>
                    <div class="mb-3"> 
                        <input type="password" required name="confirm" class="form-control" placeholder='confirm password'>
                    </div>
                    
                    <button type="submit" name="registerBtn" class="btn btn-primary">Sign up</button>
                    
                    <button type="reset" name="resetBtn" class="btn btn-danger">Cancel</button>
                    <div class="form-text">
                        Already have an account? <a href="<?=ROOT?>/login">Login</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div> 