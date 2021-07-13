@extends('layout.laystaf')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="/staf" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data</li>
    <li class="dropdown active">
      <a href="/datadusun" class="nav-link"><i data-feather="map"></i><span>Data Dusun</span></a>
    </li>
    <li class="dropdown">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
          data-feather="users"></i><span>Data Pengguna</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="/datastaf">Staf IT</a></li>
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


@section('content')
  <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card"  style="width:60%;">
            <div class="card-header">
              <h4>Data Rukun Warga pada dusun @foreach($dsn as $dat) {{$dat->NAMA_DSN}} @endforeach</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <a href="/datadusun" class="btn btn-icon icon-left btn-secondary btn-block" style="margin-bottom: 10px;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-icon icon-left btn-primary btn-block" data-toggle="modal" data-target="#addrw" style="margin-bottom: 10px;"><i class="fas fa-plus-square"></i> Tambah Data Rukun Warga</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="save-stage" style="width: 100%;">
                  <thead>
                      <tr>
                          <th>Nama Dusun</th>
                          <th>RW</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $dar)
                      <tr>
                          <td>{{$dar->NAMA_DSN}}</td>
                          <td style="text-align: center;width: 50px;">{{$dar->RW}}</td>
                          <td style="width: 130px;">
                            <a href="/rt:rw={{$dar->RW_ID}}" class="btn btn-icon btn-outline-success"><i class="fas fa-search"></i></a> 
                            <a href="#" class="btn btn-icon btn-outline-warning" data-toggle="modal" data-target="#editRW{{$dar->RW_ID}}"><i class="far fa-edit"></i></a> 
                            <a href="/rw:del={{$dar->RW_ID}}" class="btn btn-outline-danger btn-icon" onclick="return(confirm('Anda Yakin ?'));"><i class="fas fa-trash"></i></a>
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

  <div class="modal fade" id="addrw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Rukun Warga</h5>
        </div>
        <form action="{{url('/add_rw')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-12">
                      @foreach($idr as $id)
                          <input type="hidden" name="idr" value="{{$id->RW_ID+1}}" readonly="">
                      @endforeach 
                      @foreach($dsn as $did)
                          <input type="hidden" name="idd" value="{{$did->DUSUN_ID}}" readonly="">
                      @endforeach
                      <div class="form-group">
                          <label for="pwd">Nomor Rukun Warga</label>
                          <input class="form-control" type="number" name="rw" placeholder="nomor rukun warga" autocomplete="off" required="">
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
  <div class="modal fade" id="editRW{{$ed->RW_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit RW</h5>
        </div>
        <form action="/rw:upd={{$ed->RW_ID}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="pwd">RW</label>
                    <input class="form-control" type="text" name="rw" value="{{$ed->RW}}" autocomplete="off" required="">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Batal</button>
              <button class="btn btn-primary"><i class="far fa-check-circle"></i> Ubah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach


  @endsection