<?php
  $arr = array(
	"0"=> array("Id","Id",6,6,"","S", NULL,"",""),
	"1"=> array("Matr","Matrícula",5,5,"'","N",NULL,"","12841"),
	"2"=> array("DtPonto","Data da<br>Ocorrência",10,10,"#","N",NULL,"","$HOJEen"),
    "3"=> array("HrEntManha","Manhã/Entrada",8,8,"'","S", NULL, "", ""),
    "4"=> array("HrSaiManha","Manhã/Saída",8,8,"'","N", NULL, "", ""),
    "5"=> array("HrEntTarde","Tarde/Entrada",8,8,"'","N", NULL, "", ""),
    "6"=> array("HrSaiTarde","Tarde/Saída",8,8,"'","N", NULL, "", ""),
    "7"=> array("HrEntCafe","Café/Entrada",8,8,"'","N", NULL, "", ""),
    "8"=> array("HrSaiCafe","Café/Saída",8,8,"'","N", NULL, "", ""),
    "9"=> array("Email","Email",50,80,"'","S", NULL, "", "emailbernardomeyer@gmail.com")
    );
  // Comportamento das rotas
  $ROTA = array(
    "edit" => true,
    "add" => true,
    "view" => false,
    "dele" => true,
    "list" => true
    );
 // Ordena ou não envio de email
  $EMAIL_ME = true;
  // Indice dos campos para envio de email
  $cEMAIL = "9";
  $cNOME = "0";
  $cTELEFONE = "0";
  $tabela = "Ponto";
	$TITLE = "Ponto";
	$APP = "Ponto";
  $acoes = array(
    "add"=> "Inclusão",
    "addsave"=> "Inclusão [Gravação]",
    "dele"=> "Deleção",
    "edit"=> "Alteração",
    "editsave"=> "Alteração [Gravação]",
    "list"=> "Relatório",
    );
?>