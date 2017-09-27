<?php
  include "templates/header.php";
  require "config.php";
  require "common.php";
  
  /*----------------------------------------------*/
  /* Get Clients
  /*----------------------------------------------*/
      try
      {
          $connection = new PDO($dsn, $username, $password, $options);
          
          $getClients = "SELECT *
                  FROM clients";
          
          $statement = $connection->prepare($getClients);
          $statement->execute();
          
          $result = $statement->fetchAll();
      }
      catch(PDOexception $error)
      {
          echo $sql . "<br>" . $error->getMessage();
      }
  /*----------------------------------------------*/
  /* End get clients
  /*----------------------------------------------*/
?>

<div class="container">
  <h2>Clients</h2>
  <a href="addClient.php" class="button">Add Client</a>
  <table>
    
    <thead>
      <tr>
        <th>#</th>
        <th>Display Name</th>
        <th>Contact Name</th>
        <th>E-mail</th>
        <th>Phone</th>
      </tr>
    </thead>
    
    <tbody>
      <?php
          foreach ($result as $row)
          { ?>
      <tr>
          <td><?=escape($row['client_id'])?></td>
          <td><?=escape($row['display_name'])?></td>
          <td><?=escape($row['contact_name'])?></td>
          <td><?=escape($row['email'])?></td>
          <td><?=escape($row['phone'])?></td>
      </tr>
      <?php 
          } ?>
    </tbody>
    
  </table>

</div>

<?php include "templates/footer.php"; ?>