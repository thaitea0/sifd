@extends('layout.laystaf')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown active">
      <a href="#" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
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
    <div class="row ">
 
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-cyan">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-smile-wink"></i></div>
              <div class="card-content">
                <h4 class="card-title">Jumlah Warga</h4>
                <span>@foreach($jwar as $jwr)   {{$jwr->warga}} orang    @endforeach</span>
                <div class="progress mt-1 mb-1" data-height="8">
                 
                </div>
                <p class="mb-0 text-sm" style="padding:15px;">
                  <!-- <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span> -->
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-cyan">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-map-pin"></i></div>
              <div class="card-content">
                <h4 class="card-title">Rukun Tetangga</h4>
                <span>@foreach($jart as $jrt)   {{$jrt->rt}} Rukun Tetangga    @endforeach</span>
                <div class="progress mt-1 mb-1" data-height="8">
                  
                </div>
                <p class="mb-0 text-sm" style="padding:15px;">
                  <!-- <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span> -->
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-cyan">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-map-signs"></i></div>
              <div class="card-content">
                <h4 class="card-title">Rukun Warga</h4>
                <span>@foreach($jarw as $jrw)   {{$jrw->rw}} Rukun Warga    @endforeach</span>
                <div class="progress mt-1 mb-1" data-height="8">
                  
                </div>
                <p class="mb-0 text-sm" style="padding:15px;">
                  <!-- <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span> -->
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-cyan">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-map-marked-alt"></i></div>
              <div class="card-content">
                <h4 class="card-title">Jumlah Dusun</h4>
                <span>@foreach($jdsn as $jds)   {{$jds->dusun}} Dusun    @endforeach</span>
                <div class="progress mt-1 mb-1" data-height="8">
                  <!-- <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div> -->
                </div>
                <p class="mb-0 text-sm" style="padding:15px;">
                  <!-- <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span> -->
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
  </section>

  
@endsection    
    