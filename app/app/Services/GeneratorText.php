<?php

namespace App\Services;

use App\Models\TextModel;

class GeneratorText
{
    public function __construct($num_sentences)
    {
        $this->list_text = TextModel::all();
        $this->count_text_obj = TextModel::count();
        $this->num_sentences = $num_sentences;

        // Формирует один большой массив из предложений, изначально разбив каждый текст на предложения
        $list_text_modified = [];
        foreach ($this->list_text as $text)
        {
            // Разбивает текст на предложения
            $text_modified = preg_split('/(?<=[.?!])\s+(?=[а-я])/i', $text->text);
            // Собирает массив из предложений
            $list_text_modified = array_merge($list_text_modified, $text_modified);
        }

        $this->list_text_modified = $list_text_modified;
        // Количество предложений всего
        $this->count_sentences = count($list_text_modified);
    }

    public function generation_text()
    {
        $new_text = '';
        // Количество предложений, который ввел пользователь
        while($this->num_sentences > 0)
        {
            // Рандомно выбирается предложение и приклеивается к тексту
            $new_text .= ' '.$this->list_text_modified[rand(0, $this->count_sentences-1)];
            $this->num_sentences--;
        }
        return $new_text;
    }

    public function get_count_text()
    {
        return $this->count_text_obj;
    }
}
