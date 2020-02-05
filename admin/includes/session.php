<?php 


class Session {

    private $singed_in = false;
    public $user_id;
    public $message;
    public $count;



function __construct(){

session_start();
$this->CheckTheLogIn();
$this->CheckMessage();
$this->Visitor_Count();

}

public function Visitor_Count(){

    if(isset($_SESSION['count'])){

    return $this->count = $_SESSION['count']++;
    }
    else {
        return $_SESSION['count'] = 1;
    }
}

public function message($msg=""){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    } else {
        return $this->message;
    }
}

private function CheckMessage(){
    if(isset($_SESSION['message'])){
        $this->message=$_SESSION['message'];
        unset($_SESSION['message']);
    }else {
        $this->message = "";
    }
}

public function IsSingedIn(){
    return $this->singed_in;
}

public function LogIn($user){

    if($user){
        $this->user_id = $_SESSION['user_id'] = $user->id;
        $this->singed_in = true;
    }
}

public function LogOut(){

    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->singed_in = false;
    
}

private function CheckTheLogIn(){
    if(isset($_SESSION['user_id'])){
        $this->user_id = $_SESSION['user_id'];
        $this->singed_in = true;
    } else{
        
        unset($this->user_id);
        $this->singed_in = false;
        
    }
}


}
$session=new Session();
