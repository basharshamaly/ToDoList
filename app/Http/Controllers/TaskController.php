<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\DropList;
use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->paginate(10);
        return response()->view('cms.Task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priority::all();
        $droplists = DropList::all();

        return response()->view('cms.Task.create', compact('priorities', 'droplists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {


        // if ($request->input('user') === 'new') {
        $tasks = new Task();
        $tasks->name = $request->input('name');
        $tasks->priority_id = $request->input('priority_id');
        $tasks->drop_list_id = $request->input('drop_list_id');
        $tasks->Due_Date = $request->input('due_date');
        $tasks->IsCompleted = $request->input('iscompleted') === 'true' ? true : false;
        $save = $tasks->save();
        return redirect(route('tasks.index'));

        // } else {
        // return response()->json([
        //     'icon' => 'error',
        //     'title' => 'Invalid user type',
        // ], 400);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priorities = Priority::all();
        $droplists = DropList::all();
        $task = Task::findOrFail($id);
        return response()->view('cms.Task.edit', compact('priorities', 'droplists', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->name = $request->input('name');
        $tasks->priority_id = $request->input('priority_id');
        $tasks->drop_list_id = $request->input('drop_list_id');
        $tasks->Due_Date = $request->input('due_date');
        $tasks->IsCompleted = $request->input('iscompleted') === 'true' ? true : false;

        $update = $tasks->save();
        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::destroy($id);
        return back();
    }
}
