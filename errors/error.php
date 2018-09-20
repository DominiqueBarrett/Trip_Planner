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
<div id="main">
    <h1 class="top">Error</h1>
    <p><?php echo $error; ?></p>
</div>
<?php include '../view/footer.php'; ?>
</html>