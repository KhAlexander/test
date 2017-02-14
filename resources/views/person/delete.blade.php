<div id="deletePersonAlert" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('url' => route('person.destroy', ':id'), 'method' => 'delete')) !!}

            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Удалить контакт</h4>
            </div>
            <div class="modal-body">
                <p class="alert-message">Вы хотите удалить контакт <b>:name</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-danger">Удалить</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>