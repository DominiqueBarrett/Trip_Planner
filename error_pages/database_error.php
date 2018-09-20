<html>
    <head>
        <meta charset="UTF-8">
        <title>Tripe Planner Error</title>
        <link href="_css/site.css" rel="stylesheet">
        <script src="_js/site.js"></script>
    </head>
    <div>
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
        <h1>Database Error</h1>
        <p class="first_paragraph">There was an error connecting to the database.</p>
        <p>We apologize for the inconvenience and will fix the issue as soon as possible</p>
        <p>Please Try again at a later date!</p>
        <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
    </div>
    <footer>
      <p>Any Information is subject to personal opinions by Dominique Barrett.<img class="animated" style="width:100px;" src="_images/Airplane.png" alt="Airplane">
        The date is already <strong>
        <script>printToday();</script>
      </strong> you better start planning now! And make sure to travel responsibly.</p>
    </footer>
</html>