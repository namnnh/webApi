@extends('back.template')

@section('main')
    @include('back.partials.entete',['title'=>trans('back/user.Userdetail'),'icon'=>'user',
    'fill'=>link_to('user/list',trans('back/user.users')) .' / '. trans('back/user.detail')])

    <p>{{ trans('back/user.name') . ' : ' .  $user->username }}</p>
    <p>{{ trans('back/user.email') . ' : ' .  $user->email }}</p>
    <p>{{ trans('back/user.role') . ' : ' .  $user->role->title }}</p>
    <p>{{ $user->confirmed ? trans('back/user.confirmed') : trans('back/user.not-confirmed') }}</p>

@endsection