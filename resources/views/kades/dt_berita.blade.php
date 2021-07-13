@extends('layout.laykades')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="#" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data</li>
    <li class="dropdown">
      <a href="/kdatakatberita" class="nav-link"><i data-feather="tag"></i><span>Data Kategori Berita</span></a>
    </li>
    <li class="dropdown active">
      <a href="/databeritakades" class="nav-link"><i data-feather="file-text"></i><span>Data Berita</span></a>
    </li>
    <li class="dropdown">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="tag"></i><span> Kategori Berita </span></a>
      <ul class="dropdown-menu">
        @foreach($katb as $kb)
        <li><a class="nav-link" href="/beritakades:kat={{$kb->JENIS_KAT}}"> Berita {{$kb->JENIS_KAT}} </a></li>
        @endforeach
      </ul>
    </li>
    <li class="menu-header">Statistik</li>
    <li class="dropdown">
      <a href="/statistikwarga" class="nav-link"><i data-feather="pie-chart"></i><span>Statistik Warga</span></a>
    </li>
    <li class="dropdown">
      <a href="/statistiktberita" class="nav-link"><i data-feather="pie-chart"></i><span>Statistik Kategori Berita</span></a>
    </li>
  </ul>
@endsection


@section('content')
  <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Berita</h4>
            </div>
            <div class="card-body">
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
                  <?php $no = 1;?> 
                  <tbody>
                      @foreach($data as $dat)
                      <tr>
                          <td style="width: 30px;">{{$no++}}</td>
                          <td>{{$dat->JUDUL}}</td>
                          <td style="width: 100px;text-align: center;">{{$dat->JENIS_KAT}}</td>
                          <td style="width: 50px;text-align: center;">{{$dat->STATUS}}</td>
                          <td style="width: 50px;">
                              <a href="#" class="btn btn-icon btn-outline-info" data-toggle="modal" data-target="#infoBerita{{$dat->BERITA_ID}}"><i class="fas fa-info-circle"></i></a> 
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

  @foreach($data as $det)
  <div class="modal fade" id="infoBerita{{$det->BERITA_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Detail Berita</h5>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
            </div>

        @endforeach
      </div>
    </div>
  </div>
  @endforeach


  @endsection