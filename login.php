<?php include ('inc.php');?>




<?php


   
if (isset($_POST['submit'])) 
{
      
$email = val_input($_POST['email']);
     
$password = md5($_POST['password']);
    
    
    $sql = "SELECT user_id, email, pass, fname FROM users where email = '$email' and pass = '$password'";



$result = $mysqli->query($sql);

             
    
if ($result->num_rows > 0) {
    $_SESSION["email"] = $email;
    
    while($row = $result->fetch_assoc()) {
        $_SESSION["name"] =  $row["fname"];
       $_SESSION["id"] =  $row["user_id"];
    }
    
  //  alert("Welcome back,".$_SESSION["name"]."!");
  redirect("index.php");
}
 else if ($result->num_rows == 0){
    alert("Your password or email is incorret. Please try another one.");
}
   
}

$mysqli-> close();

?>
<?php include("nav.php");?>
<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 class="py-3">Log in</h2>
                        <p>Get access to all your data, stocks and favourite companies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill with your details</h4>
                
                <form class="needs-validation" action= "login.php" method="Post" novalidate>
                    
                    <div class="form-row m-3">
                      
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email" oninput="validate()" required/>
                           <div class="invalid-feedback">
                                Please enter email.
                           </div>
                       
                      </div>  
                    <div class="form-row m-3">
                      
                        
                            <!--<label for="password"><span class="req">* </span> Password: </label>-->
                            <input  name="password" id="password" type="password" class="form-control inputpass" placeholder="Password" minlength="4" maxlength="16"   oninput="validate()" required /> 
                            <div class="invalid-feedback">
                                Please enter password.
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
                   
                   <!-- <div class="form-row">
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
                    </div>-->
                    
                    <div class="form-row">
                    <button class="btn btn-primary" type="submit" id="submit" name="submit">Log in</button>
                       <!-- <button type="button" class="btn btn-danger">Submit</button>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>