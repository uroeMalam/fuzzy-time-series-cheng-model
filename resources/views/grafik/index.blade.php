@extends('layout.main')

@push('page-css')

@endpush

@section('content')
<div class="container-fluid mt--6">
    <div class="information d-flex flex-column">
        <div class=" flex-row text-secondary">
            <h3 class="fw-bold" style="margin-left: 0.3em">Grafik</h3>
        </div>
        <div class="row px-1 mb-2">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    {{-- start top --}}
                    <P>Silahkan isi sesuai dengan dengan intruksi dibawah !</P>                  
                    <div class="row">
                        {{-- d2 --}}
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">D 1</span>
                                </div>
                                <input type="number" value="2" class="form-control" name="basic-d1" id="basic-d1" placeholder="d1">
                            </div>
                        </div>
                        {{-- d2 --}}
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">D 2</span>
                                </div>
                                <input type="number" value="66" class="form-control" name="basic-d2" id="basic-d2" placeholder="d2">
                            </div>
                        </div>
                        {{-- tahun --}}
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Bulan</span>
                                </div>
                                <input type="number" step="1" value="10" class="form-control" name="tahun" id="tahun" placeholder="Berapa bulan?">
                            </div>
                        </div>
                        {{-- tombol --}}
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-success btn-block" id="hitung">Hitung</button>
                        </div>
                    </div>
                    {{-- end top --}}
{{-- step 1 --}}
<hr>
                    <br><br>
                    <p><b>1. Menentukan universe of disourse</b></p>
                    {{-- start table --}}
                    <div class="row">
                        {{-- table --}}
                        <div class="col-sm-8">
                            <table class="table table-striped table-warning table-raw">
                                <thead>
                                  <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Years</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Qty</th>
                                  </tr>
                                </thead>
                              </table>
                        </div>
                        {{-- univere of disource --}}
                        <br>
                        <br>
                        <br>
                        <div class="col-sm-4">
                            <br><br>
                            <table class="table table-borderless">
                                <tbody>
                                  <tr>
                                    <td>D 1</td>
                                    <td>:</td>
                                    <td id="d1Value">0</td>
                                  </tr>
                                  <tr>
                                    <td>D 2</td>
                                    <td>:</td>
                                    <td id="d2Value">0</td>
                                  </tr>
                                  <tr>
                                    <td>Min</td>
                                    <td>:</td>
                                    <td id="minValue">{{ $min }}</td>
                                  </tr>
                                  <tr>
                                    <td>Max</td>
                                    <td>:</td>
                                    <td class="maxvalue">{{ $max }}</td>
                                  </tr>

                                </tbody>
                            </table>
                            <br>
                            {{-- start universe of disourse --}}
                            <table  class="table table-striped ">
                                <tbody>
                                    <tr>
                                        <td><b>U :</b></td>
                                        <td id="uSatu"><b>0</b></td>
                                        <td id="uDua"><b>0</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- end universe of disourse --}}
                        </div>
                    </div>
                    {{-- end table --}}
{{-- step 2 --}}
<hr>
                    <br><br>
                    <p><b>2. Menentukan Panjang Interval</b></p>
                    <div class="row mx-2">
                        <div class="col-4">
                            <small>> Menentukan Panjang Interval</small><br>
                            <small>-- n = 1 + 3,322 log (N)</small>
                            <h1 id="n">0</h1>
                        </div>
                        <div class="col-4">
                            <small>> menentukan rentang range </small><br>
                            <small>-- r = (Xmax + d2) - (Xmin - d1)</small>
                            <h1 id="r">0</h1>
                        </div>
                        <div class="col-4">
                            <small>> menentukan lebar interval</small><br>
                            <small>-- i = r / n</small>
                            <h1 id="i">0</h1>
                        </div>
                    </div>
                    <br>
                    <table class="table table-striped table-warning table-u" style="text-align: center">
                        <thead>
                          <tr>
                            <th colspan="4">liguistik interval</th>
                          </tr>
                          <tr>
                            <th scope="col">Interval</th>
                            <th scope="col">Start</th>
                            <th scope="col">Middle</th>
                            <th scope="col">End</th>
                          </tr>
                        </thead>
                        <tbody id="interval">
                        </tbody>
                    </table>
{{-- step 3 & 4 --}}
<hr>
                    <br><br>
                    {{-- step 3 & 4 --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>3. fuzifikasi</b></p>
                            <br>
                            <table class="table table-striped table-warning table-fuzifikasi" style="text-align: center">
                                <thead>
                                  <tr>
                                    <th colspan="4">fuzifikasi</th>
                                  </tr>
                                  <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Logistic Value</th>
                                  </tr>
                                </thead>
                                <tbody id="fuzifikasi">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <p class="ml-2"><b>4. Membentuk Fuzzy Logistik  (FLR)</b></p>
                            <br>
                            <table class="table table-striped table-warning table-fuzifikasi" style="text-align: center">
                                <thead>
                                  <tr>
                                    <th colspan="5">liguistik interval</th>
                                  </tr>
                                  <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahun interval</th>
                                    <th scope="col">Bulan interval</th>
                                    <th scope="col">FLR</th>
                                  </tr>
                                </thead>
                                <tbody id="flr"></tbody>
                            </table>
                        </div>
                    </div>
{{-- step 5 --}}
<hr>
                    <br><br>
                    <p><b>5. Membentuk Fuzzy Logistik group (FLRG)</b></p>
                    <br>
                    <div style="overflow-x:auto;">
                      <table class="table table-striped table-warning table-FLRG" style="text-align: center">
                        <thead>
                          <tr>
                            <th scope="col">Logistic</th>
                            <th scope="col">FLRG</th>
                            <th scope="col">FLRG interval</th>
                            <th scope="col">Titik Tengah</th>
                          </tr>
                        </thead>
                        <tbody id="flrg"></tbody>
                      </table>
                    </div>
{{-- step 6 --}}
<hr>
                    <br><br>
                    <p><b>6. Peramalan</b></p>
                    <br>
                    <table class="table table-striped table-warning table-hasil" style="text-align: center">
                        <thead>
                          <tr>
                            <th scope="col">Tahun</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Jumlah Sukses antar</th>
                            <th scope="col">linguistic Value</th>
                            {{-- <th scope="col">Titik Tengah Interval</th> --}}
                            <th scope="col">Ramalan</th>
                          </tr>
                        </thead>
                        <tbody id="peramalan"></tbody>
                    </table>
{{-- step 7 --}}
<hr>
                    <br><br>
                    <p><b>7. Peramalan Beberapa bulan kedepan</b></p>
                    <br>
                    <table class="table table-striped table-warning table-hasil" style="text-align: center">
                        <thead>
                          <tr>
                            <th scope="col">Bulan</th>
                            <th scope="col">linguistic Value</th>
                            <th scope="col">Titik Tengah Interval</th>
                            <th scope="col">Ramalan</th>
                          </tr>
                        </thead>
                        <tbody id="berikutnya"></tbody>
                    </table>
<hr>
                    <div class="row mx-2">
                      <div class="col-4">
                          <h2>MSE</h2>
                          <h1 id="mse">0</h1>
                      </div>
                    </div>
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
    var table = $('.table-raw').DataTable({                
        processing: true,
        serverSide: true,
        rowId:"id",
        ajax: {
            'url': "{{ route('grafik_dataTable') }}",
            'type': "get",
        },
        columns: [
            {orderable:false,searchable:false,data:'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'tahun', name: 'tahun'},
            {data: 'bulan', name: 'bulan'},
            {data: 'total', name: 'total'},
        ]
    });     

     // menjalankan tombol hitung
     $(document).on('click', '#hitung',function (e) {
        e.preventDefault();
        // restart mode biar klo di click lagi semua data bersih dan di tambah data baru
        document.getElementById("interval").innerHTML="";
        document.getElementById("fuzifikasi").innerHTML="";
        document.getElementById("flr").innerHTML="";
        document.getElementById("flrg").innerHTML="";
        document.getElementById("peramalan").innerHTML="";
        document.getElementById("berikutnya").innerHTML="";

        // create variable d1,d2,max,min
        const d1 = parseInt(document.getElementById("basic-d1").value)
        const d2 = parseInt(document.getElementById("basic-d2").value)
        const max = parseInt({{ $max }})
        const min = parseInt({{ $min  }})

        // show d1 and d2
        document.getElementById("d1Value").innerHTML = d1
        document.getElementById("d2Value").innerHTML = d2

        // create variable u
        const u1 = min-d1
        const u2 = max-d2

        // calculate U
        document.getElementById("uSatu").innerHTML = u1
        document.getElementById("uDua").innerHTML = u2

        // menentukan panjang interval
        // create variable panjang data (n)
        const length = parseInt({{ $length }})

        const n = 1 + 3.322 * Math.log10(length) //bullshit, di excel(E20) itu enggak dibulatkan, dia cuma gak nampilin angka di belakang koma, ini berpengaruh ke 1 nanti, aku ngikut excel
        const r = (max+d2)-(min-d1)
        const i = r/n //yang ini juga sama, enggak diibulatkan di excel cuma di gak ditampilin aja bilangan dibelakang koma

        document.getElementById('n').innerHTML = Math.round(n)
        document.getElementById('r').innerHTML = r
        document.getElementById('i').innerHTML = Math.round(i)

        // linguistic interval
        let u = []
        for (let index = 1; index <= Math.round(n); index++) {
            let temp = []
            temp['interval'] = "U" + index
            temp['left'] = min-d1 + ((index-1)*i) 
            temp['right'] = min-d1 + ((index)*i) 
            temp['titik_tengah'] = ((min-d1 + ((index-1)*i)) + (min-d1 + ((index)*i) )) / 2
            u.push(temp)
        }
        console.log(u);

        // add row to table interval (cuma untuk tampilan aja klo data udah diatas)
        for (let index = 0; index < Math.round(n); index++) {
            var table = document.getElementById("interval")
            var row = table.insertRow(0)
            var cell1 = row.insertCell(0)
            var cell2 = row.insertCell(1)
            var cell3 = row.insertCell(2)
            var cell4 = row.insertCell(3)

            cell1.innerHTML = u[index]['interval']
            cell2.innerHTML = u[index]['left']
            cell3.innerHTML = u[index]['titik_tengah']
            cell4.innerHTML = u[index]['right']
        }

        // 3. fuzifikasi
        // convert obj data to json and pass here, and convert to special char like /&quot;/g
        let dataFuzi = "{{ $data }}"
        let arrayFuzifikasi = JSON.parse(dataFuzi.replace(/&quot;/g,'"'))

        // loop data origin and show in table
        for (let index = 0; index < arrayFuzifikasi.length; index++) {
            // loop logistic value
            for (let index2 = 0; index2 < Math.round(n); index2++) {
                // compare 
                if (arrayFuzifikasi[index]['sukses_antar'] >= u[index2]['left'] && arrayFuzifikasi[index]['sukses_antar'] <= u[index2]['right']) {
                  // tahap 3
                  var table = document.getElementById("fuzifikasi")
                  var row = table.insertRow(0)
                  var cell1 = row.insertCell(0)
                  var cell2 = row.insertCell(1)
                  var cell3 = row.insertCell(2)
                  var cell4 = row.insertCell(3)
  
                  cell1.innerHTML = arrayFuzifikasi[index]['tahun']
                  cell2.innerHTML = arrayFuzifikasi[index]['bulan']
                  cell3.innerHTML = arrayFuzifikasi[index]['sukses_antar']
                  cell4.innerHTML = u[index2]['interval']

                  arrayFuzifikasi[index]['u'] = u[index2]['interval']
                }
                if (arrayFuzifikasi[index]['sukses_antar'] >= u[ Math.round(n)-1]['right']) {
                  var table = document.getElementById("fuzifikasi")
                  var row = table.insertRow(0)
                  var cell1 = row.insertCell(0)
                  var cell2 = row.insertCell(1)
                  var cell3 = row.insertCell(2)
                  var cell4 = row.insertCell(3)
  
                  cell1.innerHTML = arrayFuzifikasi[index]['tahun']
                  cell2.innerHTML = arrayFuzifikasi[index]['bulan']
                  cell3.innerHTML = arrayFuzifikasi[index]['sukses_antar']
                  cell4.innerHTML = u[ Math.round(n)-1]['interval']

                  arrayFuzifikasi[index]['u'] = u[ Math.round(n)-1]['interval']
                }
            }
        }        

        // 4
          console.log(arrayFuzifikasi)

          let flr = [] //untuk menampung semua data nanti

          for (let index = 0; index < arrayFuzifikasi.length; index++) {
            if (index < arrayFuzifikasi.length-1 ) {
              flr[index]=[]
              flr[index]['tahun_awal'] = arrayFuzifikasi[index]['tahun']
              flr[index]['bulan_awal'] = arrayFuzifikasi[index]['bulan']
              flr[index]['data_awal'] = arrayFuzifikasi[index]['sukses_antar']
              flr[index]['u_awal'] = arrayFuzifikasi[index]['u']
  
              flr[index]['tahun_sekarang'] = arrayFuzifikasi[index+1]['tahun']
              flr[index]['bulan_sekarang'] = arrayFuzifikasi[index+1]['bulan']
              flr[index]['data_sekarang'] = arrayFuzifikasi[index+1]['sukses_antar']
              flr[index]['u_sekarang'] = arrayFuzifikasi[index+1]['u']
            }
        }

        console.log(flr);

        // show data to flr table
        for (let index = 0; index < flr.length; index++) {
          var table = document.getElementById("flr")
          var row = table.insertRow(0)
          var cell1 = row.insertCell(0)
          var cell2 = row.insertCell(1)
          var cell3 = row.insertCell(2)
          var cell4 = row.insertCell(3)
          var cell5 = row.insertCell(4)

          cell1.innerHTML = flr[index]['tahun_awal']
          cell2.innerHTML = flr[index]['bulan_awal']
          cell3.innerHTML = flr[index]['tahun_sekarang']
          cell4.innerHTML = flr[index]['bulan_sekarang']
          cell5.innerHTML = flr[index]['u_sekarang']
        } 

        // 5. Membentuk Fuzzy Logistik group (FLRG)
        let flrg = []
        for (let index = 0; index < Math.round(n); index++) {
          flrg[index]=[]
          flrg[index]['interval_awal'] = u[index]['interval']

          flrg[index]['interval_perubah']= []
          flrg[index]['value_perubah']= []
          for (let i = 0; i < flr.length; i++) {
            if (u[index]['interval'] == flr[i]['u_awal']) { // untuk menyamakan 6 nilai interval awal dengan nilai di step 4
              if(flrg[index]['interval_perubah'].indexOf(flr[i]['u_sekarang']) === -1) { //kalau sama data akan di tampung sekaligus akan di sort agar tidak menimbulkan nilai duplicate
                  flrg[index]['interval_perubah'].push(flr[i]['u_sekarang']); //push nilai flrg
                  for (let iq = 0; iq < Math.round(n); iq++) { //fungsi mengambil nilai tengah
                    if (flr[i]['u_sekarang'] == u[iq]['interval']) {
                      flrg[index]['value_perubah'].push(u[iq]['titik_tengah']); //mengambil titik tengah sesuai dengan intervalnya
                    }
                  }
              }
            }
          }
        }

        // show data to flrg table
        for (let index = 0; index < flrg.length; index++) {
          var table = document.getElementById("flrg")
          var row = table.insertRow(0)
          var cell1 = row.insertCell(0)
          var cell2 = row.insertCell(1)
          var cell3 = row.insertCell(2)
          var cell4 = row.insertCell(3)

          cell1.innerHTML = flrg[index]['interval_awal']
          cell2.innerHTML = flrg[index]['interval_perubah']
          cell3.innerHTML = flrg[index]['value_perubah']
          cell4.innerHTML = flrg[index]['value_perubah'].reduce((a, b) => a + b, 0) / flrg[index]['value_perubah'].length

          flrg[index]['titik_tengah']= flrg[index]['value_perubah'].reduce((a, b) => a + b, 0) / flrg[index]['value_perubah'].length
        } 

        console.log(flrg);


        // step 6
        // loop data origin and show in table
        var hasil = []
        arrayFuzifikasi.reverse()
        for (let index = 0; index < arrayFuzifikasi.length; index++) {
            var table = document.getElementById("peramalan")
            var row = table.insertRow(0)
            var cell1 = row.insertCell(0)
            var cell2 = row.insertCell(1)
            var cell3 = row.insertCell(2)
            var cell4 = row.insertCell(3)
            var cell5 = row.insertCell(4)
            // var cell6 = row.insertCell(5)

            cell1.innerHTML = arrayFuzifikasi[index]['tahun']
            cell2.innerHTML = arrayFuzifikasi[index]['bulan']
            cell3.innerHTML = arrayFuzifikasi[index]['sukses_antar']
            cell4.innerHTML = arrayFuzifikasi[index]['u']

            var temp = []
            temp['tahun'] = arrayFuzifikasi[index]['tahun']
            temp['bulan'] = arrayFuzifikasi[index]['bulan']
            temp['sukses_antar'] = arrayFuzifikasi[index]['sukses_antar']
            temp['u'] = arrayFuzifikasi[index]['u']

            for (let i = 0; i < flrg.length; i++) {
              // if (flrg[i]['interval_awal'] == arrayFuzifikasi[index]['u']) {
              //   cell5.innerHTML = flrg[i]['titik_tengah']
              // }
              if (arrayFuzifikasi[index]) {
                if (flrg[i]['interval_awal'] == arrayFuzifikasi[index]['u']) {
                  temp['titik_tengah'] = flrg[i]['titik_tengah']
                }
              }
              if (arrayFuzifikasi[index+1]) {
                if (flrg[i]['interval_awal'] == arrayFuzifikasi[index+1]['u']) {
                  cell5.innerHTML = flrg[i]['titik_tengah']
                  arrayFuzifikasi[index]['ramal_value'] = flrg[i]['titik_tengah']
                  temp['ramal_value'] = flrg[i]['titik_tengah']
                }
              }
            }
            hasil.push(temp)
        } 

        const tahun = parseInt(document.getElementById("tahun").value)

        console.log(hasil) //to check all data peramalan
        console.log(hasil[0]['ramal_value']); //buat patokan data ramalan nanti

        // data ramalan beberapa tahun kedepan
        var nextRamal = []
        for (let index = 0; index < tahun; index++) {
          let titik_tengah = (nextRamal.length == 0 ? hasil[0]['titik_tengah'] : nextRamal[nextRamal.length - 1]['titik_tengah'])
          let next = (nextRamal.length == 0 ? hasil[0]['ramal_value'] : nextRamal[nextRamal.length - 1]['ramal'])
          var temp = []
          for (let index2 = 0; index2 < Math.round(n); index2++) { //ngambil banyak data logistik interval [u1,u2,u3,..,un]
            if (next >= u[index2]['left'] && next <= u[index2]['right']) {
              temp['logistik_value'] = u[index2]['interval']
                for (let index3 = 0; index3 < Math.round(n); index3++) { //untuk mengambil nilai dari flr grup
                  if (temp['logistik_value'] == flrg[index3]['interval_awal']) { //check flr grup
                    temp['titik_tengah'] = flrg[index3]['titik_tengah']
                    temp['preveous_ramal'] = next
                    temp['ramal'] = titik_tengah
                  }
                }
            }            
          }
          nextRamal.push(temp)
        }
        console.log(nextRamal);

        // step 7
        // peramalan-berikutnya
        
        console.log(tahun);
        console.log(arrayFuzifikasi[0]['ramal_value']); //last value from step 6

        for (let index = tahun -1; index >= 0; index--) {
            var table = document.getElementById("berikutnya")
            var row = table.insertRow(0)
            var cell0 = row.insertCell(0)
            var cell1 = row.insertCell(1)
            var cell2 = row.insertCell(2)
            var cell3 = row.insertCell(3)

            cell0.innerHTML = "Bulan ke-" + (index+1)
            cell1.innerHTML = nextRamal[index]['logistik_value']
            cell2.innerHTML = nextRamal[index]['titik_tengah']
            cell3.innerHTML = nextRamal[index]['ramal']
        } 
        //end step 7

        // mse
        let mse;
        let arr_sum = []
        hasil.reverse()
        for (let i = 1; i < arrayFuzifikasi.length; i++)
        {
          arr_sum.push(Math.pow(hasil[i]['sukses_antar']-hasil[i]['ramal_value'],2))
        }
        mse = 1 / arrayFuzifikasi.length * (arr_sum.reduce((a, b) => a + b, 0))
        console.log(mse);
        document.getElementById('mse').innerHTML = ''
        document.getElementById('mse').innerHTML =  Math.ceil(mse)

        // end click
        
    });

});

</script>
@endpush