<?php
  include "templates/header.php";
  require "data/config.php";
  require "data/getClients.php";
  require "data/common.php";
?>

<script>
  /*----------------------------------------------*/
  /* Ajax query to load project table
  /*----------------------------------------------*/
    $(document).ready(function(){
        
      $('#select_client').on('change', function(event){
         var values = $(this).serialize();
         console.log("client selected: "+$(this).val());
         $.ajax({
           url: "data/data_file.php",
           type: "post",
           data: values,
           success: function(data){
             $("#project_table tbody").empty().append(data)
           },
           error:function(){
             $("#project_table tbody").empty().append('something went wrong!');
           }
           
         }); 
  
      });
    
    });
  /*----------------------------------------------*/
  /* End
  /*----------------------------------------------*/
</script>

<?php

  
  /*----------------------------------------------*/
  /* Get projects
  /*----------------------------------------------*/
    try
    {
      $getProjects = "SELECT a.client_id, a.project_name,
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

<div class="container">
  
  <h2>Projects</h2>
  <a href="/data/addProject.php" class="button">Add Project</a>
  <form>
    <select id="select_client" name="select_client">
      <option value="0">All Clients</option>
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
      <?php
          foreach ($projects as $project)
          { ?>
      <tr>
          <td><?=escape($project['display_name'])?></td>
          <td><?=escape($project['project_name'])?></td>
      </tr>
      <?php 
          } ?>
    </tbody>
  </table>

</div>


<?php include "templates/footer.php"; ?>