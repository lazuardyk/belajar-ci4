<?php
namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\CompanyModel;
class EmployeeController extends BaseController
{
    public function showEmployeeList($id_company){
        $employee = new EmployeeModel();
        $company = new CompanyModel();
        $data['employee'] = $employee->getEmployeeByCompanyId($id_company);
        $data['company_id'] = $id_company;
        $data['company_name'] = $company->getCompanyName($id_company)['company_name'];
		    return view('employee-list', $data);
    }

    public function deleteEmployee($id_company, $id_employee){
		    $employee = new EmployeeModel();
        $employee->deleteEmployee($id_employee);
        return redirect()->to('/employee-list/'.$id_company);
    }
    
    public function showAddEmployee($id_company){
      $company = new CompanyModel();
      $data['company_name'] = $company->getCompanyName($id_company)['company_name'];
      $data['company_id'] = $id_company;
      return view('edit-employee', $data);
    }

    public function addEmployee($id_company){
      $employee = new EmployeeModel();
      if($this->request->getFile('employee-picture') && $this->request->getFile('employee-picture')->isValid()){
        $newName = $this->request->getFile('employee-picture')->getRandomName();
        $path = '/uploads/'.$newName;
        $this->request->getFile('employee-picture')->move(ROOTPATH.'public/uploads/', $newName);
      } else {
        $path == "";
      }
      $data = array(
        'company_id' => $this->request->getPost('company-id'),
        'employee_name' => $this->request->getPost('employee-name'),
        'employee_gender' => $this->request->getPost('employee-gender'),
        'employee_birthday' => $this->request->getPost('employee-birthday'),
        'employee_picture' => $path,
        'employee_phone' => $this->request->getPost('employee-phone'),
      );
      $employee->saveEmployee($data);
      return redirect()->to('/employee-list/'.$id_company);
    }

    public function showSpecificEmployee($id_company, $id_employee){
      $company = new CompanyModel();
      $employee = new EmployeeModel();
      $data['company_name'] = $company->getCompanyName($id_company)['company_name'];
      $data['company_id'] = $id_company;
      $employee_arr = $employee->getEmployee($id_employee)->getRowArray();
      $data['employee_id'] = $employee_arr['employee_id'];
      $data['employee_name'] = $employee_arr['employee_name'];
      $data['employee_gender'] = $employee_arr['employee_gender'];
      $data['employee_birthday'] = $employee_arr['employee_birthday'];
      $data['employee_picture'] = $employee_arr['employee_picture'];
      $data['employee_phone'] = $employee_arr['employee_phone'];
		  return view('edit-employee', $data);
    }

    public function editEmployee($id_company, $id_employee){
      $employee = new EmployeeModel();
      $changepic = false;
      if($this->request->getFile('employee-picture') && $this->request->getFile('employee-picture')->isValid()){
        $changepic = true;
        $newName = $this->request->getFile('employee-picture')->getRandomName();
        $path = '/uploads/'.$newName;
        $this->request->getFile('employee-picture')->move(ROOTPATH.'public/uploads/', $newName);
      } else {
        $path == "";
      }
      if ($changepic){
        $data = array(
          'company_id' => $this->request->getPost('company-id'),
          'employee_name' => $this->request->getPost('employee-name'),
          'employee_gender' => $this->request->getPost('employee-gender'),
          'employee_birthday' => $this->request->getPost('employee-birthday'),
          'employee_picture' => $path,
          'employee_phone' => $this->request->getPost('employee-phone'),
        );
      } else {
        $data = array(
          'company_id' => $this->request->getPost('company-id'),
          'employee_name' => $this->request->getPost('employee-name'),
          'employee_gender' => $this->request->getPost('employee-gender'),
          'employee_birthday' => $this->request->getPost('employee-birthday'),
          //'employee_picture' => '123214',
          'employee_phone' => $this->request->getPost('employee-phone'),
        );
      }
      var_dump($data);
      $employee->updateEmployee($data, $id_employee);
      return redirect()->to('/employee-list/'.$id_company);
    }
}