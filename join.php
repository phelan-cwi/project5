<?php
require('./model/database.php');
    $visitor_name = filter_input(INPUT_POST, 'first_name');
    $visitor_email = filter_input(INPUT_POST, 'email_address1', FILTER_VALIDATE_EMAIL);
    $visitor_email2 = filter_input(INPUT_POST, 'email_address2', FILTER_VALIDATE_EMAIL);
    
    // Validate inputs
    if ($visitor_name == null || $visitor_email == null || $visitor_email2 == null) {
        include("./errors/error.php"); 
        exit();
        } else {
            $dsn = 'mysql:host=localhost;dbname=contact_list';
            $username = 'root';
            $password = 'Something0!'; 

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include("./errors/db_error.php"); 
                exit();
            }
            $query = 'INSERT INTO list
                         (firstName, email)
                      VALUES
                         (:first_name, :email_address1)';
            $statement = $db->prepare($query);
            $statement->bindValue(':first_name', $visitor_name);
            $statement->bindValue(':email_address1', $visitor_email);
            $statement->execute();
            $statement->closeCursor();
        }        
?>

<!-- added all that php code there. Created the different variables and validation, 
a catch if it's not filled in right, then it adds into the appropriate database-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invest Houses</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Invest Houses</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.html">Home</a></li>
          <li><a href="calculator.html">Calculator</a></li>
          <li><a href="faq.html">FAQ</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li class="active"><a href="email.html">Email List</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="jumbotron text-center">
  <h1>Invest Houses</h1>
  <p>We'll invest your money in a house!</p>
</div>
  <div class="container">
    <h1>Thanks for joining our list!</h1>

  </div>
<footer class="footer">
      <div class="container">
        <span class="text-muted">Sell Houses&copy</span>
      </div>
</footer>

</body>
</html>
