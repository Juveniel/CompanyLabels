@extends('backend.layout')

@section('content')

    <section class='content-header'>
        <h1>Site Settings</h1>
        <i class="fa fa-home fa-fw fa-lg home-icon"></i>
        {!! Breadcrumbs::render('settings') !!}
    </section>

    <section class='content-data' id='settings-panel'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-cogs fa-fw"></i>
                            Update Site Settings...
                            <span class="pull-right">
                                <a class="collapseTrigger" data-toggle="collapse" href="#collapseSiteSettings"></a>
                            </span>
                        </h3>
                    </div>
                    <div id="collapseSiteSettings" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="errors">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            @if(Session::has('settings_updated'))
                                <div class="alert alert-success">
                                    {{ Session::get('settings_updated') }}
                                </div>
                            @endif

                            {!! Form::model($settings, array('method' => 'patch'), ['id' => 'update-settings-form']) !!}

                            <div class="section-title"><h3>General settings</h3></div>

                            <div class="form-group">
                                    <label class="col-lg-2 control-label">Site title:<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-md fa-fw"></i></div>
                                            {!! Form::text('site_title',null ,array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Site meta description:<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></div>
                                            {!! Form::textarea('site_meta_description', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Site meta keywords:<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></div>
                                            {!! Form::textarea('site_meta_keywords', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Site url:<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-md fa-fw"></i></div>
                                            {!! Form::text('site_url',null ,array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Site email:<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-md fa-fw"></i></div>
                                            {!! Form::text('site_email',null ,array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-offset-2 col-lg-10">
                                    {!! Form::submit('Update', array('id' => 'update-settings-btn', 'class' => 'btn btn-primary')) !!}
                                </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop