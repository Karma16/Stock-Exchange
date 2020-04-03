<?php 
session_start();
include ('inc.php');
require "db_connect.php";
require "functions/functions.php";
//require "functions/functions.php";

if (isset($_POST['submit'])) {
    
    
  

    $fname = val_input($_POST['fname']);
    $lname = val_input($_POST['lname']);
    $email = val_input($_POST['email']);
    $phone = val_input($_POST['mobile']);
    $password = md5($_POST['password']);
   
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $fname;
    //$email="pol@d.com";
   
   // $sql = "SELECT `user_id` FROM users WHERE `email`= '$email';";

   // $result = $mysqli->query("SELECT `user_id` FROM users WHERE `email`= '$email';"); 
   //Some error here - couldn't find

  // $mysqli->query("INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `phone`, `pass`, `fav_companies`) VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$password', NULL);");
  /*
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
       $user_id= $row["user_id"];
    }
    alert("Seems like you've alredy been registered. ".$user_id);
 }
 else {
    
    $mysqli->query("INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `phone`, `pass`, `fav_companies`) VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$password', NULL);");
     
    redirect("index.php");
} 
*/
$sql = "SELECT user_id, email, pass FROM users where email = '$email'";



$result = $mysqli->query($sql);

             
    
if ($result->num_rows > 0) {
   // $_SESSION["email"] = $email;
    
   // while($row = $result->fetch_assoc()) {
   //     $user_id= $row["user_id"];
    // }
    echo "<script type='text/javascript'>alert('This email is busy. Try another one.);</script>"; 
// alert("Seems like you've alredy been registered. ");
//  redirect("index.php");
}
 else if ($result->num_rows == 0){
    $mysqli->query("INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `phone`, `pass`, `fav_companies`) VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$password', NULL);");
     
   redirect("index.php");
} 

}

$mysqli-> close();

?>
<!------ Include the above in your HEAD tag ---------->
<?php include("nav.php");?>
<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 class="py-3">Registration</h2>
                        <p>After registration you can save your favorits companies, make lists and a lot more. Registration is free</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill with your details</h4>
                
                <form class="needs-validation" action= "reg.php" method="Post" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <!--<label for="fname">First name</label>-->
                            <input type="text" class="form-control " id="fname" name="fname" placeholder="First name" value="" oninput="validate()" required>
                            
                          <!--<input id="fname" name="fname" placeholder="First Name" class="form-control" type="text" oninput="validate()">-->
                          <div class="invalid-feedback">
                                Please enter first name.
                           </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                          <input id="lname" name="lname" placeholder="Last Name" class="form-control" type="text" oninput="validate()" required>
                          <!--<p class="help-block hidden">Please enter a name 3 characters or more.</p>-->
                          <div class="invalid-feedback">
                                Please enter last name.
                           </div>
                        </div>
                        
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email" oninput="validate()" required/>
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          <div class="invalid-feedback">
                                Please enter email.
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                            <input id="mobile" name="mobile" placeholder="Mobile No." class="form-control" required="required" type="text" oninput="validate()" required/>
                            <div class="invalid-feedback">
                                Please enter your phone number.
                           </div>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        
                            <!--<label for="password"><span class="req">* </span> Password: </label>-->
                            <input  name="password" id="password" type="password" class="form-control inputpass" placeholder="Password" minlength="4" maxlength="16"   oninput="validate()" required /> 
                            <div class="invalid-feedback">
                                Please enter password.
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                           <!-- <label for="password"><span class="req">* </span> Password Confirm: </label>-->
                            <input  name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Confirm your password"  id="pass_conf" onkeyup="checkPass(); return false;" oninput="validate()" required/>
                            <span id="confirmMessage" class="confirmMessage"></span>
                            <div class="invalid-feedback">
                                Please confirm your password.
                           </div>
                        </div>
                    </div>
                        <!--<div class="form-group col-md-6">
                                  
                                  <select id="inputState" class="form-control">
                                    <option selected>Choose ...</option>
                                    <option> New Buyer</option>
                                    <option> Auction</option>
                                    <option> Complaint</option>
                                    <option> Feedback</option>
                                  </select>
                        </div>-->
                        <!--<div class="form-group col-md-12">
                                  <textarea id="comment" name="comment" cols="40" rows="5" class="form-control"></textarea>
                        </div>-->
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                  <label class="form-check-label" for="invalidCheck2">
                                    <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                  </label>
                                </div>
                              </div>
                    
                          </div>
                    </div>
                    
                    <div class="form-row">
                    <button class="btn btn-primary" type="submit" id="submit" name="submit">Submit form</button>
                       <!-- <button type="button" class="btn btn-danger">Submit</button>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields

</script>
