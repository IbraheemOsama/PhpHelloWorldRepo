<?php
include("includes\phpdocumentdb.php");
	$page="";
		if(isset($_POST['name'])) {
			$page = 'thanks';
		}
        
        
         $host = 'https://phpdocumentdbtest.documents.azure.com:443/';
    $master_key = getenv("documentDBKey"); ;
    
    // connect DocumentDB
    $documentdb = new DocumentDB($host, $master_key);
    
    // select Database or create
    $db = $documentdb->selectDB("ClothesDB");
    
    // select Collection or create
    $col = $db->selectCollection("Pants");
    
    // run query
    $json = $col->query("SELECT * FROM Pants");
    
    // Debug
    $object = json_decode($json);

    echo($object);
?>


<html>

<head>
</head>

<body>
    
    <?php
    echo($page);
    echo($master_key);
    
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
