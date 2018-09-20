<?php

include_once('./model/database.php');
include_once('./model/contact.php');
include_once('./model/contactDB.php');
//calls the delete button
$deleteID = filter_input(INPUT_POST, 'deleteID'); 
    if ($deleteID) { 
        ContactDB::deleteContact($deleteID); 
}

?>

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
   <style type=text/css>
table {
margin: 8px;
}

th {
font-size: 1em;
background: #666;
color: #FFF;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-size: 1em;
border: 1px solid #DDD;
}
</style>
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
          <li><a href="email.html">Email List</a></li>
          <li class="active"><a href="comments.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="jumbotron text-center">
  <h1>Invest Houses</h1>
  <p>We'll invest your money in a house!</p>
</div>
  <div class="container">
      <table>
    <h1>Contact Them</h1>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Contact By</th>
        <th>Comments</th>
    </tr>
    

    <?php 
    $contacts = ContactDB::getContact();
    foreach ($contacts as $contact) : ?>
    <tr>
        <td><?php echo $contact->getID(); ?></td>
        <td><?php echo $contact->getEmail(); ?></td>
        <td><?php echo $contact->getPhone(); ?></td>
        <td><?php echo $contact->getContactBy(); ?></td>
        <td><?php echo $contact->getComments(); ?></td>
        <td> 
                <form action='./comments.php' method='post' name="action">
                    <input type='hidden' name='deleteID' value=<?php echo '\'' . $contact->getID() . '\''; ?>>
                           <input type='submit' value='Delete'>
                    
                </form>
        </td>
    </tr>
    <?php endforeach ?>
      </table>
  </div>
<footer class="footer">
      <div class="container">
        <span class="text-muted">Sell Houses&copy</span>
      </div>
</footer>

</body>
</html>

