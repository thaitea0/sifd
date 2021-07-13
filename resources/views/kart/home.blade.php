@extends('layout.laykrt')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown active">
      <a href="#" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data Berita</li>
    <li class="dropdown">
      <a href="/databeritart" class="nav-link"><i data-feather="bookmark"></i><span>Data Berita</span></a>
    </li>
    <li class="dropdown">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="tag"></i><span> Kategori Berita </span></a>
      <ul class="dropdown-menu">
        @foreach($katb as $kb)
        <li><a class="nav-link" href="/beritart:kat={{$kb->JENIS_KAT}}"> Berita {{$kb->JENIS_KAT}} </a></li>
        @endforeach
      </ul>
    </li>
  </ul>
@endsection


@section('content')
  <section class="section">
    <div class="row ">
      
      <div class="col-xl-4 col-lg-6">
        <div class="card l-bg-cyan">
          <div class="card-statistic-3">
            <div class="card-icon card-icon-large"><i class="fa fa-smile-wink"></i></div>
            <div class="card-content">
              <h4 class="card-title">@foreach($jwar as $jwar) {{$jwar->jum}} Warga   @endforeach</h4>
              <span>Jumlah Warga</span>
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
      <div class="col-xl-4 col-lg-6">
        <div class="card l-bg-cyan">
          <div class="card-statistic-3">
            <div class="card-icon card-icon-large"><i class="fa fa-map-pin"></i></div>
            <div class="card-content">
              <h4 class="card-title">@foreach($jber as $jber) {{$jber->jum}} Berita @endforeach</h4>
              <span>Jumlah Berita dalam RT ini</span>
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
      <div class="col-xl-4 col-lg-6">
        <div class="card l-bg-cyan">
          <div class="card-statistic-3">
            <div class="card-icon card-icon-large"><i class="fa fa-map-signs"></i></div>
            <div class="card-content">
              <h4 class="card-title">Dusun {{Session::get('dusun')}}</h4>
              <span>RW {{Session::get('rw')}} RT {{Session::get('rt')}}</span>
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
      
    </div>
  </section>

@endsection    
    