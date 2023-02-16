<body>
    <div class="main-container">
<div class="reg-container">

    <div class="left_part"><img src="<?php echo base_url()?>assets/register.png">
    </div>
    <div class="register-box">
        <h3>Lets SignUp Quickly!</h3>
        
        <form name="myForm1" ng-controller="registerController" ng-submit="registerUser()"  >
        <!-- <span style="color:red" ng-if="myForm1.name.$dirty && myForm1.email.$dirty && myForm1.pass.$dirty" >All fields required</span> -->
        <span style="color:red" ng-if="myForm1.name.$untouched && myForm1.email.$untouched && myForm1.pass.$untouched && myForm1.cpass.$untouched"> All fields Required</span>
        <input type="text" id="name" name="name" ng-model="name" placeholder="Enter your Name" ng-required="true"/>
        <span style="color:red"ng-if="myForm1.email.$invalid">Invalid Email format</span>
        <input type="email" id="email" name="email"  ng-model="email" placeholder="Enter your Email Address" ng-required="true"/>
        <span style="color:red" ng-if="myForm1.pass.$error.pattern">Password must be atleast 8 chars<br></span>
        <span style="color:red" ng-if="myForm1.pass.$error.pattern">1 Ucase,1Lcase,1number,1 symbol</span>
        <span style="color:red" ng-if="error">Password Mismatch</span>
        <input type="password" id="pass" name="pass" ng-model="pass"placeholder="Enter your Password" ng-pattern="/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,15}$/" />
        <input type="password" id="cpass" name="cpass" ng-model="cpass" placeholder="Confirm your Password" ng-required="true"/>
        <button id="rg-button" name='submit-form3' value='submit' >Register</button>
    </form>
    </div>
 </div>
</div>