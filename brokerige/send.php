<?
//amo
//ПРЕДОПРЕДЕЛЯЕМЫЕ ПЕРЕМЕННЫЕ
$responsible_user_id = 2505154; //id ответственного по сделке, контакту, компании

$lead_name = 'Заявка с сайта webinar.rbs-24.ru/brokerige/'; //Название добавляемой сделки
$lead_status_id = '20330359'; //id этапа продаж, куда помещать сделку 

$contact_name = $name; //Название добавляемого контакта
$contact_phone = $phone; //Телефон контакта
$contact_email = $email; //Емейл контакта


//АВТОРИЗАЦИЯ
$user=array(
	'USER_LOGIN'=>'s.esaulov@ukmost.com', #Ваш логин (электронная почта)
	'USER_HASH'=>'ae7595fb7a8995abed680460b45427d0881ca786' #Хэш для доступа к API 
);
$subdomain='rbs24';


#Формируем ссылку для запроса
$link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($user));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
curl_close($curl);  #Завершаем сеанс cURL

$Response=json_decode($out,true);
//echo '<b>Авторизация:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';




//ПОЛУЧАЕМ ДАННЫЕ АККАУНТА
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/accounts/current'; #$subdomain уже объявляли выше
$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);
$Response=json_decode($out,true);
$account=$Response['response']['account'];
//echo '<b>Данные аккаунта:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';


//ПОЛУЧАЕМ СУЩЕСТВУЮЩИЕ ПОЛЯ
$amoAllFields = $account['custom_fields']; //Все поля
$amoConactsFields = $account['custom_fields']['contacts']; //Поля контактов
//echo '<b>Поля из амо:</b>'; echo '<pre>'; print_r($amoConactsFields); echo '</pre>';


//ФОРМИРУЕМ МАССИВ С ЗАПОЛНЕННЫМИ ПОЛЯМИ КОНТАКТА
//Стандартные поля амо:
$sFields = array_flip(array(
		'PHONE', //Телефон. Варианты: WORK, WORKDD, MOB, FAX, HOME, OTHER
		'EMAIL' //Email. Варианты: WORK, PRIV, OTHER
	)
);

//Проставляем id этих полей из базы амо
foreach($amoConactsFields as $afield) {
	if(isset($sFields[$afield['245327']])) {
		$sFields[$afield['245329']] = $afield['id'];
	}
}


//ДОБАВЛЯЕМ СДЕЛКУ
$leads['request']['leads']['add']=array(
	array(
		'name' => $lead_name,
		'status_id' => $lead_status_id, //id статуса
		'responsible_user_id' => $responsible_user_id, //id ответственного по сделке
		//'date_create'=>1298904164, //optional
		//'price'=>300000,
		'visitor_uid' =>$elem,
		'tags' => 'Заявка с сайта', #Теги
		//'custom_fields'=>array()
		 //'custom_fields'=>array(
       // array(
        //  'id'=>598629,
        //  'values'=>array(
        //    array(
        //      'value'=>$elem
              //      'enum'=>'WORK'
       //     )
      //    )
       // )
    //  )
	)
);

$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';

$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
$Response=json_decode($out,true);
//echo '<b>Новая сделка:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';
if(is_array($Response['response']['leads']['add']))
	foreach($Response['response']['leads']['add'] as $lead) {
		$lead_id = $lead["id"]; //id новой сделки
	};
//ДОБАВЛЯЕМ СДЕЛКУ - КОНЕЦ


//ДОБАВЛЕНИЕ КОНТАКТА
$contact = array(
	'name' => $contact_name,
	'linked_leads_id' => array($lead_id), //id сделки
	'responsible_user_id' => $responsible_user_id, //id ответственного

	'custom_fields'=>array(
        array(
          'id'=>481481,
          'values'=>array(
            array(
              'value'=>$contact_phone,
              'enum'=>'WORK'
            )
          )
        ),
         array(
          'id'=>481483,
          'values'=>array(
            array(
              'value'=>$contact_email,
              'enum'=>'WORK'
            )
          )
        ),
         array(
          'id'=>598663,
          'values'=>array(
            array(
              'value'=>$elem
              //      'enum'=>'WORK'
       
      )
          )
        ))
);

$set['request']['contacts']['add'][]=$contact;

#Формируем ссылку для запроса
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($set));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
//CheckCurlResponse($code);

$Response=json_decode($out,true);
//ДОБАВЛЕНИЕ КОНТАКТА - КОНЕЦ

//amo
?>
