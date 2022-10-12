@extends('layout.main')

@push('page-css')

@endpush

@section('content')
<div class="container-fluid mt--6">
    <div class="information d-flex flex-column">
            {{-- header --}}
        <div class="text-secondary">
            <h3 class="fw-bold" style="margin-left: 0.3em">Pengiriman</h3>
        </div>
        <div class="row px-1 mb-2">
            <div class="col card balance">
                <div class="col">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Pilih Tahun</label>
                                <select class="form-control" name="tahun" id="tahun">
                                    @foreach ($pengiriman as $p)
                                        <option value="{{ $p->tahun }}">{{$p->tahun}}</option>
                                    @endforeach
                                </select>
                                <small class="d-none text-danger" id="tahun"></small>
                            </div>
                            </div>
                      <div class="col text-right">
                            <button  type="submit" class="btn btn-warning btn-sm " id="tambah" ><p  class="text-secondary">Tambah<p></button>
                        </div>
                    </div>
                    
            {{-- end header card --}}
            {{-- table --}}
            <table class="styled-table table-flush data-table" style="width: 100%">
                <thead>
                <tr>
                    <th width="10%">No.</th>
                    <th>Bulan</th>
                    <th>Sukses Antar</th>
                    <th>Gagal Antar</th>
                    <th>Retus</th>
                    <th width="10%">Aksi</th>
                </tr>
                </thead>
            </table>
            {{-- end table --}}
                
            <div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


@push('page-scripts')
    <script type="text/javascript">
    $(document).ready(function () {
        // data table
       

        var table = $('.data-table').DataTable({                
            processing: true,
            serverSide: true,
            rowId:"id",
            ajax: {
                'url': "{{ route('pengiriman_dataTable') }}",
                'type': "POST",
                'data': function(d){
                    d.tahun =$("#tahun").val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                {orderable:false,searchable:false,data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'bulan', name: 'bulan'},
                {data: 'sukses_antar', name: 'sukses_antar'},
                {data: 'gagal_antar', name: 'gagal_antar'},
                {data: 'retus', name: 'retus'},
                {data: 'action', name: 'action', orderable:'false', searchable:'false'},
            ]
        });      
    
        //onchange
       

        $(document).on('change', '#tahun',function (e) {
            table.ajax.reload();
        });
        

     // menjalankan tombol tambah
     $(document).on('click', '#tambah',function (e) {
        e.preventDefault();
        let element = $(this);
        show_loading(element, "full");
        $.ajax({
            type: 'get',
            url: "/pengiriman/tambah",
            success: function(data) {
            hide_loading(element, '', 'full', ' Tambah');
            $('#modalDialogLabel').html("Tambah Data")
            $('#modalDialogSize').addClass("modal-lg")
            $('#modalDialogData').html(data);
                
            $('#modalDialog').modal("show");
            }
        });
    });

    // menjalankan fungsi tambah
    $(document).on('submit', '#formCreate', function(e) {
          e.preventDefault();
          clear_error_withStyle()
          console.log('ok')
          show_loading("#btnCreate", "full");
          $.ajax({
              url: '/pengiriman/simpan',
              method: "POST",
              data: new FormData(this),
              dataType: 'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data) {
                console.log('bereh')
                  hide_loading('#btnCreate', '', 'full', 'Create');
                  if (data.status) {
                      clearInput();
                      $('#modalDialog').modal("hide");
                      Swal.fire("Berhasil!", data.message, "success").then(function() {
                          table.ajax.reload();
                      });
                  }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                console.log('rusak')
                  hide_loading('#btnCreate', '', 'full', 'Create');
                  check_errors_withStyle(xhr.responseJSON.errors);
              }
          });
      }); 

      // mejalankan tombol edit
    $(document).on('click', '#edit',function (e) {
        e.preventDefault();
        let element = $(this);
        show_loading(element, "full");
        let id=$(this).attr('data-id');
        console.log(id);
        $.ajax({
            type: 'get',
            url: "/pengiriman/edit/"+id,
            success: function(data) {
            hide_loading(element, 'edit', '', ' Edit');
            $('#modalDialogLabel').html("Edit")
            $('#modalDialogSize').addClass("modal-lg")
            $('#modalDialogData').html(data);
            
            $('#modalDialog').modal("show");
            }
        });
    });

      // menjalankan fungsi edit
      $(document).on('submit', '#formEdit', function(e) {
        e.preventDefault();
        clear_error_withStyle()
        show_loading("#btnEdit", "");
        $.ajax({
            url: `/pengiriman/update`,
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                hide_loading('#btnEdit', '', '', 'Edit');
                if (data.status) {
                    clearInput();
                    $('#modalDialog').modal("hide");
                    Swal.fire("Berhasil!", data.message, "success").then(function() {
                        table.ajax.reload();
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                hide_loading('#btnEdit', '', '', 'Edit');
                check_errors_withStyle(xhr.responseJSON.errors);
            }
        });
      });
      
      $(document).on('click', '#hapusData', function(e) {
        e.preventDefault();
        var url = "{{ route('pengiriman_destroy') }}";
        var csrf= '{{ csrf_token() }}';
        var dataText= $(this).attr('data-text');
        var id= $(this).attr('data-id');
        deleteConfirm(url,table,dataText,csrf,id);
    });
    });

    </script>
@endpush