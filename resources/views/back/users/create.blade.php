@extends('back.template')

@section('main')
    @include('back.partials.entete', [
        'title' => trans('back/user.createTitle'), 
        'icon' => 'user', 
        'fill' => link_to('user/list', trans('back/user.users')) . ' / ' . trans('back/user.creation')])

     <div class="col-sm-12">
        {!! Form::open(['url' => 'user', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}   
            {!! Form::controlBootstrap('text', 0, 'username', $errors, trans('back/user.name')) !!}
            {!! Form::controlBootstrap('email', 0, 'email', $errors, trans('back/user.email')) !!}
            {!! Form::controlBootstrap('password', 0, 'password', $errors, trans('back/user.password')) !!}
            {!! Form::controlBootstrap('password', 0, 'password_confirmation', $errors, trans('back/user.confirm-password')) !!}
            {!! Form::selectBootstrap('role', $select, null, trans('back/user.role')) !!}
            {!! Form::submitBootstrap(trans('form.send')) !!}
        {!! Form::close() !!}
    </div>
@endsection