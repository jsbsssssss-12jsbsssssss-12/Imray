<?php
$result = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



$API_KEY = urldecode($_GET['token']);
define('API_KEY',$API_KEY);
define("IDBot", explode(":", $API_KEY)[0]);

function bot($method, $datas = []) {
    global $config;
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $options = [
        'http' => [
            'method'  => 'POST',
            'content' => http_build_query($datas),
            'header'  => 'Content-Type: application/x-www-form-urlencoded\r\n',
        ],
    ];
    $context  = stream_context_create($options);
    $res = file_get_contents($url, false, $context);

    if ($res === FALSE) {
        return json_encode(['error' => $config['msg_error']]);
    } else {
        return json_decode($res);
    }
}





$update = json_decode(urldecode($_GET['update']));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
}

$email = json_decode(file_get_contents('info_bot.json'),1);

if($update->callback_query ){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}

$yn = 0;
$f = 0;
if($data == "startsend"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- يتم عمليه الصلخ بنعال .

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Dvtabumahhnk ⚡",'url'=>"https://t.me/KK6FX" ]], 
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 

$dataFile = 'email_data_'.$chat_id.'.json';
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
} else {
    $data = [
        'yn' => 0,
        'f' => 0,
        'i' => 0,
    ];
}

$mail = urldecode($_GET['mail']);
$pass = urldecode($_GET['pass']);
$sub = urldecode($_GET['sub']);
$msg = urldecode($_GET['msg']);
$count = urldecode($_GET['count']);
$sleep = urldecode($_GET['sleep']);
$from_id = urldecode($_GET['from_id']);
$emailsm = urldecode($_GET['emailsm']);




$mail = new PHPMailer(true);
for ($i = $data['i'] + 1; $i <= $count; $i++) {
    $keys = array_keys($email['myaie'][$from_id]);


$randomKey = array_rand($keys);

$randomElement = $email['myaie'][$from_id][$keys[$randomKey]];

$emaila = explode('??', $randomElement)[0] or $mail;
$passi = explode('??', $randomElement)[1] or $pass;


$keysb = array_keys($email['mails_me'][$from_id]);


$randomKey = array_rand($keysb);

$randomElement = $email['mails_me'][$from_id][$keys[$randomKey]];
$ccmv = count($email['mails_me'][$from_id]);
$ccvm = count($email['myaie'][$from_id]);

$toer = $randomElement;
    sleep($sleep);
    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 3;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Username = $emaila;
        $mail->Password = $passi;


        $mail->setFrom($emailsm, 'Paki');

        $mail->addAddress($emailsm);
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');

        $mail->isHTML(true);
        $mail->Subject = urldecode($_GET['sub']);  // Change to use URL parameters
        $mail->Body = $msg;

        $mail->send();
        $yn += 1;
        $data['iers'] += 1;
        $data['yn'] += 1;

            if ($i % 10 === 0) {
                file_put_contents($dataFile, json_encode($data));
        }

        $yn = $data['yn'];
        $f = $data['f'];
        $io = $data['iers'];
        
        
  echo 'Message sent';
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- يتم عمليه الصلخ بنعال .

- العدد المطلوب : $count
- الايميل الذي ارسل منه الايميلات : ( $emaila )
- الباسورد : ( $passi ) .
- يتم الارسال الي : ( $toer )

- عدد الحسابات المضافه : $ccvm
- عدد البريدات المضافه : $ccmv

- عدد المحاولات : $io :

- عمليات ناجحه : $yn ✅
- عمليات فاشله : $f ❌

", 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>"$yn ✅",'callback_data'=>"aaa" ],['text'=>"$f ❌",'callback_data'=>"aaa" ]],
        [['text'=>"BY MuRad ⚡",'url'=>"https://t.me/mmakkkaaa" ]], 
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 

if($io >= $count){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- يتم عمليه الصلخ بنعال .

- العدد المطلوب : $count
- الايميل الذي ارسل منه الايميلات : ( $emaila )
- الباسورد : ( $passi ) .
- يتم الارسال الي : ( $toer )

- عدد الحسابات المضافه : $ccvm
- عدد البريدات المضافه : $ccmv

- عدد المحاولات : $io :

- عمليات ناجحه : $yn ✅
- عمليات فاشله : $f ❌

- تم اكتمال ألأرسال بنجاح .

", 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>"$yn ✅",'callback_data'=>"aaa" ],['text'=>"$f ❌",'callback_data'=>"aaa" ]],
        [['text'=>"BY MuRad ⚡",'url'=>"https://t.me/mmakkkaaa" ]], 
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 
    bot('sendmessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- تم اكمال الارسال .

- عدد الرسالات المطلوب : $io
- تم ارسال : $yn ✅
- لم يتم : $f ❌

", 
'parse_mode'=>"markdown",
'reply_to_message_id' => $message_id,
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"BY MuRad ⚡",'url'=>"https://t.me/mmakkkaaa" ]], 
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 
$data['iers'] = 0;
        $data['yn'] = 0;
        $data['f'] = 0;
file_put_contents($dataFile, json_encode($data));
die();
}
}
catch(Exception $e){

    $yn = $data['yn'];
    $f = $data['f'];
    $io = $data['iers'];
        bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- يتم عمليه الصلخ بنعال .

- العدد المطلوب : $count
- الايميل الذي ارسل منه الايميلات : ( $emaila ) .
- الباسورد : ( $passi) .
- يتم الارسال الي : ( $toer )

- عدد المحاولات : $io :

- عمليات ناجحه : $yn ✅
- عمليات فاشله : $f ❌
- وصف الخطأ : $mail->ErrorInfo

", 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>"$yn ✅",'callback_data'=>"aaa" ],['text'=>"$f ❌",'callback_data'=>"aaa" ]],
        [['text'=>"BY MuRad ⚡",'url'=>"https://t.me/mmakkkaaa" ]], 
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 

  $result = $mail->ErrorInfo;

  $data['f'] += 1;
  $data['iers'] += 1;
  if ($i % 10 === 0) {
      file_put_contents($dataFile, json_encode($data));
  }

}
}

}