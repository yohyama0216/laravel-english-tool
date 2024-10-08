<?php

namespace App\Models\Data;

use App\Models\Sentence;

class InputSentencePair
{
    private string $input;
    private Sentence $sentence;

    public function __construct(string $input, Sentence $sentence)
    {
        $this->input = $input;
        $this->sentence = $sentence;
    }

    public function getInput()
    {
        return $this->input;
    }

    public function getSentence()
    {
        return $this->sentence;
    }
}
