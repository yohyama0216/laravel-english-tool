<?php

namespace App\Http\Controllers;

use App\Models\Data\InputSentencePair;
use App\Models\Sentence;
use App\Models\Setting;

use App\Services\SentenceService;
use App\Services\SettingService;
use App\Services\LearningHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    protected $sentenceService;
    protected $settingService;
    protected $learningHistoryService;

    public function __construct(
        SentenceService $sentenceService,
        SettingService $settingService,
        LearningHistoryService $learningHistoryService
    )
    {
        $this->sentenceService = $sentenceService;
        $this->settingService = $settingService;
        $this->learningHistoryService = $learningHistoryService;
    }

    public function show()
    {
        $setting = $this->settingService->getSettingByUser(Auth::user());
        $sentence = $this->sentenceService->getSentencesBySetting($setting);
        return view('learning.show', compact('sentence'));
    }
}
