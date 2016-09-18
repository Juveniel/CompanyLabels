@extends('backend.layout')

@section('content')

<section class='content-header'>
    <h1>Label Templates List</h1>
    <i class="fa fa-home fa-fw fa-lg home-icon"></i>
    {!! Breadcrumbs::render('label-templates') !!}
</section>

<section class='content-data' id='label-templates-list'>
    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-users fa-fw"></i>
                        Label Templates list...
                        <span class="pull-right">
                            <a class="collapseTrigger" data-toggle="collapse" href="#collapseTemplatesList"></a>
                        </span>
                    </h3>
                </div>


                <div id="collapseTemplatesList" class="panel-collapse collapse in">
                    <div class="panel-body">

                        @if(Session::has('label_deleted'))
                            <div class="alert alert-success">
                                {{ Session::get('label_deleted') }}
                            </div>
                        @endif

                        <div id="templates-list-tb-wrapp">
                            @foreach ($templates as $template)
                                <div class="col col-sm-4">
                                    <div class="image">
                                        <img src=" {{$template->getTemplateImage()}}" alt="tempalte image" />
                                    </div>
                                    <div class="title">{{$template->title}}</div>
                                    <div class="description">{{$template->description}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@stop