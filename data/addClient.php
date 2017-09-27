<?php
  session_start();
  include "../templates/header.php";
  // require some files...
  require "config.php";
  require "common.php";
  
  /*----------------------------------------------*/
  /* Submit client form.
  /*----------------------------------------------*/
      if (isset($_POST['submitClient']))
      {
        
          try
          {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $new_client = array(
                "display_name" => $_POST['displayname'],
                "contact_name" => $_POST['contactname'],
                "email"       => $_POST['email'],
                "phone"       => $_POST['phone']
            );
            
            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "clients",
                implode(", ", array_keys($new_client)),
                ":" . implode(", :", array_keys($new_client))
            );
            
            $statement = $connection->prepare($sql);
            $statement->execute($new_client);        
          }
          catch(PDOException $error)
          {
              echo $sql . "<br>" . $error->getMessage();
          }
          
      }
  /*----------------------------------------------*/
  /* End submit client form
  /*----------------------------------------------*/
?>
<div class="container">
  <?php                
    if (isset($_POST['formid']) && isset($_SESSION['formid']) && $_POST["formid"] == $_SESSION["formid"])
    {
      $_SESSION["formid"] = '';
      
      echo "<h2 class='success_message'>" . $_POST["displayname"] . " added to client table.</h2>";
      echo "<div class='button_wrapper'><a class='button' href='index.php'>Go Back</a></div>";
    }
    else
    {
      $_SESSION["formid"] = md5(rand(0,10000000));
  ?>
  
  <h2>Add Client</h2>
  
  <form name="insertClient" id="insert_client" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  	
  	<div class="input">
      <label for="displayname">Display Name</label>
      <input type="text" name="displayname" id="displayname" />
  	</div>
  	<div class="input">
  		<label for="contactname">Contact name</label>
  		<input type="text" name="contactname" id="contactname" />
  	</div>
  	<div class="input">
    	<label for="email">E-mail</label>
    	<input type="email" name="email" id="email" />
  	</div>
  	<div class="input">
    	<label for="phone">Phone</label>
    	<input type="tel" name="phone" id="phone" />
  	</div>
  
  	<input type="hidden" name="formid" value="<?php echo htmlspecialchars($_SESSION["formid"]); ?>" />
  	<input class="form-submit dark" id="submit" type="submit" id="submitClient" name="submitClient" value="Submit" />
  </form>
  <?php } ?> 
</div>    

<?php include "../templates/footer.php"; ?>