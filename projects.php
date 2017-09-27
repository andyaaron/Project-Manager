<?php
  include "templates/header.php";
  require "config.php";
  require "common.php";
?>

<script>
  /*----------------------------------------------*/
  /* Ajax query to load project table
  /*----------------------------------------------*/
  $(document).ready(function(){
      
    $('#select_client').on('change', function(event){
      if($(this).val() == 0)
      {
        $('#project_table tbody').empty();
        console.log("no client selected");
      }
      else
      {
       var values = $(this).serialize();
       console.log("client selected: "+$(this).val());
       $.ajax({
         url: "data_file.php",
         type: "post",
         data: values,
         success: function(data){
           $("#project_table tbody").empty().append(data)
         },
         error:function(){
           $("#project_table tbody").empty().append('something went wrong!');
         }
         
       }); 
      }
    });
  
  });
  /*----------------------------------------------*/
  /* End
  /*----------------------------------------------*/
</script>

<?php
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
  
  /*----------------------------------------------*/
  /* get Projects
  /*----------------------------------------------*/
    try
    {
      $getProjects = "SELECT a.client_id, a.project_id, a.project_name,
                      b.client_id, b.display_name
                      FROM projects a
                      INNER JOIN clients b on a.client_id = b.client_id";
      
      $statement = $connection->prepare($getProjects);
      $statement->execute();
      $projects = $statement->fetchAll();
    }
    catch(PDOexception $error)
    {
      echo $sql . "<br>" . $error->getMessage();
    }
  /*----------------------------------------------*/
  /* End
  /*----------------------------------------------*/
?>

<form>
  <select id="select_client" name="select_client">
    <option value="0">Select a client...</option>
    <?php
      foreach ($result as $row)
      { ?>
      <option value="<?=escape($row['client_id'])?>"><?=escape($row['display_name'])?></option>
      <?php  
      } ?>
    
  </select>
</form>

<table id="project_table">
  <thead>
    <tr>
      <th>Client</th>
      <th>Project</th>      
    </tr>
  </thead>
  
  <tbody>
    
  </tbody>
</table>

<table>
  
  <thead>
    <tr>
      <th>#</th>
      <th>Client</th>
      <th>Project</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
        foreach ($projects as $project)
        { ?>
    <tr>
        <td><?=escape($project['project_id'])?></td>
        <td><?=escape($project['display_name'])?></td>
        <td><?=escape($project['project_name'])?></td>
    </tr>
    <?php 
        } ?>
  </tbody>
  
</table>



<?php include "templates/footer.php"; ?>