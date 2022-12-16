@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add New Post</h4>
                <a href="{{ route('post.index') }}" class="btn btn-info btn-fill pull-right"><i class="fa fa-arrow-left"></i> Back</a>
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
                    'route' => 'post.store', 
                    'class' => 'form',
                    ])
                    }}
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Title</label>
                            {{ Form::text('title',old('title'), array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label">Description</label>
                            {{Form::textarea('description',null,['class'=>'form-control', 'style'=>'height:100%']) }}
                        </div>
                    </div>
                </div>
                    
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info btn-fill pull-right point">Submit</button>
                </div>
                    
                
                {{ Form::close() }} 
                <div class="clearfix"></div>
        </div>
    </div>
          


@endsection

