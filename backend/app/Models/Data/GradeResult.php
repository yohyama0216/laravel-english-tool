<?php

namespace App\Models\Data;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sentence;

class GradeResult
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
}
