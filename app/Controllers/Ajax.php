<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Ajax extends Controller
{
    public function getEx1($content = False)
    {
        if ($content)
            echo view('ajax/ex1/html_content', array('time' => date('H:i:s')));
        else
            echo view('ajax/ex1/index');
    }

    public function getEx2()
    {
        echo view('ajax/ex2/index');
    }

    public function getEx3($content = False)
    {
        if ($content)
        {
            $data = array('info' => $_SERVER);
            return $this->response->setJSON($data);
        }
        else
            echo view('ajax/ex3/index');
    }
    public function getEx4()
    {
        echo view('ajax/ex4/index');
    }

}

?>