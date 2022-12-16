@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$item->title}} Post Detail</h4>
                        <a href="{{ route('post.index') }}" class="btn btn-info btn-fill pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>

                    <div class="card-body show">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Title</label>
                                        <p>{{$item->title}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Website</label>
                                        <p>{{$item->website->name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Category</label>
                                        @if($item->catName) <p>{{$item->catName->title}}</p> @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Post Type</label>
                                        <p>  
                                    @if ($item->post_type == 1)
                                      Blog
                                    @elseif ($item->post_type == 2)
                                      Service
                                    @elseif ($item->post_type == 3)
                                      Page
                                    @endif</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Is Deleted</label>
                                        <p>  
                                   @if ($item->is_deleted == 0)
                                      No
                                    @elseif ($item->is_deleted == 1)
                                      Yes
                                    @endif
                                </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <p>  
                                   @if ($item->status == 0)
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
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="col-form-label">Views</label>
                                        <p>{{$item->views}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Sorting Order</label>
                                        <p>{{$item->sorting_order}}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Page show in header</label>
                                        <p>  
                                         @if ($item->page_show_in_header == 0)
                                            No
                                            @elseif ($item->page_show_in_header == 1)
                                            Yes
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Page show in footer</label>
                                        <p>  
                                         @if ($item->page_show_in_footer == 0)
                                            No
                                            @elseif ($item->page_show_in_footer == 1)
                                            Yes
                                            @endif
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Media Type</label>
                                        @if ($item->media_type == 2)
                                            Upload
                                        @elseif ($item->media_type == 1)
                                            Url
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Image</label>
                                       
                                            <img src="{{$item->feature_image_url}}" width="200" height="200"/>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Description</label>
                                       
                                        {{Form::textarea('description',$item->description,['class'=>'form-control', 'style'=>'height:100%','disabled','id'=>'summary-ckeditor-1']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title">SEO Section</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta Title</label>
                                         <p>{{$item->meta_title}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta keywords</label>
                                        <p>{{$item->meta_keywords}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta Description</label>
                                       
                                        {{Form::textarea('meta_description',$item->meta_description,['class'=>'form-control', 'style'=>'height:100%','disabled','id'=>'summary-ckeditor']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title">Dates</h4>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Created Date</label>
                                        <p>{{$item->created_at}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 px-1">
                                    <div class="form-group">
                                        <label class="col-form-label">Updated Date</label>
                                        <p>{{$item->updated_at}}</p>
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