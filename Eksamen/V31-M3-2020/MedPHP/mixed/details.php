<?php
ini_set('display_errors', '0');
$message = '';
$db = new MySQLi('localhost', 'phpwebdes', 'lynda', 'hanselandpetal');
if ($db->connect_error) {
	$message = $db->connect_error;
} else {
	$sql = 'SELECT * FROM arrangements WHERE id=' . $db->real_escape_string($_GET['id']);
	$result = $db->query($sql);
	if ($db->error) {
		$message = $db->error;
	} else {
		$row = $result->fetch_assoc();
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

<body>
<div id="site">
<?php require '../includes/pagetop.php'; ?>
    <div id="content">
        <div id="breadcrumbs" class="reset menu">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../arrangements.php">Arrangements</a></li>
                <li><a href="mixed.php">Mixed Arrangements</a></li>
                <li><?php if (isset($row['title'])) {
				echo $row['title']; 
				} ?></li>
            </ul>
        </div>
        <div id="col_1" role="main">
        <?php if ($message) { ?>
        <h1 class="inline_block">Oops! There seems to be a problem.</h1>
        <p>That arrangement doesn't seem to exist.</p>
		<?php } else { ?>
            <h1 class="inline_block"><?php echo $row['title']; ?></h1>          
            <p class="figure"><img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['alt']; ?>" width="200" height="200">Price from $<?php echo $row['price']; ?></p>
            <?php echo $row['description']; ?>
        </div>
        <div id="col_2">
        <h3>How to Order</h3>
        <p>All the flowers for our mixed arrangements are carefully selected by <a href="../designers.php">our talented designers</a> using the freshest flowers in season. To discuss your individual requirements, please call Hansel and Petal toll-free on <b>800-555-0199</b>.</p>
        </div>
        <?php } ?>
    </div>
<?php include '../includes/footer.php'; ?>
</div>
<script src="../js/jquery-1.10.2.min.js"></script> 
<script src="../js/scripts.js"></script>
</body>
</html>
