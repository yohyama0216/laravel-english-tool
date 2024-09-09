<?php

namespace App\Models\Data;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LearningSessionResult
{
    private int $score;
    private array $gradingResults;
    private DateTime $datetime;
}
