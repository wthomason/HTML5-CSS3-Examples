<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flats N Cats / Contact</title>
  
  <?php include('include.php'); ?>
  
   
</head>
<body>

<div class="container-fluid">
  
  <?php include("header.php"); ?>
  
  <?php include("nav.php"); ?>
  
  <div style="margin:0 auto;">
   <div class="row content">
            
    <!--main content Here-->
    <div id="main" class="col-lg-8  col-xs-11">
     
        <div class="dimmed">
        </div>
            <div class="content">
                
                <?php
                /*	FORM VALIDATION PLAN

                    FIELD NAME	VALIDATION TESTS & VALID RESPONSES
                    inName		Required Field		May not be empty
                    inLname		Required Field		May not be empty
                    inPhone		Required Field		Must contain something
                                Numeric Field		May ONLY contain numbers, no special characters
                                Reasonable Check	Value must be between 1 and 1000

                    inEmail		Required Field		May not be empty
                                Format Validation	Must be a properly formatted email address
                    inSubject	Required Field		Must have selected something other than the first option
                    textArea	Required Field		strip html

                */



                //VALIDATION FUNCTIONS		Use functions to contain the code for the field validations.  
                function validateName()
                {
                    global $inName, $validForm, $nameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
                    $nameErrMsg = "";								//Clear the error message. 
                    if($inName=="")
                    {
                        $validForm = false;					//Invalid name so the form is invalid
                        $nameErrMsg = "Name is required";	//Error message for this validation	
                    }

                    else if(!preg_match("/^[a-zA-Z\s]+$/",$inName)){
                        $validForm=false;
                        $nameErrMsg="Please use only letters";
                    }

                    else
                    {
                    $inLname = trim($inName);				//Removes leading/trailing characters
                    $inLname = htmlspecialchars($$inName);	//converts special characters
                    }
                }

                function validateLname()
                {
                    global $inLname, $validForm, $lNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
                    $lNameErrMsg = "";								//Clear the error message. 
                    if($inLname=="")
                    {
                        $validForm = false;					//Invalid name so the form is invalid
                        $lNameErrMsg = "Last Name is required";	//Error message for this validation	
                    }

                    else if(!preg_match("/^[a-zA-Z\s]+$/",$inLname)){
                        $validForm=false;
                        $lNameErrMsg="Please use only letters";
                    }

                    else
                    {
                    $inLname = trim($inLname);				//Removes leading/trailing characters
                    $inLname = htmlspecialchars($inLname);	//converts special characters
                    }
                }

                function validatePhone()
                {
                    global $inPhone, $validForm, $phoneErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
                    $phoneErrMsg = "";								//Clear the error message. 



                    if($inPhone == "")							//REQUIRED FIELD VALIDATION TEST
                    {
                        $validForm = false;
                        $phoneErrMsg .= "Phone Number is required.  ";	//append message to message variable to allow for possible multiple error messages			
                    }


                    if( intval($inPhone)==0 )					//NUMERIC REQUIRED VALIDATION TEST  	intval() returns 0 if not an integer
                    {
                        $validForm = false;
                        $phoneErrMsg .= "Please use only numbers.  ";
                    }


                    if (strlen($inPhone)<10)
                    {
                    $validForm = false;
                    $phoneErrMsg .= "invalid phone number.  ";
                    }

                }

                function validateEmail()
                {
                    global $inEmail, $validForm, $emailErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
                    $emailErrMsg = "";							//Clear the error message. 

                                                                //Using a Regular Expression to FORMAT VALIDATION email address
                    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$inEmail))		//Copied straight from W3Schools.  Uses a Regular Expression
                    {
                        $validForm = false;
                        $emailErrMsg = "Invalid email format"; 
                    }		
                }

                function validateSubject()
                {
                    global $inSubject, $validForm, $subjectErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
                    $subjectErrMsg = "";								//Clear the error message. 	

                    if($inSubject == "")							//SHIPPING METHOD REQUIRED		Form passes a "" value if nothing is selected
                    {
                        $validForm = false;
                        $subjectErrMsg = "Please select a subject"; 			
                    }
                }

                function validateTextArea()
                {
                    global $textArea, $validForm, $areaErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
                    $areaErrMsg = "";								//Clear the error message. 
                    if($textArea=="")
                    {
                        $validForm = false;					//Invalid name so the form is invalid
                        $areaErrMsg = "comment is required";	//Error message for this validation	
                    }


                    else
                    {
                    $textArea = trim($textArea);				//Removes leading/trailing characters
                    $textArea = htmlspecialchars($textArea);	//converts special characters
                    }
                }

                //   ---  FORM VALIDATION BEGINS HERE!!!   --------
                if( isset($_POST['submit']) )				//if the form has been submitted Validate the form data
                {
                    //pull data from the POST variables in order to validate their values
                    $inName = $_POST['firstname'];
                    $inLname = $_POST['lastname'];
                    $inPhone = $_POST['phone'];
                    $inEmail = $_POST['email'];
                    $inSubject = $_POST['subject'];
                    $textArea = $_POST['comment'];

                    $validForm = true;					//Set form flag/switch to true.  Assumes a valid form so far

                        validateName();					//call the validateName() function
                        validateLname();		//call the validateQuantity() function
                        validatePhone();
                        validateEmail();				//call the validateEmail() function
                        validateSubject();				//call the validateShipping() function
                        validateTextArea();

                    if($validForm)	//Check the form flag.  If it is still true all the data is valid and the form is ready to process
                    {
                        //It will create a table and display one set of name value pairs per row
                        echo "<table border='1'>";
                        echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
                        foreach($_POST as $key => $value)
                        {
                            echo '<tr>';
                            echo '<td>',$key,'</td>';
                            echo '<td>',$value,'</td>';
                            echo "</tr>";

                        } 
                        echo "</table>";
                        echo "<p>&nbsp;</p>";

                //This code pulls the field name and value attributes from the Post file
                //The Post file was created by the form page when it gathered all the name value pairs from the form.
                //It is building a string of data that will become the body of the email

                        $emailBody = "Form Data\n\n ";			//stores the content of the email
                        foreach($_POST as $key => $value)		//Reads through all the name-value pairs. 	$key: field name 
                                                            //											$value: value from the form
                        {
                            $emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email
                        } 

                         $to = "example@example.com". ', '; //change this to the address you wish to send the form information
                        $to .= $inEmail;
                        $subject = "Flats N Cats Guide Service";			//change this for Subject line
                        if (mail($to, $subject, $emailBody)) 	//puts pieces together and emails
                        {
                            echo("<h1>Flats N Cats Guide Service</h1>");

                            echo("<p>Thank you for your Submition. We will answer your question as soon as possible.</p>");
                            date_default_timezone_set("America/Chicago");
                            echo date('l jS \of F Y h:i:s A');
                            echo("<p>Message successfully sent!</p>");
                        } 

                        else 
                        {
                            echo("<p class='error'>Message delivery failed...</p>");
                        }
                        echo "</body></html>";
                        exit();		//Finishes the page so it does not display the form again.
                    }
                    else			//The form has at least one invalid field.  It may have more.  All will be displayed.
                    {

                        //Load the original formdata back into the fields
                        //Load the error messages onto the form.  Only invalid fields will have an error message.  Others will be blank.
                        //Display the form back to the user for corrections.   The page will continue process from this point, displaying the updated form.
                    }
                }//Completes the Form Validation process for this page.  

                ?>

        <h1>Contact Us!</h1>
        
           <form action="contact.php" role="form" method="post">
            <table class="center">
                <tr>
                    <td width="210" class="error"><?php echo "$nameErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                    <td width="210" class="error"><?php echo "$lNameErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                    <td width="210" class="error"><?php echo "$phoneErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                   <td width="210" class="error"><?php echo "$emailErrMsg"; //place error message on form  ?></td> 
                </tr>
                <tr>
                    <td class="error"><?php echo "$subjectErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                    <td class="error"><?php echo "$areaErrMsg"; //place error message on form  ?></td>
                </tr>
            </table>
               
               <div class="form-group col-md-6">
                    <label for="firstname">Firstname:</label>
                
                   <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $inName; //place data back in field ?>" placeholder="Enter First Name">
               </div>
                
                <div class="form-group col-md-6">
                
                    <label for="lastname">Lastname:</label>
                
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $inLname; //place data back in field ?>" placeholder="Enter Last Name">
               </div>
                
                <div class="form-group col-md-12">
                    <label for="email">Email:</label>
                
                    <input type="email" name="email" id="email" maxlength="150" class="form-control" value="<?php echo $inEmail; //place data back in field ?>" placeholder="Enter Email">
               </div>
               
               <div class="form-group col-md-6">
                   <label for="phone">Phone:</label>
                
                    <input type="text" name="phone" id="phone" class="form-control" maxlength="12" value="<?php echo $inPhone; //place data back in field ?>" placeholder="5556667777">
               </div>
                
             <div class="form-group col-md-6">
                 <label for="subject">Subject:</label>
                           
                           <select name="subject" id="subject" class="form-control">
                            <option value="" <?php if($inSubject==""){echo "selected='selected'";}?>>Please select one</option>
                            
                            
                            <option value="guide" <?php if($inSubject=="video"){echo "selected='selected'";}?>>Guide Service</option>
                            
                            <option value="sponsorship" <?php if($inSubject=="sponsorship"){echo "selected='selected'";}?>>Sponsorship</option>
                            
                            <option value="advertising" <?php if($inSubject=="advertising"){echo "selected='selected'";}?>>Advertising</option>
                            
                            <option value="Other" <?php if($inSubject=="Other"){echo "selected='selected'";}?>>Other</option>
                    </select>
               </div>
            	
               <div class="form-group">
                   <label for="comment">Comment here</label>
                
                    <textarea name="comment" id="comment" class="form-control" rows="5" value="<?php echo $textArea; //place data back in field ?>"></textarea>
                 </div>
            
            

            <input  type="submit" class="btn btn-success" name="submit" id="submit">
            <input  type="reset" class="btn btn-danger" name="cancel" id="cancel">
            </form>
                
            </div>
    </div>
   
  <!--Side Bar here-->
     <aside class="col-lg-3  col-xs-11">
      <div class="dimmed">
      </div>
        <div class="content">
              <img src="images/desMoinesRiver.jpg" width="95%" alt="Des Moines River Flathead">
         </div>
    </aside>       
                  
   </div> 
  </div>
</div>

<?php include("advertising.php"); ?>

<?php include("footer.php"); ?>


</body>
</html>