<?php 
if(!function_exists('get_users')){
    function get_users(){
        $db = \Config\Database::connect();
        $users = $db->query("select * from users")->getResultArray();
        return $users;
    }
}
if(!function_exists("print_my_message")){
   function print_my_message($message){
    echo $message;
   }
}
if(!function_exists("find_my_length")){
    function find_my_length($message){
     echo strlen($message);
    }
 }
?>