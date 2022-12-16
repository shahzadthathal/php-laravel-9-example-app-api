@extends('layouts.app')
@section('content')

{{ Form::open([
'method' => 'PATCH', 
'route' => ['post.update',$item->id], 
'class' => 'form',
'files'=>true])
}}

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Post</h4>
                         <a href="{{ route('post.index') }}" class="btn btn-info btn-fill pull-right"><i class="fa fa-arrow-left"></i> Back</a>

                         <button type="submit" class="btn btn-info btn-fill pull-right point">Update Post</button>
                         
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
                           
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="title" value="{{$item->title}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Post Type</label>
                                        {{ Form::select('post_type', array(
                                            '1' => 'Blog', 
                                            '2' => 'Service',
                                            '3' => 'Page',
                                            ),$item->post_type,array('id'=>'post_type', 'class'=>'form-control')) 
                                          }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                          {{ Form::label('website_id','Website:') }} 
                                          <select class="form-control m-bot15" name="website_id" id="website_id" onchange="loadWebCategory();">
                                            <option value="">Select Website</option>
                                            @foreach($websites as $website)
                                            <option value="{{$website->id}} " {{ $item->website_id == $website->id? 'selected' : ''}}>{{$website->name}}</option>
                                            @endForeach 
                                          </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group post-show" id="web-cat-div">
                                          {{ Form::label('categories','Categories:') }} 
                                          <select class="form-control m-bot15" name="category_id" id="WebCatDropdown">
                                            <option value="0">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ $item->category_id == $category->id? 'selected' : ''}}>{{$category->title}}</option>
                                            @endForeach 
                                          </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row page-show" style="display:none;">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Page show in header</label>
                                        {{ Form::select('page_show_in_header', array(
                                          '0' => 'No', 
                                          '1' => 'Yes'
                                          ),$item->page_show_in_header,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Page show in footer</label>
                                        {{ Form::select('page_show_in_footer', array(
                                          '0' => 'No', 
                                          '1' => 'Yes'
                                          ),$item->page_show_in_footer,array('class'=>'form-control', )) 
                                        }}
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
                                          ),$item->status,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Is Deleted</label>
                                        {{ Form::select('is_deleted', array(
                                            '0' => 'No', 
                                            '1' => 'Yes',
                                            ),$item->is_deleted,array('class'=>'form-control')) 
                                          }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group post-show">
                                        <label class="col-form-label">Feature Post</label>
                                        {{ Form::select('is_feature', array(
                                          '0' => 'No', 
                                          '1' => 'Yes'
                                          ),$item->is_feature,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                               <div class="col-md-6">
                                    <div class="form-group post-show">
                                        <label class="col-form-label">Show in Slider</label>
                                        {{ Form::select('show_in_slider', array(
                                          '0' => 'No', 
                                          '1' => 'Yes'
                                          ),$item->show_in_slider,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group post-show">
                                        <label class="col-form-label">Sorting order</label>
                                         {{ Form::number('sorting_order',$item->sorting_order, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group post-show">
                                        <label class="col-form-label">Media Type</label>
                                        {{ Form::select('media_type', array(
                                            '1' => 'Url', 
                                            '2' => 'Upload',
                                            ),1,array('id'=>'media_type', 'class'=>'form-control', 'onChange'=>'checkMediaType()')) 
                                          }}
                                    </div>
                                </div>
                                <div class="col-md-3" id="upload_image" style="display:none;">
                                    <div class="form-group post-show">
                                            <div class="form-group">
                                              {{ Form::label('image','Uplaod image:') }}
                                              {{ Form::file('image',null,array('class'=>'form-control')) }}
                                           </div>
                                    </div>
                                </div>
                                <div class="col-md-3 post-show" id="add_image">
                                    <div class="form-group">
                                            <div class="form-group">
                                              {{ Form::label('image','Image URL') }}
                                              {{ Form::text('image',null,array('class'=>'form-control')) }}
                                           </div>
                                    </div>
                                </div>

                                <img class="post-show" src="{{$item->feature_image_url}}" width="200" height="200"/>
                                
                            </div>

                            <div class="row">
                                <div class="form-group post-show col-md-6">
                                    <label for="inputState" class="col-form-label">Tags</label>
                                    <select id="tags" name="tags[]" class="form-control wide" multiple>
                                        @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                        <div class="form-group">
                                          {{ Form::label('author_id','Author ID:') }} 
                                          <select class="form-control m-bot15" name="author_id" id="author_id">
                                            <option value="0">Select Author</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}" {{ $item->author_id == $user->id? 'selected' : ''}}>{{$user->name}} ({{$user->email}}) </option>
                                            @endForeach 
                                          </select>
                                        </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('youtube_url','YouTube') }}
                                        {{ Form::text('youtube_url',$item->youtube_url,array('placeholder'=>'8wQw3zR5rFk','class'=>'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Description</label>
                                        {{Form::textarea('description',$item->description,['class'=>'form-control', 'style'=>'height:100%','id'=>'post-editor']) }}
                                    </div>
                                </div>
                            </div>

                            <h4 class="card-title">SEO Section</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{$item->meta_title}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control" value="{{$item->meta_keywords}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta Description</label>
                                        {{Form::textarea('meta_description',$item->meta_description,['class'=>'form-control', 'style'=>'height:100%']) }}
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button style="width: 100%" type="submit" class="btn btn-info btn-fill pull-right point">Update Post</button>
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
{{ Form::close() }} 

@section('footerjs') 
<script>

    let selectedTags = `{{$item->selectedTagsIdsArr}}`

    $(function() {
        $("#tags").select2()
        $('#tags').val(selectedTags.split(","));
        $('#tags').trigger('change');

        var post_type =  $("#post_type").val();
        if(post_type==3){
            $(".post-show").hide()
            $(".page-show").show()
        }else{
            $(".post-show").show()
            $(".page-show").hide()
        }

    })

    function checkMediaType(){
        var selected_media_type =  $("#media_type").val();
        if(selected_media_type==2){
            $("#upload_image").show();
            $("#add_image").hide();
        }
        if(selected_media_type==1){
            $("#upload_image").hide();
            $("#add_image").show();
        }
    }

    function loadWebCategory(){

        var post_type =  $("#post_type").val();
        if(post_type==3){
            return false
        }

        $('#WebCatDropdown').empty();
        var selectedCat =  $("#website_id").val();
       $.ajax({
        type:'GET',
        url:"{{ route('ajaxloadwebcategory') }}",
        data: {
                  webId: selectedCat
                },
                success: function(res){
            console.log(res);
                  if(res.response.length > 0){
                    var data = res.response;
                    var options = '<option value="0">Select Category</option>';
                    $.each( data, function( key, webCat ) {
                        options+="<option value='"+webCat.id+"'>"+webCat.title+"</option>";
                      });
                    $('#web-cat-div').show();
                    $('#WebCatDropdown').empty().append(options);
                  }else{
                    $('#WebCatDropdown').empty();
                    $('#web-cat-div').hide();
                  }
          }
        });
    }

    function checkPostType(){
        var post_type =  $("#post_type").val();
        if(post_type==3){
            $(".post-show").hide()
            $(".page-show").show()
        }else{
            $(".post-show").show()
            $(".page-show").hide()
        }
    }
    

</script>
@endsection


@endsection

