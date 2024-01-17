<?php
namespace App\Models;
use CodeIgniter\Model;
class TourModel extends Model
{
    protected $table = 'tours';
    protected $primaryKey = 'tour_id';
    protected $useAutoIncrement = true; # db takes care of it
    protected $returnType = 'object';
    
    protected $useSoftDeletes = false;

    # Fields that can be set during save, insert, or update methods
    protected $allowedFields = ['pid', 'day1', 'day2', 'day3'];
    protected $useTimestamps = false; # no timestamps on inserts and updates

    # Do not use validations rules (for the time being...)
    protected $validationRules = [];
    protected $validationMessages = [];
    Protected $skipValidation = false;

    public function deleteTour($pack_id){
        $this -> where('pid', $pack_id) -> delete();
    }
}
?>