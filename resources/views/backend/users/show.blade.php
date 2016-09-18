@extends('backend.layout')

@section('content')

<section class='content-header'>
    <h1>User Profile</h1>
    <i class="fa fa-home fa-fw fa-lg home-icon"></i>
    {!! Breadcrumbs::render('profile', Auth::user()) !!}
</section>

<section class='content-data' id='user-profile'>
    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-user fa-fw"></i>
                        Profile review...
                        <span class="pull-right">
                            <a class="collapseTrigger" data-toggle="collapse" href="#collapseUserProfile"></a>
                        </span>
                    </h3>
                </div>

                <div id="collapseUserProfile" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="text-center mbl">
                                    <img class="img-circle img-bor" alt="profile photo" src="{{$userData['avatar'] or ''}}" />
                                </div>
                            </div>
                            <div class="profile-data">
                                <h2>{{$userData['full_name'] or ''}}</h2>
                                <span class="email">{{$userData['email'] or ''}}</span>
                            </div>
                            <div class="social-data">
                                <div class="wrapper">
                                    <a class="fb fade-icon" target="_blank" href="{{$userData['facebook'] or ''}}">
                                        <i class="fa fa-facebook fa-lg fa-fw"></i>
                                    </a>
                                    <a class="gp" target="_blank" href="{{$userData['googlePlus'] or ''}}">
                                        <i class="fa fa-google-plus fa-lg fa-fw"></i>
                                    </a>
                                    <a class="li" target="_blank" href="{{$userData['linkedIn'] or ''}}">
                                        <i class="fa fa-linkedin fa-lg fa-fw"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-primary">Company:</td>
                                        <td>{{$userData['company'] or ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary">Email:</td>
                                        <td>{{$userData['email'] or ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary">Country:</td>
                                        <td>{{$userData['country'] or ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary">City:</td>
                                        <td>{{$userData['city'] or ''}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop