<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('pages/view'));
    }

    public function getView($page = 'home')
    {
        if(!is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);
        $data['content'] = view("pages/".$page, $data);
        echo view("templates/main", $data);
    }
}