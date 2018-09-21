<?php 

/**********************************************
 * Modified By: Dominique Barrett             *
 * Latest Modified Date: 9-14-2018            *
 * Added a foreach to show all the employees  *
 *********************************************/ 

require('model/database.php');
require('model/visitor_db.php');
require('model/employees_db.php');
  
$employees = EmployeeDB::getEmployees();
$visitors = VisitorDB::getVisitors();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Trip Planner Home</title>
  <link href="_css/site.css" rel="stylesheet">
  <script src="_js/site.js"></script>
  <script type="text/javascript">
      //this navigates to the Visitor page with the employeeID from the url
      function navagateToVisitors(id)
      {
          window.location.href = 'viewVisitors.php?id=' + id;
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
        <div style="width: 300px; text-align: center; padding-left: 35%">
            <h1>Employee List</h1>
            <table>
                <th>Employee ID</th>
                <th>First name</th>
                <th>Last name</th>
                <!--this loops through and displays the employees in a grid-->
                <?php foreach($employees as $employee) : ?>
                    <tr>
                        <td style="text-align: center">
                            <?php echo $employee->getID(); ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $employee->getFirstName(); ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $employee->getLastName(); ?>
                        </td>
                        <!--this calls the function above to navigate to the view visitor page and passes in the employee id from the url-->
                        <td><input id="getVisitor" type="button" value="Select" onclick="navagateToVisitors(<?php echo $employee->getID(); ?>)"></td>
                    </tr>
                <?php endforeach; ?>
                
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
