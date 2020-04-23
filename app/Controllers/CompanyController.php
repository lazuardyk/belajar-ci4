<?php
namespace App\Controllers;

use App\Models\CompanyModel;
class CompanyController extends BaseController
{
	public function showCompanyList()
	{
        $company = new CompanyModel();
        $data['company'] = $company->getCompany();
		return view('company-list', $data);
	}

	public function showSpecificCompany($id){
		$company = new CompanyModel();
		$data['company'] = $company->getCompany($id)->getRow();
		return view('edit-company', $data);
	}

	public function showCompanyDetail($id){
		$company = new CompanyModel();
		$data['company'] = $company->getCompany($id)->getRow();
		return view('detail-company', $data);
	}


	public function addCompany(){
		$company = new CompanyModel();
		$data = array(
			'company_name' => $this->request->getPost('company-name'),
			'company_phone' => $this->request->getPost('company-phone'),
			'company_address' => $this->request->getPost('company-address'),
		);
		$company->saveCompany($data);
		return redirect()->to('/');
	}

	public function editCompany($id){
		$company = new CompanyModel();
        $data = array(
			'company_name' => $this->request->getPost('company-name'),
			'company_phone' => $this->request->getPost('company-phone'),
			'company_address' => $this->request->getPost('company-address'),
        );
        $company->updateCompany($data, $id);
        return redirect()->to('/');
	}

	public function deleteCompany($id){
		$company = new CompanyModel();
        $company->deleteCompany($id);
        return redirect()->to('/');
	}

}
