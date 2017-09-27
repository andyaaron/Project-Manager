<?php
  require "data/config.php";
  
  /*----------------------------------------------*/
  /* If option is changed on projects page
  /*----------------------------------------------*/
  if (isset($_POST['select_client'])) {
    try
    {
      $connection = new PDO($dsn, $username, $password, $options);
      
      // Display all projects
      if ($_POST['select_client'] !== "0") {
        $getProjects = "SELECT a.client_id, a.project_id, a.project_name,
                        b.client_id, b.display_name
                        FROM projects a
                        INNER JOIN clients b on a.client_id = b.client_id
                        WHERE a.client_id LIKE ".$_POST['select_client'];
      } else {
      // Display specific client projects
        $getProjects = "SELECT a.client_id, a.project_id, a.project_name,
                        b.client_id, b.display_name
                        FROM projects a
                        INNER JOIN clients b on a.client_id = b.client_id";  
      }
      
      $statement = $connection->prepare($getProjects);
      $statement->execute();
      $project = $statement->fetchAll();
      
      if (!$project) {
        echo "<p>No projects for this client!</p>";
      } else {
        
        foreach ($project as $row => $value) {
          echo "<tr>";
          echo "<td>" . $value["display_name"] . "</td>";
          echo "<td>" . $value["project_name"] . "</td>";
          echo "</tr>";
        }
        
      }
    }
    catch(PDOexception $error)
    {
      echo $sql . "<br>" . $error->getMessage();
    }
  }
  /*----------------------------------------------*/
  /* End if
  /*----------------------------------------------*/
  