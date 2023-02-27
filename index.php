
        
       

<?php  

$content = file_get_contents("php://input");
if ($content) {
	

	$TOKEN = "5852716963:AAHk-afPNFz3whRV76O1FBsnznD6gh3g_VU";

        $apiURL = "https://api.telegram.org/bot$TOKEN";
        $update = json_decode(file_get_contents("php://input"), TRUE);

        //Personal
        $chatID = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];
        $fullname = $update["message"]["chat"]["first_name"]." ".$update["message"]["chat"]["last_name"];


        //Group
        foreach ($update['message']['entities'] as $entity) {
        // Ambil atribut 'type' dari entitas
        $entity_type = $entity['type'];
        }
        $group_chatid = $update["message"]["from"]["id"];
        $group_username = $update["message"]["from"]["username"];
        $group_fullname = $update["message"]["from"]["first_name"]." ".$update["message"]["from"]["last_name"];

        $parameter = $chatID."|".$fullname."|".$message."|".$entity_type."|".$group_chatid."|".$group_username."|".$group_fullname."|".$message;
        $encrypted_parameter = base64_encode($parameter);






        if (strpos($message, "/start") === 0) {
        
        file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hi! ".$encrypted_parameter."<br>
        Welcome to Developer Note Support Bot<br>
        I will tell you about the latest article updates on the developer note website





        &parse_mode=HTML"); 
        }

 // $url = "https://personal-etpbukaa.outsystemscloud.com/WEBRest/rest/GetResponse/BotResponse?ChatId=".$parameter."&FullName=".$fullname."&Message=".$message;
        // $curl = curl_init($url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($curl);
        // curl_close($curl);

}else{
	echo "UNAUTHORIZE";
}

?>