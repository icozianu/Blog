<?php
//connection to the database
mysql_connect('localhost', 'root','support2013')	or die('Unable to connect to MySQL');
//selcting the database to work with
mysql_select_db('blog-bd') or die('Not a valid SQL table');
?>
