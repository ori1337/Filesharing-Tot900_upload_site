<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/(lang).js"></script>
		<style>
			* { margin: 0; }
 			  body { 
			  background: url(../IMG/big.jpg) no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			  margin-left: auto;
			  margin-right: auto;
			  margin-top: 3px;
			  margin-bottom: 3px;
			  text-align: center;
			}
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}
		</style>
		<title>All Files in $/Uploads/</title>
	<head/>
	<body>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<a href="/"><img style="height: 110px;" src="https://donate.torproject.org/images/tor_onion-heart-no-roots.png" /></a><BR/><BR/>
		<h1>All Files in $/Uploads/</h1>
		<h2>i know i know A bit small ah? <BR>Lets make it a zetabyte :)</h2>
		<div class="container">
			<?php
			// open this directory 
			$myDirectory = opendir(".");
			// get each entry
			while($entryName = readdir($myDirectory)) {
				$dirArray[] = $entryName;
			}
			// close directory
			closedir($myDirectory);
			//  count elements in array
			$indexCount = count($dirArray);
			Print ("$indexCount files<br>\n");
			// sort 'em
			sort($dirArray);
			// print 'em
			print("		<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
			print("			<TR><TH>Filename</TH><th>Filetype</th><th>Filesize</th></TR>\n");
			// loop through the array of files and print them all
			for($index=0; $index < $indexCount; $index++) {
					if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
					print("			<TR><TD><a href=\"$dirArray[$index]\">$dirArray[$index]</a></td>");
					print("			<td>");  print(date ("F d Y H:i:s.", filemtime($dirArray[$index]))); print("</td>");
					print("			<td>");  print(filesize($dirArray[$index])); print("</td>");
					print("			</TR>\n");
				}
			}
			print("		</TABLE>\n");
			?>
		</div>
	</body>
<html>