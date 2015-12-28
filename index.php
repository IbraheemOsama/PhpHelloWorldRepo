<?php

//require __DIR__ . '/Crassaert\AzureDocumentDB\AzureDocumentDB.php';
//require_once 'includes\AzureDocumentDB.php';


$page="";
if(isset($_POST['name'])) {
    $page = 'thanks';
}


$host = "tcp:f6mooov6xr.database.windows.net,1433";
$user = "FlyDBAdmin";
$pwd = getenv("databasePassword");
$db = "DynamicAppsBase";

try{
    $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    $sql_select = "SELECT * FROM TablesValidation";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll();
    if(count($registrants) > 0) {
        echo "<h2>People who are registered:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['ID']."</td>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
}
catch(Exception $e){
    die(print_r($e));
}
echo "<h3>Table created.</h3>";

?>


  <html>

  <head>
  </head>

  <body>

    <?php
echo($page);
echo($master_key);
foreach($dbs as $key=>$value)
{
    echo($value);
}

//phpinfo();
?>

      <h2>
<?php

include("includes\a.php");

$querystring=$_GET['id'];

echo($querystring);
?>
</h2>

      <!--<?php for($i=0;$i<100;$i++): ?>
<h3>Hello MDC</h3>

<?php endfor ?>-->



      <?php if($querystring=="1"):?>
        <span>one</span>
        <?php endif ?>


          <form method="post">
            <p>
              <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" />
            </p>

            <p>
              <input type="radio" name="attending" value="yes" /> I&rsquo;m coming!
              <br />
              <input type="radio" name="attending" value="no" /> I can&rsquo;t make it.

            </p>

            <p>
              <label for="guests">Date&rsquo;s Name (if applicable)</label>
              <input type="text" name="date_name" id="date_name" placeholder="Guest Name" />
            </p>

            <input type="submit" value="RSVP" class="submit" />
          </form>

  </body>

  </html>