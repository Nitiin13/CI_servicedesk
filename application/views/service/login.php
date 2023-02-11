<div class="container">
<div class="common-container">
    <p>Home / SignIn</p>
    <div class='search-container'>

    <input type="search" name="nthing" placeholder="Search Articles">
    <span <i class="fa fa-search fa-lg"></span>

</div>
</div>
<div class="main1-div">
    <div class="login-box">
       <div class='login-container'>
        <span class="span1">Already a member?</span>
        <span class="span2">Sign In</span>
                    <?php if($this->session->flashdata('error')){?>
            <p style="color:red !important;"><?php  echo $this->session->flashdata('error');?></p>  
            <?php } ?>
              <?php if($this->session->flashdata('reg-success')){?>
            <p  style="color:green !important;"><?php  echo $this->session->flashdata('reg-success');?></p>
            <?php } ?>
                    <?php //echo validation_errors();?> 
                        <?php echo form_open('service/authenticate')?>
                        <?php echo form_error('email');?>
                    <input type="email" id="email" name="email" placeholder="Email Address" autocomplete="off" />
                    <?php echo form_error('pass');?>
                    <input type="password" id="pass" name="pass" placeholder="Password"/>
                    <button id="lgn-button" name='submit-form' value='submit'>SignIn</button>

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