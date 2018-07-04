<?php
class zohoConnector
{

  private $entry = "https://books.zoho.eu/api/v3";
  private $access_token = "your_access_token";
  private $org_id =  "your_organization_id";
  private $org_url =  "?organization_id=".$org_id;

  // get the data from a URL
  function getData($action) {
  	$ch = curl_init();
  	$timeout = 3;
    $headers = array('Authorization: Zoho-authtoken '.$this->access_token, 'Content-Type: application/json;charset=UTF-8');
  	curl_setopt($ch, CURLOPT_URL, $this->entry.$action.$this->org_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  	$data = curl_exec($ch);
  	curl_close($ch);
  	return $data;
  }
  
  function getDataParams($action, $params) {
  	$ch = curl_init();
  	$timeout = 3;
    $headers = array('Authorization: Zoho-authtoken '.$this->access_token, 'Content-Type: application/json;charset=UTF-8');
  	curl_setopt($ch, CURLOPT_URL, $this->entry.$action.$this->org_url."&".$params);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  	$data = curl_exec($ch);
  	curl_close($ch);
  	return $data;
  }

  // post the data from a URL
  function postData($action, $params) {
  	$ch = curl_init();
  	$timeout = 3;
    $data = array('authtoken' => $this->access_token,'JSONString' => $params,'organization_id'  => $this->org_id);
    curl_setopt($ch, CURLOPT_URL, $this->entry.$action);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  	$data = curl_exec($ch);
  	curl_close($ch);
  	return $data;
  }

  // put the data from a URL
  function putData($action, $params) {
  	$ch = curl_init();
  	$timeout = 3;
    $data = array('authtoken' => $this->access_token,'JSONString' => $params,'organization_id'  => $this->org_id);
    curl_setopt($ch, CURLOPT_URL, $this->entry.$action);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  	$data = curl_exec($ch);
  	curl_close($ch);
  	return $data;
  }

  // delete the data from a URL
  function delData($action) {
    $ch = curl_init();
    $timeout = 3;
    $headers = array('Authorization: Zoho-authtoken '.$this->access_token, 'Content-Type: application/json;charset=UTF-8');
    curl_setopt($ch, CURLOPT_URL, $this->entry.$action);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
  }
}
