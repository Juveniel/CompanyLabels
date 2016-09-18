@extends('backend.layout')

@section('content')

    <section class='content-header'>
        <h1>Attach a new label template</h1>
        <i class="fa fa-home fa-fw fa-lg home-icon"></i>
        {!! Breadcrumbs::render('label-create', Auth::user()) !!}
    </section>

    <section class='content-data' id='label-template-create'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-user fa-fw"></i>
                            Attach new Label Template...
                             <span class="pull-right">
                                <a class="collapseTrigger" data-toggle="collapse" href="#collapseTemplateCreate"></a>
                            </span>
                        </h3>
                    </div>

                    <div id="collapseTemplateCreate" class="panel-collapse collapse in">
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

                            <div class="section-title"><h3>Template details</h3></div>
                            {!! Form::open(array('method' => 'post', 'files' => true), ['id' => 'create-label-templates-form', 'class' => 'cuf']) !!}

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Image<span class="text-danger rq">*</span></label>
                                    <div class="fileinput col-lg-6">
                                        <div class="fileinput-thumbnail">
                                            {{ Html::image('images/200x150.png',null,array('id' => 'label-template-holder')) }}
                                        </div>
                                        <div class="fileinput-upl">
                                            {!! Form::file('image', array('id' => 'label-template-upl')) !!}
                                            <span class="btn btn-primary btn-file">
                                                Select Image
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Title<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-building-o fa-fw"></i></div>
                                            {!! Form::text('title', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Description<span class="text-danger rq">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-building-o fa-fw"></i></div>
                                            {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-offset-2 col-lg-10">
                                    {!! Form::submit('Add', array('id' => 'create-label-template-btn', 'class' => 'btn btn-primary')) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div id="labelTemplateFileTypeModal" class="modal fade" tabindex="-1" role="dialog">
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

    <div id="labelTemplateFileReaderNS" class="modal fade" tabindex="-1" role="dialog">
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