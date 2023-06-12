@extends('layouts.app1')
@section('title','Tambah Role')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')

<div class="container">
<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Akses Menu</h4>
    </div>
    <div class="card-body">
        <form  id="formRoles" action="{{ url('roles/changemenu') }}" method="POST">
        @csrf
        <input type="hidden" name="id_role" value="{{ $roles->id }}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Role</label>
            <input type="text" name="role" value="{{ $roles->rolename }}" class="form-control @error('role') is-invalid @enderror"  readonly>
            <span style="color :red">@error('role'){{ $message }} @enderror</span>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-post" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th width="10">Read</th>
                        <th width="10">Create</th>
                        <th width="10">Update</th>
                        <th width="10">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php $jum = count($menu); @endphp
                    @foreach ($menu as $m)
                    <tr>
                        <input type="hidden" name="id_menu[]" value="{{ $m->id }}">

                        <td>{{ $m->name }} </td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox"  data-toggle="toggle" value="1"  @if(!empty($m->can_read))
                                {{ $m->can_read == 1 ? 'checked' : '' }}
                                @endif  id="a1" name="read[{{ $m->id }}]" data-size="sm" data-onstyle="primary">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox"  data-toggle="toggle" value="1"  @if(!empty($m->can_create))
                                {{ $m->can_create == 1 ? 'checked' : '' }}
                                @endif id="a2" name="create[{{ $m->id }}]" data-size="sm" data-onstyle="primary">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                  <input type="checkbox"  data-toggle="toggle" value="1"  @if(!empty($m->can_update))
                                  {{ $m->can_update == 1 ? 'checked' : '' }}
                                  @endif id="a3" name="update[{{ $m->id }}]" data-size="sm" data-onstyle="primary">
                                </div>
                        </td>
                        <td>
                            <div class="form-check">
                                  <input type="checkbox"  data-toggle="toggle" value="1"  @if(!empty($m->can_delete))
                                  {{ $m->can_delete == 1 ? 'checked' : '' }}
                                  @endif id="a4" name="delete[{{ $m->id }}]" data-size="sm" data-onstyle="primary">
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        {{-- <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <select class="form-control" value="{{ old('parent') }}" name="parent">
                <option value="" selected>Main Kategori</option>
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div> --}}
        <br>
        <div class="mb-3">
            <input type="hidden" name="jum" value="{{ $jum }}">
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
        </div>
        </form>
    </div>
</div>
</div>

@endsection
@push('script')
  <script>



    // function Read(role_id,menu_id){
    //     var status = 0;
    //     if ($(this).is(':checked')) {
    //         $(this).attr('value', 'true');
    //         status = 1;
    //     } else {
    //         $(this).attr('value', 'false');
    //         status = 0;
    //     }
    //     $.ajaxSetup({
    //         headers: {
    //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //      });
    //     $.ajax ({
    //             type: 'POST',
    //             url: '{{ URL::to('/') }}/roles/changemenu',
    //             data: { role_id: role_id, menu_id: menu_id, status: status  },
    //             success : function(htmlresponse) {
    //                 console.log('sukses');
    //             }
    //     });
    // }

    // $(document).ready( function () {
    // $('#datatable').DataTable();
    // });

    // ('$#checkbox-value').text($('#checkbox1').val());


    // $("#read").on('change', function( role_id,menu_id ) {
    //     var read = $(this).val();
    //     if ($(this).is(':checked')) {
    //         $(this).attr('value', 'true');
    //         console.log(role_id);
    //     } else {
    //         $(this).attr('value', 'false');
    //         console.log("gagal");

    //     }
            // $.ajax ({
            //     type: 'POST',
            //     url: '',
            //     data: { hps_level: '' + level + '' },
            //     success : function(htmlresponse) {
            //         $('#opt_lesson_list').html(htmlresponse);
            //         console.log(htmlresponse);
            //     }
            // });
        // }
    // });
  </script>
@endpush

