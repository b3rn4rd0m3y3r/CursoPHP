<?php
  $arr = array(
	"0"=> array("Id","Id",6,6,"","S", NULL,"",""),
	"1"=> array("Matr","Matr�cula",5,5,"'","N",NULL,"","12841"),
	"2"=> array("DtPonto","Data da<br>Ocorr�ncia",10,10,"#","N",NULL,"","$HOJEen"),
    "3"=> array("HrEntManha","Manh�/Entrada",8,8,"'","S", NULL, "", ""),
    "4"=> array("HrSaiManha","Manh�/Sa�da",8,8,"'","N", NULL, "", ""),
    "5"=> array("HrEntTarde","Tarde/Entrada",8,8,"'","N", NULL, "", ""),
    "6"=> array("HrSaiTarde","Tarde/Sa�da",8,8,"'","N", NULL, "", ""),
    "7"=> array("HrEntCafe","Caf�/Entrada",8,8,"'","N", NULL, "", ""),
    "8"=> array("HrSaiCafe","Caf�/Sa�da",8,8,"'","N", NULL, "", ""),
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
 // Ordena ou n�o envio de email
  $EMAIL_ME = true;
  // Indice dos campos para envio de email
  $cEMAIL = "9";
  $cNOME = "0";
  $cTELEFONE = "0";
  $tabela = "Ponto";
	$TITLE = "Ponto";
	$APP = "Ponto";
  $acoes = array(
    "add"=> "Inclus�o",
    "addsave"=> "Inclus�o [Grava��o]",
    "dele"=> "Dele��o",
    "edit"=> "Altera��o",
    "editsave"=> "Altera��o [Grava��o]",
    "list"=> "Relat�rio",
    );
?>