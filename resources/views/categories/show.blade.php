@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$item->title}} Category Detail</h4>
                        <a href="{{ route('category.index') }}" class="btn btn-info btn-fill pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>

                    <div class="card-body show">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Title</label>
                                        <p>{{$item->title}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Website</label>
                                        <p>{{$item->websiteName->name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Is Deleted</label>
                                        <p>  
                                            @if($item->is_deleted == 0)
                                              No
                                            @elseif ($item->is_deleted == 1)
                                              Yes
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <p>  
                                            @if($item->status == 0)
                                              In Active
                                            @elseif ($item->status == 1)
                                              Active
                                            @elseif ($item->status == 2)
                                              Pending
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Sorting Order</label>
                                        <p>{{$item->sorting_order}}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection