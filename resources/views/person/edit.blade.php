@extends('layouts.common')

@section('content')
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            {{ Form::model($person, ['route' => ['person.update', $person->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

            <div class="btn-group pull-right">
                <button class="btn btn-primary" type="submit">Сохранить</button>
                <a class="btn btn-default" href="{{ route('person.index') }}">Отменить</a>
            </div>
            <h2 class="">Контакт</h2><hr>

            @include('person._form')

            {{ Form::close() }}
        </div>
    </div>
@endsection

