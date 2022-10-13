<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")
        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" aria-describedby="id" hidden>
        <div class="row">
            <div class="col">
                <div class="form-group">       
                    <label for="tahun">Tahun</label>
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="">Pilih Tahun</option>
                        <option value="2019" {{($data->tahun == "2019") ? "selected" :""}}>2019</option>
                        <option value="2020" {{($data->tahun == "2020") ? "selected" :""}}>2020</option>
                        <option value="2021" {{($data->tahun == "2021") ? "selected" :""}}>2021</option>
                        <option value="2022" {{($data->tahun == "2022") ? "selected" :""}}>2022</option>
                    </select>
                    <small class="d-none text-danger" id="tahun"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">    
                    <label for="bulan">Bulan</label>
                    <select class="form-control" name="bulan" id="bulan">
                        <option value="">PIlih Bulan</option>
                        <option value="Januari" {{($data->bulan == "Januari") ? "selected" :""}}>Januari</option>
                        <option value="Februari" {{($data->bulan == "Februari") ? "selected" :""}}>Februari</option>
                        <option value="Maret" {{($data->bulan == "Maret") ? "selected" :""}}>Maret</option>
                        <option value="April"> {{($data->bulan == "April") ? "selected" :""}}April</option>
                        <option value="Mei" {{($data->bulan == "Mei") ? "selected" :""}}>Mei</option>
                        <option value="Juni" {{($data->bulan == "Juni") ? "selected" :""}}>Juni</option>
                        <option value="Juli" {{($data->bulan == "Juli") ? "selected" :""}}>Juli</option>
                        <option value="Agustus" {{($data->bulan == "Agustus") ? "selected" :""}}>Agustus</option>
                        <option value="September" {{($data->bulan == "September") ? "selected" :""}}>September</option>
                        <option value="Oktober" {{($data->bulan == "Oktober") ? "selected" :""}}>Oktober</option>
                        <option value="November" {{($data->bulan == "November") ? "selected" :""}}>November</option>
                        <option value="Desember"  {{($data->bulan == "Desember") ? "selected" :""}}>Desember</option>
                    </select>
                    <small class="d-none text-danger" id="bulan"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="total">Total</label>
                    <input disabled type="number" class="form-control" id="total" name="total" value="{{ $data->sukses_antar+$data->gagal_antar+$data->retus }}" aria-describedby="total">
                    <small class="d-none text-denger" id="total"></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="sukses_antar">Sukses Antar</label>
                    <input type="number" class="form-control" id="sukses_antar" name="sukses_antar" value="{{ $data->sukses_antar }}" aria-describedby="sukses_antar">
                    <small class="d-none taxt-denger" id="sukses_antar"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="gagal_antar">Gagal Antar</label>
                    <input type="number" class="form-control" id="gagal_antar" name="gagal_antar" value="{{ $data->gagal_antar }}" aria-describedby="gagal_antar">
                    <small class="d-none text-denger" id="gagal_antar"></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="retus">Retus</label>
                    <input type="number" class="form-control" id="retus" name="retus" value="{{ $data->retus }}" aria-describedby="retus">
                    <small class="d-none taxt-denger" id="retus"></small>
                </div>
            </div>
        </div>
        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-warning" id="btnEdit">Edit</button>
                </div>
            </div>
    </form>
</div>