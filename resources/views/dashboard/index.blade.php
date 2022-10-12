@extends('layout.main')

@push('page-css')

@endpush

@section('content')
<div class="container-fluid mt--6">
    <div class="information d-flex flex-column">
        <div class=" flex-row text-secondary">
            <h3 class="fw-bold" style="margin-left: 0.3em">Dashboard</h3>
        </div>

        <div class="row mt-4">
          <div class="col-xl-4">
            <div class="card debit">
              <h4 class="fw-bold">PENGIRIMAN</h4>
              <h3>87656 Item</h3>
              <div>
                <a href="pengiriman" class="nav-link text-white fw-bold">Lihat Detail</a>
              </div>
            </div>
          </div>
        
          <div class="col-xl-4">
            <div class="card debit">
              <h4 class="fw-bold">PERHITUNGAN</h4>
              <h4 class="fw-bold">Data Pengiriman</h4>
              <div>
                <a href="#" class="nav-link text-white fw-bold">Lihat Detail</a>
              </div>
            </div>
          </div>
        
          <div class="col-xl-4">
            <div class="card debit">
              <h4 class="fw-bold">GRAFIK</h4>
              <h4 class="fw-bold">Hasil Perhitungan</h4>
              <div>
                <a href="#" class="nav-link text-white fw-bold">Lihat Detail</a>
              </div>
            </div>
          </div>
  </div>
</div>
@endsection


