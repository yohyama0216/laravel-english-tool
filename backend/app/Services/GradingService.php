<?php

namespace App\Services;

use App\Models\Data\GradingResult;
use App\Models\Data\InputSentencePair;
use App\Models\Data\LearningSessionResult;
use App\Models\Sentence;
use App\Models\Setting;

class GradingService
{

    // 一問ずつ判定
    public function gradeInputSentencePair(InputSentencePair $inputSentencePair): GradingResult
    {
        // もっとスマートにしたい
        $input = $inputSentencePair->getInput();
        $sentence = $inputSentencePair->getSentence();
        $input_str_utf8 = mb_convert_encoding($input, 'UTF-8');
        $sentence_str_utf8 = mb_convert_encoding($sentence->sentence, 'UTF-8');
        $percent = $inputSentencePair->getSimilarPercent();
        // inputsentencepairを使えばいい？
        return new GradingResult($input,$sentence,$percent);
    }
}
