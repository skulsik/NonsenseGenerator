@extends('home')

@section('title')
    @if(empty($text))
        Создание текста, для генератора текста
    @else
        Обновление текста
    @endif
@endsection

@auth
    @section('content')

        <div class="container p-4">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 border border-dark rounded p-4">
                    <h3><i class="bi bi-card-text h3"></i><span class="ps-3">
                            @if(empty($text))
                                Создать текст
                            @else
                                Обновить текст
                            @endif
                        </span></h3>
                    <hr>
                    <form method="POST" action="@if(empty($text)){{ route('create_text') }}@else{{ route('update_text', ['id' => $text_id]) }}@endif" class="form-control p-3">
                        @csrf

                        @if($errors->any())
                            <div>
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Описание</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Описание" value="@if(!empty($text)){{ $text->title }}@endif">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="text" class="col-sm-2 col-form-label">Текст</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="text" name="text" placeholder="Введите сюда текст" rows="8">@if(!empty($text)){{ $text->text }}@endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-warning">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
@endauth
