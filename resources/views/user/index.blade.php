@extends('layouts.app1')
@section('title','User')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-10"><h4 class="font-weight-bold text-primary">Data User</h4></div>
                <div class="col-sm-2">
                    <button type="button" onclick="window.location.href='{{ route('user.create') }}'" style="float: right;" class="btn btn-primary btn-sm ">Tambah User</button>
                </div>
            </div>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-post" id="datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="6%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th width="15%">Role</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->role_id }}</td>
                                <td>
                                    <div class="dropdown mb-4">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                           Opsi
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                            aria-labelledby="dropdownMenuButton">
                                            <form action="{{ route('user.destroy',$u->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('user.edit',$u->id) }}'">Edit</button>
                                            <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('user.show',$u->id) }}'">Show</button>
                                            <button type="submit" onclick="deleteConfirm(event)" class="dropdown-item">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

          </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection

@push('script')
    @if ($message = Session::get('success'))
    <script>
        Swal.fire(
        'Sukses!',
        '{{ $message }}',
        'success'
        )
    </script>
    @endif


  <script>
    $(document).ready( function () {
    $('#datatable').DataTable();
    });

    window.deleteConfirm = function (e) {
				e.preventDefault();
				var form = e.target.form;
                Swal.fire({
                    title: 'Apakah anda ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
                })
		}
  </script>
  </script>


@endpush

