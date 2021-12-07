<?php

class Login extends Controller
{

    public function idex()
    {
        $data['judul'] = 'Login';
        $this->view('login/index',$data);
    }

    public function login_process()
    {
        $countData = $this->model('userModel')->prosessLogin($_POST);
        $data = $this->model('userModel')->prosessLoginGetData($_POST);
        
        if ($countData['CountData'] > 0) {
            $_SESSION['login'] = [
                'status' => true,
                'uname' => $_POST['user_name'],
                'type'  => $data['user_type']
            ];

            header('Location: ' . BASEURL . '/');
            exit;
        } else {
            Flasher::setFlash('gagal', 'user name atau password anda salah', 'danger', '');
            unset($_SESSION['login']);
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logOut()
    {
        unset($_SESSION['login']);
        header('Location: ' . BASEURL . '/');
        exit;
    }
}
