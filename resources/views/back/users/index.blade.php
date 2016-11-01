@extends('back.template')

@section('main')
     @include('back.partials.entete', [
     'title' => trans('back/user.dashboard'), 
     'icon' => 'user', 
     'fill' => trans('back/user.users')])

     <div id="tri" class="btn-group btn-group-sm">
        <a href="{!! url('user/list') !!}" role="button" class="btn btn-default {{ classActiveOnlyPath('user') }}">{{ trans('back/user.all') }} 
            <span class="badge">{{  $counts['total'] }}</span>
        </a>
        @foreach ($roles as $role)
            <a href="{!! url('user/list/' . $role->slug) !!}" role="button" class="btn btn-default {{ classActiveOnlySegment(3, $role->slug) }}">{{ $role->title . 's' }} 
                <span class="badge">{{ $counts[$role->slug] }}</span>
            </a>
        @endforeach
    </div>
    <div class="pull-right link">{!! $users->links() !!}</div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ trans('back/user.name') }}</th>
                    <th>{{ trans('back/user.role') }}</th>
                    <th>{{ trans('back/user.seen') }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @include('back.users.table')
            </tbody>
        </table>
    </div>
    <div class="pull-right link">{!! $users->links() !!}</div>
@endsection