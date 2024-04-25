<?php

//echo $_POST['text'];
$text = $_POST['text'];
$rm = new Remove($text);
echo $rm->remove99();

class Remove{
    var $str;

    function __construct($s)
    {
       $this->str = $s;
    }

    public function remove99()
    {
        $explodeStr = explode('*', $this->str);

        

        while(array_search("99", $explodeStr) != false){
            $firstIndex = array_search("99", $explodeStr);            
            $explodeStr = array_slice($explodeStr, $firstIndex + 1);
        }


        return join("*", $explodeStr);
    }
}

?>