@extends('backend.layout')

@section('class', 'login-page')

@section('content')
<div class="login-container login-widget white-bg">
    <header>
        <h1>Вход</h1>
    </header>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            Въвели сте грешна или непълна информация.
        </div>
    @endif

    {!! Form::open(['url' => 'auth/login','class' => 'login-form']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                {!! Form::text('email', null, ['placeholder' => 'Потребителско име' ,'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
                {!! Form::password('password', ['placeholder' => 'Парола', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Вход',['class' => 'blue-button']) !!}
        </div>

    {!! Form::close() !!}

</div>
@stop