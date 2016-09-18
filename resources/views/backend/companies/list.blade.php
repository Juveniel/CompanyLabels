@extends('backend.layout')

@section('content')

<section class='content-header'>
    <h1>Companies List</h1>
    <i class="fa fa-home fa-fw fa-lg home-icon"></i>
    {!! Breadcrumbs::render('companies') !!}
</section>

<section class='content-data' id='user-list'>
    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-users fa-fw"></i>
                        Companies list...
                        <span class="pull-right">
                            <a class="collapseTrigger" data-toggle="collapse" href="#collapseCompaniesList"></a>
                        </span>
                    </h3>
                </div>


                <div id="collapseCompaniesList" class="panel-collapse collapse in">
                    <div class="panel-body">

                        @if(Session::has('company_deleted'))
                            <div class="alert alert-success">
                                {{ Session::get('company_deleted') }}
                            </div>
                        @endif

                        <div id="user-list-tb-wrapp">
                            <div class="row user-list">
                                <div class="col-xs-12">
                                    <table  id="company-list-tb" class="table dataTable table-striped table-bordered no-footer" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Company name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Bulstat</th>
                                                <th>MOL</th>
                                                <th>Created At</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($companies as $company)
                                                <tr>
                                                    <td>{{$company->id}}</td>
                                                    <td>{{$company->name}}</td>
                                                    <td>{{$company->email}}</td>
                                                    <td>{{$company->address}}</td>
                                                    <td>{{$company->bulstat}}</td>
                                                    <td>{{$company->mol}}</td>
                                                    <td>{{$company->created_at->diffForHumans()}}</td>
                                                    <td class="options">
                                                        <a href="/admin/companies/{{$company->id}}" data-toggle="tooltip" title="View company" data-placement="bottom">
                                                            <i class="fa fa-fw fa-eye text-primary"></i>
                                                        </a>
                                                        <a href="/admin/companies/edit/{{$company->id}}" data-toggle="tooltip" title="Edit company" data-placement="bottom">
                                                            <i class="fa fa-fw fa-pencil text-warning"></i>
                                                        </a>
                                                        <!--<a href="/admin/companies/delete/{{$company->id}}" data-toggle="tooltip" title="Delete company" data-placement="bottom">
                                                            <i class="fa fa-fw fa-times text-danger"></i>
                                                        </a>-->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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