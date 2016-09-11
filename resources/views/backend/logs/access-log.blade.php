@extends('backend.layout')

@section('content')

    <section class='content-header'>
        <h1>Access Log</h1>
        <i class="fa fa-home fa-fw fa-lg home-icon"></i>
        {!! Breadcrumbs::render('access-log', Auth::user()) !!}
    </section>

    <section class='content-data' id='logs-list'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-user fa-fw"></i>
                            Access log...
                             <span class="pull-right">
                                <a class="collapseTrigger" data-toggle="collapse" href="#collapseAccessLog"></a>
                            </span>
                        </h3>
                    </div>

                    <div id="collapseAccessLog" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 sidebar">
                                        <h1><i class="fa fa-calendar" aria-hidden="true"></i> Access Log Viewer</h1>
                                        <div class="list-group">
                                            @foreach($files as $file)
                                                <a href="?l={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                                                    {{$file}}
                                                    <a class="btn btn-sc btn-danger" id="delete-log" href="?del={{ base64_encode($current_file) }}"><i class="fa fa-trash"></i></a>
                                                    <a class="btn btn-sc btn-success" href="?dl={{ base64_encode($current_file) }}"><i class="fa fa-download"></i></a>

                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 table-container">
                                        @if ($logs === null)
                                            <div>
                                                Log file >50M, please download it.
                                            </div>
                                        @else
                                            <table id="table-log" class="table dataTable table-striped table-bordered no-footer" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Level</th>
                                                        <th>Date</th>
                                                        <th>Content</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($logs as $key => $log)
                                                    <tr>
                                                        <td class="text-{{$log['level_class']}}"><i class="fa fa-{{$log['level_img']}}" aria-hidden="true"></i> &nbsp;{{$log['level']}}</td>
                                                        <td class="date">{{$log['date']}}</td>
                                                        <td class="text">
                                                            @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{$key}}"><i class="fa fa-search fa-fw"></i></a>@endif
                                                            {{$log['text']}}
                                                            @if (isset($log['in_file'])) <br />{{$log['in_file']}}@endif
                                                            @if ($log['stack']) <div class="stack" id="stack{{$key}}" style="display: none; white-space: pre-wrap;">{{ trim($log['stack']) }}</div>@endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


@stop