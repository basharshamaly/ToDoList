<?php

namespace App\Http\Controllers;

use App\Http\Requests\DropListRequest;
use App\Models\DropList;
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

        return response()->view('cms.DropList.index', compact('droplists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $droplists = DropList::all();
        return response()->view('cms.DropList.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DropListRequest $request)
    {
        $droplists = new DropList();
        $droplists->name = $request->input('name');

        $save =  $droplists->save();
        return redirect(route('droplists.index'));
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
