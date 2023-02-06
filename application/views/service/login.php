<div class="container"> 
    <div class="login-box">
       <div class='design-container'>
        <h3>Login Here!</h3>
        </div>
       <div class='login-container'>
        <?php if($this->session->flashdata('error')){?>
<p style="color:red"><?php  echo $this->session->flashdata('error');?></p>  
<?php } ?>
  <?php if($this->session->flashdata('reg-success')){?>
<p style="color:green"><?php  echo $this->session->flashdata('reg-success');?></p>  
<?php } ?>
        <?php //echo validation_errors();?> 
            <?php echo form_open('service/authenticate')?>
            <?php echo form_error('email');?>
        <input type="email" id="email" name="email" placeholder="Enter your Email Address"/>
        <?php echo form_error('pass');?>
        <input type="password" id="pass" name="pass" placeholder="Enter your Password"/>
        <button id="lgn-button" name='submit-form' value='submit'>Login</button>
    </form>
    <h4>Create a New Account? <a id="rg-button" name='rg-button' href='<?php echo base_url('service/register');?>'>Register</a></h4>
</div>
    </div>
 </div>
