<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col">
                <div class="form-group">       
                    <label for="tahun">Tahun</label>
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="">Pilih Tahun</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
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
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                    <small class="d-none text-danger" id="bulan"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div hidden class="col">
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" class="form-control" id="total" name="total" aria-describedby="total">
                    <small class="d-none text-denger" id="total"></small>
                </div>
            </div>
        <div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="sukses_antar">Sukses Antar</label>
                    <input type="number" class="form-control" id="sukses_antar" name="sukses_antar" aria-describedby="sukses_antar">
                    <small class="d-none taxt-denger" id="sukses_antar"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="gagal_antar">Gagal Antar</label>
                    <input type="number" class="form-control" id="gagal_antar" name="gagal_antar" aria-describedby="gagal_antar">
                    <small class="d-none text-denger" id="gagal_antar"></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="retus">Retus</label>
                    <input type="number" class="form-control" id="retus" name="retus" aria-describedby="retus">
                    <small class="d-none taxt-denger" id="retus"></small>
                </div>
            </div>
        </div>
        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-warning" id="btnCreate">Tambah</button>
                </div>
            </div>
    </form>
</div>