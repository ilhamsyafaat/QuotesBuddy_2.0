@extends('layouts.app')

{{-- @section('title', 'List User') --}}

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">List User</h2>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add New User</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
        {{-- {{ session('error') }} --}}
    </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @forelse($users as $index => $row)
                <tr>
                    <td class="align-middle">{{  $index + 1 }}</td>
                    <td class="align-middle">{{ $row->name }}</td>
                    <td class="align-middle">{{ $row->email  }}</td>
                    <td class="align-middle">
                        <div class="showPhoto">
                            <div id="imagePreview" style="@if ($row->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $row->photo }}')@else background-image: url('{{ url('/admin_assets/img/avatar.webp') }}') @endif;">
                            </div>
                        </div>    
                    </td>                  
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('user.show', $row->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('user.edit', $row->id)}}" type="button" class="btn btn-warning">Edit</a>
                            {{-- <button class="btn btn-danger" onClick="deleteFunction('{{ $row->id }}')">Delete</button> --}}

                            <form action="{{ route('user.delete', $row->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="5">Users not found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="col-md-6">
        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
    </div>
    <div class="col-md-6 text-right mb-5 d-flex justify-content-end">
        {{ $users->links() }}
    </div>

    @include('admin.modal_delete')
@endsection

@push('js')
<script>
    function deleteFunction(id) {
        document.getElementById('delete_id').value = id;
        $("#modalDelete").modal('show');
    }
</script>
@endpush
 
<style>
    .showPhoto {
        width: 51%;
        height: 54px;
        margin: auto;
    }
 
    .showPhoto>div {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<style>
    .btn-group .btn {
        padding: 0.5rem 1rem;
        margin: 0;
        flex: 1;
        text-align: center;
    }

    .btn-group form {
        flex: 1;
        display: flex;
    }

    .btn-group form .btn {
        width: 100%;
    }

    @media (max-width: 768px) {
        .btn-group {
            flex-direction: column;
        }
    }
</style>
