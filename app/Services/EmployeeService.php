<?php


namespace App\Services;
use App\Models\Role;
use App\Models\User;
use App\Services\Interfaces\EmployeeServiceInterface;
use Illuminate\Support\Facades\Hash;

class EmployeeService extends BaseService implements EmployeeServiceInterface
{
    public function getEmployees()
    {
        // TODO: Implement show() method.
        $employees = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('role_id', Role::ROLE_EMPLOYEE);
        })->paginate();

        return $employees;
    }
}
