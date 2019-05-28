<?php 
$script = '';
$q = isset($_GET['q']) ? $_GET['q'] : false;
if(false === $q or '' == trim($q)) {
	$q = 'templates/home.php';
	$class = 'home';
}else{
	if(false !== strpos($q,'anim')) {
		$class = 'anim '.$q;
		$script = 'var ar = [1,6,1];var t = 0;var tmax = 10000;runRandom();var ID = setInterval(()=>{runRandom();},tmax);';
	}else{
		$class = $q;
		if(!file_exists('templates/'.$q.'.php')) {
			header("HTTP/1.1 404 OK");
			$q = '404';
		}
	}
	$q = 'templates/'.$q.'.php';
}
?>
<html>
	<title>
		Art Direction FTW (Excerpt) 
	</title>
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
				const menu = document.getElementById("menu")
				document.getElementById("hamburger").addEventListener("click",function(e){
					if(menu.hasClass("hidden")){
						menu.removeClass('hidden')
					}else{
						menu.addClass('hidden')
					}	
				});
				<?php echo $script; ?>
			}
		</script>
	</head>
	<body class="<?php echo $class; ?>">
		<?php include('templates/menu.php'); ?>
		<?php include($q); ?>
		<script src="js/script.js"></script>
	</body>
</html>