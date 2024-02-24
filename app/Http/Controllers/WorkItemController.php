<?php

namespace App\Http\Controllers;

use App\Http\Requests\work\UpdateWorkItemRequest;
use App\Models\WorkItemModel;
use Illuminate\Http\Request;

class WorkItemController extends Controller
{
    public function index()    {        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)    {
        //
    }
    public function edit(string $id){
        $model = WorkItemModel::getByID($id);
        $this->data['title'] = $model->name;//'Часть тела: '.
        $this->data['item'] = $model;
//        $this->data['item'] = $model->toArray();
        return $this->render('work.item.edit_item');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkItemRequest $request, string $id){
        $seta = $request->validated();
        $model = WorkItemModel::getByID($id);
        $model->update($seta);
        alert('Сохранено');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
