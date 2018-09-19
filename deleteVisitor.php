<!--php calls the databases files which call the database itself it post the information it gets from the Contact form it also calls the add_visitor function which will add that information to the visitor table-->
<?php
require('model/database.php');
require('model/employees_db.php');
require('model/visitor_db.php');
//this gets the employeeID from the url to be used to sort visitors
$id = $_GET['id'];
//this retreives the visitors from the database using the id from the url (above)
$visitor = VisitorDB::getVisitorByID($id);
$visitors = VisitorDB::getVisitorByID($id);
//this deletes the visitor from the database
VisitorDB::deleteVisitorByID($id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Information</title>
    <link rel="stylesheet" type="text/css" href="_css/site.css"/>
    <script src="_js/site.js"></script>
    <script type="text/javascript">
        //this navigates back to the Visitor page with the same employeeID
        function back(id){
            window.location.href = 'viewVisitors.php?id=' + id;
        }
    </script>
</head>
<body class="contact">
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
        <div style="width: 500px; text-align: center; padding-left: 25%">
            <h2 style='text-align: center; margin-left: 20px'>This visitor's comment has been deleted.</h2>
            <table>
                <th>Employee ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Visitor ID</th>
                <!--this loops through and displays the visitors in a grid this is set up for future if I decide to make a bulk delete-->
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
                    </tr>
                <?php endforeach; ?>
            </table>
            <div style='text-align: left'>
                <!--this calls the function above to navigate to the view visitor page and passes in the employee id-->
                <input style=' width: 100px; margin-left: 250px ' id="deleteVisitor" type="button" value="Back" onclick="back(<?php echo $visitor->getID(); ?>);">
            </div>
            
        </div>
    </div>
    <footer>
      <p>Any Information is subject to personal opinions by Dominique Barrett.<img class="animated" style="width:100px;" src="_images/Airplane.png" alt="Airplane"> The date is already <strong>
                <script>printToday();</script>
        </strong> you better start planning now! And make sure to travel responsibly.</p>
    </footer>
</body>
</html>