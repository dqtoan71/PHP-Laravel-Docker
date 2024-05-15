@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ __('admin.Posts Management') }}</h4>
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
                                <a href="{{ route('post-management.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('admin.Create New Post') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr class="bg-gray">
                                        <th >{{ __('admin.No') }}</th>
                                        <th >{{ __('admin.Title') }}</th>
                                        <th >{{ __('admin.Slug') }}</th>
                                        <th >{{ __('admin.Description') }}</th>
                                        <th >{{ __('admin.Created By') }}</th>
                                        <th >{{ __('admin.Updated By') }}</th>
                                        <th >{{ __('admin.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td >{{ $post->title }}</td>
                                            <td >{{ $post->slug }}</td>
                                            <td >{{ $post->description }}</td>
                                            <td >{{ $post->createdBy->name ?? '' }} <br>{{ $post->created_at ?? '' }}</td>
                                            <td >{{ $post->updatedBy->name ?? '' }} <br>{{ $post->updated_at ?? '' }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('post-management.show', $post->id) }}" style="display:inline"><i class="fa fa-fw fa-eye"></i> {{ __('admin.Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('post-management.edit', $post->id) }}" style="display:inline"><i class="fa fa-fw fa-edit"></i> {{ __('admin.Edit') }}</a>
                                                    
                                                <form action="{{ route('post-management.destroy', $post->id) }}" style="display:inline" method="POST" class="delete_post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="display:inline;line-height: 15px;"><i class="fa fa-fw fa-trash"></i> {{ __('admin.Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        <div class="float-left">
                            <div class="dataTables_info">
                                Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} entries
                            </div>
                        </div>
                        <div class="float-right">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_inline')
<script type="text/javascript">
    $('form.delete_post').click(function (event) {
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

    <li class="breadcrumb-item"><a href="#">{{ __('admin.Posts Management') }}</a></li>
</ol>
@endsection
