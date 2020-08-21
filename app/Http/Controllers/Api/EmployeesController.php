<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateEmployeeRequest;
use App\Services\Interfaces\EmployeeServiceInterface;

class EmployeesController extends BaseController
{
    public function __construct(EmployeeServiceInterface $employeeService){
        parent::__construct();
        $this->employeeService = $employeeService;
    }

    public function index(){
        $response = $this->employeeService->getEmployees();
        return $this->responseWithPagination(__('employee.show_succeed'),$response);
    }

}
