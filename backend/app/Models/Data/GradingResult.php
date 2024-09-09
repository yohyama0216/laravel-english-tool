<?php

namespace App\Models\Data;

use App\Models\Sentence;

class GradingResult
{
    private string $input;
    private Sentence $sentence;
    private bool $result;

    public function __construct(string $input, Sentence $sentence, bool $result)
    {
        $this->input = $input;
        $this->sentence = $sentence;
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getSentence()
    {
        return $this->sentence;
    }
}
