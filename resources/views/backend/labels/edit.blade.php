@extends('backend.layout')

@section('content')

    <!--<section class='content-header'>
        <h1>Update company record</h1>
        <i class="fa fa-home fa-fw fa-lg home-icon"></i>
        {!! Breadcrumbs::render('company-edit', Auth::user()) !!}
    </section> -->

    <section class='content-data' id='company-update'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-user fa-fw"></i>
                            Update Company...
                             <span class="pull-right">
                                <a class="collapseTrigger" data-toggle="collapse" href="#collapseCompanyUpdate"></a>
                            </span>
                        </h3>
                    </div>
                    <div id="collapseCompanyUpdate" class="panel-collapse collapse in">
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

                            <div class="section-title"><h3>Account details for company: {{$company->name}}</h3></div>
                            {!! Form::model($company, array('method' => 'patch', 'files' => true), ['id' => 'update-company-form', 'class' => 'cuf']) !!}

                            {!! Form::hidden('companyId', $company->id, array('id' => 'company-id')) !!}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Logo<span class="text-danger rq">*</span></label>
                                <div class="fileinput col-lg-6">
                                    <div class="fileinput-thumbnail">
                                        <img id="logo-holder" src="
                                            @if (!empty($company->getLogoImage()))
                                                {{$company->getLogoImage()}}
                                            @else
                                                '/images/200x150.png'
                                            @endif
                                        "/>
                                    </div>
                                    <div class="fileinput-upl">
                                        {!! Form::file('logo', array('id' => 'logo-upl')) !!}
                                        <span class="btn btn-primary btn-file">
                                            Update Logo
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-building-o fa-fw"></i></div>
                                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
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
                                    <label class="col-lg-2 control-label">Address<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></div>
                                            {!! Form::text('address', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Bulstat<span class="text-danger rq"></span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-ellipsis-h fa-fw"></i></div>
                                            {!! Form::text('bulstat', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">MOL<span class="text-danger rq"></span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                                            {!! Form::text('mol', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Description<span class="text-danger rq"></span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-text-width fa-fw"></i></div>
                                            {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
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
                                {!! Form::submit('Update', array('id' => 'update-company-btn', 'class' => 'btn btn-primary')) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div id="logoFileTypeModal" class="modal fade" tabindex="-1" role="dialog">
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

    <div id="logoFileReaderNS" class="modal fade" tabindex="-1" role="dialog">
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