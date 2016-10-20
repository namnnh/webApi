@extends('back.template')

@section('main')
    @include('back.partials.entete',[
        'title' => trans('back/admin.dashboard'),
        'icon' => 'dashboard',
        'fill' => trans('back/admin.dashboard'),
    ])
    <div class="row">
        @each('back/partials/pannel', $pannels, 'pannel')
    </div>
@endsection