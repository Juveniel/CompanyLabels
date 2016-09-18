@extends('backend.layout')

@section('content')


<section class='content-header'>
    <h1>User List</h1>
    <i class="fa fa-home fa-fw fa-lg home-icon"></i>
    {!! Breadcrumbs::render('users') !!}
</section>

<section class='content-data' id='user-list'>
    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-users fa-fw"></i>
                        User list...
                        <span class="pull-right">
                            <a class="collapseTrigger" data-toggle="collapse" href="#collapseUserList"></a>
                        </span>
                    </h3>
                </div>


                <div id="collapseUserList" class="panel-collapse collapse in">
                    <div class="panel-body">

                        @if(Session::has('user_deleted'))
                            <div class="alert alert-success">
                                {{ Session::get('user_deleted') }}
                            </div>
                        @endif

                        <div id="user-list-tb-wrapp">
                            <div class="row user-list">
                                <div class="col-xs-12">
                                    <table  id="user-list-tb" class="table dataTable table-striped table-bordered no-footer" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Company</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User E-mail</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>Created At</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->getCompanyName()}}</td>
                                                    <td>{{$user->first_name}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->country}}</td>
                                                    <td>{{$user->city}}</td>
                                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                                    <td class="options">

                                                        @if ($user->hasRole('Administrator'))
                                                            Protected
                                                        @else
                                                            <a href="/admin/users/{{$user->id}}" data-toggle="tooltip" title="View profile" data-placement="bottom">
                                                                <i class="fa fa-fw fa-eye text-primary"></i>
                                                            </a>
                                                            <a href="/admin/users/edit/{{$user->id}}" data-toggle="tooltip" title="Edit user" data-placement="bottom">
                                                                <i class="fa fa-fw fa-pencil text-warning"></i>
                                                            </a>
                                                            <a href="/admin/users/delete/{{$user->id}}" data-toggle="tooltip" title="Delete user" data-placement="bottom">
                                                                <i class="fa fa-fw fa-times text-danger"></i>
                                                            </a>
                                                        @endif

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