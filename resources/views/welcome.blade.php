@extends('layouts.common', [
    'style_files' => [
        '/assets/datatables/css/datatables.min.css',
    ],
    'script_files' => [
        '/assets/datatables/js/datatables.min.js',
    ]
])

@section('content')
    <div class="container"></div>
    <h3 class="text-center">Товары и услуги<hr></h3>

    @include('widgets.messages')

    <div class="col-md-12 gap-footer">
        {!! $dataTable->table(['id' => 'personTable', 'class' => 'row-border table-striped table dataTable no-footer']) !!}
    </div>
@endsection

@section('javaScriptBlock')
    <script>
    </script>
@endsection