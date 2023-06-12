@extends('layouts.app1')
@section('title','Roles')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-10"><h4 class="font-weight-bold text-primary">Data Role</h4></div>
                <div class="col-sm-2">
                    <button type="button" onclick="window.location.href='{{ route('roles.create') }}'" style="float: right;" class="btn btn-primary btn-sm ">Tambah Role</button>
                </div>
            </div>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-post" id="datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="6%">No</th>
                                <th>Nama Role</th>
                                <th>Deskripsi</th>
                                <th width="8%">Status</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $r )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->rolename }}</td>
                                <td>{{ $r->description }}</td>
                                <td> @if($r->status == 1)
                                    <span class="badge badge-success">Aktif</span>
                                    @else
                                    <span class="badge badge-warning">Non-Aktif</span>
                                    @endif</td>
                                <td>
                                    {{-- <a type="button" class="btn btn-success btn-sm" href="">Edit</a>
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to("/") }}/roles/aksesmenu/{{ $r->id }}">Akses Menu</a>
                                    <br>
                                    <a type="button" class="btn btn-warning btn-sm" href="">Show</a>
                                    <form action="" method="POST">
                                      @csrf
                                      @method('DELETE')
                                    <button type="submit" onclick="return confirm('apakah anda ingin mengapus data ini?')" class="btn btn-danger btn-sm" href="">Delete</button>
                                    </form> --}}

                                    <div class="dropdown mb-4">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                           Opsi
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                            aria-labelledby="dropdownMenuButton">
                                            <form action="{{ route('roles.destroy',$r->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('roles.edit',$r->id) }}'">Edit</button>
                                            <a class="dropdown-item" type="button" href="{{ URL::to("/") }}/roles/aksesmenu/{{ $r->id }}">Akses Menu</a>
                                            <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('roles.show',$r->id) }}'">Show</button>
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
@endpush

