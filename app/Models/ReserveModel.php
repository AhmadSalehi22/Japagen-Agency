<?php
namespace App\Models;

use CodeIgniter\Model;

class ReserveModel extends Model
{
    protected $table = 'reserve';
    protected $primaryKey = 'reserve_id';
    protected $useAutoIncrement = true; # db takes care of it
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    # Fields that can be set during save, insert, or update methods
    protected $allowedFields = ['user_id', 'pack_id', 'date', 'time'];
    protected $useTimestamps = false; # no timestamps on inserts and updates

    # Do not use validations rules (for the time being...)
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>