<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/custom.css" type="text/css">
    
</head>
<body>

<div class="navbar">
  	<div class="navbar-inner">
	    <a class="brand" href="#">TKRx</a>
	    <ul class="nav">
	    	<li class="active"><a href="#">Home</a></li>
	    	<li>
	      		<ul class="nav nav-tabs">
	  				<li class="dropdown">
	    				<a class="dropdown-toggle" data-toggle="dropdown" href="/institutions/listall">Institutions<b class="caret"></b></a>
	    				<ul class="dropdown-menu">
	      					<li><a href="/institutions/listall">Find an institution</a></li>
	      					<li><a href="/institutions/newinstitution">Add a new institution</a></li>
	    				</ul>
	  				</li>
				</ul>
			</li>
	      	<li>
	      		<ul class="nav nav-tabs">
	  				<li class="dropdown">
	    				<a class="dropdown-toggle" data-toggle="dropdown" href="/classes/listall">Classes<b class="caret"></b></a>
	    				<ul class="dropdown-menu">
	      					<li><a href="/classes/listall">Find a class</a></li>
	      					<li><a href="/classes/newclass">Add a new class</a></li>
	    				</ul>
	  				</li>
				</ul></li>
	    </ul>
  	</div>
</div>

	<?php if(isset($content)) echo $content; ?>

<script type="text/javascript" src="/js/jquery/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</body>
</html>