<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Image extends Controller
{
    protected $helpers = ['url', 'form'];
    public function getUpload()
    {
        return view('templates/main', array('content' => view('upload')));
    }
    public function postUpload()
    {
        $data = [];
        if ($file = $this->request->getFile('userfile')) {
            if (!$file->isValid()) {
                throw new
                    \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
            }
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(env('uploadDirectory'), $newName);
                $data['img_url'] = env('uploadPrefix') . $newName;
            }
        }
        return view('templates/main', array('content' => view('upload', $data)));
    }
}