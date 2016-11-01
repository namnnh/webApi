@extends('back.template')
@section('main')
    @include('back.partials.entete',['title'=>trans('back/user.user_edit'),'icon'=>'user',
    'fill'=>link_to('user/list',trans('back/user.users')) .'/'. trans('back/user.edit')])

     <div class="col-sm-12">
        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
            {!! Form::controlBootstrap('text', 0, 'username', $errors, trans('back/user.name')) !!}
            {!! Form::controlBootstrap('email', 0, 'email', $errors, trans('back/user.email')) !!}
            {!! Form::selectBootstrap('role', $select, $user->role_id, trans('back/user.role')) !!}
            {!! Form::checkboxHorizontalBootstrap('confirmed', trans('back/user.confirmed'), $user->confirmed) !!}
            {!! Form::submitBootstrap(trans('form.send')) !!}
        {!! Form::close() !!}
    </div>
@endsection