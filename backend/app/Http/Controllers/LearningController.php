<?php

namespace App\Http\Controllers;

use App\Models\Data\InputSentencePair;
use App\Models\Sentence;
use App\Models\Setting;

use App\Services\GraderService;
use App\Services\SentenceService;
use App\Services\SettingService;
use App\Services\LearningHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    protected $graderService;
    protected $sentenceService;
    protected $settingService;
    protected $learningHistoryService;

    public function __construct(
        GraderService $graderService,
        SentenceService $sentenceService,
        SettingService $settingService,
        LearningHistoryService $learningHistoryService
    )
    {
        $this->graderService = $graderService;
        $this->sentenceService = $sentenceService;
        $this->settingService = $settingService;
        $this->learningHistoryService = $learningHistoryService;
    }

    public function show()
    {
        $setting = new Setting();//$this->settingService->getSettingByUser(Auth::user());
        $sentence = $this->sentenceService->getSentencesBySetting($setting);
        return view('learning.show', compact('sentence'));
    }

    public function checkSentence(Request $request)
    {
        $input = $request->input('user_input');
        $sentenceId = $request->input('sentence_id');

        $sentence = Sentence::findOrFail($sentenceId);

        $inputSentencePair = new InputSentencePair($input,$sentence);
        // 入力の判定処理をサービスクラスに委譲
        $gradeResult = $this->graderService->gradeInputSentencePair($inputSentencePair);
        // 学習履歴の追加処理をサービスクラスに委譲
        //$this->learningHistoryService->addLearningHistory(Auth::user(), $gradeResult);
        if ($gradeResult->getResult()) {
            return response()->json(['success' => true, 'message' => 'Collect']);
        } else {
            return response()->json(['success' => false, 'message' => 'Incorrect, try again.']);
        }

    }
}
