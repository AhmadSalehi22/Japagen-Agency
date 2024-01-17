<?php
namespace App\Models;
use CodeIgniter\Model;
class PackModel extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'pack_id';
    protected $useAutoIncrement = true; # db takes care of it
    protected $returnType = 'object';
    
    protected $useSoftDeletes = false;

    # Fields that can be set during save, insert, or update methods
    protected $allowedFields = ['name', 'description', 'start_date', 'end_date', 'price'];
    protected $useTimestamps = false; # no timestamps on inserts and updates

    # Do not use validations rules (for the time being...)
    protected $validationRules = [];
    protected $validationMessages = [];
    Protected $skipValidation = false;

    public function deletePack($pack_id){
        $this -> where('pack_id', $pack_id) -> delete();
    }
}
?>