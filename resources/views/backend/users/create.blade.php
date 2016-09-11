@extends('backend.layout')

@section('content')

    <section class='content-header'>
        <h1>Create a new user</h1>
        <i class="fa fa-home fa-fw fa-lg home-icon"></i>
        {!! Breadcrumbs::render('register', Auth::user()) !!}
    </section>

    <section class='content-data' id='user-create'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-user fa-fw"></i>
                            Add new User...
                             <span class="pull-right">
                                <a class="collapseTrigger" data-toggle="collapse" href="#collapseUserCreate"></a>
                            </span>
                        </h3>
                    </div>

                    <div id="collapseUserCreate" class="panel-collapse collapse in">
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

                            <div class="section-title"><h3>Account details</h3></div>
                            {!! Form::open(array('method' => 'post', 'files' => true), ['id' => 'create-user-form', 'class' => 'cuf']) !!}

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Avatar<span class="text-danger rq">*</span></label>
                                    <div class="fileinput col-lg-6">
                                        <div class="fileinput-thumbnail">
                                            {{ Html::image('images/200x150.png',null,array('id' => 'avatar-holder')) }}
                                        </div>
                                        <div class="fileinput-upl">
                                            {!! Form::file('avatar', array('id' => 'avatar-upl')) !!}
                                            <span class="btn btn-primary btn-file">
                                                Select Image
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></div>
                                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
                                            {!! Form::password('password', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Confirm password<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
                                            {!! Form::password('password_confirmation', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">User group<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            {!! Form::select('user_role', $roles, array(), array('id' => 'sl_roles','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="section-title"><h3>Personal Information</h3></div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">First name</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-md fa-fw"></i></div>
                                            {!! Form::text('first_name', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Last name</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-md fa-fw"></i></div>
                                            {!! Form::text('last_name', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Country</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-globe fa-fw"></i></div>
                                            {!! Form::select('country', $countries, array(), array('id' => 'sl_country','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">City</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-flag fa-fw"></i></div>
                                            {!! Form::select('city',array('-1' => '--- Select a country first ---'),array(), array('id' => 'sl_city', 'class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="section-title"><h3>Social accounts</h3></div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Facebook</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-facebook fa-fw"></i></div>
                                            {!! Form::text('facebook', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">LinkedIn</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-linkedin fa-fw"></i></div>
                                            {!! Form::text('linkedin', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Google+</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-google-plus fa-fw"></i></div>
                                            {!! Form::text('googleplus', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-offset-2 col-lg-10">
                                    {!! Form::submit('Create', array('id' => 'create-user-btn', 'class' => 'btn btn-primary')) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div id="avatarFileTypeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Warning</h4>
                </div>
                <div class="modal-body">
                    <p>Please select only images!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="avatarFileReaderNS" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Warning</h4>
                </div>
                <div class="modal-body">
                    <p>Your browser does not support FileReader and you cannot preview your avatar.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@stop