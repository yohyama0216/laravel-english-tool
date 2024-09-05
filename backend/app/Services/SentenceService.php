<?php

namespace App\Services;

use App\Models\Sentence;

class SentenceService
{
    /**
     * 入力が正しいかどうかを判定する
     *
     * @param string $input
     * @param Sentence $sentence
     * @return bool
     */
    public function isInputCorrect(string $input, Sentence $sentence): bool
    {
        return $input === $sentence->sentence;
    }
}
