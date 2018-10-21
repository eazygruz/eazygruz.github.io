<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', -1);
set_include_path('libs/');

require_once 'Zend/Loader/Autoloader.php';

$zendLoader = Zend_Loader_Autoloader::getInstance();

$name = iconv("utf-8", "utf-8", $_POST['name']);
$phone = iconv("utf-8", "utf-8", $_POST['phone']);
$email = iconv("utf-8", "utf-8", $_POST['email']);
$from = iconv("utf-8", "utf-8", $_POST['from']);

$ips = ($_SERVER['REMOTE_ADDR']);

$referer = ($_POST["referer"]);
$phrase = ($_POST["phrase"]);

if (isset($_POST['service']))
    $service = iconv("utf-8", "utf-8", $_POST['service']);
$mail = new Zend_Mail('UTF-8');

$reload = false;

foreach($_FILES as $key => $value){
    if($_FILES[$key]['error'] != 4){
        $reload = true;
        $img_path =  img_upload($value);
        $img = new Zend_Mime_Part(file_get_contents($img_path));
        /**
         * Указываем тип содержимого файла
         */
        $img->type = 'application/octet-stream';
        $img->disposition = Zend_Mime::DISPOSITION_INLINE;
        /**
         * Каким способом закодировать файл в письме
         */
        $img->encoding = Zend_Mime::ENCODING_BASE64;
        /**
         * Название файла в письме
         */
        $img->filename = 'img.png';
        /**
         * Идентификатор содержимого.
         * По нему можно обращаться к файлу в теле письма
         */
        $img->id = md5(time());
        /**
         * Описание вложеного файла
         */
        $img->description = 'Изображение';
        $mail->addAttachment($img);
    }
}


$massege = '<table cellpadding="5">';

$massege .= '<tr><td>Имя:</td><td>' . $name . '</td></tr>';
$massege .= '<tr><td>Телефон:</td><td>' . $phone . '</td></tr>';
$massege .= '<tr><td>E-mail:</td><td>' . $email . '</td></tr>';
$massege .= '<tr><td>Форма:</td><td>' . $from . '</td></tr>';
if (isset($service))
    $massege .= '<tr><td>Услуга:</td><td>' . $service . '</td></tr>';
$massege .= '<tr><td>Источник перехода:</td><td>' . $referer . '</td></tr>';
$massege .= '<tr><td>Поисковая фраза:</td><td>' . $phrase . '</td></tr>';
$massege .= '<tr><td>Местоположение отправителя:</td><td><a href="http://www.ip-adress.com/ip_tracer/'.$ips.'">показать</a></td></tr>';
//$massege .= '<tr><td><a href="'. $img_path . '">прикреплённый файл</a></td></tr>';
$massege .= '</table><br /><br />';





$subject = 'Заявка с сайта БКИ';
$to = array('costoso.bz@yandex.ru', 'ooo-bki@yandex.ru');
/*$to = array('krav4ic@mail.ru');*/


try {



    $mail->setBodyHtml($massege,'UTF-8',Zend_Mime::ENCODING_BASE64);
    $mail->setFrom('somebody@example.com', 'Some Sender');
    $mail->addTo($to, 'Клиент');
    $mail->setSubject($subject);

    $mail->send();
    if($reload){
         header("Location: index.php");
    }


} catch (Zend_Exception $e) {
    echo $e->getMessage(); exit;
}


function img_upload($value) {
    $extention_arr = explode('.', $value['name']);
    $newFileNeme = rand(1, 99999) . '.' . end($extention_arr);
    $pass = 'images/files/' . $newFileNeme;
    move_uploaded_file($value['tmp_name'], $pass);
    return $pass;
}


?>