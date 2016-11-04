@extends('back.template')

@section('main')

  @include('back.partials.entete', [
      'title' => trans('back/admin.blog-report'), 
      'icon' => 'user', 
      'fill' => link_to('user/list', trans('back/user.users')) . ' / ' . trans('back/admin.blog-report')])

  <div class="row col-lg-12">
    <div class="table-responsive">
      <table class="table">
        <thead>
            <tr>
                <th>{{ trans('back/user.name') }}</th>
                <th>{{ trans('back/user.latest-blog-title') }}</th>
                <th>{{ trans('back/user.posts-count') }}</th>
                <th>{{ trans('back/user.latest-blog-date') }}</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($authors as $author)
            <tr>
                <td class="text-primary">
                    <strong>{{ $author->username }}</strong>
                </td>
                <td>{{ $author->posts->first()->title }}</td>
                <td>{{ $author->posts_count }}</td>
                <td>{{ $author->posts->first()->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection