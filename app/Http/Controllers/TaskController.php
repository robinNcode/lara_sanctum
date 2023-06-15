<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private APIs\TaskController $task;

    public function __construct()
    {
        $this->task = new APIs\TaskController();
    }

    public function index()
    {
        $response = $this->task->index();

        if ($response->getStatusCode() != 200) {
            return redirect()->back()->with('error', $response->getData()->message);
        }

        return view('tasks.list_all', [
            'tasks' => $response->getData()->data
        ]);
    }
}
