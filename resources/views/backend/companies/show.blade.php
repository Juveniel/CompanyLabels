@extends('backend.layout')

@section('content')

<section class='content-header'>
    <h1>Company Profile</h1>
    <i class="fa fa-home fa-fw fa-lg home-icon"></i>
    {!! Breadcrumbs::render('company-profile', $companyData['id']) !!}
</section>

<section class='content-data' id='company-profile'>
    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-user fa-fw"></i>
                        Company profile preview...
                        <span class="pull-right">
                            <a class="collapseTrigger" data-toggle="collapse" href="#collapseCompanyProfile"></a>
                        </span>
                    </h3>
                </div>

                <div id="collapseCompanyProfile" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="text-center mbl">
                                    <img class="img-orig" alt="profile photo" src="{{$companyData['logo'] or ''}}" />
                                </div>
                            </div>
                            <div class="profile-data">
                                <h2>{{$companyData['name'] or ''}}</h2>
                                <span class="email">{{$companyData['email'] or ''}}</span>
                            </div>
                            <div class="social-data">
                                <div class="wrapper">
                                    <a class="fb fade-icon" target="_blank" href="{{$companyData['facebook'] or ''}}">
                                        <i class="fa fa-facebook fa-lg fa-fw"></i>
                                    </a>
                                    <a class="gp" target="_blank" href="{{$companyData['googlePlus'] or ''}}">
                                        <i class="fa fa-google-plus fa-lg fa-fw"></i>
                                    </a>
                                    <a class="li" target="_blank" href="{{$companyData['linkedIn'] or ''}}">
                                        <i class="fa fa-linkedin fa-lg fa-fw"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-primary">Email:</td>
                                        <td>{{$companyData['email'] or ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary">Bulstat:</td>
                                        <td>{{$companyData['bulstat'] or ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary">MOL:</td>
                                        <td>{{$companyData['mol'] or ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary">Description:</td>
                                        <td>{{$companyData['description'] or ''}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="company-users">
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
                        @foreach ($companyData['companyUsers'] as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

@stop