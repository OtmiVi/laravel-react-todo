<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseProvider;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $items = Task::all();
            if (!$items) {
                return ResponseProvider::getNullResponse();
            } else {
                return ResponseProvider::getSuccessResponse($items);
            }
        } catch (Throwable $e) {
           return ResponseProvider::getErrorResponse($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $item = Task::find($id);
            if (!$item) {
                return ResponseProvider::getNullResponse();
            } else {
                return ResponseProvider::getSuccessResponse($item);
            }
        } catch (Throwable $e) {
           return ResponseProvider::getErrorResponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $item = Task::find($id);
            $item = $item->delete();
            if (!$item) {
                return ResponseProvider::getNullResponse();
            } else {
                return ResponseProvider::getBoolResponse($item);
            }
        } catch (Throwable $e) {
           return ResponseProvider::getErrorResponse($e);
        }
    }
}
