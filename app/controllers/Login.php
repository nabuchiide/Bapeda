<?php

class Login extends Controller{

    public function idex(){
        $this->view('login/index');
    }

    public function login_process(){
        $countData = $this->model('userModel')->prosessLogin($_POST);

        if($countData['CountData'] > 0){
            $_SESSION['login'] = [
                'status' => true,
                'uname' =>$_POST['user_name']
            ];
           
            header('Location: '.BASEURL.'/');
            exit;
        }else{
                unset($_SESSION['login']);
                header('Location: '.BASEURL.'/login');
                exit;
        }
        
    }

    public function logOut(){
        unset($_SESSION['login']);
        header('Location: '.BASEURL.'/');
        exit;
    }
}