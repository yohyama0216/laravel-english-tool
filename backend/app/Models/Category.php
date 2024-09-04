<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル名
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * モデルに対して割り当て可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
