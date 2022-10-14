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
                    <br><br>
                    {{-- end top --}}
                    <canvas id="myChart" width="400" height="400"></canvas>
{{-- step 1 --}}
<hr>
                    <br><br>
                    <p><b>Seluruh data</b></p>
                    {{-- start table --}}
                    <div class="row">
                        {{-- table --}}
                        <div class="col-sm-12">
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
                    </div>
                    {{-- end table --}}
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

        // create variable d1,d2,max,min
        const d1 = parseInt(document.getElementById("basic-d1").value)
        const d2 = parseInt(document.getElementById("basic-d2").value)
        const max = parseInt({{ $max }})
        const min = parseInt({{ $min  }})

        // create variable u
        const u1 = min-d1
        const u2 = max-d2

        // menentukan panjang interval
        // create variable panjang data (n)
        const length = parseInt({{ $length }})

        const n = 1 + 3.322 * Math.log10(length) //bullshit, di excel(E20) itu enggak dibulatkan, dia cuma gak nampilin angka di belakang koma, ini berpengaruh ke 1 nanti, aku ngikut excel
        const r = (max+d2)-(min-d1)
        const i = r/n //yang ini juga sama, enggak diibulatkan di excel cuma di gak ditampilin aja bilangan dibelakang koma

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
                  arrayFuzifikasi[index]['u'] = u[index2]['interval']
                }
                if (arrayFuzifikasi[index]['sukses_antar'] >= u[ Math.round(n)-1]['right']) {
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
          flrg[index]['titik_tengah']= flrg[index]['value_perubah'].reduce((a, b) => a + b, 0) / flrg[index]['value_perubah'].length
        } 

        console.log(flrg);


        // step 6
        // loop data origin and show in table
        var hasil = []
        arrayFuzifikasi.reverse()
        for (let index = 0; index < arrayFuzifikasi.length; index++) {
            var temp = []
            temp['tahun'] = arrayFuzifikasi[index]['tahun']
            temp['bulan'] = arrayFuzifikasi[index]['bulan']
            temp['sukses_antar'] = arrayFuzifikasi[index]['sukses_antar']
            temp['u'] = arrayFuzifikasi[index]['u']

            for (let i = 0; i < flrg.length; i++) {
              if (arrayFuzifikasi[index]) {
                if (flrg[i]['interval_awal'] == arrayFuzifikasi[index]['u']) {
                  temp['titik_tengah'] = flrg[i]['titik_tengah']
                }
              }
              if (arrayFuzifikasi[index+1]) {
                if (flrg[i]['interval_awal'] == arrayFuzifikasi[index+1]['u']) {
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
                    temp['date'] = "Bulan ke-" + (index+1)
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
        //end step 7

        // data chart & label
        let dataChart = []
        let labelChart = []
        let TrainingData = []
        let PeramalanData = []
        for (let index = 0; index < arrayFuzifikasi.length; index++) {
            dataChart.push(arrayFuzifikasi[index]['sukses_antar'])            
            labelChart.push(arrayFuzifikasi[index]['bulan'] + ' ' + arrayFuzifikasi[index]['tahun'])  

            TrainingData.push(hasil[index]['ramal_value'])            
            PeramalanData.push(hasil[index]['ramal_value'])            
        }
        
        dataChart.reverse()
        labelChart.reverse()
        TrainingData.reverse()
        PeramalanData.reverse()

        // add peramalan
        for (let index = 0; index < nextRamal.length; index++) {
            labelChart.push(nextRamal[index]['date'])  
            PeramalanData.push(nextRamal[index]['ramal']) 
        }

        console.log(dataChart);
        console.log(labelChart);
        console.log(TrainingData);
        console.log(PeramalanData);
        // label bulan+tahun
        // data bulan+tahun
        // data training bulan+tahun
        // label peramalah
        const labelPeramalan = []
        // data peramalan
        const dataPeramalan = []

        // chart start
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelChart,
                datasets: [
                    {
                        label: 'Data Awal',
                        data: dataChart,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: 'Data Training',
                        data: TrainingData,
                        backgroundColor: [
                            'rgba(65, 138, 212,0.2)', 
                        ],
                        borderColor: [
                            'rgba(65, 138, 212,1)',
                        ],
                        borderWidth: 2,
                    },
                    {
                        label: 'Data Peramalan',
                        data: PeramalanData,
                        backgroundColor: [
                            'rgba(92, 179, 25,0.2)', //ganti opcity nya kalau mau nampilin titik chart
                        ],
                        borderColor: [
                            'rgba(92, 179, 25,1)',
                        ],
                        borderWidth: 2,
                        // stepped: true,
                    },
            ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min:1900
                    }
                }
            }
        });
        // chart end


        // end click
        
    });

});

</script>
@endpush