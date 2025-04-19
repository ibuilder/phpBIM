<?php

namespace App\Controllers;

use App\Models\Company;
use App\Services\DatabaseService;

class CompanyController
{
    protected $dbService;

    public function __construct()
    {
        $this->dbService = new DatabaseService();
    }

    public function createCompany($data)
    {
        $company = new Company($data);
        return $this->dbService->insert('companies', $company->toArray());
    }

    public function addUserToCompany($companyId, $userId)
    {
        return $this->dbService->update('companies', $companyId, ['user_id' => $userId]);
    }

    public function getCompanyUsers($companyId)
    {
        return $this->dbService->select('users', ['company_id' => $companyId]);
    }

    public function getAllCompanies()
    {
        return $this->dbService->selectAll('companies');
    }

    public function deleteCompany($companyId)
    {
        return $this->dbService->delete('companies', $companyId);
    }
}