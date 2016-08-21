@extends('front.layout')

@section('body-class', 'homepage')

@section('content')
<div class="login-container login-widget white-bg">
    <header>
        <h1>Корпоративен вход</h1>
    </header>

    @include('front.partials.errors')

    {!! Form::open(['class' => 'login-form']) !!}

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
        <div class="checkbox squaredTwo">
            <input type="checkbox" id="c1" name="remember" />
            <label for="c1">
                <span></span>
                Запомни ме
            </label>
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Вход',['class' => 'blue-button']) !!}
    </div>

    {!! Form::close() !!}

</div>
@stop