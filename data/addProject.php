<?php
  session_start();
  include "../templates/header.php";
  // require some files...
  require "getClients.php";
  require "config.php";
  require "common.php";

?>
<div class="container">
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
    	<input type="text" name="projectdescription" id="projectdescription" />
  	</div>
  	<div class="input">
    	<label for="phone">Status</label>
    	<input type="text" name="projectstatus" id="projectstatus" />
  	</div>
  
  	<input type="hidden" name="formid" value="<?php echo htmlspecialchars($_SESSION["formid"]); ?>" />
  	<input class="form-submit dark" id="submit" type="submit" id="submitClient" name="submitClient" value="Submit" />
  </form>
</div>    
