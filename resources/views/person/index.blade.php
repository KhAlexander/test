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
    <h3 class="text-center">Адресная книга<hr></h3>

    @include('widgets.messages')

    <div class="col-md-12 gap-footer">
        {!! $dataTable->table(['id' => 'personTable', 'class' => 'row-border table-striped table dataTable no-footer']) !!}
    </div>

    @include('person.delete')
@endsection

@section('javaScriptBlock')
    {!! $dataTable->scripts() !!}
    <script>
        function openEditRow(data) {
            if (data) {
                var id = data.id;
                if (id) {
                    window.location = ('{{ route('person.edit', ':id') }}').replace(':id', id);
                }
            }
        }

        $( function () {
            var table = $('#personTable').DataTable()
                .on( 'user-select', function ( e, dt, type, cell, originalEvent ) {
                    // disable unselect row
                    if ( $(cell.node()).closest('tr').hasClass('selected') ) {
                        e.preventDefault();
                    }
                });

            // Create row
            $('.dataTables_wrapper .create-row').click( function () {
                window.location.href = '{{ route('person.create') }}';
            });

            // Edit row
            $('#personTable tbody').on("dblclick",'tr', function (e) {
                console.log('tut');
                var data = table.row( this ).data();
                openEditRow(data);
            });

            $('.dataTables_wrapper .edit-row').click( function() {
                var data = table.row( '.selected' ).data();
                openEditRow(data);
            });

            // Delete row
            $('.dataTables_wrapper .delete-row').click( function() {
                var row = table.row('.selected');

                if (row.length > 0) {
                    $('#deletePersonAlert form').attr('action',
                        ('{{ route('person.destroy', ':id') }}').replace(':id', row.data().id));
                    $('#deletePersonAlert .alert-message b').text(row.data().name);
                    $('#deletePersonAlert').modal('show');
                }
            });
        })
    </script>
@endsection