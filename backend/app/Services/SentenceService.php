<?php

namespace App\Services;

use App\Models\Sentence;
use App\Models\Setting;

class SentenceService
{
    public function findBySentenceId(int $sentenceId)
    {
        return Sentence::findOrFail($sentenceId);
    }
    
    public function getSentencesBySetting(Setting $setting): Sentence
    {
        //$limit = $setting->count;
        //return Sentence::inRandomOrder()->limit($limit);
        return Sentence::inRandomOrder()->first();
    }
}
