@extends('layouts.global')

@section('content')
<h1 class="section-header">
        <div>Input Data Pengunjung</div>
    </h1>
        <div class="row">
        <div class="container mt-12">
            <div class="row">
              <div class="col-12 col-sm-12 offset-sm-12 col-md-12 offset-md-12 col-lg-12 offset-lg-12 col-xl-12 offset-xl-12">
                <div class="card card-primary">
                  {{-- <div class="card-header"><h4>Upload Data</h4></div> --}}
    
                  <div id="input" class="card-body">
                    <form action="{{ route('inputPengunjungSave') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="form-group col-12">
                          <label for="nama">Nama</label>
                          <label style="color:red">*</label>
                          <input id="nama" type="text" class="form-control" name="nama" required autofocus>
                        </div>
                        <div class="form-group col-12">
                            <label for="email">Email</label>
                            <label style="color:red">*</label>
                            <input id="email" type="text" class="form-control" name="email" required autofocus>
                        </div>
                        <div class="form-group col-12">
                          <label for="warga_negara">Warga Negara</label>
                          <label style="color:red">*</label>
                          <select name="warga_negara" id="warga_negara" class="form-control" required>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                          </select>
                        </div>
                        {{-- <div class="form-group col-12">
                          <label for="pengunjung">Jumlah Pengunjung</label>
                          <label style="color:red">*</label>
                          <input id="pengunjung" type="text" class="form-control" name="jumlahpengunjung" required>
                        </div> --}}
                        <div class="form-group col-12">
                            <label for="asal">Asal</label>
                            <label style="color:red">*</label>
                            <input id="asal" type="text" class="form-control" name="asal" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="no_hp">No Hp</label>
                            <label style="color:red">*</label>
                            <input id="no_hp" type="text" class="form-control" name="no_hp" required>
                        </div>
                        <div class="form-group col-12">
                          <label for="">Child</label>
                          <label style="color:red">*</label>
                          <select name="child" id="child" class="form-control" required>
                            @php
                              for($i=0; $i<=35; $i++){
                                    echo '
                                        <option value="'.$i.'">'.$i.'</option>
                                    ';
                                }
                            @endphp
                          </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="college">College</label>
                            <label style="color:red">*</label>
                            <select name="college" id="college" class="form-control" required>
                                @php
                                for($i=0; $i<=35; $i++){
                                      echo '
                                          <option value="'.$i.'">'.$i.'</option>
                                      ';
                                  }
                              @endphp
                            </select>
                          </div>
                        <div class="form-group col-12">
                          <label for="adult">Adult</label>
                          <label style="color:red">*</label>
                          <select name="adult" id="adult" class="form-control" required>
                              @php
                              for($i=0; $i<=35; $i++){
                                    echo '
                                        <option value="'.$i.'">'.$i.'</option>
                                    ';
                                }
                            @endphp
                          </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="total_harga">Total Harga</label>
                            <label style="color:red">*</label>
                            <input id="total_harga" type="text" class="form-control"  name="total_harga" required readonly/>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">
                          Simpan
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>                         
        </div>
@endsection

@section('js')
    <script>
      var adult = 5000;
      var child = 2000;
      var college = 3000;
      var adultGroup = 3750;
      var childGroup = 1500;
      var collegeGroup = 2250;
      $("#child").change(function() {
        var child_h = document.getElementById("child").value;
        var adult_h = document.getElementById("adult").value;
        var college_h = document.getElementById("college").value;
        var count = parseInt(child_h)+parseInt(adult_h)+parseInt(college_h);
        if(count > 29) {
          var total = (child_h*childGroup) + (adult_h*adultGroup) + (college_h*collegeGroup);
        } else {
          var total = (child_h*child) + (adult_h*adult) + (college_h*college);
        }
        document.getElementById("total_harga").value = total;
      });
      $("#adult").change(function() {
        var child_h = document.getElementById("child").value;
        var adult_h = document.getElementById("adult").value;
        var college_h = document.getElementById("college").value;
        var count = parseInt(child_h)+parseInt(adult_h)+parseInt(college_h);
        if(count > 29) {
          var total = (child_h*childGroup) + (adult_h*adultGroup) + (college_h*collegeGroup);
        } else {
          var total = (child_h*child) + (adult_h*adult) + (college_h*college);
        }

        document.getElementById("total_harga").value = total;
      });
      $("#college").change(function() {
        var child_h = document.getElementById("child").value;
        var adult_h = document.getElementById("adult").value;
        var college_h = document.getElementById("college").value;
        var count = parseInt(child_h)+parseInt(adult_h)+parseInt(college_h);
        if(count > 29) {
          var total = (child_h*childGroup) + (adult_h*adultGroup) + (college_h*collegeGroup);
        } else {
          var total = (child_h*child) + (adult_h*adult) + (college_h*college);
        }

        document.getElementById("total_harga").value = total;
      });
    </script>
@endsection