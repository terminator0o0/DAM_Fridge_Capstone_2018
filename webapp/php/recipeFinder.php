<?php
	$term = isset($_GET['recipe'])?$_GET['recipe']: '';
	$term = urlencode($term);
	$website = urlencode("Recipes for ");
	$redirect = "https://www.google.com/search?q={$website}+{$term}";
	header("Location: $redirect");
?>

