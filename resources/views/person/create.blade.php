@extends('layouts.common')

@section('content')
	<div class="container">
		<div class="col-md-12 col-md-offset-0">
			{{ Form::open(['route' => 'person.store', 'class' => 'form-horizontal']) }}

			<div class="btn-group pull-right">
				<button class="btn btn-primary" type="submit">Сохранить</button>
				<a class="btn btn-default" href="{{ route('person.index') }}">Отменить</a>
			</div>
			<h2 class="">Создать новый контакт</h2><hr>

			@include('person._form')

			{{ Form::close() }}
		</div>
	</div>
@endsection
