@extends('admin/layout',['username' => $username])


@section('main')

{{-- check if the admin is allowed to add users --}}
<div class="w-3/5">
 @include('/admin/paramètres/change_password_layout')
@if($add_user_perm == true)
    @include('/admin/paramètres/add_user_layout')
@endif
  
</div>
@endsection
