@extends('layout.laykrt')

@section('menu')
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
      <a href="/ketuart" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data Berita</li>
    <li class="dropdown">
      <a href="/databeritart" class="nav-link"><i data-feather="bookmark"></i><span>Data Berita</span></a>
    </li>
    <li class="dropdown active">
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
      <div class="row">

        @foreach($data as $ber)
          <div class="col-md-8">
            <article class="article article-style-b" style="border-radius: 10px 0px 10px 0px;">
              <div class="article-header"  style="border-radius: 10px 0px 10px 0px;">
                <div class="article-image" data-background="assets/berita/{{$ber->FOTO}}">
                </div>
                <div class="article-title">
                  <h2><a href="#">{{$ber->JUDUL}}</a></h2>
                </div>
              </div>
              <div class="article-details"  style="border-radius: 10px 0px 10px 0px;">
                <pre style="color:#60686F;font-size: 14px;text-align: justify;font-family: nunito;white-space: pre-line;">{{$ber->ISI}}</pre>
                
              </div>
            </article>
          </div>
        @endforeach

        <!-- <div class="col-12 col-sm-6 col-lg-4">
          <div class="card gradient-bottom">
            <div class="card-header">
              <h4>Berita Terakhir</h4>
            </div>
            <div class="card-body" id="top-5-scroll">
              <ul class="list-unstyled list-unstyled-border">
                <?php 

                foreach($data as $dat){
                  $kat = $dat->KAT_ID;
                }

                $dber = DB::SELECT("select*from berita where KAT_ID = '$kat'");

                ?>
                @foreach($dber as $dber)
                  <li class="media">
                    <img class="mr-3 rounded" width="55" src="assets/berita/{{$dber->FOTO}}" alt="product">
                    <div class="media-body">
                      <div class="float-right">
                        <div class="font-weight-600 text-muted text-small">112 Sales</div>
                      </div>
                      <div class="media-title">{{$dber->JUDUL}}</div>
                      <div class="mt-1">
                        <div class="budget-price">
                          <div class="budget-price-square bg-primary" data-width="61%"></div>
                          <div class="budget-price-label">$24,897</div>
                        </div>
                        <div class="budget-price">
                          <div class="budget-price-square bg-danger" data-width="38%"></div>
                          <div class="budget-price-label">$18,865</div>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-8">
          <div class="card">
            <div class="chat">
              <div class="chat-header clearfix">
                  <i data-feather="message-square"></i> Diskusi
              </div>
            </div>
            <div class="chat-box">
              <div class="card-body chat-content">
                  @foreach($chat as $ch)
                  <?php if($ch->PENG_ID == Session::get('idp')){?>
                    <div class="chat-item chat-right position">
                  <?php }else{?>
                    <div class="chat-item chat position">
                  <?php } ?>
                      <img src="assets/foto/{{$ch->FOTO}}" style="margin-top: 15px;">
                      <div class="chat-details">
                        <div class="chat-time">{{$ch->NAMA}}</div>

                        <?php if($ch->PENG_ID == Session::get('idp')){?>
                            <a href="/komen:del={{$ch->KOMEN_ID}}" onclick="return(confirm('Anda Yakin ?'));" style="color: #f54c4c;margin-right: 8px;margin-top: 10px;"><i class="fas fa-trash"></i></a>
                            <div class="chat-text">{{$ch->KOMEN}}</div>
                        <?php }else{ ?>
                            <?php if ($ch->STATUS == 'Aktif'){?>
                                <div class="chat-text">{{$ch->KOMEN}}</div>
                                <a href="/komenrt:non={{$ch->KOMEN_ID}}" class="btn btn-danger btn-icon btn-sm" style="margin-left: 8px;"><i class="fas fa-times-circle"></i></a>
                          <?php }else{ ?>
                                <div class="chat-text" style="background-color: lightgrey;color: #788695;">{{$ch->KOMEN}}</div>
                                <a href="/komenrt:akt={{$ch->KOMEN_ID}}" class="btn btn-success btn-icon btn-sm" style="margin-left: 8px;"><i class="fas fa-check-circle"></i></a>
                        <?php } } ?>
                        <div class="chat-time"><?= date('H:i',strtotime($ch->TGL));?></div>
                      </div>
                  </div>
                  @endforeach
              </div>
              <div class="card-footer chat-form">
                @foreach($data as $sta)
                <?php if($sta->STATUS == 'Nonaktif'){?>
                    <center>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Komentar telah dinonaktifkan" disabled="">
                    </center>
                <?php }else{ ?>
                  <form action="{{url('/add_komenrt')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                      @foreach($idk as $id)
                      <input type="hidden" name="idk" value="{{$id->KOMEN_ID+1}}">
                      @endforeach
                      @foreach($data as $ber)
                      <input type="hidden" name="idb" value="{{$ber->BERITA_ID}}">
                      @endforeach
                      <input type="hidden" name="pen" value="{{Session::get('idp')}}">
                      <?php 
                      if($chat == null){
                      ?>
                        <input type="text" name="komen" class="form-control" autocomplete="off" placeholder="Mulailah percakapan ...">
                      <?php }else{?>
                        <input type="text" name="komen" class="form-control" autocomplete="off" placeholder="Balas ...">
                      <?php } ?>
                      <button class="btn btn-primary">
                        <i class="far fa-paper-plane"></i>
                      </button>
                  </form>
                <?php } ?>
                @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>
  </section>


  @endsection