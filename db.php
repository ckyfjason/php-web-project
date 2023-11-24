<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = sqlsrv_connect($serverName, $connectionOptions);("streamweb-dbserver.database.windows.net","ckyfjason","Database@password","streamweb-formaldb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . sqlsrv_connect_error();
  }
?>