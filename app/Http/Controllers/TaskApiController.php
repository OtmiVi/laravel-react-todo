<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseProvider;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
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
    public function store(StoreTaskRequest $request)
    {
        try {
            $request = $request->validated();
            $item = Task::create($request);
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
    public function update(UpdateTaskRequest $request, string $id)
    {
        try {
            $request = $request->validated();
            $item = Task::find($id);
            $item->update($request);
            $item->save();
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

    public function changeStatus(string $id): JsonResponse
    {
        try {
            $item = Task::find($id);
            $item->status = !$item->status;
            $item->save();
            if (!$item) {
                return ResponseProvider::getNullResponse();
            } else {
                return ResponseProvider::getSuccessResponse($item);
            }
        } catch (Throwable $e) {
           return ResponseProvider::getErrorResponse($e);
        }
    }
}
