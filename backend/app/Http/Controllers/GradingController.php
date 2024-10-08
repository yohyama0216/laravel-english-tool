<?php

namespace App\Http\Controllers;

use App\Models\Data\InputSentencePair;
use App\Models\Sentence;
use App\Models\Setting;

use App\Services\GradingService;
use App\Services\SentenceService;
use App\Services\SettingService;
use App\Services\LearningHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradingController extends Controller
{
    protected $gradingService;
    protected $sentenceService;
    protected $settingService;
    protected $learningHistoryService;

    public function __construct(
        GradingService $gradingService,
        SentenceService $sentenceService,
        SettingService $settingService,
        LearningHistoryService $learningHistoryService
    )
    {
        $this->gradingService = $gradingService;
        $this->sentenceService = $sentenceService;
        $this->settingService = $settingService;
        $this->learningHistoryService = $learningHistoryService;
    }

    public function checkSentence(Request $request)
    {
        // requestオブジェクトのラッパー作れる？
        $input = $request->input('user_input');
        $sentenceId = $request->input('sentence_id');
        $sentence = $this->sentenceService->findBySentenceId($sentenceId);

        $inputSentencePair = new InputSentencePair($input,$sentence);
        // 入力の判定処理をサービスクラスに委譲
        $gradingResult = $this->gradingService->gradeInputSentencePair($inputSentencePair);
        // 学習履歴の追加処理をサービスクラスに委譲
        $this->learningHistoryService->addLearningHistory(Auth::user(), $gradingResult);
        
        if ($gradingResult->getResult()) {
            return response()->json(['success' => true, 'message' => 'Collect']);
        } else {
            return response()->json(['success' => false, 'message' => 'Incorrect, try again.']);
        }

    }
}
