<body>
    <div class="main-container">
<div class="reg-container">

    <div class="left_part"><img src="<?php echo base_url()?>assets/register.png">
    </div>
    <div class="register-box">
        <h3>Lets SignUp Quickly</h3>
         <?php if($this->session->flashdata('reg-failed')){?>
<p style="color:green"><?php  echo $this->session->flashdata('reg-failed');?></p>  
<?php } ?>
        <?php  //echo validation_errors();?>
            <?php echo form_open('service/registerUser')?>
        <?php echo form_error('name')?>
        <input type="text" id="name" name="name" placeholder="Enter your Name"/>
         <?php echo form_error('email')?>
        <input type="email" id="email" name="email" placeholder="Enter your Email Address"/>
         <?php echo form_error('pass')?>
        <input type="password" id="pass" name="pass" placeholder="Enter your Password"/>
        <input type="password" id="cpass" name="cpass" placeholder="Confirm your Password"/>
        <button id="rg-button" name='submit-form' value='submit'>Register</button>
    </form>
    </div>
 </div>
</div>