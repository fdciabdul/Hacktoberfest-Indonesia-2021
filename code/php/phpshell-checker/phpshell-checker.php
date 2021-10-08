<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Shell Checker Web Version</title>
		<style type="text/css">
			body{
			background: #222222;
			margin: 0;
			padding: 0;
			padding-top: 100px;
			color: #FFF;
			font-family: Calibri;
			font-size: 13px;
			}
			a{
			color: #FFF;
			text-decoration: none;
			font-weight: bold;
			}
			.wrapper{
			width: 1000px;
			margin: 0 auto;
			}
			.tube{
			padding: 10px;
			}
			.red{
			width: 998px;
			border: 1px solid #007700;
			background: #222222;
			color: #009900;
			box-shadow: 0px 0px 4px #007700;
			}
			.red input{
			background: #000;
			border: 1px solid #007700;
			color: #FFF;
			}
			.blue{
			float: left;
			width: 1000px;
			border: 1px solid #007700;
			background: #222222;
			color: #00bb00;
			box-shadow: 0px 0px 4px #007700;
			}
			.green{
			width: 1000px;
			border: 1px solid #007700;
			background: #222222;
			color: #009900;
			box-shadow: 0px 0px 4px #007700;
			}
			textarea {
				color: #009900;
				background-color: #222222;
				width: 500px;
				height: 200px;
			}
			input[type=submit]{ padding: 3px; margin: 5px; color: #222222; text-shadow:#000 0px 0px 4px; font-weight: bold; border: 1px solid #007700; background: #ababab; box-shadow: 0px 0px 4px #007700;    padding: 3px; -webkit-border-radius: 4px;   -moz-border-radius: 4px;   border-radius: 4px;   -webkit-box-shadow: rgb(0,119,0) 0px 0px 4px;   -moz-box-shadow: rgb(0,119,0) 0px 0px 4px;}
			input[type=text]{ padding: 3px; width: 200px; ; margin: 5px; color: #009900; text-shadow: #007700 0px 2px 7px; border: 1px solid #007700; background: transparent; box-shadow: 0px 0px 4px #007700;    padding: 3px;   -webkit-border-radius: 4px;
			   -moz-border-radius: 4px;   border-radius: 4px;   -webkit-box-shadow: rgb(0,119,0) 0px 0px 4px;   -moz-box-shadow: rgb(0,119,0) 0px 0px 4px;}
			input[type=submit]:hover, input[type=text]:hover{ color: #e4e4e4; text-shadow: #00bb00 0px 0px 4px; box-shadow: 0px 0px 4px #00bb00; border: 1px solid #00bb00;    padding: 3px;   -webkit-border-radius: 4px;
			   -moz-border-radius: 4px;   border-radius: 4px;   -webkit-box-shadow: rgba(0,221,0) 0px 0px 4px;   -moz-box-shadow: rgba(0,221,0) 0px 0px 4px;}
		</style>
	</head>
	<body>
		<center>
		<div class="green">
			<h1>Shell Checker Web Version</h1>
			<form method="post">
				<textarea name="list"></textarea><br>
				<input type="submit" name="check" value="Check shell"></input>
			</form>
			<?php
				if (isset($_POST['check'])) {
					$list = $_POST['list'];
					$shells = explode("\r\n", $list);

					$live_shell = $die_shell = $all_site = 0;
					foreach ($shells as $url) {
						if(!$url)
							continue;

						$all_site += 1;
						$link_shell = trim($url);

						$handle = curl_init($link_shell);
						curl_setopt($handle, CURLOPT_HEADER  , true);  // we want headers
						curl_setopt($handle, CURLOPT_NOBODY  , true);  // we don't need body
						curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
						curl_setopt($handle, CURLOPT_TIMEOUT,10);

						/* Get the HTML or whatever is linked in $url. */
						$response = curl_exec($handle);

						/* Check for 404 (file not found). */
						$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
						// var_dump($httpCode);die();

						if ($httpCode == 200){
							$live_shell+=1;
							$get.=$link_shell.'&#13;&#10;';
							$get_shell.= $link_shell.' - ';
							echo '<a href="'.$link_shell.'">'.$link_shell.'</a><font color=lime> Live !</font><br>';
						}
						elseif($httpCode == 404) {
						    $die_shell += 1;
							echo $link_shell.' <font color=red> Not found ! !</font><br>';
						}
						else{
						    $die_shell += 1;
							echo $link_shell.' <font color=red> DEAD !</font><br>';
						} 
						
						curl_close($handle);
						@flush();@ob_flush();
					}
					echo '<font color=lime>'.$live_shell.'</font> shell live !<br>';
					echo '<font color=red>'.$die_shell.'</font> shell die !<br>';
					echo 'Total: '.$all_site.'<br>';
					echo '<br>shells List<br><textarea onclick="this.select()" width="200px">'.$get.'</textarea><br><br>';
				}
			?>
			<h2>Try this opensource code <a href="https://republicforensic.my.id/Repository/Shell/shell-checker.php">click me<a/></h2>
		</div>
		</center>
	</body>
</html>
