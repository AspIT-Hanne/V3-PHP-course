<?php
ini_set('display_errors', '0');
$message = '';
$db = new MySQLi('localhost', 'phpwebdes', 'lynda', 'hanselandpetal');
if ($db->connect_error) {
	$message = $db->connect_error;
} else {
	$sql = 'SELECT * FROM arrangements';
	$result = $db->query($sql);
	if ($db->error) {
		$message = $db->error;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Mixed Arrangements - Hansel and Petal</title>
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<link href="../styles/handp.css" rel="stylesheet" type="text/css">
</head>

<body class="no_col_2">
<div id="site">
<?php require '../includes/pagetop.php'; ?>
    <div id="content">
        <div id="breadcrumbs" class="reset menu">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../arrangements.php">Arrangements</a></li>
                <li>Mixed Arrangements</li>
            </ul>
        </div>
        <div id="col_1" role="main">
            <h1 class="inline_block">Mixed Arrangements</h1>
            <h2 class="h3 inline_block">Mixed bouquets with the bright colors of Spring</h2>
            <div class="cols lg_margin">
                <div class="col sub">
                    <p class="w210">Hansel &amp; Petal combines the highest quality 
                        flowers in unique, colorful arrangements and bouquets that are sure to 
                        make everyone happy.</p>
                    <p>Choose from our popular arrangements or <a href="../bouquet.php" class="btn alt inconsistent_mt"><span class="normalcase">Create Your Own</span> Custom Bouquet</a></p>
                </div>
                <div class="col main">
                    <div id="feature">
                        <div class="inner">
                            <p class="overlay large">Arrangements for Every Occasion</p>
                            <p class="overlay price">Starting at $39.95</p>
                            <img src="../images/710_arrangement_97881968.jpg" alt="Mixed Arrangement" height="300" width="710"> </div>
                    </div>
                </div>
            </div>
            <?php if ($message) { ?>
				<h2 class="inline_block">Sorry, there seems to be a problem.</h2>
			<?php } else { ?>
            <div class="page open">
            <?php 
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				if ($i % 4 === 0) { ?>
                <div class="section">
                    <ul class="reset tiles">
                    <?php } ?>
                        <li> <a href="details.php?id=<?php echo $row['id']; ?>"> <img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['alt']; ?>" height="200" width="200">
                            <h3 class="h4"><?php echo $row['title']; ?></h3>
                            <p class="reset">From $<?php echo $row['price']; ?></p>
                            </a> </li>
                   <?php $i++;
				   if ($i % 4 === 0) { ?>    
                    </ul>
                </div>
                <?php } // end if 
				} // end of loop ?>
            </div>
            <?php } // end of page ?>
        </div>
    </div>
<?php include '../includes/footer.php'; ?>
</div>
<script src="../js/jquery-1.10.2.min.js"></script> 
<script src="../js/scripts.js"></script>
</body>
</html>