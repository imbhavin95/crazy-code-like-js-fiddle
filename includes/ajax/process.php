<?php 
	if(isset($_POST) && $_POST['action'] == "add_update_code"){
		extract($_POST);
		$css_file = "../code-pages/css/".$key.".css"; // or .php
		$css_fh = fopen($css_file, 'w'); // or die("error");  
		$cssData = $css_code;
		fwrite($css_fh, $cssData);

		$js_file = "../code-pages/js/".$key.".js"; // or .php
		$js_fh = fopen($js_file, 'w'); // or die("error");  
		$jsData = $js_code;
		fwrite($js_fh, $jsData);

		$main_file = "../code-pages/main/".$key.".php"; // or .php
		$main_fh = fopen($main_file, 'w'); // or die("error");  
		$mainData = $html_code.'<link class="CODEX_CSS" rel="stylesheet" type="text/css" href="../css/'.$key.'.css" />
                    <script class="CODEX_MIN_JS" type="text/javascript" src="../../js/jquery.min.js"></script>
                    <script class="CODEX_JS" type="text/javascript" src="../js/'.$key.'.js"></script>';
		fwrite($main_fh, $mainData);
		
		/*$sel_code_data = mysql_query("SELECT * FROM `code` WHERE `code_key`='".$key."'")or die(mysql_error());
		if(mysql_num_rows($sel_code_data)>0){
			$up_q = mysql_query("UPDATE `code` SET `html_code`='".addslashes($html_code)."',`css_code`='".$css_code."',`js_code`='".$js_code."' WHERE `code_key`='".$key."'")or die(mysql_error());
		}else{
			$in_q = mysql_query("INSERT INTO `code` (`html_code`,`css_code`,`js_code`,`code_key`)
					VALUES('".addslashes($html_code)."','".$css_code."','".$js_code."','".$key."')")or die (mysql_error());
		}
		echo addslashes($html_code);*/
	}
?>
