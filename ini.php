<?php
                   
$opananana='error base';



                                 
$host="localhost";
$loginb="test_loomix_";
$password="wgWG05XKZ64vXOJ5";
$base="test_loomix_";

@$db = mysql_pconnect($host, $loginb, $password)
  or die ("$opananana");
mysql_select_db ($base)
  or die ("Could not select database");

mysql_query ("set character_set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");





