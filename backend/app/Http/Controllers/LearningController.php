<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
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

    public function check(Request $request)
    {
        $input = $request->input('user_input');
        $sentenceId = $request->input('sentence_id');

        $sentence = Sentence::findOrFail($sentenceId);

        // 入力の判定処理をサービスクラスに委譲
        if ($this->sentenceService->isInputCorrect($input, $sentence)) {
            // 学習履歴の追加処理をサービスクラスに委譲
            $this->learningHistoryService->addLearningHistory(Auth::user(), $sentence);

            return redirect()->route('learning.show')->with('success', 'Correct! Try another sentence.');
        }

        return redirect()->route('learning.show')->with('error', 'Incorrect! Please try again.');
    }
}
