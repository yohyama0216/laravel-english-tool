<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sentence;

class SentenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // サンプルデータの作成
        $sentences = [
            [
                'sentence' => 'これはサンプルの文です。',
                'difficulty' => 2,
                'word_count' => 5,
            ],
            [
                'sentence' => 'Laravelはとても便利なフレームワークです。',
                'difficulty' => 3,
                'word_count' => 7,
            ],
            [
                'sentence' => 'データベースシーディングを学ぶのは重要です。',
                'difficulty' => 4,
                'word_count' => 8,
            ],
            // 他のサンプルデータを追加できます
        ];

        // データベースに挿入
        foreach ($sentences as $sentence) {
            Sentence::create($sentence);
        }
    }
}
