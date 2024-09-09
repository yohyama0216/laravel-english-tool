<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // すべてのSentenceレコードを取得し、ビューに渡す
        $sentences = Sentence::all();
        return view('sentences.index', compact('sentences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 新規作成フォームを表示するビューを返す
        return view('sentences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // フォームのバリデーション
        $validated = $request->validate([
            'sentence' => 'required|string',
            'difficulty' => 'required|integer|min:1|max:5',
            'word_count' => 'required|integer',
        ]);

        // 新しいSentenceを作成して保存
        Sentence::create($validated);

        // 一覧ページにリダイレクト
        return redirect()->route('sentences.index')->with('success', 'Sentence created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function show(Sentence $sentence)
    {
        // 特定のSentenceレコードを表示するビューを返す
        return view('sentences.show', compact('sentence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function edit(Sentence $sentence)
    {
        // 編集フォームを表示するビューを返す
        return view('sentences.edit', compact('sentence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentence $sentence)
    {
        // フォームのバリデーション
        $validated = $request->validate([
            'sentence' => 'required|string',
            'difficulty' => 'required|integer|min:1|max:5',
            'word_count' => 'required|integer',
        ]);

        // Sentenceを更新
        $sentence->update($validated);

        // 一覧ページにリダイレクト
        return redirect()->route('sentences.index')->with('success', 'Sentence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sentence $sentence)
    {
        // Sentenceを削除
        $sentence->delete();

        // 一覧ページにリダイレクト
        return redirect()->route('sentences.index')->with('success', 'Sentence deleted successfully.');
    }
}
