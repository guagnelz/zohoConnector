<?
/*****************************************************
Example of Zoho Connector
*****************************************************/


session_start();
setlocale(LC_ALL, "it_IT.UTF-8",'it_IT@euro',"ita");
include 'zohoConnector.php';

$connZoho = new zohoConnector();

$cmd = $_GET['cmd'];

if(strcmp($cmd, "post") == 0){
  $action = "/contacts";
  $dataFormatted = '{"contact_name":"Company name","company_name":"Name of Company"}';
  $jsonReply = $connZoho->postData($action, $dataFormatted);
  echo($jsonReply);
}

if(strcmp($cmd, "items") == 0){
  $action = "/items";
  $jsonReply = $connZoho->getData($action);
  $jsonArray = json_decode($jsonReply, true);
  echo($jsonReply);
}

if(strcmp($cmd, "contacts") == 0){
  $action = "/contacts";
  $risposta = $connZoho->getData($action);
  $jsonArray = json_decode($jsonReply, true);
  echo($jsonReply);
}

if(strcmp($cmd, "estimate") == 0){
  $action = "/estimates/23456000000123456";
  $risposta = $connZoho->getData($action);
  $jsonArray = json_decode($jsonReply, true);
  echo($jsonReply);
}

?>
