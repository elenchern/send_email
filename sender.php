<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
require('db.php');




# проверка, что ошибки нет
if (!error_get_last()) {

    // Переменные, которые отправляет пользователь
    $phone = $_POST['phone'];
    $sendAppart = $_POST['sendAppart'];
    $sendArea = $_POST['sendArea'];
    $sendTime = $_POST['sendTime'];
    $sendOtdelka = $_POST['sendOtdelka'];
    $sendPrice = $_POST['sendPrice'];


    $sql = "INSERT zayavki(phone, sendAppart, sendArea, sendTime, sendOtdelka, sendPrice) VALUES ('".$phone ."', '" .$sendAppart ."', '". $sendArea."', '".$sendTime  ."', '". $sendOtdelka. "', '". $sendPrice. "')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    // Формирование самого письма
    $title = "Заявка с Каталога";
    $body = "
    <h2>Заявка с Каталога</h2>
    <b>Телефон: </b> $phone<br>
    <b>Кол-во комнат: </b>$sendAppart<br>
    <b>Цена: </b>$sendPrice<br>
    <b>Район: </b>$sendArea<br>
    <b>Срок сдачи: </b>$sendTime<br>
    <b>Квартира с отделкой: </b>$sendOtdelka
    ";
    
    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    // Настройки вашей почты
    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'lidysts@yandex.ru'; // Логин на почте
    $mail->Password   = 'exgygpqqudqhowmx'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('lidysts@yandex.ru', 'sts'); // Адрес самой почты и имя отправителя
    
    // Получатель письма
    $mail->addAddress('lidysts@yandex.ru');
    
    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    
    // Проверяем отправленность сообщения
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
    } else {
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
    }
    
} else {
    $data['result'] = "error";
    $data['info'] = "В коде присутствует ошибка";
    $data['desc'] = error_get_last();
}

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);

// Битрикс24
	
$leadData = $_POST; 
$defaults = $_REQUEST;
$queryUrl  = 'https://yarus-studio.bitrix24.ru/rest/1/pxx7s9zew8evapi3/crm.lead.add.json';
$queryData = http_build_query(array(
    'fields' => array(
        'TITLE' => "Обратная связь, заявка с акции",
        'NAME' =>  $_POST['username'],
        'COMMENTS' =>   $_POST['Сообщение'],
        'UF_CRM_LEAD_LANDING' => $_SERVER['HTTP_HOST'],
        "STATUS_ID" => "NEW",
        "OPENED" => "Y",
        "ASSIGNED_BY_ID" => "14",
        "PHONE" => array(
            array(
                "VALUE" =>  $_POST['phone'],
                "VALUE_TYPE" => "WORK"
            )
        )
    ),
    'params' => array(
        "REGISTER_SONET_EVENT" => "Y"
    )
));
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData
));
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result, 1);

// Конец Битрикс24

?>
