<?php
include_once 'menu.php'; 
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

//var_dump($text);
//print_r($text);

$isRegistered = false;
$menu = new Menu($text, $sessionId);
if ($text == "" && !$isRegistered) {
 // user is registered and string is empty
   $menu->mainMenuRegistered();

} else if ($text == "" && $isRegistered) {
 // user is not registered and string is empty   
   $menu->mainMenuUnRegistered();

} else if ($isRegistered) {

    $textArray = explode("*", $text);
    switch($textArray[0]){
        case 1:
            $menu->registeredMenu($textArray);
            break;
            default:
              echo "END invalid choice, Please retry again";
    }
    
} else { 

    $textArray = explode("*", $text);
    //var_dump($textArray);
    switch($textArray[0]){
        case 1:
            $menu->sendMoneyMenu($textArray);
            break;
        case 2:
            $menu->withdrawMoneyMenu($textArray);
            break;
        case 3:
            $menu->checkBalanceMenu($textArray);
            break;   
            default:
              echo "END invalid choice, Please retry again";
    }
}
