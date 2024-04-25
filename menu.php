<?php

include_once 'util.php';

class Menu {
    protected $text;
    protected $sessionId;
    

    function __constructor($text, $sessionId){
        $this->text = $text;
        $this->session_id = $sessionId;
    }

    public function mainMenuRegistered() {
        $response = "CON Reply with \n";
        $response .= "1. Send Money \n";
        $response .= "2. Withdraw Money \n";
        $response .= "3. Check Balance \n";
        echo $response;
        
    }

    public function mainMenuUnRegistered(){
        $response = "CON Welcome to this app. Reply with \n";
        $response .= "1. Register \n";
        echo $response;
    }

    public function registeredMenu($textArray){
        $level = count($textArray); // Check the level 

        if($level == 1) // the level is One 
        {
            echo "CON Please enter your full name:";
        }else if ($level == 2){
            echo "CON Please enter your PIN:";
        }else if ($level == 3){
            echo "CON Please re-renter your PIN:";
        }else if ($level == 4){
            $name = $textArray[1];
            $pin = $textArray[2];
            $confirmPin = $textArray[3];

            if ($pin != $confirmPin)
            {
                echo "END Your pins do not match, Please try again";

            }else{
                // you can register the user
                // send sms
                echo "END you have been registered";
            }
        }

    }

    public function sendMoneyMenu($textArray){
        $level = count($textArray); // check level

        if ($level == 1)
        {
            echo "CON Enter mobile number of the receiver:";

        }else if ($level == 2)
        {
            echo "CON Enter amount:";

        }else if ($level == 3)
        {
            echo "CON Enter your PIN:";
        }else if ($level == 4)
        {
            $response = "CON Send ". $textArray[2] . " " . $textArray[2] . " \n";
            $response .= "1. Confirm \n";
            $response .= "2. Cancel \n";
            $response .= Util::$GO_BACK . ". Back \n";
            $response .= Util::$GO_TO_MAIN_MENU . ". Main Menu \n";
            echo $response;
        }else if($level == 5 && $textArray[4] == 1){
            // A confirm
            // Send money plus process
            // Check if the PIN is correct
            // If you have enough funds including charges etc ...
            echo "END Your request is being processed";
           

        }else if ($level == 5 && $textArray[4] == 2)
        {
            // Cancel
            echo "END Thank you for using our service";
        }else if ($level == 5 && $textArray[4] == Util::$GO_BACK)
        {
            echo "END you have requested to back to one step - PIN";
        }else if ($level == 5 && $textArray[4] == Util::$GO_TO_MAIN_MENU)
        {
            echo "END you have requested to back to main menu";
        }else{
            echo "Invalid entry";
        }
        

    }

    public function withdrawMoneyMenu(){

    }

    public function checkBalanceMenu(){

    }


}