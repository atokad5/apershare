<?php
if(!mysql_connect("localhost","",""))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("aperbase"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>
