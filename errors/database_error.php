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
<main>
    <h1>Database Error</h1>
    <p class="first_paragraph">There was an error connecting to the database.</p>
    <p>The database must be installed as described in the appendix.</p>
    <p>MySQL must be running as described in chapter 1.</p>
    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
</main>
<?php include '../view/footer.php'; ?>
</html>

