<?php

namespace App\Http\Controllers;

use App\Http\Requests\work\CreateWorkRequest;
use App\Http\Requests\work\UpdateWorkRequest;
use App\Models\WorkHistoryModel;
use App\Models\WorkItemModel;
use Illuminate\Http\Request;

class WorkHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function history()    {
        $this->data['history_items'] = WorkHistoryModel::get_all();
        $this->prepire_history();
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
        $model = WorkHistoryModel::query()->findOrFail($id);
        $this->data['work_items'] = WorkItemModel::get_all();
        $this->data['history']= $model;
        $this->data['title']= $model->name;
        return $this->render('work.history.create_edit_history');
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkRequest $request, string $id){
        $seta = $request->validated();
//        dd($seta);
        $model = WorkHistoryModel::query()->findOrFail($id);
        $model->update($seta);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function prepire_history() {
        foreach ($this->data['history_items'] as &$history_item){
            $history_item['after_days'] = (new \Carbon\Carbon('now'))->diffInDays($history_item['datetime']);
//            $history_item['percent'] = round($history_item['after_days']/$history_item['colling_days']*100);

            //считаем прогресс бар
            $history_item['after_hours'] = (new \Carbon\Carbon('now'))->diffInHours($history_item['datetime']);
            if($history_item['after_hours']){
                $history_item['percent'] = round($history_item['after_hours']/($history_item['colling_days']*24)*100);

                //Еслли прошло дней больше чем нужно - ищет тренировки после этого дня . с таким  item_id
                if($history_item['percent']>100){
                    if(!$history_item['count'] = $history_item->check_new_history()){
                        $history_item['html_class'] = 'success need_work';
                    }else{
                        $history_item['percent'] = null;
                        $history_item['html_class'] = 'secondary done';
                    }
//                    dd($count);
                }
            }

        }
    }
}
