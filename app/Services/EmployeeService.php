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

    public function store($request)
    {
        $getRequest = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
            'description' => $request->description,
            'leader_id' => $request->leader_id,
        ];
        $roleId = $request->role_id;
        $user = User::create($getRequest);
        $user->roles()->attach($roleId);
        return $user;
    }
}
