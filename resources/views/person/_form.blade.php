@include('widgets.errors')

<div class="row form-group">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            {!! Form::label('first_name', 'Имя',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            {!! Form::label('last_name', 'Фамилия',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
            {!! Form::label('company_name', 'Компания',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
            {!! Form::label('position', 'Должность',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('position', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('personal_email') ? ' has-error' : '' }}">
            {!! Form::label('personal_email', 'Личный email',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('personal_email', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('job_email') ? ' has-error' : '' }}">
            {!! Form::label('job_email', 'Рабочий email',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('job_email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('personal_phone') ? ' has-error' : '' }}">
            {!! Form::label('personal_phone', 'Телефон',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('personal_phone', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('job_phone') ? ' has-error' : '' }}">
            {!! Form::label('job_phone', 'Рабочий телефон',['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('job_phone', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>


