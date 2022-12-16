@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                               'files'=>true])
                             }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Title</label>
                                  
                                         {{ Form::text('title',old('title'), array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Post Type</label>
                                        {{ Form::select('post_type', array(
                                            '1' => 'Blog', 
                                            '2' => 'Service',
                                            '3' => 'Page',
                                            ),1,array('id'=>'post_type', 'class'=>'form-control', 'onChange'=>'checkPostType()')) 
                                          }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                          {{ Form::label('website_id','Website:') }} 
                                          <select class="form-control m-bot15" name="website_id" id="website_id" onchange="loadWebCategory(this);">
                                            <option value="">Select Website</option>
                                            @foreach($websites as $website)
                                            <option value="{{$website->id}}">{{$website->name}}</option>
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
                                            <option value="{{$category->id}}" >{{$category->title}}</option>
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
                                          ),0,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Page show in footer</label>
                                        {{ Form::select('page_show_in_footer', array(
                                          '0' => 'No', 
                                          '1' => 'Yes'
                                          ),1,array('class'=>'form-control', )) 
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
                                          ),1,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group  post-show">
                                        <label class="col-form-label">Feature Post</label>
                                        {{ Form::select('is_feature', array(
                                          '0' => 'No', 
                                          '1' => 'Yes'
                                          ),0,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group post-show">
                                        <label class="col-form-label">Show in Slider</label>
                                        {{ Form::select('show_in_slider', array(
                                          '0' => 'No', 
                                          '1' => 'Yes'
                                          ),0,array('class'=>'form-control', )) 
                                        }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group post-show">
                                        <label class="col-form-label">Sorting order</label>
                                         {{ Form::number('sorting_order',$last_sorting_order, array('class' => 'form-control')) }}
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
                                    <div class="form-group">
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
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 post-show">
                                    <label for="inputState" class="col-form-label">Tags 
                                        <button type="button" onclick="loadTags()">Refresh Tags</button> 
                                        <button type="button" onclick="showAddTagInput()" id="add_tag_btn" title="dubai,wheretovisit,wheretoeat,enter comma seperated words for multiple tags">Show Add Tag</button> 
                                        <input type="text" name="tag_input" id="tag_input" placeholder="dubai,wheretovisit,wheretoeat,enter comma seperated words for multiple tags">
                                        <button type="button" onclick="saveTag()" id="save_tag">Save Tag</button> 
                                    </label>
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
                                            <option value="{{$user->id}}">{{$user->name}} ({{$user->email}}) </option>
                                            @endForeach 
                                          </select>
                                        </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('youtube_url','YouTube') }}
                                        {{ Form::text('youtube_url',null,array('placeholder'=>'8wQw3zR5rFk','class'=>'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Description</label>
                                        {{Form::textarea('description',null,['class'=>'form-control', 'style'=>'height:100%','id'=>'post-editor']) }}
                                    </div>
                                </div>
                            </div>
                            

                            <h4 class="card-title">SEO Section</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" placeholder="Meta title" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control" placeholder="Meta keywords">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Meta Description</label>
                                        {{Form::textarea('meta_description',null,['class'=>'form-control', 'style'=>'height:100%']) }}
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button style="width: 100%" type="submit" class="btn btn-info btn-fill pull-right point">Add New Post</button>
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

@section('footerjs')  

<script>

$(function() {
    $("#tags").select2({
        placeholder: 'Slect tags',
        allowClear: true
    })
    $("#tag_input,#save_tag").hide()
})

function loadTags(){
    $("#add_tag_btn").show()
    //$("#tags").select2()
    var website_id =  $("#website_id").val();
    $.ajax({
        type:'GET',
        url:"{{ route('ajaxloadtags') }}",
        data: {
                webId: website_id
        },
        success: function(res){
            if(res.response.length > 0){
                var data = res.response;
                var options = '<option value="0">Select Tag</option>';
                $.each( data, function( key, item ) {
                    options+="<option value='"+item.id+"'>"+item.title+"</option>";
                });
                $('#tags').empty().append(options);
                //$("#tags").select2()
                $('#tags').trigger('change');

            }
        }
    });
}
function showAddTagInput(){
    $("#tag_input,#save_tag").show()
    $("#add_tag_btn").hide()
}
function saveTag(){
    $("#tag_input,#save_tag").hide()
    $("#add_tag_btn").show()

    var tags =  $("#tag_input").val();
    $.ajax({
        type:'POST',
        url:"{{ route('tag.storeMultiple') }}",
        data: {
            title: tags
        },
        success: function(res){
           console.log("res of add tag",res)
           loadTags()
        }
    });

}



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
    console.log("post_type",post_type)
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

