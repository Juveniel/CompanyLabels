<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('dashboard'));
});

// Home > Users
Breadcrumbs::register('users', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('users'));
});

// Home > Users > Profile
Breadcrumbs::register('profile', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Profile', route('profile', $user->id));
});

// Home > Users > Create
Breadcrumbs::register('register', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Create User', route('create', $user));
});

// Home > Users > Edit
Breadcrumbs::register('user-edit', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Update User', route('user-edit', $user));
});

//Home > Settings
Breadcrumbs::register('settings', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Settings', route('settings'));
});

//Home > Logs
Breadcrumbs::register('logs', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Logs', route('logs'));
});

// Home > Logs > Access
Breadcrumbs::register('access-log', function($breadcrumbs)
{
    $breadcrumbs->parent('logs');
    $breadcrumbs->push('Access Log', route('access-log'));
});