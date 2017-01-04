<!doctype html>
<html>
<head>
	<meta name="discription" content="We're a Handyman/Contruction company that takes on project big or small. We service the Des Moines, Iowa and surrounding area. We specialize in remodeling, fencing and decks. We offer free estimates and fully ensured.">
	
	<meta name="keywords" content="handyman, construction, free estimates, fully ensured">

	<meta charset="utf-8">
	
	<title>Contact Us / Lil Brother Construction</title>
		<?php include 'includes.php'; ?>

<style>
    
.error	{
	color:red;
	font-style:italic;	
    font-family: 'Droid Sans Mono', ;
    font-size:12px;
}

    
</style>
</head>

<body>

<?php include 'header.php'; ?>
		

	
	<div id="content">
	
		<div id="main">
            
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
	
	if($inSubject == "")							//if empty return error
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

function validateAddress()
{
    global $address1, $validForm, $addressErrMsg;
    $addressErrMsg="";
    $add_check = "/^\s*[a-z0-9\s]+$/i";
    
    if($address1 == "")							//if empty return error
	{
		$validForm = false;
  		$addressErrMsg = "Please enter a Address"; 			
	}
    
    else if(!preg_match($add_check,$address1)) {
        $validForm = false;
        $addressErrMsg .= "Please enter a valid Address";
    }
    
    else
	{
	$address1 = trim($address1);				//Removes leading/trailing characters
	$address1 = htmlspecialchars($address1);	//converts special characters
	}
}

function validateCity()
{
    global $inCity, $validForm, $cityErrMsg;
    $cityErrMsg="";
    $add_check = "/^\s*[a-z0-9\s]+$/i";
    
    if($inCity == "")							//if empty return error
	{
		$validForm = false;
  		$addressErrMsg = "Please enter a City"; 			
	}
    
    else if(!preg_match($add_check,$inCity)) {
        $validForm = false;
        $addressErrMsg .= "Please enter a valid city";
    }
    
    else
	{
	$inCity = trim($inCity);				//Removes leading/trailing characters
	$inCity = htmlspecialchars($inCity);	//converts special characters
	}
}
        
function validateZip()
{
	global $inZip, $validForm, $zipErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
	$zipErrMsg = "";								//Clear the error message. 
	
	
	
	if($inZip == "")							//REQUIRED FIELD VALIDATION TEST
	{
		$validForm = false;
		$phoneErrMsg .= "Zip code is required.";	//append message to message variable to allow for possible multiple error messages			
	}


	if( intval($inZip)==0 )					//NUMERIC REQUIRED VALIDATION TEST  	intval() returns 0 if not an integer
	{
		$validForm = false;
		$zipErrMsg .= "Please use only numbers for zip code.";
	}
	
	
	if (strlen($inZip)<5)
	{
	$validForm = false;
	$zipErrMsg .= "invalid zip code.";
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
	$address1 = $_POST['address'];
    $state = $_POST['state'];
    $inZip = $_POST['zip'];
    $inCity = $_POST['city'];
    
	$validForm = true;					//Set form flag/switch to true.  Assumes a valid form so far
	
		validateName();					//call the validateName() function
		validateLname();		//call the validateQuantity() function
		validatePhone();
		validateEmail();				//call the validateEmail() function
		validateSubject();				//call the validateShipping() function
		validateTextArea();
        validateAddress();
        validateZip();
        validateCity();
        
		
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
 		$subject = "Lil' Brother Construction contact form";			//change this for Subject line
 		if (mail($to, $subject, $emailBody)) 	//puts pieces together and emails
		{
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
            <iframe class="contactMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2982.2127278165663!2d-93.66919228456666!3d41.62953307924253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87ee9c06852e77b3%3A0xbfaf22ef23a1c75f!2s3623+Douglas+Ave%2C+Des+Moines%2C+IA+50310!5e0!3m2!1sen!2sus!4v1444917339501"  frameborder="0" style="border:0" allowfullscreen></iframe>
            
            <h1 class="tablecenter">Contact us Here</h1>
			<div class="contactStyle">
                <form action="contact.php" role="form" method="post">
	
			<table>
				<tr>
                    <td class="error"><?php echo "$areaErrMsg"; //place error message on form  ?></td>
                </tr>
                   <tr>
                    <td class="error"><?php echo "$areaErrMsg"; //place error message on form  ?></td>
                 </tr>
                   <tr>
                    <td width="210" class="error"><?php echo "$lNameErrMsg"; //place error message on form  ?></td>
                 </tr>
                   <tr>
                    <td width="210" class="error"><?php echo "$emailErrMsg"; //place error message on form  ?></td>
                 </tr>
                   <tr>
                    <td width="210" class="error"><?php echo "$phoneErrMsg"; //place error message on form  ?></td>
                 </tr>
                   <tr>
                    <td width="210" class="error"><?php echo "$addressErrMsg"; //place error message on form  ?></td>
                 </tr>
                   <tr>
                    <td width="210" class="error"><?php echo "$cityErrMsg"; //place error message on form  ?></td>
                 </tr>
                   <tr>
                    <td width="210" class="error"><?php echo "$zipErrMsg"; //place error message on form  ?></td>
                 </tr>
                   <tr>
                    <td class="error"><?php echo "$subjectErrMsg"; //place error message on form  ?></td>
                </tr>
            </table>
                    
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name:</label>
                   
                       <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $inName; //place data back in field ?>" placeholder="Enter First Name">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name:</label>
                       <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $inLname; //place data back in field ?>" placeholder="Enter Last Name">
                    </div>
				    
				    <div class="form-group col-md-4">
                        <label for="phone">Phone:</label>
                       <input type="text" name="phone" id="phone" class="form-control" maxlength="12" value="<?php echo $inPhone; //place data back in field ?>" placeholder="5556667777">
                    </div>
				    
				    <div class="form-group col-md-8">
                        <label for="email">Email:</label>
                       <input type="email" name="email" id="email" class="form-control" value="<?php echo $inEmail; //place data back in field ?>" placeholder="Example@example.com">
                    </div>
				    
				    <div class="form-group col-md-12">
                        <label for="address">Address:</label>
                       <input type="text" name="address" id="address" class="form-control" value="<?php echo $address1; //place data back in field ?>" placeholder="Enter street address">
                    </div>
				
                    <div class="form-group col-md-12">
                        <label for="city">City:</label>
                       <input type="text" name="city" id="city" class="form-control" value="<?php echo $inCity; //place data back in field ?>" placeholder="Enter City">
                    </div>
				
                    <div class="form-group col-md-6">
                        <label for="state">State:</label>
                    <select name="state" id="state" class="form-control">
                        <option value="IA" <?php if($inState=="IA"){echo "selected='selected'";}?>>IA</option>
                        <option value="AL" <?php if($inState=="AL"){echo "selected='selected'";}?>>Al</option>
                        <option value="AK" <?php if($inState=="AK"){echo "selected='selected'";}?>>Ak</option>
                        <option value="AZ" <?php if($inState=="AZ"){echo "selected='selected'";}?>>AZ</option>
                        <option value="AR" <?php if($inState=="AR"){echo "selected='selected'";}?>>AR</option>
                        <option value="CA" <?php if($inState=="CA"){echo "selected='selected'";}?>>CA</option>
                        <option value="CO" <?php if($inState=="CO"){echo "selected='selected'";}?>>CO</option>
                        <option value="CT" <?php if($inState=="CT"){echo "selected='selected'";}?>>CT</option>
                        <option value="DE" <?php if($inState=="DE"){echo "selected='selected'";}?>>DE</option>
                        <option value="D.C." <?php if($inState=="D.C."){echo "selected='selected'";}?>>D.C. </option>
                        <option value="FL" <?php if($inState=="FL"){echo "selected='selected'";}?>>FL</option>
                        <option value="GA" <?php if($inState=="GA"){echo "selected='selected'";}?>>GA</option>
                        <option value="HI" <?php if($inState=="HI"){echo "selected='selected'";}?>>HI</option>
                        <option value="ID" <?php if($inState=="ID"){echo "selected='selected'";}?>>ID</option>
                        <option value="IL" <?php if($inState=="IL"){echo "selected='selected'";}?>>IL</option>
                        <option value="IN" <?php if($inState=="IN"){echo "selected='selected'";}?>>IN</option>
                        <option value="KS" <?php if($inState=="KS"){echo "selected='selected'";}?>>KS</option>
                        <option value="KY" <?php if($inState=="KY"){echo "selected='selected'";}?>>KY</option>
                        <option value="LA" <?php if($inState=="LA"){echo "selected='selected'";}?>>LA</option>
                        <option value="ME" <?php if($inState=="ME"){echo "selected='selected'";}?>>ME</option>
                        <option value="MD" <?php if($inState=="MD"){echo "selected='selected'";}?>>MD</option>
                        <option value="MA" <?php if($inState=="MA"){echo "selected='selected'";}?>>MA</option>
                        <option value="MI" <?php if($inState=="MI"){echo "selected='selected'";}?>>MI</option>
                        <option value="MN" <?php if($inState=="MN"){echo "selected='selected'";}?>>MN</option>
                        <option value="MS" <?php if($inState=="MS"){echo "selected='selected'";}?>>MS</option>
                        <option value="MO" <?php if($inState=="MO"){echo "selected='selected'";}?>>MO</option>
                        <option value="MT" <?php if($inState=="MT"){echo "selected='selected'";}?>>MT</option>
                        <option value="NE" <?php if($inState=="NE"){echo "selected='selected'";}?>>NE</option>
                        <option value="NV" <?php if($inState=="NV"){echo "selected='selected'";}?>>NV</option>
                        <option value="NH" <?php if($inState=="NH"){echo "selected='selected'";}?>>NH</option>
                        <option value="NJ" <?php if($inState=="NJ"){echo "selected='selected'";}?>>NJ</option>
                        <option value="NM" <?php if($inState=="NM"){echo "selected='selected'";}?>>NM</option>
                        <option value="NY" <?php if($inState=="NY"){echo "selected='selected'";}?>>NY</option>
                        <option value="NC" <?php if($inState=="NC"){echo "selected='selected'";}?>>NC</option>
                        <option value="ND" <?php if($inState=="ND"){echo "selected='selected'";}?>>ND</option>
                        <option value="OH" <?php if($inState=="OH"){echo "selected='selected'";}?>>OH</option>
                        <option value="OK" <?php if($inState=="OK"){echo "selected='selected'";}?>>OK</option>
                        <option value="OR" <?php if($inState=="OR"){echo "selected='selected'";}?>>OR</option>
                        <option value="PA" <?php if($inState=="PA"){echo "selected='selected'";}?>>PA</option>
                        <option value="RI" <?php if($inState=="RI"){echo "selected='selected'";}?>>RI</option>
                        <option value="SC" <?php if($inState=="SC"){echo "selected='selected'";}?>>SC</option>
                        <option value="SD" <?php if($inState=="SD"){echo "selected='selected'";}?>>SD</option>
                        <option value="TN" <?php if($inState=="TN"){echo "selected='selected'";}?>>TN</option>
                        <option value="TX" <?php if($inState=="TX"){echo "selected='selected'";}?>>TX</option>
                        <option value="UT" <?php if($inState=="UT"){echo "selected='selected'";}?>>UT</option>
                        <option value="VT" <?php if($inState=="VT"){echo "selected='selected'";}?>>VT</option>
                        <option value="VA" <?php if($inState=="VA"){echo "selected='selected'";}?>>VA</option>
                        <option value="WA" <?php if($inState=="WA"){echo "selected='selected'";}?>>WA</option>
                        <option value="WV" <?php if($inState=="WV"){echo "selected='selected'";}?>>WV</option>
                        <option value="WI" <?php if($inState=="WI"){echo "selected='selected'";}?>>WI</option>
                        <option value="WY" <?php if($inState=="WY"){echo "selected='selected'";}?>>WY</option>
                                        
				    </select>
                </div>   
                    
                    <div class="form-group col-md-6">
                        <label for="zip">Zip:</label>
                        <input type="text" name="zip" id="zip" class="form-control" maxlength="5" value="<?php echo $inZip; //place data back in field ?>" placeholder="Enter City">
                    </div>
                
                    <div class="form-group col-md-6">    
                        <label for="subject">Subject:</label>
                
                        <select name="subject" id="subject" class="form-control">
				
                            <option value="" <?php if($inSubject==""){echo "selected='selected'";}?>>Please select one</option>

                            <option value="video" <?php if($inSubject=="video"){echo "selected='selected'";}?>>Schedule Estimate</option>

                            <option value="sponsorship" <?php if($inSubject=="sponsorship"){echo "selected='selected'";}?>>General Inquiry</option>

                            <option value="sponsorship" <?php if($inSubject=="sponsorship"){echo "selected='selected'";}?>>Remodeling Questions</option>

                            <option value="Other" <?php if($inSubject=="Other"){echo "selected='selected'";}?>>Other</option>
				
				        </select>
                    </div>
					
					<div class="form-group col-md-12">
                        <label for="comment">Comment here</label>
                   
                       <textarea name="comment" id="comment" class="form-control" rows="5" value="<?php echo $textArea; //place data back in field ?>"></textarea>
                    </div>
			
	                <div class="form-group col-md-12">
                    <input  type="submit" name="submit" class="btn btn-success" id="submit" >
                    <input  type="reset" name="cancel" class="btn btn-danger" id="cancel">
                    </div>
	</form>
        </div>
        
                
              
    </div>
            
    </div>
    
    
	<?php include 'footer.php'; ?>
            
</body>
</html>