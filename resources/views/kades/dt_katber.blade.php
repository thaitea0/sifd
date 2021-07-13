@extends('layout.laykades')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="/kades" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data</li>
    <li class="dropdown active">
      <a href="/kdatakatberita" class="nav-link"><i data-feather="tag"></i><span>Data Kategori Berita</span></a>
    </li>
    <li class="dropdown">
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
          <div class="card"  style="width:60%;">
            <div class="card-header">
              <h4>Data Kategori Berita</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="save-stage" style="width: 100%;">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Kategori</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $dak)
                    <tr>
                        <td>{{$dak->KAT_ID}}</td>
                        <td>{{$dak->JENIS_KAT}}</td>
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

  

  @endsection