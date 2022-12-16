@extends('layouts.app')
@section('content')

              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                      <h4 class="card-title">Categories</h4>
                      @can('create', \App\Models\Post::class)
                      <a href="{{ route('category.create') }}" class="btn btn-info btn-fill pull-right"><i class="nc-icon nc-simple-add"></i> Add New Category</a>
                      @endcan
                      <p class="card-category">List of all category</p>
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
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Action</th>
                          
                          </thead>
                          <tbody>
                              @foreach($model as $item)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$item->name}}</td>
                                  <td>{{$item->slug}}</td>
                                  <td><a title="Show"  href="{{ route('category.show', $item->id) }}">Show </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a title="Edit"  href="{{ route('category.edit', $item->id) }}">Edit </a>
                                    {{ Form::open(['method' => 'DELETE','route' => ['category.destroy', $item->id], 'onsubmit' => 'return confirmDelete()' ]) }}
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
          

@section('footerjs')  

<script>

function confirmDelete() {
    return confirm('Are you sure you want to perform this action?');
}
</script>

@endsection


@endsection