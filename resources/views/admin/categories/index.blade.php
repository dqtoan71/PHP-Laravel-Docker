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
                        @foreach($categories as $category)
                            <div>
                                <p>{{ $category->name }}</p>
                                @if($category->children->count() > 0)
                                    <ul>
                                        @include('admin.categories.partials.subcategories', ['categories' => $category->children])
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_inline')
<script type="text/javascript">
    $('form.delete_category').click(function (event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal.fire({
            title: 'Are you sure you want to delete this record?',
            text: "If you delete this, it will be gone forever.",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showDenyButton: true,
            denyButtonText: 'Cancel',
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
            return false;
        }); 
    }); 
</script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">{{ __('admin.Dashboard') }}</a></li>

    <li class="breadcrumb-item"><a href="#">{{ __('admin.Category Management') }}</a></li>
</ol>
@endsection
