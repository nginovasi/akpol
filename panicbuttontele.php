<?php


  $update["update_id"] = '';
  $update["message"] = '';
  
  $update = json_decode(file_get_contents("php://input"), true);

  if ($update["update_id"]=='' & $update["message"]=='') {
    header("Location: https://siap.akpol.ac.id");
  } else {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://devel.nginovasi.id/akpol-api/web/telegram/BotTelegram',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_POSTFIELDS => json_encode($update) ,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer dev',
        'Content-Type: text/plain',
        'Cookie: ci_session=ua4avt2sb9fdmgt7u9go8ceevoe7mhm0'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

  }




