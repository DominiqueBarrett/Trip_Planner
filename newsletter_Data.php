<!--php calls the databases files which call the database itself it post the information it gets from the newsletter form it also calls the add_newsletter function which will add that information to the newsletter table in the database-->
<?php
/**********************************************
 * Modified By: Dominique Barrett             *
 * Latest Modified Date: 9-14-2018            *
 * Added a thank you for contacting us page   *
 *********************************************/ 
    require('model/database.php');
    require('model/newsletter_db.php');
    // get the data from the form
    $emailAddress = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    
    add_newsletter($firstName, $lastName, $emailAddress);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Information</title>
    <link rel="stylesheet" type="text/css" href="_css/site.css"/>
    <script src="_js/site.js"></script>
</head>
<body class="newsLetter">
    <header>
      <div class="logos" style="width: 100%">
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
    <!--this will show the data if valid that the user just inputed (validation check is on the first page)-->
    <main>
        <div class="main">
            
            <h1>Sign Up Information</h1>
            <h3>You have signed up for our Newsletter! You will get your first Newsletter one week after you sign up!!</h3>
            <label>Email Address:</label>
            <span><?php echo htmlspecialchars($emailAddress); ?></span><br>

            <label>First Name:</label>
            <span><?php echo htmlspecialchars($firstName); ?></span><br>

            <label>Last Name:</label>
            <span><?php echo htmlspecialchars($lastName); ?></span><br>

        </div>

    </main>
    <footer>
      <p>Any Information is subject to personal opinions by Dominique Barrett.<img class="animated" style="width:100px;" src="_images/Airplane.png" alt="Airplane"> The date is already <strong>
                <script>printToday();</script>
        </strong> you better start planning now! And make sure to travel responsibly.</p>
    </footer>
</body>
</html>