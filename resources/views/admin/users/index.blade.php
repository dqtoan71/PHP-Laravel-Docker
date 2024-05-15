@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ __('admin.User Management') }}</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                @can('usermanagement-create')
                    <a class="btn btn-success" href="{{ route('user-management.create') }}"><i class="fas fa-plus-square"></i>{{ __('admin.Create New User') }}</a>
                @endcan
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">  
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-gray text-center">
                            <th>{{ __('admin.No') }}</th>
                            <th>{{ __('admin.Name') }}</th>
                            <th>{{ __('admin.Email') }}</th>
                            <th>{{ __('admin.Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                @can('usermanagement-edit')
                                    <a class="btn btn-sm btn-primary" href="{{ route('user-management.edit',$user->id) }}">{{ __('admin.Edit') }}</a>
                                @endcan
                                @can('usermanagement-destroy')
                                <form method="post" action="{{ route('user-management.destroy', $user->id) }}" style="display: inline;" class="delete_user">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger delete_confirm'" style="display: inline;">{{ __('admin.Delete') }}</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <div class="float-left">
                    <div class="dataTables_info">
                        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
                    </div>
                </div>
                <div class="float-right">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- /.card -->
@endsection 


@section('js_inline')
<script type="text/javascript">
    $('form.delete_user').click(function (event) {
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

    <li class="breadcrumb-item"><a href="#">{{ __('admin.User Management') }}</a></li>
</ol>
@endsection