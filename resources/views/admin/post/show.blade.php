@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ __('admin.Show Post') }}</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                @can('postmanagement-index')
                    <a class="btn btn-success" href="{{ route('post-management.index') }}"><i class="fa fa-angle-double-left"></i>{{ __('admin.Back To Post List') }}</a>
                @endcan
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">        
                <div class="tab-pane" id="settings">

                    <div class="form-group mb-2 mb20">
                        <strong>Title:</strong>
                        {{ $post->title }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Slug:</strong>
                        {{ $post->slug }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Description:</strong>
                        {{ $post->description }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Content:</strong>
                        <textarea readonly name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ $post?->content }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_inline')
<script type="text/javascript">
    if ($("#content").length) {
        tinymce.init({
            selector: '#content',
            min_height: 350,
            default_text_color: 'red',
            plugins: [
            'advlist', 'autoresize', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
            image_advtab: true,
            templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            },
            {
                title: 'Test template 2',
                content: 'Test 2'
            }
            ],
            content_css: []
        });
    }
</script>  
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">{{ __('admin.Dashboard') }}</a></li>

    <li class="breadcrumb-item"><a href="#">{{ __('admin.Show Post') }}</a></li>
</ol>
@endsection