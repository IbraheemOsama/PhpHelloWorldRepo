<?php

//require __DIR__ . '/Crassaert\AzureDocumentDB\AzureDocumentDB.php';
//require_once 'includes\AzureDocumentDB.php';
use Crassaert\AzureDocumentDB\AzureDocumentDB;

	$page="";
		if(isset($_POST['name'])) {
			$page = 'thanks';
		}
        
        
         $host = 'https://phpdocumentdbtest.documents.azure.com:443/';
    $master_key = "+GwNhmxQT2pf1ux8r4WGV3tqkUyidxKmiHPq1RMkuYoKgHJnSBeVPmgljGD3EfcYTySypJ4+TEFnR//MrFfcgQ==";//getenv("documentDBKey"); ;
    
    // connect DocumentDB
   $db = new AzureDocumentDB($host, $master_key, false);

   $db->get('database')->create('clothes');
    $dbs=$db->get('database')->_list();
    
    
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
		<input type="radio" name="attending" value="yes" /> I&rsquo;m coming! <br />
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
