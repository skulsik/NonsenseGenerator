@extends('home')

@section('title', 'Список всех записей с "текстом"')

@auth
    @section('content')

        <div class="container p-4">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 border border-dark rounded p-4">
                    <h3><i class="bi bi-card-text h3"></i><span class="ps-3">Список всех "текстов"</span></h3>
                    <hr>
                    @if(!empty($all_text[0]))
                        <table class="table">
                            @foreach($all_text as $text)
                                <tr>
                                    <td class="col-md-5">
                                        {{ $text->title }}
                                        <div class="modal fade" id="{{ $text->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $text->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{ $text->text }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col-md-9">
                                                            <span class="text-secondary">Автор текста:</span> {{ $text->owner->name }}
                                                        </div>
                                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Закрыть</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-md-5 text-center">
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#{{ $text->slug }}">
                                            <i class="bi bi-display text-light"></i><span class="ps-2">Посмотреть текст</span>
                                        </button>
                                    </td>
                                    <td class="col-md-1 text-center">
                                        <a href="{{ route('form_update_text', ['id' => $text->id]) }}" title="Обновить"><i class="bi bi-arrow-repeat text-primary h3"></i></a>
                                    </td>
                                    <td class="col-md-1 text-center">
                                        <div class="modal fade" id="{{ $text->slug }}del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Удаление текста</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Вы действительно хотите удалить текст <span class="text-primary">{{ $text->title }}</span>?</p>
                                                        <a href="{{ route('delete_text', ['id' => $text->id])}}" title="Удалить" class="btn btn-danger">Удалить</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="bi bi-trash3 text-danger h3 border-0 bg-light" data-bs-toggle="modal" data-bs-target="#{{ $text->slug }}del">
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="alert-dark rounded p-5">
                            <h5>Текст пока не добавлен, добавьте его скорее!</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    @endsection
@endauth
