<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル名
     *
     * @var string
     */
    protected $table = 'sentences';

    /**
     * テーブルの主キー列名
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * モデルに対して割り当て可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'sentence',
        'difficulty',
        'word_count',
    ];
}
