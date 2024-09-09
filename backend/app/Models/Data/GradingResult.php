<?php

namespace App\Models\Data;

use App\Models\Sentence;

class GradingResult
{
    private InputSentencePair $inputSentencePair;
    private string $result;

    public function __construct(InputSentencePair $inputSentencePair, string $result)
    {
        $this->inputSentencePair = $inputSentencePair;
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getInputSentencePair()
    {
        return $this->inputSentencePair;
    }
}
