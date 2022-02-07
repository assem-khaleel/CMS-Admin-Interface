@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{isset($post) ? 'Edit Post' : 'Create Post'}}
        </div>
        <div class="card-body">
            @include('partials.error')

            <form action="{{isset($post)?route('posts.update',$post->id) :route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" value="{{isset($post) ? $post->title : ''}}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="hidden" name="description" value="{{isset($post) ? $post->desription : ''}}">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="story">Content</label>
                    <input id="story" type="hidden" name="story" value="{{isset($post) ? $post->content : ''}}">
                    <trix-editor input="story"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" id="published_at" class="form-control" name="published_at" value="{{isset($post) ? $post->published_at : ''}}">
                </div>

                @if(isset($post->image))
                    <div class="form-group">
                        <img src="<?php echo asset("storage/$post->image")?>" style="width: 60%">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if(isset($post))
                            @if($category->id === $post->category_id)
                                selected
                            @endif
                                    @endif
                            >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if($tags->count() >0)
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control tags-selector" multiple>

                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                        @if(isset($post))
                                @if($post->hasTag($tag->id))
                                    selected
                                    @endif
                                        @endif
                                >
                                    {{$tag->name}}
                                </option>
                            @endforeach

                    </select>
                </div>
                @endif
                <div class="form-group">
                    <button class="btn btn-success" type="submit">

                        {{isset($post)? 'Update Post':'Create Post'}}
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at',{
            enableTime: true,
            enableSeconds:true
        })

        $(document).ready(function() {
            $('.tags-selector').select2();
        });
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection