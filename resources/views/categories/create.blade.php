@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Category</h4>
                         <a href="{{ route('adprovider.index') }}" class="btn btn-info btn-fill pull-right"><i class="fa fa-arrow-left"></i> Back</a>
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
                               'route' => 'category.store', 
                               'class' => 'form',
                               'files'=>true])
                             }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="title" required="" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                          {{ Form::label('website_id','Website:') }} 
                                          <select class="form-control m-bot15" name="website_id" id="website_id">
                                            <option value="">Select Website</option>
                                            @foreach($websites as $website)
                                            <option value="{{$website->id}}">{{$website->name}}</option>
                                            @endForeach 
                                          </select>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        {{ Form::select('status', array(
                                          '0' => 'In Active', 
                                          '1' => 'Active',
                                          '2' =>'Pending'
                                          ),1,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Sorting order</label>
                                         {{ Form::number('sorting_order',$last_sorting_order, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>

                         
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button style="width: 100%" type="submit" class="btn btn-info btn-fill pull-right point">Add New Category</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }} 
                            <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

