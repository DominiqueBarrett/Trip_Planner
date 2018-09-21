<?php
/**********************************************
 * Modified By: Dominique Barrett             *
 * Latest Modified Date: 9-21-2018            *
 * Added an if statement to show an error if  *
 * the Employee doesn't have any visitors     *
 * assigned to them                           *
 *********************************************/ 
require('model/database.php');
require('model/visitor_db.php');
require('model/employees_db.php');

//this gets the employeeID from the url to be used to sort visitors
$id = $_GET['id'];    
//this retreives the visitors from the database using the id from the url (above)
$errorMessage = NULL;
//$visitors = VisitorDB::getVisitors();
try {
    $visitors = EmployeeDB::getVisitorsByEmployeeID($id);
} 
catch (Exception $ex) {
 $errorMessage ="Cannot Connect to the Database";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Trip Planner Home</title>
  <link href="_css/site.css" rel="stylesheet">
  <script src="_js/site.js"></script>
  <script type="text/javascript">
      //this navigates to a delete page for the singular visitor that is selected
      function navagateToDeleteVisitor(id)
      {
          window.location.href = 'deleteVisitor.php?id=' + id;
      }
    </script>
</head>
<body class="adminReport">
  <div class="wrapper">
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
    <div class="content">        
        <div style="width: 3000px; text-align: center; padding-left: 20%">
            <h1 style='text-align: left; margin-left: 150px'>Visitor List by Employee</h1>
            <table>
                <th>Employee ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Visitor ID</th>
                <!--this loops through and displays the visitors in a grid-->
                <?php foreach($visitors as $visitor) : ?>
                    <tr>
                        <td style="text-align: center">
                            <?php echo $visitor->getID(); ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $visitor->getFirstName(); ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $visitor->getLastName(); ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $visitor->getEmailAddress(); ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $visitor->getPhoneNumber(); ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $visitor->getVisitorID(); ?>
                        </td>
                        <!--this calls the function above to navigate to the delete confirmation page-->
                        <td><input id="deleteVisitor" type="button" value="Delete" onclick="navagateToDeleteVisitor(<?php echo $visitor->getVisitorID(); ?>)"></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td id="errorMessage" style="text-align: center; color: greenyellow;" colspan="6">
                        <?php //This echos an error if there are not any Visitors assigned to particular employee. 
                            if ($visitors == Null && $errorMessage == NULL){
                                echo "This employee is not helping anyone at the moment. Please check back again at a later date.";
                            } //if the call to the database send back an errorMessage that is can't connect it shows that error
                            else if ($errorMessage != NULL) {
                                echo $errorMessage;
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <footer>
      <p>Any Information is subject to personal opinions by Dominique Barrett.<img class="animated" style="width:100px;" src="_images/Airplane.png" alt="Airplane"> The date is already <strong>
                <script>printToday();</script>
        </strong> you better start planning now! And make sure to travel responsibly.</p>
    </footer>
  </div>
</body>

</html>
