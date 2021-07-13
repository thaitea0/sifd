@extends('layout.laywarga')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="/warga" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data Berita</li>
    <li class="dropdown">
      <a href="/databerita" class="nav-link"><i data-feather="bookmark"></i><span>Data Berita</span></a>
    </li>
    <li class="dropdown active">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="tag"></i><span> Kategori Berita </span></a>
      <ul class="dropdown-menu">
        @foreach($katb as $kb)
        <li><a class="nav-link" href="/berita:kat={{$kb->JENIS_KAT}}"> Berita {{$kb->JENIS_KAT}} </a></li>
        @endforeach
      </ul>
    </li>
  </ul>
@endsection


@section('content')
  <section class="section">
      <div class="row">
        @foreach($data as $ber)
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article article-style-b" style="border-radius: 30px 0px 30px 0px;">
              <div class="article-header"  style="border-radius: 30px 0px 30px 0px;">
                <div class="article-image" data-background="assets/berita/{{$ber->foto}}">
                </div>
                <div class="article-title">
                  <h2><a href="#">{{$ber->JUDUL}}</a></h2>
                </div>
              </div>
              <div class="article-details"  style="border-radius: 30px 0px 30px 0px;">
                <p>{{$ber->isi}}</p>
                <div class="article-cta">
                    <a href="/berita:chat={{$ber->BERITA_ID}}">Forum Diskusi <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </article>
          </div>
        @endforeach
      </div>
  </section>


  @endsection