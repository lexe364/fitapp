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
        'datetime',
        'colling_days',
        'comment',
    ];
    protected $attributes = [
        'date'=>null,
//        'name'=>null,
    ];
//
    protected function item(){
        return $this->hasOne(WorkItemModel::class,'id','item_id');
    }
    public static function get_all() {
        $where_array=[];
        return self::query()->where($where_array)
            ->orderBy('datetime','desc')->paginate(50);
    }

    /*получить модель новее  в этой же категории*/
    public function check_new_history(){
        return $this->query()->where(['item_id'=>$this->item_id])
                             ->where('id','!=',$this->id)
                                 ->whereRaw(' DATE(`datetime`) > DATE("'.$this->datetime.'")')
                            ->orderBy('datetime')
            ->count();

    }
}
