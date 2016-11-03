@extends('back.template')

@section('main')
     @include('back.partials.entete', [
     'title' => trans('back/user.dashboard').link_to_route('user.create', trans('back/user.add'), [], ['class' => 'btn btn-info pull-right']), 
     'icon' => 'user', 
     'fill' => trans('back/user.users')])

      @if(session()->has('ok'))
        @include('partials/error', ['type' => 'success', 'message' => session('ok')])
      @endif


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

@section('scripts')

    <script>

        $(function() {
            // Seen gestion
            $(document).on('change', ':checkbox', function() {
                $(this).parents('tr').toggleClass('warning');
                $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
                $.ajax({
                    url: '{!! url('userseen') !!}' + '/' + this.value,
                    type: 'PUT',
                    data: "seen=" + this.checked
                })
                .done(function() {
                    $('.fa-spin').remove();
                    $('input[type="checkbox"]:hidden').show();
                })
                .fail(function() {
                    $('.fa-spin').remove();
                    var chk = $('input[type="checkbox"]:hidden');
                    chk.show().prop('checked', chk.is(':checked') ? null:'checked').parents('tr').toggleClass('warning');
                    alert('{{ trans('back/user.fail') }}');
                });
            });
        });

    </script>

@endsection