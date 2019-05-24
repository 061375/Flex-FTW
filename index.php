<?php 
$script = '';
$q = isset($_GET['q']) ? $_GET['q'] : false;
if(false === $q) {
	$q = 'home';
	$class = 'home';
}else{
	if(false !== strpos($q,'anim')) {
		$class = 'anim '.$q;
		$script = '<script>window.onload = function() {var ar = [1,6,1];var t = 0;var tmax = 10000;runRandom();var ID = setInterval(()=>{runRandom();},tmax);}</script>';
	}else{
		$class = $q;
	}
}
?>
<html>
	<head>
		<meta content="initial-scale=1.0, user-scalable=yes" name="viewport">
		<link rel="stylesheet" href="css/style.css">
		<script>
			window.onload = function() {
				const body = document.getElementsByTagName("body")[0];
				document.getElementById("showgrid").addEventListener("change",function(e){
					if(e.target.checked) {
						body.addClass('showgrid')
					}else{
						body.removeClass('showgrid')
					}	
				});
			}
		</script>
	</head>
	<body class="<?php echo $class; ?>">
		<?php include('templates/menu.php'); ?>
		<?php include('templates/'.$q.'.php'); ?>
		<?php echo $script; ?>
		<script src="js/script.js"></script>
	</body>
</html>