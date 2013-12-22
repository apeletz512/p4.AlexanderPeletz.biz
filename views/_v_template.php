<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/custom.css" type="text/css">
    
</head>
<body>
<div style="padding: 0 15px;">
<div class="container">
	<div class="row">
		<nav class="navbar navbar-default" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <a class="navbar-brand" href="/index">TK Rx</a>
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institutions <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		        	<li><a href="/institutions/listall">Find an institution </a></li>
		      		<li><a href="/institutions/newinstitution">Add a new institution </a></li>
		        </ul>
		      </li>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Classes <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		        	<li><a href="/classes/listall">Find a class </a></li>
		      		<li><a href="/classes/newclass">Add a new class </a></li>
		        </ul>
		      </li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
		</nav>
	</div>
	<div class="row">
		<?php if(isset($content)) echo $content; ?>
	</div>
</div>
</div>
<script type="text/javascript" src="/js/jquery/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/js/form-master/jquery.form.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
</body>
</html>