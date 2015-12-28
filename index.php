<?php

//require __DIR__ . '/Crassaert\AzureDocumentDB\AzureDocumentDB.php';
//require_once 'includes\AzureDocumentDB.php';


$page="";
if(isset($_POST['name'])) {
    $page = 'thanks';
}


$host = "tcp:f6mooov6xr.database.windows.net,1433";
$user = "FlyDBAdmin";
$pwd = "P@ssw0rd123@";
$db = "DynamicAppsBase";
try{
    $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false)
    die(FormatErrors(sqlsrv_errors()));
    
    $tsql = "select * from [TablesValidation]";
    $getProducts = sqlsrv_query($conn, $tsql);
    if ($getProducts == FALSE)
        die(FormatErrors(sqlsrv_errors()));
    
    while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
    {
        echo($row['ID']);
        echo("<br/>");
    }
    sqlsrv_free_stmt($getProducts);
    sqlsrv_close($conn);
    
    
}
catch(Exception $e){
    die(print_r($e));
}

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