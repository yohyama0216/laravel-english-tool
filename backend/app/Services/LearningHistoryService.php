<?php

namespace App\Services;

use App\Models\LearningHistory;
use App\Models\Sentence;

class LearningHistoryService
{
    /**
     * 学習履歴にデータを追加する
     *
     * @param int $userId
     * @param Sentence $sentence
     * @return LearningHistory
     */
    public function addLearningHistory(int $userId, Sentence $sentence): LearningHistory
    {
        return LearningHistory::create([
            'user_id' => $userId,
            'subject' => 'Sentence Learning',
            'description' => $sentence->sentence,
            'learned_at' => now(),
        ]);
    }
}
