<?php 
	$SITE_URL = "http://localhost/crazy-code";
	define("SITE_URL",$SITE_URL);
	if(!empty($_GET['key'])){
        $key = $_GET['key'];
    }
    if(!isset($key) && empty($key)){
        $key = rand(1111111111,9999999999);
    }else{
        $html_code = file_get_contents(SITE_URL.'/includes/code-pages/main/'.$key.'.php');
        /*$html_code = preg_replace("/<link class=\"CODEX_CSS\"(.*?)\/>/","",$html_code);
        $html_code = preg_replace("/<script class=\"CODEX_JS\" (.*?)\><\/script>/", "", $html_code);
        $html_code = preg_replace("/<script class=\"CODEX_MIN_JS\" (.*?)\><\/script>/", "", $html_code);*/
        $html_code = str_replace('<link class="CODEX_CSS" rel="stylesheet" type="text/css" href="../css/'.$key.'.css" />','',$html_code);
        $html_code = str_replace('<script class="CODEX_MIN_JS" type="text/javascript" src="../../js/jquery.min.js"></script>','',$html_code);
        $html_code = str_replace('<script class="CODEX_JS" type="text/javascript" src="../js/1226211434.js"></script>','',$html_code);
        $html_code = trim(htmlentities($html_code));
        $css_code = file_get_contents(SITE_URL.'/includes/code-pages/css/'.$key.'.css');
        $css_code = htmlentities($css_code);
        $js_code = file_get_contents(SITE_URL.'/includes/code-pages/js/'.$key.'.js');
        $js_code = htmlentities($js_code);
        echo '<input type="hidden" name="html_get" id="html_get" value="'.$html_code.'" />';
        echo '<input type="hidden" name="css_get" id="css_get" value="'.$css_code.'" />';
        echo '<input type="hidden" name="js_get" id="js_get" value="'.$js_code.'" />';
    }
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/includes/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/includes/css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/includes/css/style.css">
		<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<section class="full">
			<header>
				<nav class="navbar navbar-default top-nav">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="#">I m Bhavin Sasapra</a>
				    </div>
				    <ul class="nav navbar-nav">
				      <li class="active"><a href="#">Home</a></li>
				      <li><a href="#">Page 1</a></li>
				      <li><a href="#">Page 2</a></li>
				      <li><a href="#">Page 3</a></li>
				    </ul>
				    <ul class="nav navbar-nav pull-right">
				      <li><a href="#">Sign Up</a></li>
				      <li><a href="#">Sign in</a></li>
				    </ul>
				  </div>
				</nav>
			</header>
			<div class="col-sm-2 left-data">
				<div class="col-sm-12">
					<h2>Details</h2>
					<div class="form-group">
	 					<input type="text" name="crazy_title" id="crazy_title" class="form-control" placeholder="Title" />
					</div>
					<div class="form-group">
	 					<textarea name="crazy_title" id="crazy_title" class="form-control" placeholder="Description"></textarea>
					</div>
				</div>	
			</div>
			<div class="col-sm-10 right-data">
				  <h2>Your code here</h2>
				  <ul class="nav nav-tabs">
				    <li class="active"><a id="html_link" data-toggle="tab" href="#html_code">HTML</a></li>
				    <li><a id="css_link" data-toggle="tab" href="#css_code">CSS</a></li>
				    <li><a id="js_link" data-toggle="tab" href="#js_code">JS</a></li>
				    <li><a onClick="return Get_Result();" data-toggle="tab" href="#result_tb">Result</a></li>
				  </ul>
				  <div class="tab-content">
				  	<a id="html_code" class="tab-pane fade in active">
				    	<pre id="html_editor">/* This is your HTML Content */</pre>
				    </a>
				    <a id="css_code" class="tab-pane fade">
				      <pre id="css_editor">/* This is your CSS Content */</pre>
				    </a>
				    <div id="js_code" class="tab-pane fade">
				      <pre id="js_editor">/* This is your JS Content */</pre>
				    </div>
				    <div id="result_tb" class="tab-pane fade">
                        <div id="result"></div>
                        <div class="text-center" id="loader"></div>
                    </div>
				  </div>	
				  <input type="hidden" id="code_key" name="code_key" value="<?php echo $key; ?>" />
			</div>
		</section>
		<script src="<?php echo SITE_URL; ?>/includes/js/jquery.min.js"></script>
		<script src="<?php echo SITE_URL; ?>/includes/js/bootstrap.min.js"></script>
		<script src="<?php echo SITE_URL; ?>/src-noconflict/ace.js"></script>
		<script src="<?php echo SITE_URL; ?>/src-noconflict/ext-language_tools.js"></script>
		<?php include('includes/js/custom-js.php'); ?>
	</body>
</html>