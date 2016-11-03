@extends('back.template')

@section('main')
    @include('back.partials.entete', [
        'title' => trans('back/role.dashboard'), 
        'icon' => 'user', 
        'fill' => link_to('user/list', trans('back/user.users')) . ' / ' . trans('back/role.roles')])
    
    <div class="col-sm-12">
        @if(session()->has('ok'))
            @include('partials/error', ['type' => 'success', 'message' => session('ok')])
        @endif
        {!! Form::open(['url' => 'roles', 'method' => 'post', 'class' => 'form-horizontal panel']) !!} 
            @foreach ($roles as $role) 
                {!! Form::controlBootstrap('text', 0, $role->slug, $errors, trans('back/role.' . $role->slug), $role->title) !!}
            @endforeach
            {!! Form::submitBootstrap(trans('form.send')) !!}
        {!! Form::close() !!}
    </div>
@endsection