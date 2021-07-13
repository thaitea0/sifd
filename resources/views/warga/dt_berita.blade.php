@extends('layout.laywarga')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="/warga" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data Berita</li>
    <li class="dropdown active">
      <a href="#" class="nav-link"><i data-feather="bookmark"></i><span>Data Berita</span></a>
    </li>
    <li class="dropdown">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="tag"></i><span> Kategori Berita </span></a>
      <ul class="dropdown-menu">
        @foreach($katb as $kb)
        <li><a class="nav-link" href="/berita:kat={{$kb->JENIS_KAT}}"> Berita {{$kb->JENIS_KAT}} </a></li>
        @endforeach
      </ul>
    </li>
  </ul>
@endsection

<?php $no = 1; ?>

@section('content')
  <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Berita</h4>
            </div>
            <div class="card-body">
              <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModalCenter"  style="margin-bottom: 10px;"><i class="fas fa-plus-square"></i> Tambah Data Berita</a>
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="save-stage" style="width: 100%;">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Kategori</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $dat)
                      <tr>
                          <td style="width: 30px;">{{$no++}}</td>
                          <td>{{$dat->JUDUL}}</td>
                          <td style="width: 50px;text-align: center;">{{$dat->JENIS_KAT}}</td>
                          <td style="width: 50px;text-align: center;">{{$dat->STATUS}}</td>
                          <td style="width: 150px;">
                              <a href="#" class="btn btn-icon btn-outline-info" data-toggle="modal" data-target="#infoBerita{{$dat->BERITA_ID}}"><i class="fas fa-info-circle"></i></a> 
                              <a href="#" class="btn btn-icon btn-outline-warning" data-toggle="modal" data-target="#editBerita{{$dat->BERITA_ID}}"><i class="far fa-edit"></i></a> 
                              <a href="/berita:del={{$dat->BERITA_ID}}" class="btn btn-outline-danger btn-icon" onclick="return(confirm('Anda Yakin ?'));"><i class="fas fa-trash"></i></a>
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
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Berita</h5>
        </div>
        <form action="{{url('/add_berita')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-3">
                      @foreach($idb as $id)
                      <input type="hidden" name="idb" value="{{$id->BERITA_ID+1}}" readonly="">
                      @endforeach
                      <input type="hidden" name="rw" value="{{Session::get('rwid')}}">
                      <input type="hidden" name="rt" value="{{Session::get('rtid')}}">
                      <input type="hidden" name="pen" value="{{Session::get('idp')}}">
                      <center>
                          FOTO<br>
                         <img id="image-preview" style="width: 250px; height: 145px;margin: 10px 0px 5px 0px;border:1px solid lightgrey;margin-bottom: 20px;border-radius: 10px;"><br>
                          <input type="file" name="foto" class="form-control-file" id="image-source" onchange="previewImage();" autocomplete="off" style="margin-bottom: 25px;">
                      </center>

                      <div class="form-group">
                          <label for="pwd">Kategori</label>
                          <select class="form-control" name="kat" required="">
                              <option></option>
                              @foreach($katber as $kat)
                              <option value="{{$kat->KAT_ID}}">{{$kat->JENIS_KAT}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="pwd">Penulis</label>
                          <input type="text" class="form-control" value="{{Session::get('nama')}}" readonly="">
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-group">
                      <label for="pwd">Judul Berita</label>
                      <input class="form-control" type="text" name="jud" placeholder="judul berita" autocomplete="off" required="">
                      </div>

                      <div class="form-group">
                      <label for="pwd">Isi Berita</label>
                      <textarea class="form-control" name="isi" style="height: 290px;resize:none;border-radius: 5px;"></textarea>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
              <button  class="btn btn-primary"><i class="far fa-check-circle"></i> Simpan</button>
          </div>
          </form>
      </div>
    </div>
  </div>


  @foreach($data as $det)
  <div class="modal fade" id="infoBerita{{$det->BERITA_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Dusun</h5>
        </div>
        <?php 
            $id = $det->BERITA_ID;
            $detail = DB::SELECT("select*, a.FOTO as foto from berita a, pengguna b, kategori c where a.PENG_ID = b.PENG_ID and a.KAT_ID = c.KAT_ID and  BERITA_ID = '$id'");
            $ka = DB::SELECT("select*from berita a,kategori b where a.KAT_ID = b.KAT_ID and a.BERITA_ID = '$id'");

        ?>
        @foreach($detail as $upd)
        
            <div class="modal-body" style=" margin-bottom: -20px;">
                <div class="row">
                    <div class="col-md-3">
                        <center>
                        <img src="assets/berita/{{$upd->foto}}" style="width: 250px; height: 145px;margin: 10px 0px 10px 0px;border:1px solid lightgrey;margin-bottom: 20px;border-radius: 10px;">
                        </center>
                        
                        <div class="form-group">
                            <label for="pwd">Kategori</label>
                            <p style="color: black;"> {{$det->JENIS_KAT}} </p>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Penulis</label>
                            <p style="color: black;"> {{$det->NAMA}} </p>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="pwd">Judul Berita</label>
                            <p style="color: black;">{{$det->JUDUL}}</p>
                        </div>

                        <div class="form-group">
                        <label for="pwd">Isi Berita</label>
                        <textarea class="form-control col-md-12" style="background:white;height: 330px;resize: none;border-radius: 10px;border:1px solid lightgrey;" disabled="">{{$upd->ISI}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
            </div>

        @endforeach
      </div>
    </div>
  </div>
  @endforeach


  @foreach($data as $ed)
  <div class="modal fade" id="editBerita{{$ed->BERITA_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Dusun</h5>
        </div>
        <?php 
            $id = $ed->BERITA_ID;
            $upd = DB::SELECT("select*from berita where BERITA_ID = '$id'");
        ?>
        @foreach($upd as $upd)
        <form action="/berita:upd={{$ed->BERITA_ID}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <center>
                        FOTO<br>
                       <!-- <img id="image-preview" style="width: 220px; height: 130px;margin: 10px 0px 10px 0px;border:1px solid lightgrey;margin-bottom: 20px;border-radius: 10px;"> --><br>
                        <input type="file" name="foto" class="form-control-file" id="image-source" onchange="previewImage();" autocomplete="off" style="margin-bottom: 25px;">
                    </center>

                    <div class="form-group">
                        <label for="pwd">Kategori</label>
                        <select class="form-control" name="kat">
                             @foreach($katber as $kt)
                                <?php if ($kt->KAT_ID == $ed->KAT_ID){ ?>
                                   <option value="{{$kt->KAT_ID}}" selected="">{{$kt->JENIS_KAT}}</option>
                                <?php }else{ ?>
                                  <option value="{{$kt->KAT_ID}}">{{$kt->JENIS_KAT}}</option>
                                <?php }?>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Penulis</label>
                        <input type="text" class="form-control" value="{{Session::get('nama')}}" readonly="">
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="pwd">Judul Berita</label>
                        <input class="form-control" type="text" name="jud" value="{{$ed->JUDUL}}" autocomplete="off" required="">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Isi Berita</label>
                        <textarea class="form-control col-md-12" name="isi" style="height: 290px;resize: none;border-radius: 10px;border:1px solid lightgrey;">{{$upd->ISI}}</textarea>
                    </div>
                </div>
               
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
                <button  class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
            </div>
        </form>
        @endforeach
      </div>
    </div>
  </div>
  @endforeach


  @endsection