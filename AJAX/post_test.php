<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["CONTENT_TYPE"] == "application/json")
{
  $data = file_get_contents("php://input", false, stream_context_get_default(), 0, $_SERVER["CONTENT_LENGTH"]);
  $raw = json_decode($data);
  $form_data = json_encode($raw);
  echo $form_data;
  global $_POST_JSON;
  $_POST_JSON = json_decode($_REQUEST["JSON_RAW"],true);
  // merge JSON-Content to $_REQUEST 
  if(is_array($_POST_JSON)) $_REQUEST  = $_POST_JSON+$_REQUEST;
//   echo json_encode($_REQUEST);
}
// $inputs = trim(file_get_contents("php://in‌​put"));
// $raw = json_decode($inputs, true);
// echo json_encode($_REQUEST);
// echo json_encode(json_decode(file_get_contents("php://in‌​put"), true));
?>