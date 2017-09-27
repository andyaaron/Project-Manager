<?php
  require "config.php";

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
  /* End
  /*----------------------------------------------*/  
?>