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
        <li><a class="nav-link" href="/datastaf">Staf IT</a></li>
        <li><a class="nav-link" href="/datakades">Kepala Desa</a></li>
        <li><a class="nav-link" href="/dataketrw">Ketua RW</a></li>
        <li><a class="nav-link" href="/dataketrt">Ketua RT</a></li>
        <li class="active"><a class="nav-link" href="/datawarga">Warga</a></li>
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
    $gen = array('Laki-laki','Perempuan');
    $aga = array('Islam','Kristen(Protestan)','Katolik','Hindu','Buddha','Kong Hu Cu');
?>

@section('content')
  <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Warga</h4>
            </div>
            <div class="card-body">
              
        @foreach($data as $upd)
        <form action="/pengguna:upd={{$upd->PENG_ID}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="modal-body">             
              <div class="row">
                <div class="col-md-3">
                    <center>
                        FOTO<br><br>
                       <!-- <img id="image-preview" style="width: 130px; height: 130px;margin: 10px 0px 10px 0px;border:1px solid white;border-radius: 100px;margin-bottom: 20px;"><br> -->
                        <input type="file" name="foto" class="form-control" id="image-source" onchange="previewImage();" autocomplete="off" style="margin-bottom: 25px;">
                        <input type="hidden" name="level" value="Staf IT">
                    </center>
                    <input type="hidden" name="level" value="Warga" readonly="">
                </div>
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pwd">Dusun</label>
                        <select class="form-control select2" name="dusun" id="edusun" required="">
                            @foreach($dusun as $ds)
                              <?php if ($ds->DUSUN_ID == $upd->DUSUN_ID){ ?>
                                 <option value="{{$ds->DUSUN_ID}}" selected="">{{$ds->NAMA_DSN}}</option>
                              <?php }else{ ?>
                                <option value="{{$ds->DUSUN_ID}}">{{$ds->NAMA_DSN}}</option>
                              <?php }?>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Rukun Warga</label>
                        <select class="form-control select2" name="rw" id="erw" required="">
                            @foreach($rukwa as $rw)
                              <?php if ($rw->RW_ID == $upd->RW_ID){ ?>
                                 <option value="{{$rw->RW_ID}}" selected="">{{$rw->RW}}</option>
                              <?php }else{ ?>
                                <option value="{{$rw->RW_ID}}">{{$rw->RW}}</option>
                              <?php }?>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Rukun Tetangga</label>
                        <select class="form-control select2" name="rt" id="ert" required="">
                            @foreach($rukte as $rt)
                              <?php if ($rt->RT_ID == $upd->RT_ID){ ?>
                                 <option value="{{$rt->RT_ID}}" selected="">{{$rt->RT}}</option>
                              <?php }else{ ?>
                                <option value="{{$rt->RT_ID}}">{{$rt->RT}}</option>
                              <?php }?>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Alamat</label>
                        <input class="form-control" type="text" name="alamat" value="{{$upd->ALAMAT}}" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="pwd">NIK</label>
                          <input class="form-control" type="text" name="nik" value="{{$upd->NIK}}" placeholder="max 16 digit" max="9999999999999999" autocomplete="off" required="" readonly="">
                      </div>
                      <div class="form-group">
                          <label for="pwd">Gender</label>
                          <select class="form-control" name="gender" required="">
                              @foreach($gen as $ge)
                              <?php if ($ge == $upd->GENDER){ ?>
                                 <option value="{{$ge}}" selected="">{{$ge}}</option>
                              <?php }else{ ?>
                                <option value="{{$ge}}">{{$ge}}</option>
                              <?php }?>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="pwd">Agama</label>
                          <select class="form-control" name="agama" required="">
                              @foreach($aga as $ag)
                              <?php if ($ag == $upd->AGAMA){ ?>
                                 <option value="{{$ag}}" selected="">{{$ag}}</option>
                              <?php }else{ ?>
                                <option value="{{$ag}}">{{$ag}}</option>
                              <?php }?>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="pwd">Nomor Ponsel</label>
                          <input class="form-control" type="number" name="no" value="{{$upd->NO_TELP}}" max="9999999999999" placeholder="max 13 digit" autocomplete="off" required="">
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <a href="/datawarga" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Batal</a>
              <button class="btn btn-primary"><i class="far fa-check-circle"></i> Ubah</button>
            </div>
        </form>
        @endforeach
            </div>
          </div>
        </div>
      </div>
  </section>



  
 


  @endsection