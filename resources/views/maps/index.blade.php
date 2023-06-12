@extends('layouts.app1')
@section('title','Maps')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-10"><h4 class="font-weight-bold text-primary">Data Lokasi</h4></div>
                <div class="col-sm-2">
                    <button type="button" onclick="window.location.href='{{ route('lokasi.create') }}'" style="float: right;" class="btn btn-primary btn-sm ">Tambah Lokasi</button>
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
                                <th>Alamat</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>asdsad</td>
                                <td>sdsad</td>
                                <td>asdsad</td>
                                <td>sdsad</td>
                                <td>
                                  <a type="button" class="btn btn-success btn-sm" href="">Edit</a>
                                  <a type="button" class="btn btn-warning btn-sm" href="">Show</a>
                                  <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" onclick="return confirm('apakah anda ingin mengapus data ini?')" class="btn btn-danger btn-sm" href="">Delete</button>
                                  </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

          </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection

@push('script')

  <script>
    $(document).ready( function () {
    $('#datatable').DataTable();
    });
  </script>
@endpush

