@extends('layout.laystaf')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="/staf" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data</li>
    <li class="dropdown">
      <a href="/datadusun" class="nav-link"><i data-feather="map"></i><span>Data Dusun</span></a>
    </li>
    <li class="dropdown active">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="users"></i><span>Data Pengguna</span></a>
      <ul class="dropdown-menu">
        <li class="active"><a class="nav-link" href="/datastaf">Staf IT</a></li>
        <li><a class="nav-link" href="/datakades">Kepala Desa</a></li>
        <li><a class="nav-link" href="/dataketrw">Ketua RW</a></li>
        <li><a class="nav-link" href="/dataketrt">Ketua RT</a></li>
        <li><a class="nav-link" href="/datawarga">Warga</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="/datakatberita" class="nav-link"><i data-feather="tag"></i><span>Data Kategori Berita</span></a>
    </li>
    <li class="dropdown">
      <a href="/databeritastaf" class="nav-link"><i data-feather="file-text"></i><span>Data Berita</span></a>
    </li>
    <li class="dropdown">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="tag"></i><span> Kategori Berita </span></a>
      <ul class="dropdown-menu">
        @foreach($katb as $kb)
        <li><a class="nav-link" href="/beritastaf:kat={{$kb->JENIS_KAT}}"> Berita {{$kb->JENIS_KAT}} </a></li>
        @endforeach
      </ul>
    </li>
  </ul>
@endsection
<?php 
    $no = 1;
?>

@section('content')
  <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Staf IT</h4>
            </div>
            <div class="card-body">
              <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModalCenter"  style="margin-bottom: 10px;"><i class="fas fa-plus-square"></i> Tambah Data Pengguna</a>
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="save-stage" style="width: 100%;">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $dat)
                      <tr>
                          <td style="text-align: center;">{{$no++}}</td>
                          <td>{{$dat->NAMA}}</td>
                          <td>{{$dat->EMAIL}}</td>
                          <td>{{$dat->USERNAME}}</td>
                          <td>{{$dat->PASSWORD}}</td>
                          <td style="width: 150px;">
                              <a href="#" class="btn btn-icon btn-outline-info" data-toggle="modal" data-target="#infoPengguna{{$dat->PENG_ID}}"><i class="fas fa-info-circle"></i></a> 
                              <a href="#" class="btn btn-icon btn-outline-warning" data-toggle="modal" data-target="#editPengguna{{$dat->PENG_ID}}"><i class="far fa-edit"></i></a> 
                              <a href="/pengguna:del={{$dat->PENG_ID}}" class="btn btn-outline-danger btn-icon" onclick="return(confirm('Anda Yakin ?'));"><i class="fas fa-trash"></i></a>
                          </td>
                      </tr>
                      @endforeach
                      </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Staf IT</h5>
        </div>
        <form action="{{url('/add_pengguna')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
                    @foreach($idp as $id)
                    <input type="hidden" name="idp" value="{{$id->PENG_ID+1}}" readonly="">
                    @endforeach

                    <input type="hidden" name="level" value="Staf IT" readonly="">
                    <center>
                        FOTO<br>
                       <img id="image-preview" style="width: 130px; height: 130px;margin: 10px 0px 10px 0px;border:1px solid white;border-radius: 100px;margin-bottom: 20px;"><br>
                        <input type="file" name="foto" class="form-control" id="image-source" onchange="previewImage();" autocomplete="off" style="margin-bottom: 25px;">
                    </center>
                </div>
                <div class="col-md-8">
                    
                    <div class="form-group">
                        <label for="pwd">Nama</label>
                        <input class="form-control" type="text" name="nama" placeholder="nama lengkap" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="email" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Username</label>
                        <input class="form-control" type="text" name="user" placeholder="username" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input class="form-control" type="text" name="pass" placeholder="password" autocomplete="off" required="">
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Batal</button>
              <button class="btn btn-primary"><i class="far fa-check-circle"></i> Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  @foreach($data as $ed)
  <div class="modal fade" id="infoPengguna{{$ed->PENG_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Info Staf IT</h5>
        </div>
        <?php 
            $id = $ed->PENG_ID;
            $edit = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
        ?>
        @foreach($edit as $upd)
            <div class="modal-body">             
              <div class="row">
                <div class="col-md-4">
                    <center>                       
                      <img src="assets/foto/{{$ed->FOTO}}" style="width: 120px; height: 120px;margin: 0px 0px 0px 0px;border:1px solid white;border-radius: 100px;margin-bottom: 20px;">
                        
                    </center>
                    <input type="hidden" name="level" value="Staf IT" readonly="">
                </div>
                <div class="col-md-8">
                  <style type="text/css">
                    table tr td{
                      padding: 5px;
                    }
                  </style>
                    <table>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$ed->NAMA}}</td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td>{{$ed->USERNAME}}</td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>{{$ed->PASSWORD}}</td>
                      </tr>
                      <tr>
                        <td>Level</td>
                        <td>:</td>
                        <td>{{$ed->LEVEL}}</td>
                      </tr>
                    </table>
                    
                </div>
              </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Batal</button>
            </div>
        @endforeach
      </div>
    </div>
  </div>
  @endforeach


  @foreach($data as $ed)
  <div class="modal fade" id="editPengguna{{$ed->PENG_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Staf IT</h5>
        </div>
        <?php 
            $id = $ed->PENG_ID;
            $edit = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
        ?>
        @foreach($edit as $upd)
        <form action="/pengguna:upd={{$upd->PENG_ID}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="modal-body">             
              <div class="row">
                <div class="col-md-4">
                    <center>
                        FOTO<br><br>
                       <!-- <img id="image-preview" style="width: 130px; height: 130px;margin: 10px 0px 10px 0px;border:1px solid white;border-radius: 100px;margin-bottom: 20px;"><br> -->
                        <input type="file" name="foto" class="form-control" id="image-source" onchange="previewImage();" autocomplete="off" style="margin-bottom: 25px;">
                        <input type="hidden" name="level" value="Staf IT">
                    </center>
                    <input type="hidden" name="level" value="Staf IT" readonly="">
                </div>
                <div class="col-md-8">
                    
                    <div class="form-group">
                        <label for="pwd">Nama</label>
                        <input class="form-control" type="text" name="nama" value="{{$upd->NAMA}}" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email</label>
                        <input class="form-control" type="email" name="email" value="{{$upd->EMAIL}}" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Username</label>
                        <input class="form-control" type="text" name="user" value="{{$upd->USERNAME}}" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input class="form-control" type="text" name="pass" value="{{$upd->PASSWORD}}" autocomplete="off" required="">
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Batal</button>
              <button class="btn btn-primary"><i class="far fa-check-circle"></i> Ubah</button>
            </div>
        </form>
        @endforeach
      </div>
    </div>
  </div>
  @endforeach
 


  @endsection