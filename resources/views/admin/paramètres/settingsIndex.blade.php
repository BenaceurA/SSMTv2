@extends('admin/layout')


@section('main')

{{-- check if the admin is allowed to add users --}}
@if($add_user_perm == true)
    @include('/admin/paramètres/add_user_layout');
@endif
   
@endsection
