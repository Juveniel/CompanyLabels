@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Внимание!</strong>
        Възникнаха грешки с въведената от вас информация.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif