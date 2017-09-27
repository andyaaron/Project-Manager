<?php
  session_start();
  include "../templates/header.php";
  // require some files...
  require "getClients.php";
  require "config.php";
  require "common.php";

  /*----------------------------------------------*/
  /* Submit project form.
  /*----------------------------------------------*/
      if (isset($_POST['submitProject']))
      {
        
          try
          {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $new_project = array(
                "client_id"     => $_POST['select_client'],
                "project_name"  => $_POST['projectname'],
                "project_desc"  => $_POST['projectdesc'],
                "status"        => $_POST['projectstatus']
            );
            
            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "projects",
                implode(", ", array_keys($new_project)),
                ":" . implode(", :", array_keys($new_project))
            );
            
            $statement = $connection->prepare($sql);
            $statement->execute($new_project);        
            
          }
          catch(PDOException $error)
          {
              echo $sql . "<br>" . $error->getMessage();
          }
          
      }
  /*----------------------------------------------*/
  /* End submit project form
  /*----------------------------------------------*/


?>
<div class="container">
  <?php                
    if (isset($_POST['formid']) && isset($_SESSION['formid']) && $_POST["formid"] == $_SESSION["formid"])
    {
      $_SESSION["formid"] = '';
      
      echo "<h2 class='success_message'>" . $_POST["projectname"] . " added to project table.</h2>";
      echo "<div class='button_wrapper'><a class='button' href='../projects.php'>Go Back</a></div>";
    }
    else
    {
      $_SESSION["formid"] = md5(rand(0,10000000));
  ?>
  
  <h2>Add Project</h2>
  
  <form name="insertProject" id="insert_project" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  	
  	<div class="input">
      <label for="client">Client</label>
      <select id="select_client" name="select_client">
      <option value="0">Select a Client</option>
      <?php
        foreach ($result as $row)
        { ?>
        <option value="<?=escape($row['client_id'])?>"><?=escape($row['display_name'])?></option>
        <?php  
        } ?>
      
    </select>

  	</div>
  	<div class="input">
  		<label for="projectname">Project name</label>
  		<input type="text" name="projectname" id="projectname" />
  	</div>
  	<div class="input">
    	<label for="projectdescription">Description</label>
    	<textarea type="text" name="projectdesc" id="projectdesc"></textarea>
  	</div>
  	<div class="input">
    	<label for="phone">Status</label>
    	<input type="text" name="projectstatus" id="projectstatus" />
  	</div>
  
  	<input type="hidden" name="formid" value="<?php echo htmlspecialchars($_SESSION["formid"]); ?>" />
  	<input class="form-submit dark" id="submit" type="submit" id="submitProject" name="submitProject" value="Submit" />
  </form>
  <?php } ?> 
</div>    

<?php include "../templates/footer.php"; ?>