@extends('admin/layout',['username' => $username])


@section('main')

{{-- check if the admin is allowed to add users --}}
<div class="mt-4 w-8/12  2xl:w-6/12  ">
    @include('/admin/paramètres/change_password_layout')
@if($add_user_perm == true)
    @include('/admin/paramètres/add_user_layout')
@endif
  
</div>
@endsection
