<?php 
$script = '';
$q = isset($_GET['q']) ? $_GET['q'] : false;
if(false === $q) {
	$q = 'home';
	$class = 'home';
}else{
	if(false !== strpos($q,'anim')) {
		$class = 'anim '.$q;
		$script = '<script src="js/script.js"></script>';
	}else{
		$class = $q;
	}
}
?>
<html>
	<head>
		<meta content="initial-scale=1.0, user-scalable=yes" name="viewport">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="<?php echo $class; ?>">
		<?php include('templates/menu.php'); ?>
		<?php include('templates/'.$q.'.php'); ?>
		<?php echo $script; ?>
	</body>
</html>