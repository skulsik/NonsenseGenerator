<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerationPostRequest;
use App\Models\TextModel;
use App\Services\GeneratorText;
use Illuminate\Http\Request;

class GeneratorTextController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function generation_text(GenerationPostRequest $request)
    {
        // Получает количество предложений
        $num_sentences = $request->input('num_sentences');

        // Класс генерации кастомного текста
        $generator = new GeneratorText($num_sentences);
        $text = $generator->generation_text();

        // Количество записей текст-донор
        $count = $generator->get_count_text();

        return view('home', ['count_text' => $count, 'text' => $text]);
    }
}
