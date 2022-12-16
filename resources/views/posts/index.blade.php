@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Posts</h4>
                      <a href="{{ route('posts.create') }}" class="btn btn-info btn-fill pull-right"><i class="nc-icon nc-simple-add"></i> Add New Post</a>
                      <p class="card-category">List of all posts</p>
                      
                  </div>
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                    @endif
                  @endforeach
                  <div class="card-body table-full-width table-responsive">
                      <table class="table table-hover table-striped">
                          <thead>
                              <th>#</th>
                              <th>Title</th>
                              <th>Slug</th>
                              <th>Description</th>
                              <th>Created/Updated</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                              @foreach($model as $item)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{!!$item->title!!}</td>
                                  <td>{{$item->slug}}</td>
                                  <td>{{$item->description}}</td>
                                  <td>{{$item->created_at}} | {{$item->updated_at}}</td>
                                  <td><a title="Show"  href="{{ route('posts.show', $item->id) }}"><i class="nc-icon nc-align-center"></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a title="Edit"  href="{{ route('posts.edit', $item->id) }}"><i class="fa  fa-pencil-square-o"></i> </a>
                                      {{ Form::open(['method' => 'DELETE','route' => ['posts.destroy', $item->id], 'onsubmit' => 'return confirmDelete()' ]) }}
                                      {{ Form::submit('Delete', ['class' => 'nc-icon nc-align-center','style'=>' border:none; cursor:pointer;']) }}
                                  </td>
                                </tr>
                              @endforeach
                          </tbody>
                      </table>
                       {{ $model->links() }}
                  @empty($model)
                    No record
                  @endempty
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


@section('footerjs')  

<script>

function confirmDelete() {
    return confirm('Are you sure you want to perform this action?');
}

</script>

@endsection

@endsection