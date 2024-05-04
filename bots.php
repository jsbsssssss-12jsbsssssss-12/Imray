<?php


$API_KEY = "7087131277:AAFnAp-BduGVk579cE7762pivih5Fi8PAUU" ;
define('API_KEY',$API_KEY);
define("6078924663", explode(":", $API_KEY)[0]);


function bot($method, $datas = []) {
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
        return json_encode(['error' => 'Request failed']);
    } else {
        return json_decode($res);
    }
}

$admin = 6681117485;

$update = json_decode(file_get_contents('php://input'));
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


if($update->callback_query ){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}

mkdir("PHOTOS");
$path_images = "PHOTOS/";

function SetSetting($INPUT){
    if ($INPUT != NULL || $INPUT != "") {
        $F = "info_bot.json";
        $N = json_encode($INPUT, JSON_PRETTY_PRINT);   
        file_put_contents($F, $N);
        
    }
  }

  $email = json_decode(file_get_contents('info_bot.json'),1);

  $VipMuRad = json_decode(file_get_contents("VipMuRad.json"),true);

// الخزن
function SETJSON($Input){
	
  if($Input != NULL || $Input != ""){
  file_put_contents("VipMuRad.json",json_encode($Input,32|128|265));
  }
  
}

  $AdMin = $admin;
$start_msg = "
🔖| اهلا بك عزيزي المطور الاساسي
" ;

if($from_id == $AdMin) {
if($text == "/start") {
	$VipMuRad["meAT"][$chat_id]= null;
		SETJSON($VipMuRad) ; 
	bot('sendmessage', [
                'chat_id' => $chat_id,
                "text" => $start_msg, 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => '- اضف اشتراك 💸', 'callback_data' => 'addShtrak' ], ['text' => '- حذف اشتراك 📌', 'callback_data' => 'delShtrak' ]], 
        [['text' => '- الاشتراكات 💠', 'callback_data' => 'shtraks' ], ['text' => '- حذف كل المشتركين ⚠️', 'callback_data' => 'delall' ]], 
    ]
])
            ]);
	} 
	
	if($data == "backcell") {
		$VipMuRad["meAT"][$chat_id]= null;
		SETJSON($VipMuRad) ; 
		bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id ,
                'chat_id' => $chat_id,
                "text" => $start_msg, 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => '- اضف اشتراك 💸', 'callback_data' => 'addShtrak' ], ['text' => '- حذف اشتراك 📌', 'callback_data' => 'delShtrak' ]], 
        [['text' => '- الاشتراكات 💠', 'callback_data' => 'shtraks' ], ['text' => '- حذف كل المشتركين ⚠️', 'callback_data' => 'delall' ]], 
    ]
])
            ]) ; return false ;
            
		} 
		
		if($data == "delall") {
		$VipMuRad["meAT"][$chat_id]= null;
		SETJSON($VipMuRad) ; 
		bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id ,
                'chat_id' => $chat_id,
                "text" => "❓| هل انت متأكد من حذف جميع الاشتراكات" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => '- نعم ⏺️', 'callback_data' => 'delal' ], ['text' => '- لا 📌', 'callback_data' => 'backcell' ]], 
        [['text' => '🔘| رجوع', 'callback_data' => 'backcell' ]],
    ]
])
            ]) ; return false ;
            
		} 
		
		if($data == "delal") {
		$VipMuRad["shtrak"]= null;
		$VipMuRad["time"] = null ;
		SETJSON($VipMuRad) ; 
		bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id ,
                'chat_id' => $chat_id,
                "text" => "♻️| تم حذف جميع الاشتراكات وبدهم من جديد" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => '🔘| رجوع', 'callback_data' => 'backcell' ]],
    ]
])
            ]) ; return false ;
            
		} 
	
	if($data == "shtraks") {
		$co = 0;
		$VipMuRad["shtrak"] = array_unique($VipMuRad["shtrak"]);
		foreach ( $VipMuRad["shtrak"] as $mshtrk) {
			if($mshtrk != null) {
				if (strtotime($VipMuRad["time"][$mshtrk]) >= time()) {
				$co +=1;
				$MSG = "المشتركين اامدفوعين في البوت" ;
				$ms = $ms. "\n [$mshtrk](tg://user?id=$mshtrk)" ;
				} else {
					$msg2 = "- ⚠️| المنتهي صلاحيه اشتراكهم" ;
					$ms2 = $ms2. "\n [$mshtrk](tg://user?id=$mshtrk)" ;
					} 
				} else {
					$MSG = "لايوجد مشتركين مدفوعين" ; 
					} 
			} 
			if($MSG == null) { $MSG =" لايوجد مشتركين مدفوعين";} 
		bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id ,
                "text" => "⏺️| $MSG\n$ms\n\n$msg2\n$ms2" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => '🔘| رجوع', 'callback_data' => 'backcell' ]],
    ]
])
            ]); 
            $VipMuRad["meAT"][$chat_id]= null;
		SETJSON($VipMuRad) ; 
		} 
	
	if($data == "addShtrak") {
		bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id ,
                "text" => "⏺️| ارسل ايدي الشخص الان" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => '🔘| رجوع', 'callback_data' => 'backcell' ]],
    ]
])
            ]); 
            $VipMuRad["meAT"][$chat_id]= "addShtrak";
		SETJSON($VipMuRad) ; 
		} 
		
		if($data == "delShtrak") {
		bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id ,
                "text" => "⏺️| ارسل ايدي الشخص الان" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => '🔘| رجوع', 'callback_data' => 'backcell' ]],
    ]
])
            ]); 
            $VipMuRad["meAT"][$chat_id]= $data ;
		SETJSON($VipMuRad) ; 
		} 
		if($text and $VipMuRad["meAT"][$chat_id] == "delShtrak") {
			if(is_numeric($text)) {
        $K['inline_keyboard'][] = [['text' => '🔘| رجوع', 'callback_data' => "backcell" ]];

				bot('sendmessage', [
                'chat_id' => $chat_id,
                "text" => "▶️| العضو [$text](tg://user?id=$text) تم حذف اشتراكه" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode($K), 
            ]); 
            $date = date('Y-m-d');
$fg = date('Y-m-d', strtotime($date . " - 1 days"));
            $VipMuRad["time"][$text] = $fg;
            $VipMuRad["meAT"][$chat_id]= null;
            SETJSON($VipMuRad) ; 
				} 
			} 
		
		$data_=explode("|", $data) ;
		
		if($text and $VipMuRad["meAT"][$chat_id] == "addShtrak") {
			if(is_numeric($text)) {
				$VipMuRad["meAT"][$chat_id]= null;
				SETJSON($VipMuRad) ; 
				$K = ['inline_keyboard' => []];
        for($i=1;$i<30;$i++){
            $K['inline_keyboard'][] = [['text' => $i. " يوم" , 'callback_data' => "addday|$text|$i" ]];
        }
        $K['inline_keyboard'][] = [['text' => '🔶| نضام شهري', 'callback_data' => "month|$text" ]];
        $K['inline_keyboard'][] = [['text' => '🔘| رجوع', 'callback_data' => "backcell" ]];

				bot('sendmessage', [
                'chat_id' => $chat_id,
                "text" => "▶️| اختر الان الاشهر او الايام لمده الاشتراك لـ [$text](tg://user?id=$text)" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode($K), 
            ]); 
				} 
			} 

if($data_[0] == "month") {
	$text = $data_[1];
	$K = ['inline_keyboard' => []];
        for($i=1;$i<13;$i++){
            $K['inline_keyboard'][] = [['text' => $i. " شهر" , 'callback_data' => "addmonth|$text|$i" ]];
        }
        $K['inline_keyboard'][] = [['text' => '🔶| نضام اليومي', 'callback_data' => "days|$data_[1]" ]];
        $K['inline_keyboard'][] = [['text' => '🔘| رجوع', 'callback_data' => "backcell" ]];

				bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                "text" => "▶️| اختر الان الاشهر لتاريخ اشتراك [$data_[1]](tg://user?id=$data_[1])" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode($K), 
            ]); 
	} 
	
	if($data_[0] == "days") {
		$text = $data_[1];
	$K = ['inline_keyboard' => []];
        for($i=1;$i<30;$i++){
            $K['inline_keyboard'][] = [['text' => $i. " يوم" , 'callback_data' => "addday|$text|$i" ]];
        }
        $K['inline_keyboard'][] = [['text' => '🔶| نضام شهري', 'callback_data' => "month|$text" ]];
        $K['inline_keyboard'][] = [['text' => '🔘| رجوع', 'callback_data' => "backcell" ]];

				bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                "text" => "▶️| اختر الان الاشهر او الايام لمده الاشتراك لـ [$text](tg://user?id=$text)" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode($K), 
            ]); 
	} 
	
	date_default_timezone_set('Asia/Baghdad');
 
	if($data_[0] == "addday" || $data_[0] == "addmonth" ) {
		if($data_[0] == "addmonth") { $nm = "اشهر" ; $y = true;} else { $nm = "ايام" ; $y = false;} 
		$text = $data_[1];
		$K['inline_keyboard'][] = [['text' => 'ℹ️| تعيين نوع الاشتراك', 'callback_data' => "set|$text" ]];
        $K['inline_keyboard'][] = [['text' => '🔘| رجوع', 'callback_data' => "backcell" ]];
if($y == true) {
	$date = date('Y-m-d');
$time = date('Y-m-d', strtotime($date . " + $data_[2] months"));
			$VipMuRad["shtrak"][]= $text ;
$VipMuRad["time"][$text]= $time ;
		SETJSON($VipMuRad) ; 
		} else {
			$date = date('Y-m-d');
$time = date('Y-m-d', strtotime($date . " + $data_[2] days"));
			$VipMuRad["shtrak"][]= $text ;
			
			$VipMuRad["time"][$text]= $time ;
		SETJSON($VipMuRad) ; 
			} 
		
				bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                "text" => "▶️| تم اضافه الاشتراك المدفوع الي [$text](tg://user?id=$text) \n 🧾| المده $data_[2] : $nm" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode($K), 
            ]); 
	} 
	
	if($data_[0] == "set") {
		$text = $data_[1];
        $K['inline_keyboard'][] = [['text' => '🔘| رجوع', 'callback_data' => "backcell" ]];

				bot('editMessagetext', [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                "text" => "▶️| ارسل الان نوع الاشتراك مثلا *اشتراك بوت زخرفه* لـ [$text](tg://user?id=$text)" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
                'reply_markup' => json_encode($K), 
            ]); 
            $VipMuRad["meAT"][$chat_id]= $data_[0];
            $VipMuRad["to"][$chat_id]= $text ;
		SETJSON($VipMuRad) ; 
	} 

if($text and $VipMuRad["meAT"][$chat_id] == "set") {
	if(!$data) {
	
		
	bot('sendmessage', [
                'chat_id' => $chat_id,
                "text" => "
⏺️| تم حفظ نوع الاشتراك
▶️| الي [". $VipMuRad["to"][$chat_id]. "](tg://user?id=". $VipMuRad["to"][$chat_id]. ") 
ℹ️| النوع : $text 
" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
            ]); 
            $VipMuRad["meAT"][$chat_id]= null ;
            
            $VipMuRad["type"][$VipMuRad["to"][$chat_id]]= $text ;
            
            $VipMuRad["to"][$chat_id]= null ;
            SETJSON($VipMuRad) ;  
           } 
	} 
	
	
}


    
if($update) {
	
	if(in_array($from_id, $VipMuRad["shtrak"])) {
		if (strtotime($VipMuRad["time"][$from_id]) >= time()) {
			if($VipMuRad["type"][$from_id] !=null) { $SD = "▪️| نوع اشتراكك :". $VipMuRad["type"][$from_id] ;}
            if($text == "/me") {
		bot('sendmessage', [
                'chat_id' => $chat_id,
                "text" => "
⏺️| مرحبا بك عزيزي 
💠| انت من المشتركين المدفوعين في البوت
$SD
⚠️| تاريخ انتهاء الاشتراك : *". $VipMuRad["time"][$from_id]. "*
" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
            ]); 
        }
           } else {
           	$VipMuRad["msg_id"][$from_id]= $message_id - 1;
	SETJSON($VipMuRad) ;  
	bot('deleteMessage', [
                'chat_id' => $chat_id,
                'message_id' => $VipMuRad["msg_id"][$from_id], 
            ]);  
           	bot('sendmessage', [
                'chat_id' => $chat_id,
                "text" => "
⏺️| الاشتراك المدفوعه لديك انتهت صلاحيته
⚠️| الرجاء تجديد الاشتراك لاستخدام البوت
" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
            ]);
            die();
          } 
		} else {
			bot('sendmessage', [
                'chat_id' => $chat_id,
                "text" => "
🔰| مرحبا بك عزيزي هذا بوت مدفوع
💠| يمكنك الاشتراك في البوت والاستمتاع في مميزات البوت
" , 
                "parse_mode" => "markdown", 
                'reply_to_message_id' => $message_id, 
            ]); 
            die();
			} 
	}
	

if(true){

if($text == "/start"){
    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- اهلا بك في بوت الرفع الخارجي

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"بدء الارسال",'callback_data'=>"startsend" ]], 
    [['text'=>"تعيين حساب",'callback_data'=>"setacount" ],['text'=>"تعيين رمز",'callback_data'=>"setpass" ]], 
    [['text'=>"اضافه حسابات متعدده",'callback_data'=>"ADD_ANOTHERS" ]], 
    [['text'=>"تعيين موضوع",'callback_data'=>"setsubject" ],['text'=>"تعيين كليشه",'callback_data'=>"setmsg" ]], 
    [['text'=>"تعيين عدد الارسال",'callback_data'=>"setcount" ],['text'=>"تعيين صوره",'callback_data'=>"setphoto" ]], 
    [['text'=>"تعيين ايميلات",'callback_data'=>"setemails" ],['text'=>"تعيين سليب",'callback_data'=>"setsleep" ]], 
    [['text'=>"مسح صورة الرفع",'callback_data'=>"delphoto" ],['text'=>"عرض معلوماتك",'callback_data'=>"myinfo" ]], 
    [['text'=>"مسح معلوماتك",'callback_data'=>"delinfos" ]], 
    [['text'=>"BY MuRad ⚡",'url'=>"https://t.me/mmakkkaaa" ]], 
     ]
   ])
]); 
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

if($data == "back_be"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- اهلا بك في بوت الرفع الخارجي

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"بدء الارسال",'callback_data'=>"startsend" ]], 
    [['text'=>"تعيين حساب",'callback_data'=>"setacount" ],['text'=>"تعيين رمز",'callback_data'=>"setpass" ]], 
    [['text'=>"اضافه حسابات متعدده",'callback_data'=>"ADD_ANOTHERS" ]], 
    [['text'=>"تعيين موضوع",'callback_data'=>"setsubject" ],['text'=>"تعيين كليشه",'callback_data'=>"setmsg" ]], 
    [['text'=>"تعيين عدد الارسال",'callback_data'=>"setcount" ],['text'=>"تعيين صوره",'callback_data'=>"setphoto" ]], 
    [['text'=>"تعيين ايميلات",'callback_data'=>"setemails" ],['text'=>"تعيين سليب",'callback_data'=>"setsleep" ]], 
    [['text'=>"مسح صورة الرفع",'callback_data'=>"delphoto" ],['text'=>"عرض معلوماتك",'callback_data'=>"myinfo" ]], 
    [['text'=>"مسح معلوماتك",'callback_data'=>"delinfos" ]], 
    [['text'=>"BY MuRad ⚡",'url'=>"https://t.me/mmakkkaaa" ]], 
     ]
   ])
]); 
unset($email['mode'][$from_id]);
SetSetting($email);
die();
} 
$acount = $email['mail_me'][$from_id] ?? "( لم يتم وضع حساب )";
$pass = $email['pass_me'][$from_id] ?? "( لم يتم وضع رمز )";
$sbject = $email['sub_me'][$from_id] ?? "( لم يتم وضع موضوع رساله )";
$msg = $email['msg_me'][$from_id] ?? "( لم يتم وضع رساله )";
$count = $email['count_me'][$from_id] ?? "( لم يتم وضع عدد ارسال )";
$sleep = $email['slep_me'][$from_id] ?? "( لم يتم وضع سليب وقتي )";
$phto = $email['image_me'][$from_id];
if($phto == null){
    $phto = "( لم يتم وضع صوره )";
    $ys = "لايحتوي علي صوره";
}else{
    $name_phto = explode("otos/",$phto)[1];
    $phto = "° $name_phto";
    $ys = "نعم";
}
foreach($email['mails_me'][$from_id] as $mailx){
    $emailsmv = $emailsm."\n $mailx ";
    $emailsm = $mailx;
}
if($data == "startsend"){
$g = "https://".$_SERVER['SERVER_NAME'].str_replace('bots.php','',$_SERVER['SCRIPT_NAME'])."sender.php?token=".urlencode(API_KEY)."&update=".urlencode(json_encode($update))."";
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- تم بدأ الارسال 
", 

'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"BY MuRad ⚡",'url'=>"https://t.me/mmakkkaaa" ]], 
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 

$send = $_SERVER['SERVER_NAME'];
$url = "https://" . $_SERVER['SERVER_NAME'] . str_replace('bots.php', '', $_SERVER['SCRIPT_NAME']) . "sender.php?token=" . urlencode(API_KEY) . "&update=" . urlencode(json_encode($update)) . "&mail=" . urlencode($acount) . "&pass=" . urlencode($pass) . "&sub=" . urlencode($sbject) . "&msg=" . urlencode($msg) . "&count=" . urlencode($count) . "&sleep=" . urlencode($sleep) . "&from_id=" . urlencode($from_id) . "&emailsm=" . urlencode($emailsm);

$timeout = 10;
$context = stream_context_create(['http' => ['timeout' => $timeout]]);

try {
    $response = file_get_contents($url, false, $context);

    if ($response === false) {
        throw new Exception('Failed to get content from the server.');
    }

    echo $response;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
}

// عرض المعلومات

foreach($email['mails_me'][$from_id] as $mailx){
    $emailsmv = $emailsmv."\n $mailx ";
    $emailsm = $mailx;
}
if($data == "myinfo"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
معلوماتك:
ايميلك => $acount
كلمة السر => $pass
الكليشة => 
$msg
العنوان => $sbject
يحتوي على صوره؟: $ys
السليب وعدد الرفع => $sleep ثانية ، $count مره
ايميلات الشركه => $emailsmv
", 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}


// مسح المعلومات
if($data == "delinfos"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- تم بنجاح مسح معلوماتك


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
unset($email['mail_me'][$from_id]);
unset($email['pass_me'][$from_id]);
unset($email['sub_me'][$from_id]);
unset($email['msg_me'][$from_id]);
unset($email['count_me'][$from_id]);
unset($email['slep_me'][$from_id]);

unlink($path_images.$from_id.'.jpg');

unset($email['image_me'][$from_id]);
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}
// مسح صوره الرفع
if($data == "delphoto"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- تم بنجاح مسح الصوره عزيزي .


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
unlick($path_images.$from_id.'.jpg');
unset($email['image_me'][$from_id]);
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}


// وضع السليب



if($data == "ADD_ANOTHERS"){
    $m = -1;
    foreach($email['myaie'][$chat_id] as $b){
        $emaila = explode('??',$b)[0];
        $pass = explode('??',$b)[1];
        $m += 1;
        $bb = $bb."\nالايميل : $emaila\nالباسورد : $pass \n للحذف ارسل /deler_$m\n\n\n";
    }
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- في هذا القسم يمكنك اضافه حسابات متعدده .

- حساباتك المضافه :
 $bb

", 

'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"أضافه حساب",'callback_data'=>"ADDx" ]], 
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}


if(preg_match('/deler_/',$text)){
    $JJ = explode('ler_',$text)[1];
    unset($email['myaie'][$chat_id][$JJ]);
    SetSetting($email);
            bot('sendmessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- تم الحذف

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"رجوع",'callback_data'=>"ADD_ANOTHERS" ]], 
 ]
])
]); 
}
if($data == "ADDx"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل الايميل مع @gmail.com الأن

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"رجوع",'callback_data'=>"ADD_ANOTHERS" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "ADDx"){
    if(preg_match('/@gmail.com/',$text)){
        bot('sendmessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- حلو أرسل رمز الحساب الداخلي من فضلك

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"رجوع",'callback_data'=>"ADD_ANOTHERS" ]], 
 ]
])
]); 
$email['mode'][$from_id] = "passer";
$email['saves'][$from_id] = "$text";
SetSetting($email);
die();
    }
}

if($text and $email['mode'][$from_id] == "passer"){
    $mai = $email['saves'][$from_id];
            bot('sendmessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- تم اضافه بريد جديد [$mai] .
- رمز : $text

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"رجوع",'callback_data'=>"ADD_ANOTHERS" ]], 
 ]
])
]); 
unset($email['mode'][$from_id]);
unset($email['saves'][$from_id]);
$email['myaie'][$chat_id][] = $mai.'??'.$text;
SetSetting($email);
}


if($data == "setsleep"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل السليب ( الوقت بين كل ارسال )


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "setsleep"){
    if(!is_numeric($text)){
        bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- ارسل السليب صحيحا !
~ الارقام فقط 

", 

'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
die();
    }
    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم تعيين السليب
~ $text

", 

'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['slep_me'][$from_id] = $text;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

// وضع أيميلات
if($data == "setemails"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل الايميل لاضافته للقائمه :


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "setemails"){
    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم اضافه ايميل جديد للقائمه :
~ $text

", 

'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mails_me'][$from_id][] = $text;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

// وضع عدد الارسال
if($data == "setphoto"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل الصوره الان :


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($update->message->photo and $email['mode'][$from_id] == "setphoto"){
    $file_id = "https://api.telegram.org/file/bot".API_KEY."/".bot("getfile",["file_id"=>$update->message->photo[0]->file_id])->result->file_path;
    $name_phto = explode("otos/",$file_id)[1];

    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم وضع الصورة بنجاح
~ $name_phto


", 
'disable_web_page_preview'=>true, 
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
file_put_contents($path_images.$from_id.'.jpg',file_get_contents($file_id));
$email['image_me'][$from_id] = $file_id;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

// وضع عدد الارسال
if($data == "setcount"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل العدد للارسال الان :


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "setcount"){
    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم وضع العدد
~ `$text`

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['count_me'][$from_id] = $text;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

// وضع رساله
if($data == "setmsg"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل الرساله الأان :


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "setmsg"){
    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم وضع الرساله 
~ `$text`

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['msg_me'][$from_id] = $text;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

// وضع موضوع رساله
if($data == "setsubject"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل موضوع الرساله الان :


", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "setsubject"){
    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم وضع موضوع الرساله 
~ `$text`

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['sub_me'][$from_id] = $text;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

// وضع باسورد
if($data == "setpass"){
    bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- أرسل باسوردك ألان :
~ تنبيه : ليس باسورد الحساب بل الرمز الداخلي 

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "setpass"){
    bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم وضع الرمز بنجاح
~ `$text`

", 
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
 ]
])
]); 
$email['pass_me'][$from_id] = $text;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}

// وضع ايميل
if($data == "setacount"){
        bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- ارسل ايميلك الأان :
يجب ان ينتهي ب @gmail.com
- ex : MuRad@gmail.com

", 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 
$email['mode'][$from_id] = $data;
SetSetting($email);
die();
}

if($text and $email['mode'][$from_id] == "setacount"){
if(preg_match("/@gmail.com/",$text)){
        bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
- تم وضع الايميل بنجاح 
~ $text

", 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>"رجوع",'callback_data'=>"back_be" ]], 
     ]
   ])
]); 
$email['mail_me'][$from_id] = $text;
unset($email['mode'][$from_id]);
SetSetting($email);
die();
}
}


}