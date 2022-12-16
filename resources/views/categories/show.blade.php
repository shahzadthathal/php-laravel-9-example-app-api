@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$category->name}} Category Detail</h4>
            <a href="{{ route('category.index') }}" class="btn btn-info btn-fill pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="card-body show">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <p>{{$category->name}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Slug</label>
                            <p>{{$category->slug}}</p>
                        </div>
                    </div>
                </div>
                
                
                <div class="clearfix"></div>
        </div>
    </div>
            
@endsection