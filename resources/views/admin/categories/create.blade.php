@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ __('admin.Category Management') }}</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                             <div class="float-left">
                                <a href="{{ route('category-management.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('admin.Create New Category') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form action="{{ route('category-management.store') }}" method="POST">
                            @csrf
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name">
                            
                            <label for="parent_id">Parent Category:</label>
                            <select name="parent_id" id="parent_id">
                                <option value="">No parent</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_inline')
<script type="text/javascript">
    
</script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">{{ __('admin.Dashboard') }}</a></li>

    <li class="breadcrumb-item"><a href="#">{{ __('admin.Category Management') }}</a></li>
</ol>
@endsection
