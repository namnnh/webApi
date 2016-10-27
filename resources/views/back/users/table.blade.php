@foreach ($users as $user) 
    <tr {!! !$user->seen?'class="warning"':''!!}>
        <td class="text-primary"><strong>{{ $user->username }}</strong></td>
        <td>{{ $user->role->title }}</td>
        <td>{!! Form::checkbox('seen', $user->id, $user->seen) !!}</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
@endforeach