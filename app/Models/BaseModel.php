<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * 隐藏某些属性(大小写一致)
     *
     * @var array
     */
    protected $hidden = ['EMPTY1', 'EMPTY2', 'EMPTY3', 'EMPTY4', 'EMPTY5'];
}
