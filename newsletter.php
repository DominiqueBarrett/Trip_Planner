<!DOCTYPE html>
<?php
/**********************************************
 * Modified By: Dominique Barrett             *
 * Modified Date: 9-14-2018            *
 * Edited the validation for the newsletter   *
 * Modified Date: 9-19-2018                        *
 * fixed validation error handling                 *
 *********************************************/ 
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Trip Planner News</title>
    <link href="_css/site.css" rel="stylesheet">
    <script src="_js/site.js"></script>
    <script type="text/javascript">
    function firstNameValidation()
    {
        <!--This checks if the first name is less than 2 letters long it will return an error to user if it makes it all the way through the function it sets the error message to an empty string -->
        var FirstName = $("firstname").value;

        if (FirstName.length < 2) 
        {
            firstNameError.innerHTML = "First Name must be at least 2 characters long.";
            $("firstname").focus();
        }
        else
        {
             firstNameError.innerHTML = "";
        }
    }
    <!-- This checks if the last name is less than 2 letters long it will return an error to user if it makes it all the way through the function it sets the error message to an empty string -->
    function lastNameValidation()
    {
        var LastName = $("lastname").value;

        if (LastName.length < 2) 
        {
            lastNameError.innerHTML = "Last Name must be at least 2 characters long.";
            $("lastname").focus();
        }
        else
        {
             lastNameError.innerHTML = "";
        }
    }
    <!-- this function validates that the email is in the correct format to be an email, it uses regular expression (something learned at work) to do so if it makes it all the way through the function it sets the error message to an empty string-->
    function emailAddressValidation() {
        var email = $("emailAddress").value;
	  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  var isValid = re.test(String(email).toLowerCase());
            if (isValid == false) 
            {
                emailAddressError.innerHTML = "Must input a valid Email Address.";
                $("emailAddress").focus();
            }
            else
            {
                 emailAddressError.innerHTML = "";
            }
        } 
        <!-- This does one last check to make sure everything is valid before submiting the newsletter if there are any errors it does not submit-->
        function newsletterValidation() {
        firstNameValidation();
        lastNameValidation();
        emailAddressValidation();
        if (firstNameError.innerHTML != "" || lastNameError.innerHTML != "" || emailAddressError.innerHTML != "")
            return;
        newsletterForm.submit()
        }      
    </script>
        <style>
        .errorMesssage{
            color: yellowgreen; 
            width: 300px;
        }
        </style>
  </head>
  <body class="newsLetter">
      <div class="wrapper">
      <header>
        <div class="logos" style="Width: 100%">
          <img style="" src="_images/LogoAddition2.png" alt="Company Logo">
          <img style="" src="_images/CompanyLogo2.png" alt="Company Logo">
          <img style="" src="_images/LogoAddition2.png" alt="Company Logo">
        </div>
        <div class="navigation">
          <nav>
            <ul class="mainNav">
              <li><a href="index.php" class="homeLink">Home</a></li>
              <li><a href="FAQ.php" class="FAQLink">FAQ</a></li>
              <li><a href="calculator.php" class="calculatorLink">Gas Calculator</a></li>
              <li><a href="contact.php" class="contactLink">Contact Us</a></li>
              <li><a href="newsLetter.php" class="newsLetterLink">News Letter</a></li>
             <li><a href="adminReport.php" class="adminReportLink">Admin Report</a></li>
            </ul>
          </nav>
        </div>
      </header>
          <div class="content">
              <div class="main">
                  <h1>Sign up for our <em>FREE</em> newsletter!</h1>
                  <h2>Each week you'll learn valuable tips for Travel and Exploration.<br/>Just sign up below.</h2>
                  <!--this is the newsletter form, each input has a function that is called every time something is changed to validate it as the user goes. -->
                    <form id="newsletterForm" action="newsletter_Data.php" method="post">
                        <table style="margin-left:auto; margin-right: auto;">
                              <tr>
                                <td style="width: 300px; text-align: right;"><label>First Name:&nbsp;</label></td>
                                <td><input id="firstname" type="text" name="firstName" value="" class="textbox" onchange="firstNameValidation()"><br/></td>
                                <td><div class="errorMesssage" id="firstNameError"></div></td>
                              </tr>
                              <tr>
                                <td style="text-align: right;"><label>Last Name:&nbsp;&nbsp;</label></td>
                                <td><input id="lastname" type="text" name="lastName" value="" class="textbox" onchange="lastNameValidation()"><br/></td>
                                <td><div class="errorMesssage" id="lastNameError"></div></td>
                              </tr>
                              <tr>
                                <td style="text-align: right;"><label>Email Address: </label><br/></td>
                                <td><input id="emailAddress" type="text" name="email" value="" class="textbox" onchange="emailAddressValidation()"><br/></td>
                                <td><div class="errorMesssage" id="emailAddressError"></div></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><input id="newsletter" type="button" value="Submit" onclick="newsletterValidation()"><br/></td>
                              </tr>
                        </table>
                    </form>
              </div>
          </div>
          <footer>
            <p>Any Information is subject to personal opinions by Dominique Barrett.<img class="animated" style="width:100px;" src="_images/Airplane.png" alt="Airplane">
              The date is already <strong>
              <script>printToday();</script>
            </strong> you better start planning now! And make sure to travel responsibly.</p>
          </footer>
      </div>
  </body>
</html>