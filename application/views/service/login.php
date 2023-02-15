<div class="container">
<div class="common-container">
    <p>Home / SignIn</p>
    <div class='search-container'>
    <input type="search" name="nthing" placeholder="Search Articles">
    <span <i class="fa fa-search fa-lg"></span>
</div>
</div>
<div class="main1-div" ng-controller="myController" >
    <div class="login-box">
       <div class='login-container' >
        <span class="span1">Already a member?</span>
        <span class="span2">Sign In</span>
                        <form name="myForm" ng-submit="authenticate()"  >
                        <h1>{{Message}}</h1>
                        <span ng-show="myForm.email.$error.required">Email is required.</span>
                        <p style="color:red; font-size:15px;" ng-show="myForm.email.$invalid"> Enter a valid email format</p>
                    <input type="email" id="email" ng-model="email" name="email" placeholder="Email Address" autocomplete="off" required />
                    <?php //echo form_error('pass');?>
                    <p style="color:red; font-size:15px;" ng-show="myForm.pass.$invalid"> Try a strong password</p>
                    <input type="password" id="pass" name="pass" ng-model="pass" placeholder="Password"/>
                    <input type="submit" id="lgn-button" name='submit-form' value='SignIn'
                    ng-disabled="myForm.user.$dirty && myForm.user.$invalid ||
  myForm.email.$dirty && myForm.email.$invalid" />
                </form>
</div>
    </div>
<div class="left_container">
   <div class="side-container">
        <div class="side-1">
            <img id="user"src="<?php echo base_url()?>assets/user-profile.png">
            <div class='inner-details'>
            <span>New User?<a href="#"> SignUp</a></span>
            <p>Create an account to submit tickets, read articles and engage in our community.</p>  
            </div>
        </div>
        <div class="side-1">
            <img id="user"src="<?php echo base_url()?>assets/lock.png">
            <div class='inner-details'>
            <span>Forget Password?<a href="#"> Reset</a></span>
            <p>We will send a password reset link to your email address.</p>  
            </div>
        </div>
        <div class="side-1">
            <img id="user"src="<?php echo base_url()?>assets/agent.png">
            <div class='inner-details'>
            <span>Are you an Agent?<a href="#"> Login Here</a></span>
            <p>You will be taken to the agent interface.</p>  
            </div>
        </div>
    </div>
</div>
</div>
</div>