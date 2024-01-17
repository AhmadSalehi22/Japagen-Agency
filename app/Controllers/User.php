<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\PackModel;
use App\Models\ReserveModel;

class User extends Controller{
    public function getList(){ // User List
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        $data['content'] = view('user/list', $data);
        echo view('templates/main',$data);
    }
    protected $helpers = ['url', 'form'];

    public function getUnauthorized(){ // not logged in page
        $data['content'] = view('user/unauthorized');
        echo view('templates/main', $data);
    }
    public function getForbidden(){ // Unauthorized page
        $data['content'] = view('user/forbidden');
        echo view('templates/main', $data);
    }
    
    public function getProfile(){
        helper('form');
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['content'] = view('user/profile', $data);
        echo view('templates/main', $data);
    }
    public function getLogin() // Login Page .
    {   
        if (session('logged_in')) {
            return redirect()->to(site_url('user/profile'));
        } else {
            $data['content'] = view('user/login');
            echo view('templates/main', $data);
        }
    }
    public function getUser_ok() // login success
    {
        $data['content'] = view('user/user_ok');
        echo view('templates/main', $data);
    }

    public function getLogout(){ // logout 
        model('UserModel')->getLogout();
        return redirect()->to(base_url('user/login'));
    }

    public function postLogin(){ // login post
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $rules = [
            "email" => [
                "label" => "Email",
                "rules" => "required|valid_email"
            ],
            "password" => [
                "label" => "Password",
                "rules" => "required"
            ]
        ];
        $data = [];
        $session = session();
        if ($this->validate($rules)) {
            $email = $request->getVar('email');
            $password = $request->getVar('password');
            $user = model('UserModel')->authenticate($email, $password);
            if ($user) {
                $session->set('logged_in', TRUE);
                $session->set('user', $user);
                return redirect()->to(base_url('user/user_ok'));
            } else {
                $session->setFlashdata('msg', 'Wrong credentials');
            }
        } else {
            $data["errors"] = $validation->getErrors();
        }
        $data['content'] = view('user/login', $data);
        echo view('templates/main', $data);
    }

    public function getRegister(){ // get register page
        $data['content'] = view('user/register');
        echo view('templates/main', $data);
    }

    public function getRegister_ok(){ // register success
        $data['content'] = view('user/register_ok');
        echo view('templates/main', $data);
    }

    public function postRegister(){ // post register
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            "name" => [
                "label" => "name",
                "rules" => "required"
            ],
            "email" => [
                "label" => "email",
                "rules" => "required|valid_email"
            ],
            "password" => [
                "label" => "password",
                "rules" => "required|min_length[8]|alpha_numeric_punct"
            ],
            "rep_password" => [
                "label" => "rep_password",
                "rules" => "required|matches[password]"
            ]
        ];
        $data = [];
        $model = new UserModel();
        $role = 1;
        if ($this->validate($rules)){
            $status = $model->save([
				'name'  =>    $this->request->getPost('name'),
				'email'=>  $this->request->getPost('email'),
				'password'=>    password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'=> 1, # role 1 for normal users
			]);
            if($status){
				return redirect()->to(base_url('user/register_ok'));
			} else {
                return redirect()->to(base_url('user/register_error'));
            }
        } else {
            $data["errors"] = $validation->getErrors();
        }
        $data['content'] = view('user/register', $data);
        echo view('templates/main', $data);
    }

    public function postUpdate()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            "name" => [
                "label" => "pack_id",
                "rules" => "required"
            ],
            "email" => [
                "label" => "email",
                "rules" => "required|valid_email"
            ],
            "phone" => [
                "label" => "phone",
                "rules" => "required"
            ],
            "birthday" => [
                "label" => "birthday",
                "rules" => "required"
            ],
            "gender" => [
                "label" => "gender",
                "rules" => "required"
            ],
            "address" => [
                "label" => "address",
                "rules" => "required"
            ]
        ];
        $data = [];
        $id = $this->request->getPost('id');
        $model = new UserModel();
        $userdata = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'birthday' => $this->request->getPost('birthday'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address')
        ];
        if ($this->validate($rules)) {
            $status = $model->update($id, $userdata);
            if ($status) {
                return redirect()->to(base_url('user/update_ok'));
            } else {
                return redirect()->to(base_url('user/update_error'));
            }
        } else {
            $data["errors"] = $validation->getErrors();
        }
        $data['content'] = view('user/update_error', $data);
        echo view('templates/main', $data);
    }

    public function getUpdate_ok(){
        $data['content'] = view('user/update_ok');
        echo view('templates/main', $data);
    }

    public function getUpdate_error(){
        $data['content'] = view('user/update_error');
        echo view('templates/main', $data);
    }

    public function getDelete($user_id)
    {
        model('UserModel')->deleteUser($user_id);
        return redirect()->to(base_url('user/list'));
    }

    public function getPacks()
    {
        $model = new ReserveModel();
        $pack_model = new PackModel();
        $data['reservations'] = $model->findAll();
        $data['packages'] = $pack_model->findAll();
        $data['content'] = view('user/packs', $data);
        echo view('templates/main', $data);
    }
}
?>