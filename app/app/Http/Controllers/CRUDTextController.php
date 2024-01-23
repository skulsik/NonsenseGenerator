<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextFormPostRequest;
use App\Models\TextModel;
use Illuminate\Http\Request;

class CRUDTextController extends Controller
{
    // Отображение формы для создания текста
    public function form_create_text()
    {
        return view('form_text');
    }

    // Создание текста
    public function create_text(TextFormPostRequest $request)
    {
        // Создает запись в бд (Текст)
        $text_obj = new TextModel();
        $text_obj->title = $request->input('title');
        $text_obj->slug = str_replace(' ', '_', $request->input('title'));
        $text_obj->text = $request->input('text');
        $text_obj->user_id = auth()->id();
        $text_obj->save();
        return redirect()->route('list_text');
    }

    // Удаление текста
    public function delete_text($id)
    {
        $text = TextModel::find($id);
        $text->delete();
        return redirect()->route('list_text');
    }

    // Отображение формы для обновления текста
    public function form_update_text($id)
    {
        $text = TextModel::find($id);
        return view('form_text', ['text' => $text, 'text_id' => $id]);
    }

    // Обновление текста
    public function update_text(TextFormPostRequest $request)
    {
        $text_obj = TextModel::find($request->input('id'));
        $text_obj->title = $request->input('title');
        $text_obj->slug = str_replace(' ', '_', $request->input('title'));
        $text_obj->text = $request->input('text');
        $text_obj->save();
        return redirect()->route('list_text');
    }

    // Список "текста"
    public function list_text()
    {
        $all_text = TextModel::orderBy('id')->get();
        return view('list_text', ['all_text' => $all_text]);
    }
}
