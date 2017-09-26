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

<form>
  <select>
    <?php
      foreach ($result as $row)
      { ?>
      <option value="<?=escape($row['client_id'])?>"><?=escape($row['display_name'])?></option>
      <?php  
      } ?>
    
  </select>
</form>



<?php include "templates/footer.php"; ?>