<?php

namespace App\Services;

use App\Models\Data\GradingResult;
use App\Models\Data\InputSentencePair;

class GradingService
{

    public function gradeInputSentencePair(InputSentencePair $inputSentencePair): GradingResult
    {       
        $percent = floor($inputSentencePair->getSimilarPercent());
        $message = $this->getMessageByPercent($percent);
        return new GradingResult($inputSentencePair,'score:'.$percent.' 「'.$message.'」');
    }

    private function getMessageByPercent(int $percent)
    {
        if ($percent > 90) {
            return '正解';
        } else if ($percent > 70) {
            return 'だいたいOK';
        } else if ($percent > 50) {
            return '少しOK';
        } else {
            return 'まだまだ';
        }
    }
}
