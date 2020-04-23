<?php
namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'ms_company';

    public function getCompany($id = false){
        if ($id){
            return $this->getWhere(['company_id' => $id]);
        } else {
            return $this->findAll();
        }
    }

    public function saveCompany($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateCompany($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('company_id' => $id));
        return $query;
    }

    public function getCompanyName($id)
    {
        $query = $this->db->table($this->table)->select('company_name')->where('company_id',$id);
        return $query->get()->getRowArray();
    }

    public function deleteCompany($id)
    {
        $query = $this->db->table($this->table)->delete(array('company_id' => $id));
        return $query;
    } 
}
