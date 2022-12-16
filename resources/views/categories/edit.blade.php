@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Category</h4>
                <a href="{{ route('category.index') }}" class="btn btn-info btn-fill pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif
                @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
                @endforeach
                {{ Form::open([
                    'method' => 'PATCH', 
                    'route' => ['category.update',$category->id], 
                    'class' => 'form',
                    'files'=>true])
                    }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$category->name}}">
                        </div>
                    </div>
                   
                </div>
              
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info btn-fill pull-right point">Update Category</button>
                </div>
                    
                {{ Form::close() }} 
                <div class="clearfix"></div>
        </div>
    </div>

@endsection

