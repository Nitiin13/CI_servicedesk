<body>
    <div class="main-container">
<div class="reg-container">

    <div class="left_part"><img src="<?php echo base_url()?>assets/register.png">
    </div>
    <div class="register-box">
        <h3>Lets SignUp Quickly!</h3>
        <span>{{message}}</span>
        <form name="myForm" ng-controller="registerController" ng-submit="registerUser()" >
        <input type="text" id="name" name="name" ng-model="name" placeholder="Enter your Name"/>
       
        <input type="email" id="email" name="email"  ng-model="email"placeholder="Enter your Email Address"/>
         <?php //echo form_error('pass')?>
        <input type="password" id="pass" name="pass" ng-model="pass"placeholder="Enter your Password"/>
        <span style="color:red"ng-show="error">Both Password doesnt match</span>
        <input type="password" id="cpass" name="cpass" ng-model="cpass" placeholder="Confirm your Password"/>
        <button id="rg-button" name='submit-form3' value='submit'>Register</button>
    </form>
    </div>
 </div>
</div>