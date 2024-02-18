<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkHistoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'work_histories';

    protected $fillable = [

        'name',
        'item_id',
        'user_id',
        'date',
        'colling_days',
        'comment',
    ];
    protected $attributes = [
        'date'=>null
    ];
//
//    protected function items(){
//        return $this->hasMany(WorkItemModel::class,'id','item_id');
//    }
}
