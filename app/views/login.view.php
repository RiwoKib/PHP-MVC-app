<?php $this->view('includes/header'); ?>


  <div class="container pt-5">  
    <div class="row  justify-content-center align-items-center">
      <div class="col-md-4">
      <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form action=""  method="post"> 
                    <div class="mb-3">
                        <label  class="form-label">Email address</label>
                        <input type="email" required name="email" class="form-control">
                        
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" required name="password" class="form-control" >
                    </div> 
                    
                    <button type="submit" name="loginBtn" class="btn btn-primary">Login</button>
                    <div class="form-text">
                        Dont have an Account? <a href="">Join Us</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
 