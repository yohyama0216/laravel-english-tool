<?php

namespace App\Services;

use App\Models\LearningHistory;
use App\Models\Sentence;
use App\Models\User;

class LearningHistoryService
{
    /**
     * 学習履歴にデータを追加する
     *
     * @param int $userId
     * @param Sentence $sentence
     * @return LearningHistory
     */
    public function addLearningHistory(User $user, Sentence $sentence): LearningHistory
    {
        return LearningHistory::create([
            //'user_id' => $user->id,
            'subject' => 'Sentence Learning',
            'description' => $sentence->sentence,
            'learned_at' => now(),
        ]);
    }
}
