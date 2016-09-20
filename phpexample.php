<!doctype html> 
<!-- Establish first db connection and second select a table -->
<?php
	//Connect a to a db with defined credentials, write error if failed
	 $db = mysql_connect("localhost","root"); 
	 if (!$db) {
	 die("Database connection failed miserably: " . mysql_error());
	 }
	//Select a table, write error if failed
	 $db_select = mysql_select_db("test",$db);
	 if (!$db_select) {
	 die("Database selection also failed miserably: " . mysql_error());
	 }
?>

<html>

	<!-- general definitions -->
	<head  lang="de">
		<meta charset="utf-8">
		<meta name="author" content="Manuel Hufmann"/>
		<meta name="description" content="Vorstellung/Steckbrief von Manuel Hufmann">
		<meta name="keywords" content="Manuel, Hufmann, Vorstellung, Steckbrief, ITSE15b, TBZ, HF"> 
		<meta name="date" content="2015-08-29"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home - PHP Beispiele</title>	
		<!-- style sheet definitions -->
		<link rel="stylesheet" type="text/css" href="style.css" media="all">
		
	</head>
	
	<!-- site content -->
		<body> 
			<!-- header definitions; header will be displayed on top of the side -->
			<header>
				<a href="index.html"><img src="_res/img/logo.png" alt="logo"></a>
				<h1>PHP Beispiele</h1> 
			</header> 
			<!-- site navigation -->
			<nav>
					<a href="index.html" class="active">Home</a>
					<a href="me.html">Das bin ich</a>
					<a href="hobby.html">Freizeit</a>
					<a href="work.html">Arbeit</a>
			</nav>
				<!-- sub navigation for sub sites -->
				<nav id="subnav">
					<ul>
						<li><a href="JavaScript.html">JavaScript</a></li>
						<li>></li>
						<li><a href="phpexample.php" class="active">PHP Beispiele</a></li>
						</ul>
				</nav>
			<!-- main contains every article and section -->	
			<main>

				<!-- main content will be placed in the article-->
				<article> 
					<h1>PHP</h1> 
					<p>Da PHP serverseitig ausgeführt wird, installierte ich XAMP und integrierte die PHP-Datei in das htdocs-Verzeichnis. Nun kann PHP Code auf der Seite ausgeführt werden, wie im nachstehnden Beispiel ersichtlich.</p>
					<p>Aktuelles Datum und aktuelle Uhrzeit: <?php echo date('d.m.Y H:i:s'); ?>.</p>
				</article>
				<!-- sub content will placed in sections -->
				<!-- aside is used for a sub structur effect -->
				<aside>
					<section>
					<h2>mysql</h2>
					<p>Mittels PHP-Befehlen wird eine mysql-DB angezapft und den Inhalt der Tablle "Test" hier angezeigt.</p>
						 <!-- display table with mysql table data -->
						 <table>
						 <?php
							//select all information from tabel, write error if failed
							$result = mysql_query("SELECT * FROM personen", $db);
							 if (!$result) {
								die("Database query failed: " . mysql_error());
							 }
							//dispay dynamic info, each row is treated as an array
							 while ($row = mysql_fetch_array($result)) {
								 
								 echo "<tr>";
								echo "<td>";
								echo $row[1]."";
								echo "</td>";
								echo "<td>";
								echo $row[2]."";
								echo "</td>";
								echo "<tr>";
							 }
						?>
						</table>
					</section>
				</aside>
			</main>
			
			<!-- page footer -->
			<footer>
				<p>Manuel Hufmann 2015 ©</p>				
			</footer>
			
		</body>
</html>
<!-- Close DB connection after site loading -->
<?php
	mysql_close($db);
?>