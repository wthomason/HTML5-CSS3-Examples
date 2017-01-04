<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flats N Cats / Pricing</title>

  <?php include('include.php'); ?>

<!-- Date Picker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">


</head>
<body>

<div class="container-fluid">

  <?php include("header.php"); ?>

  <?php include("nav.php"); ?>

   <div class="row content">

     <!--Side Bar here-->
     <aside class="col-lg-3  col-xs-11">
      <div class="dimmed">
      </div>
        <div class="content">
           <img src="images/image1.JPG" alt="The Flats N Cats Boat. " class="img-responsive"/>
            <h2>Pricing and packages!</h2>
            <ul>
                <li>Full day $250 for 1-2 person trips for no less than 6 hours.</li>
                <li>Half day $150 for 1-2 person trips for no less than 4 hours.</li>
                <li>Additional people are $50 each 3 people maximum.</li>
                <li>Deposit $100 due when booking your trip. Deposits are only refundable if trip is cancled more than seven business days
                in advance.</li>
                <li>You must purchase all fishing licensses required.</li>
            </ul>

            <h2>What We Provide</h2>
            <ul>
                <li>Boat</li>
                <li>Fishing Gear</li>
                <li>Bait</li>
                <li>Safety Equipment</li>
                <li>Knowledge</li>
            </ul>

            <h2>Suggested Items to bring</h2>
            <ul>
                <li>Food/Drink</li>
                <li>Cooler for fish you wish to keep.</li>
                <li>Rain gear if needed</li>
            </ul>
         </div>
    </aside>

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
        
                function validateDate()
        {
            global $inDate, $validForm, $dateErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
            $dateErrMsg = "";

            if($inDate=="")
            {
                $validForm = false;					//Invalid name so the form is invalid
                $dateErrMsg = "Date is required";	//Error message for this validation	
            }

            else if (strlen($inDate)<10)
            {
            $validForm = false;
            $dateErrMsg .= "invalid Date please use mm/dd/yyyy.";
            }

            else if (strlen($inDate)>10)
            {
            $validForm = false;
            $dateErrMsg .= "invalid Date please use mm/dd/yyyy.";
            }
        }
        
        function validatePeople()
        {
            global $inPeople, $validForm, $peopleErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
            $peopleErrMsg = "";								//Clear the error message.

            if($inPeople == "")							//SHIPPING METHOD REQUIRED		Form passes a "" value if nothing is selected
            {
                $validForm = false;
                $peopleErrMsg = "Please select one";
            }
        }

        function validateDuration()
        {
            global $inDuration, $validForm, $durationErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
            $durationErrMsg = "";								//Clear the error message.

            if($inDuration == "")							//SHIPPING METHOD REQUIRED		Form passes a "" value if nothing is selected
            {
                $validForm = false;
                $durationErrMsg = "Please select one";
            }
        }

        function validateTime()
        {
            global $inTime, $validForm, $timeErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
            $timeErrMsg = "";								//Clear the error message.

            if($inTime == "")							//SHIPPING METHOD REQUIRED		Form passes a "" value if nothing is selected
            {
                $validForm = false;
                $timeErrMsg = "Please select one";
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
            $inDate  = $_POST['date'];
            $inPeople = $_POST['people'];
            $inDuration = $_POST['duration'];
            $inTime = $_POST['dayNight'];
            $textArea = $_POST['comment'];

            $validForm = true;					//Set form flag/switch to true.  Assumes a valid form so far

                validateName();					//call the validateName() function
                validateLname();		//call the validateQuantity() function
                validatePhone();
                validateEmail();    //call the validateEmail() function
                validateDate();      
                validatePeople();		//call the validateShipping() function
                validateDuration();
                validateTime();
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

                echo("<p>Thank you for visiting and booking your next trip with us. In the table bellow you will see the information that was sent to us. Please send
                your $100 deposit to the following address:<br>
                Flats N Cats Guide Service<br>
                3403 Bowdoin St.<br>
                Des Moines, IA 50313<br>
                Make deposit payable to: Johnny Coleman. If you have any questions or concerns feel free to call us at 515-661-1364. We look forward to your trip and happy you chose Flats N Cats Guide Service.</p>");

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

    <h1>Book your trip today!</h1>
    
    
        <form action="pricing.php" role="form" method="post">
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
                    <td class="error"><?php echo "$peopleErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                    <td class="error"><?php echo "$durationErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                    <td class="error"><?php echo "$timeErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                    <td class="error"><?php echo "$areaErrMsg"; //place error message on form  ?></td>
                </tr>
                <tr>
                    <td class="error"><?php echo "$dateErrMsg"; //place error message on form  ?></td>
                </tr>
            </table>
        
            
            <div class="form-group col-md-6">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $inName; //place data back in field ?>" placeholder="Enter First Name">
            </div>
            
            
            <div class="form-group col-md-6">
                <label for="lastname">Last Name:</label>
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
                <label for="date">Date of Trip:</label> 
                <input type="text" name="date" id="date" class="form-control" placeholder="Enter Date">
            </div>
            
            <div class="form-group col-md-4">
                <label for="people">Number of People:</label>
                   
                <select name="people" id="people" class="form-control">
                    <option value="" <?php if($people==""){echo "selected='selected'";}?> selected>Please select one</option>
                    <option value="1" <?php if($people=="1"){echo "selected='selected'";}?>>1</option>
                    <option value="2" <?php if($people=="2"){echo "selected='selected'";}?>>2</option>
                    <option value="3" <?php if($people=="3"){echo "selected='selected'";}?>>3</option>
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label for="duration">Duration:</label>
                
                <select name="duration" id="duration" class="form-control">
                    <option value="" <?php if($duration==""){echo "selected='selected'";}?> >Please select one</option>
                    <option value="full day" <?php if($duration=="full day"){echo "selected='selected'";}?>>Full Day</option>
                    <option value="half day" <?php if($duration=="half day"){echo "selected='selected'";}?>>Half Day</option>
                </select>
            </div>
            
           <div class="form-group col-md-4">
               <label for="dayNight">Day/Night:</label>
                <select name="dayNight" id="dayNight" class="form-control">
                    <option value="" <?php if($time==""){echo "selected='selected'";}?> selected>Please select one</option>
                    <option value="day" <?php if($time=="day"){echo "selected='selected'";}?>>Day</option>
                    <option value="night" <?php if($time=="night"){echo "selected='selected'";}?>>Night</option>
                </select>
            </div>
            
           <div class="form-group">
               <label for="comment">Comment here</label>
            
                <textarea name="comment" id="comment" class="form-control" rows="5" value="<?php echo $textArea; //place data back in field ?>"></textarea>
            </div>
            

                  <p>After submiting this request you are required to mail your $100 deposit to the address bellow to reserve your date. Deposits are only
                    refundable if you cancle your trip more than seven business days in advance. Dates are first come first serve. You will be contacted imediatly if
                    any conflicts accur. Please verify on our Calender page if the date you have chossen is available. Check or Money order, please include name and date of trip. Make
                      checks Payable to: Johnny Coleman</p>
                        <h4>Flats N Cats Guide Service<br>
                        3403 Bowdoin St.<br>
                        Des Moines, IA 50313<br></h4>
                <div class="form-group">
                   <div class="checkbox">
                    <label><input type="checkbox" required name="terms" id="terms" class="center">I accept the Terms and Conditions</label>
                    </div>
                </div>
                
                <input  type="submit" name="submit" class="btn btn-success" id="submit">
                <input  type="reset" name="cancel" class="btn btn-danger" id="cancel">
            
            </form>
        


    </div>
</div>


  </div>
</div>

<?php include("advertising.php"); ?>

<?php include("footer.php"); ?>


</body>
</html>
