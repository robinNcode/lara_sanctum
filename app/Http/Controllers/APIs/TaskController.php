<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use HttpResponses;

    private AuthController $auth;

    public function __construct()
    {
        $this->auth = new AuthController();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        if($this->auth->check()->getStatusCode() != 200)
            return $this->error([], 'User is not authenticated!', 401);
        else
            return $this->success(TaskResource::collection(Task::all()), 'Tasks retrieved successfully!');
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
    public function show(string $id): JsonResponse|TaskResource
    {
        return $this->isAuthorized(session()->get('user')->id) ?? new TaskResource(Task::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
