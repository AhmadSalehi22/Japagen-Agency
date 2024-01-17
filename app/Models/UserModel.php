<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; # db takes care of it
    protected $returnType = 'object'; # 'object' or 'array'
    protected $useSoftDeletes = false; # true if you expect to recover data

    # Fields that can be set during save, insert, or update methods
    protected $allowedFields = ['name', 'email', 'password', 'role', 'phone', 'birthday', 'gender', 'address'];
    protected $useTimestamps = false; # no timestamps on inserts and updates

    # Do not use validations rules (for the time being...)
    protected $validationRules = [];
    protected $validationMessages = [];
    Protected $skipValidation = false;

    public function authenticate($email, $password)
    {
        $user = $this->where('email', $email)->first();
        if ($user && password_verify($password, $user->password))
            return $user;
        return FALSE;
    }

    public function getLogout()
    {
        session()->destroy();
        return redirect()->to(base_url('user/login'));
    }

    public function deleteUser($user_id){
        $this -> where('id', $user_id);
        $this -> delete($user_id);
    }
}
?>