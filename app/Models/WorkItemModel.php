<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkItemModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'work_items';

    protected $fillable =[
        'name',
        'user_id',

        'image_key',


    ];
    public function last_work_item(){
        return WorkHistoryModel::query()->where(['item_id'=>$this->id])
            ->orderBy('datetime','desc')
            ->first();
    }
    public function works(){
        return $this->hasMany(WorkHistoryModel::class,'item_id','id');
    }

    public static function get_all() {
        return self::query()->get()->all();
    }

    public static function getByID(string $id) {
        return self::query()->findOrFail((int)$id);
    }

    public static function get_with_image_keys() {
        $tmp = self::query()->wherein('image_key', config('work.man.muscles.front'))
            ->get();
        return $tmp;
        dd($tmp->map(function($item){return $item->image_key;})->toArray());
        return;
    }

    public function get_html_class(string $what = ''):string {
        $class = ' ';

        switch ($what){
            case 'from_percent':
                //получить последюю работу по этому итэму
                $last_work = $this->last_work_item();
//                d($last_work);
//                d($this->works()->get());
                $class .= ' percent_'.($percent=$last_work->get_percent());
                if($percent<30){
                    $class .= ' percent30p ';
                }elseif($percent>=30 AND $percent<50){
                    $class .= ' percent30p50 ';
                }elseif($percent>=40 AND $percent<75){
                    $class .= ' percent50p75 ';
                }elseif($percent>=75 AND $percent<100){
                    $class .= ' percent75p100 ';
                }elseif( $percent>=100 AND $percent<150){
                    $class .= ' percent100p150 ';
                }elseif( $percent>=150 AND $percent<250){
                    $class .= ' percent150p250 ';
                }elseif(  $percent>=250){
                    $class .= ' percent250p ';
                }
                break;
        }
        return $class;
    }

}
