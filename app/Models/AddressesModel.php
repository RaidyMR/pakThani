<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressesModel extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'addresses';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $insertID         = 0;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = [];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks = true;
  protected $beforeInsert   = [];
  protected $afterInsert    = [];
  protected $beforeUpdate   = [];
  protected $afterUpdate    = [];
  protected $beforeFind     = [];
  protected $afterFind      = [];
  protected $beforeDelete   = [];
  protected $afterDelete    = [];

  public function getByUserId(int $userId, bool $is_active = NULL) {
    $addresses = $this->db
      ->table('addresses')
      ->select('')
      ->where('user_id', $userId);
    if (!is_null($is_active)) {
      $addresses->where('is_active', $is_active);
    }
    $result = $addresses->get()
      ->getResult('array');
    return $result;
  }

  /*
  public function addAddress($data) {
    $address = $this->db
      ->table('addresses')
      ->insert($data);

    return $address;
  } */
}
