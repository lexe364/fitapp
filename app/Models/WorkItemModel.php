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
    ];

    public static function get_all() {
        return self::query()->get()->all();
    }


}
