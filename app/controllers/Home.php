<?php

class Home extends Controller{
    public function idex(){
        $data['judul'] = 'dashboard';
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}