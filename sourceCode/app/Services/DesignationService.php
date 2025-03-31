<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\DesignationsRequest;
use App\Models\Designation;
use Exception;
use Illuminate\Support\Facades\Log;

class DesignationService
{
    public $designationFilter = ['name', 'status'];

    public function list(Request $request)
    {
        $requests    = $request->all();
        $method      = $request->get('paginate', 0) == 1 ? 'paginate' : 'get';
        $methodValue = $request->get('paginate', 0) == 1 ? $request->get('per_page', 10) : '*';
        $orderColumn = $request->get('order_column') ?? 'id';
        $orderType   = $request->get('order_type') ?? 'desc';

        return Designation::where(function ($query) use ($requests) {
            foreach ($requests as $key => $request) {
                if (in_array($key, $this->designationFilter)) {
                    $query->where($key, 'like', '%' . $request . '%');
                }
            }
        })->orderBy($orderColumn, $orderType)->$method(
            $methodValue
        );
    }

    public function store(DesignationsRequest $request)
    {
        try {
            return Designation::create($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new Exception($e->getMessage(), 422);
        }
    }

    public function update(DesignationsRequest $request, Designation $designation)
    {
        try {
            return $designation->update($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new Exception($e->getMessage(), 422);
        }
    }

    public function destroy(Designation $designation)
    {
        try {
            $designation->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
}
