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
    <li class="dropdown active">
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
              <h4>Data Kategori Berita</h4>
            </div>
            <div class="card-body">
              <a href="#" class="btn btn-icon icon-left btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter"  style="margin-bottom: 10px;"><i class="fas fa-plus-square"></i> Tambah Data Kategori</a>
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="save-stage" style="width: 100%;">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Kategori</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $dak)
                    <tr>
                        <td>{{$dak->KAT_ID}}</td>
                        <td>{{$dak->JENIS_KAT}}</td>
                        <td style="width: 90px;">
                          <a href="#" class="btn btn-icon btn-outline-warning" data-toggle="modal" data-target="#editKat{{$dak->KAT_ID}}"><i class="far fa-edit"></i></a> 
                          <a href="/katber:del={{$dak->KAT_ID}}" class="btn btn-outline-danger btn-icon" onclick="return(confirm('Anda Yakin ?'));"><i class="fas fa-trash"></i></a>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kategori</h5>
        </div>
        <form action="{{url('/add_kategori')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="modal-body">
              @foreach($idk as $id)
                <input type="hidden" name="idk" value="{{$id->KAT_ID+1}}" readonly="">
              @endforeach
              <div class="form-group">
                <label>Jenis Kategori</label>
                <input type="text" class="form-control" name="kat" autocomplete="off" required="">
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
  <div class="modal fade" id="editKat{{$ed->KAT_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kategori</h5>
        </div>
        <form action="/katber:upd={{$ed->KAT_ID}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="modal-body">
              <div class="form-group">
                <label>Jenis Kategori</label>
                <input type="text" class="form-control" name="kat" value="{{$ed->JENIS_KAT}}" autocomplete="off" required="">
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