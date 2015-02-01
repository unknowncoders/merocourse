@extends('layouts.default')

@section('title')
    Admin Dashboard
@stop

@section('header')

@stop

@section('content')

<h3>Admin Dashboard</h3>

<li> {{ link_to("/admin/users","Users") }} </li>
<li> {{ link_to("/admin/faculty","Faculty") }} </li>
<li> {{ link_to("/admin/subjects","Subjects") }} </li>
<li> {{ link_to("/admin/reviews","Reviews") }} </li>

@stop


