@extends('layouts.global')

@section('content')
<div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pengunjung</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTables-example">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>Email</th>
                          <th>No HP</th>
                          <th>WNA/WNI</th>
                          <th>Asal</th>
                          <th>Child</th>
                          <th>Adult</th>
                          <th>College</th>
                          <th>Total Harga</th>
                          <th>Tanggal Kunjungan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->warga_negara }}</td>
                            <td>{{ $data->asal }}</td>
                            <td>{{ $data->child }}</td>
                            <td>{{ $data->adult }}</td>
                            <td>{{ $data->college }}</td>
                            <td>{{ $data->total_harga }}</td>
                            <td>{{ $data->tanggal }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                      <th>Total</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>{{ $child }}</th>
                      <th>{{ $adult }}</th>
                      <th>{{ $college }}</th>
                      <th>
                          {{ $total }}
                      </th>
                  </tfoot>
                </table>
                @if (\Route::current()->getName() == 'dataPengunjung')
                  <a href="{{ route('exporttoExcel') }}" class="btn btn-success btn-block">Export Excel</a>  
                @else
                  <a href="{{ route('exporttoExcelNow') }}" class="btn btn-success btn-block">Export Excel</a>  
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
        $("table").DataTable({
            "ordering" : false
            });
        });
    </script>
@endsection