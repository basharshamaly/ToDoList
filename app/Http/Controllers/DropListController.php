<?php

namespace App\Http\Controllers;

use App\Http\Requests\DropListRequest;
use App\Models\DropList;
use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;

class DropListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $droplists = DropList::orderBy('id', 'desc')->paginate(10);
        $tasks = Task::where('id')->get();

        return response()->view('cms.DropList.index', compact('droplists', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $droplists = DropList::all();
        $priorities = Priority::all();

        return response()->view('cms.DropList.create', compact('priorities', 'droplists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($usertype, DropListRequest $request)
    {
        // if ($request->input('user') === 'lists') {
        $droplists = new DropList();
        $droplists->name = $request->input('name');
        $save =  $droplists->save();
        // } else if ($request->input('user') === 'task') {
        $tasks = new Task();
        $tasks->name = $request->input('name_1');
        $tasks->priority_id = $request->input('priority_id');
        $tasks->drop_list_id = $request->input('drop_list_id');
        $tasks->Due_Date = $request->input('due_date');
        $tasks->IsCompleted = $request->input('iscompleted') === 'true' ? true : false;
        $save = $tasks->save();
        // } else {
        //     return response()->json([
        //         'icon'=>'error',
        //         'message'=>'failed process',
        //     ],400);
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
        $droplist = DropList::findOrFail($id);
        return response()->view('cms.DropList.edit', compact('droplist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DropListRequest $request, $id)
    {

        $droplists = DropList::FindOrFail($id);
        $droplists->name = $request->input('name');

        $update =  $droplists->save();
        return redirect(route('droplists.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $droplists = DropList::destroy($id);
        return back();
    }
}