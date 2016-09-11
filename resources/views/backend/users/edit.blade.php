@extends('backend.layout')

@section('content')

    <section class='content-header'>
        <h1>Update user record</h1>
        <i class="fa fa-home fa-fw fa-lg home-icon"></i>
        {!! Breadcrumbs::render('user-edit', Auth::user()) !!}
    </section>

    <section class='content-data' id='user-create'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-user fa-fw"></i>
                            Update User...
                             <span class="pull-right">
                                <a class="collapseTrigger" data-toggle="collapse" href="#collapseUserUpdate"></a>
                            </span>
                        </h3>
                    </div>
                    <div id="collapseUserUpdate" class="panel-collapse collapse in">
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

                            @if(Session::has('record_updated'))
                                <div class="alert alert-success">
                                    {{ Session::get('record_updated') }}
                                </div>
                            @endif

                            <div class="section-title"><h3>Account details for user: {{$user->username}}</h3></div>
                            {!! Form::model($user, array('method' => 'patch', 'files' => true), ['id' => 'update-user-form', 'class' => 'cuf']) !!}

                            {!! Form::hidden('userId', $user->id, array('id' => 'user-id')) !!}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Avatar<span class="text-danger rq">*</span></label>
                                <div class="fileinput col-lg-6">
                                    <div class="fileinput-thumbnail">
                                        <img id="avatar-holder" src="
                                            @if (!empty($user->getAvatarImage()))
                                                {{$user->getAvatarImage()}}
                                            @else
                                                '/images/200x150.png'
                                            @endif
                                        "/>
                                    </div>
                                    <div class="fileinput-upl">
                                        {!! Form::file('avatar', array('id' => 'avatar-upl')) !!}
                                        <span class="btn btn-primary btn-file">
                                            Update Image
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
                                <label class="col-lg-2 control-label">User group<span class="text-danger rq">*</span></label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        {!! Form::select('user_role', $roles, $user->getRole(), array('id' => 'sl_roles','class' => 'form-control')) !!}
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
                                        {!! Form::select('country', $countries, $user->country, array('id' => 'sl_country','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">City</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-flag fa-fw"></i></div>
                                        {!! Form::select('city', $cities, $user->city, array('id' => 'sl_city', 'class' => 'form-control'))!!}
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
                                        {!! Form::text('linked_in', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Google+</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-google-plus fa-fw"></i></div>
                                        {!! Form::text('google_plus', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-offset-2 col-lg-10">
                                {!! Form::submit('Update', array('id' => 'create-user-btn', 'class' => 'btn btn-primary')) !!}
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