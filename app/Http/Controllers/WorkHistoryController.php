<?php

namespace App\Http\Controllers;

use App\Http\Requests\work\CreateWorkRequest;
use App\Models\WorkHistoryModel;
use App\Models\WorkItemModel;
use Illuminate\Http\Request;

class WorkHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function history()    {
        //
        return $this->render('work.history');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $this->data['work_items'] = WorkItemModel::get_all();
        return $this->render('work.history.create_edit_history');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateWorkRequest $request)
    {
        $seta = $request->validated();
        $model = WorkHistoryModel::create($seta);
        dd($seta);

        return to_route('work.edit',$model->id);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)    {
        dd($id);
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
