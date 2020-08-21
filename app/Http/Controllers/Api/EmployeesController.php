<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateEmployeeRequest;
use App\Services\Interfaces\EmployeeServiceInterface;

class EmployeesController extends BaseController
{
    public function __construct(EmployeeServiceInterface $employeeService)
    {
        parent::__construct();
        $this->employeeService = $employeeService;
    }

    public function store(CreateEmployeeRequest $request)
    {
        $this->employeeService->store($request);
        return $this->responseSuccess(__('employee.store_succeed'), [], [], [], 200);

    }

}
