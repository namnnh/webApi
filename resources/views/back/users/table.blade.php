@foreach ($users as $user) 
    <tr {!! !$user->seen?'class="warning"':''!!}>
        <td class="text-primary"><strong>{{ $user->username }}</strong></td>
        <td>{!! $user->role->title !!}</td>
        <td>{!! Form::checkbox('seen', $user->id, $user->seen) !!}</td>
        <td>{!! link_to_route('user.show', trans('back/user.see'), [$user->id], ['class' => 'btn btn-success btn-block btn']) !!}</td>
        <td>{!! link_to_route('user.edit', trans('back/user.edit'), [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                {!! Form::submit(trans('back/user.delete'), ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!} 
        </td>
    </tr>
@endforeach