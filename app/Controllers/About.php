<?php
namespace App\Controllers;

    class About extends BaseController
    {
        public function getIndex()
        {
            $data['content'] = view('about');
            echo view('templates/main', $data);
        }

    }

?>