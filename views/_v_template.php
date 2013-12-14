<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/custom.css" type="text/css">
    
</head>
<body>
	
	<?php if(isset($content)) echo $content; ?>

<!--script type="text/javascript" src="/js/custom.js"></script-->
</body>
</html>