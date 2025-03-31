<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentsRequest;
use App\Models\Department;
use Exception;
use Illuminate\Support\Facades\Log;

class DepartmentService
{
    // Array of department-related fields that can be filtered
    public $departmentFilter = ['name', 'status'];

    /**
     * List departments with optional pagination and filtering.
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function list(Request $request)
    {
        $requests    = $request->all();
        $method      = $request->get('paginate', 0) == 1 ? 'paginate' : 'get';
        $methodValue = $request->get('paginate', 0) == 1 ? $request->get('per_page', 10) : '*';
        $orderColumn = $request->get('order_column') ?? 'id';
        $orderType   = $request->get('order_type') ?? 'desc';

        return Department::where(function ($query) use ($requests) {
            foreach ($requests as $key => $request) {
                if (in_array($key, $this->departmentFilter)) {
                    $query->where($key, 'like', '%' . $request . '%');
                }
            }
        })->orderBy($orderColumn, $orderType)->$method(
            $methodValue
        );
    }

    /**
     * Store a newly created department.
     *
     * @param DepartmentsRequest $request
     * @return Department
     * @throws Exception
     */
    public function store(DepartmentsRequest $request)
    {
        try {
            return Department::create($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new Exception($e->getMessage(), 422);
        }
    }

    /**
     * Update an existing department.
     *
     * @param DepartmentsRequest $request
     * @param Department $department
     * @return bool
     * @throws Exception
     */
    public function update(DepartmentsRequest $request, Department $department)
    {
        try {
            return $department->update($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new Exception($e->getMessage(), 422);
        }
    }

    /**
     * Delete a department.
     *
     * @param Department $department
     * @return void
     * @throws Exception
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
}
