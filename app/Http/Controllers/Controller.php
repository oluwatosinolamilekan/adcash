<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function deleteResource()
    {
        return response()->json([
                'status' => 'success',
                'message' => 'Resource deleted successfully'
            ], 201);
    }

    protected function errorResource($error)
    {
        return response()->json([
            'status' => 'failed',
            'message' => $error,
        ]);
    }
}
