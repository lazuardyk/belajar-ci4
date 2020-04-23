<?php
namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'ms_employee';

    public function getEmployee($id = false){
        if ($id){
            return $this->getWhere(['employee_id' => $id]);
        } else {
            return $this->findAll();
        }
    }

    public function getEmployeeByCompanyId($id){
        $query = $this->db->table($this->table)->select('*')->join('ms_company', 'ms_company.company_id = ms_employee.company_id')->where('ms_employee.company_id',$id)->get();
        return $query->getResult('array');
    }

    public function saveEmployee($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateEmployee($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('employee_id' => $id));
        return $query;
    }

    public function deleteEmployee($id)
    {
        $query = $this->db->table($this->table)->delete(array('employee_id' => $id));
        return $query;
    } 
}
