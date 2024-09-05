<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use App\Models\LearningHistory;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    /**
     * ランダムに1つの文を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // ランダムに1つの文を取得
        $sentence = Sentence::inRandomOrder()->first();

        return view('learning.show', compact('sentence'));
    }

    /**
     * ユーザーの入力をチェックし、結果に応じて処理を行う
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        // フォームから送信されたデータを取得
        $input = $request->input('user_input');
        $sentenceId = $request->input('sentence_id');

        // 表示された文を取得
        $sentence = Sentence::findOrFail($sentenceId);

        // 入力が正しいかをチェック
        if ($input === $sentence->sentence) {
            // 学習履歴に追加
            LearningHistory::create([
                'user_id' => 1,//auth()->id(),  // 認証済みユーザーのIDを使用
                'subject' => 'Sentence Learning',
                'description' => $sentence->sentence,
                'learned_at' => now(),
            ]);

            // 再度ランダムな文を表示
            return redirect()->route('learning.show')->with('success', 'Correct! Try another sentence.');
        }

        // 入力が間違っている場合、エラーメッセージを表示
        return redirect()->route('learning.show')->with('error', 'Incorrect! Please try again.');
    }
}
