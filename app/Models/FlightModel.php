<?php
namespace App\Models;
use CodeIgniter\Model;
class FlightModel extends Model
{
    protected $table = 'flights';
    protected $primaryKey = 'flight_id';
    protected $useAutoIncrement = true; # db takes care of it
    protected $returnType = 'object';
    
    protected $useSoftDeletes = false;

    # Fields that can be set during save, insert, or update methods
    protected $allowedFields = ['pid', 'flight_num', 'origin', 'destination', 'time'];
    protected $useTimestamps = false; # no timestamps on inserts and updates

    # Do not use validations rules (for the time being...)
    protected $validationRules = [];
    protected $validationMessages = [];
    Protected $skipValidation = false;

    public function deleteFlight($pack_id){
        $this -> where('pid', $pack_id) -> delete();
    }
}
?>