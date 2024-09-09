<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',      // ユーザーID
        'subject',      // 学習した科目やトピック
        'description',  // 学習内容の詳細
        'learned_at',   // 学習日時
    ];
}
