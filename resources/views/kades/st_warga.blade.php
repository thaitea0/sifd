@extends('layout.laykades')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="/kades" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data</li>
    <li class="dropdown">
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
    <li class="dropdown active">
      <a href="#" class="nav-link"><i data-feather="pie-chart"></i><span>Statistik Warga</span></a>
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
              <h4>Grafik warga berdasarkan Dusun</h4>
            </div>
            <div class="card-body">

                <canvas id="grafik" width="400" height="150"></canvas>

            </div>
          </div>
        </div>
      </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script type="text/javascript">
      var ctx = document.getElementById('grafik').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [<?php foreach ($data as $dat){ ?>'<?php echo $dat->NAMA_DSN; ?>', <?php }?>],
              datasets: [{
                  label: 'Jumlah Warga ',
                  data: [ 
                          <?php foreach ($data as $dat){ ?>'<?php echo $dat->jum; ?>', <?php }?>, 
                        ],
                  backgroundColor: [
                      'rgba(54, 162, 235, 0.2)',
                  ],
                  borderColor: [
                      'rgba(54, 162, 235, 1)',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  </script>

  @endsection