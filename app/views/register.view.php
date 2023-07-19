<?php $this->view('includes/header'); ?>

  <div class="container pt-5">  
    <div class="row  justify-content-center align-items-center">
      <div class="col-md-4">
      <div class="card">
            <div class="card-header">
                <h4>Sign Up</h4>
            </div>
            <div class="card-body">
                <form action="<?=ROOT?>/Register"  method="post">
                <div class="mb-3"> 
                        <input type="text"   name="firstname" class="form-control" placeholder='firstname'>
                        
                    </div>
                <div class="mb-3"> 
                        <input type="text"   name="lastname" class="form-control" placeholder='lastname'>
                        
                    </div>
                    <div class="mb-3"> 
                        <input type="email"   name="email" class="form-control" placeholder='info@bilkens.co.ke'>
                        
                    </div> 
                    <div class="mb-3"> 
                        <input type="tel"   name="phone" class="form-control" placeholder='+254 700 000 000'>
                        
                    </div> 
                    <div class="mb-3"> 
                      
                      <select name="rank"  class="form-control">
                        <option value="">--Select Rank--</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                      </select>
                  
                        
                    </div>
                    <div class="mb-3"> 
                        <input type="password"   name="password" class="form-control" placeholder='password'>
                    </div>
                    <div class="mb-3"> 
                        <input type="password"   name="confirm" class="form-control" placeholder='confirm password'>
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