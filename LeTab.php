<?php

//Provedor = "Provider=Microsoft.ACE.OLEDB.12.0;"
//Provedor = "OLEDB;Provider=Microsoft.Jet.OLEDB.4.0;"
//Provedor = "Provider=Microsoft.Jet.OLEDB.4.0;"
//DBQ = "Dbq=C:\Inetpub\wwwroot\dbase\tabela1.xlsx;DriverId=790;FIL=excel 8.0; "
//DBQ = "Dbq=" & Server.MapPath("tabela1.xls")
//Driver = "Driver={Microsoft Excel Driver (*.xls, *.xlsx, *.xlsm, *.xlsb)};"
//Driver = "Driver={Microsoft Excel Driver (*.xls)};"
//DataSource = "Data Source=" & Server.MapPath("tabela1.xls") & ";"
//CONN_STRING = Provedor & DataSource & "Extended Properties=""Excel 8.0;HDR=YES;IMEX=1"""
//CONN_STRING = Driver & DBQ
//Response.write CONN_STRING & "<br>"
// Conexão
$conn = odbc_connect("Driver={Microsoft Excel Driver (*.xls)};DriverId=790;Dbq=tabela1.xls;DefaultDir=C:\\inetpub\\wwwroot\\dbase" , '', '');
var_dump($conn);
echo "<br>";
$sql = "SELECT [ID],[DESCRI] FROM [tab1$] ";
$stmt = odbc_exec($conn, $sql);
var_dump($stmt);
echo "<br>";
   while($row = odbc_fetch_array($stmt))  // have tried odbc_fetch_row already
   {
     echo $row['ID'] . " - " . $row['DESCRI'] . "<br>";
   }

?>