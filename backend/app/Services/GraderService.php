<?php

namespace App\Services;

use App\Models\Data\GradeResult;
use App\Models\Data\InputSentencePair;
use App\Models\Data\LearningSessionResult;
use App\Models\Sentence;
use App\Models\Setting;

class GraderService
{

    // 一問ずつ判定
    public function gradeInputSentencePair(InputSentencePair $inputSentencePair): GradeResult
    {
        $input = $inputSentencePair->getInput();
        $sentence = $inputSentencePair->getSentence();
        $input_str_utf8 = mb_convert_encoding($input, 'UTF-8');
        $sentence_str_utf8 = mb_convert_encoding($sentence->sentence, 'UTF-8');
        $result = (trim($input_str_utf8) == trim($sentence_str_utf8));
        return new GradeResult($input,$sentence,$result);
    }

    // 一問ずつ判定して保存する想定。LearningResult必要ないのでは？
    public function grade(array $inputSentencePairCollection): LearningSessionResult
    {
        foreach($inputSentencePairCollection as $pair) {
            $gradeResults[] = $this->gradeInputSentencePair($pair);
        }

        return new LearningSessionResult($gradeResults);
    }
}
