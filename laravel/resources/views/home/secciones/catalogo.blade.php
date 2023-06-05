<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <form>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: search"></span>
              <input class="uk-input w100" placeholder="buscar" type="text">
            </div>
          </div>
        </form>
      </div>
      <div class="col d-flex  align-items-center">
        <h1 class="centuryF">Explorar <span class="mainColor font-weight-bold">videos</span></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="card-side" style="z-index: 980;" uk-sticky="bottom: #offset">
          <ul class="list-group">

            <li class="list-group-item">
              <div class="d-flex align-items-center">
                <div class="icon">
                  <span class="mainColor" uk-icon="calendar"></span>
                </div>
                <div class="info-content pl-3">
                  <p class="m-0">
                    <small class="poppinBlack text-uppercase info-head">Fecha de inicio</small>
                  </p>
                  <p class="m-0">
                    <small class="text-muted">{{date('d M Y', strtotime($evento->fecha_inicio))}}</small>
                    <small class="text-muted">{{date('H:i', strtotime($evento->fecha_inicio))}} HRS.</small>
                  </p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex align-items-center">
                <div class="icon">
                  <span class="mainColor" uk-icon="calendar"></span>
                </div>
                <div class="info-content pl-3">
                  <p class="m-0">
                    <small class="poppinBlack text-uppercase info-head">Fecha de cierre</small>
                  </p>
                  <p class="m-0">
                    <small class="text-muted">{{date('d M Y', strtotime($evento->fecha_final))}}</small>
                    <small class="text-muted">{{date('H:i', strtotime($evento->fecha_final))}} HRS.</small>
                  </p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex align-items-center">
                <div class="icon">
                  <span class="mainColor" uk-icon="location"></span>
                </div>
                <div class="info-content pl-3">
                  <p class="m-0">
                    <small class="poppinBlack text-uppercase info-head">Locación</small>
                  </p>
                  <p class="m-0">
                    <small class="text-muted">Valle Hidalgo #321 Col. Hidalgo del Valle</small>
                  </p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex align-items-center">
                <div class="icon">
                  <span class="mainColor" uk-icon="mail"></span>
                </div>
                <div class="info-content pl-3">
                  <p class="m-0">
                    <small class="poppinBlack text-uppercase info-head">Email</small>
                  </p>
                  <p class="m-0">
                    <small class="text-muted">contaco@dominio.com.mx</small>
                  </p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex align-items-center">
                <div class="icon">
                  <span class="mainColor" uk-icon="social"></span>
                </div>
                <div class="info-content pl-3">
                  <p class="m-0">
                    <small class="poppinBlack text-uppercase info-head">Redes sociales</small>
                  </p>
                  <p class="m-0">
                    @if(!empty($evento->twitter))
                    <a target="_blank" href="{{$evento->twitter}}" class="uk-icon-button uk-margin-small-right mt-1 mb-1 blackM" uk-icon="twitter"></a>
                    @endif
                    @if(!empty($evento->facebook))
                    <a target="_blank" href="{{$evento->facebook}}" class="uk-icon-button uk-margin-small-right mt-1 mb-1 blackM" uk-icon="facebook"></a>
                    @endif
                    @if(!empty($evento->instagram))
                    <a target="_blank" href="{{$evento->instagram}}" class="uk-icon-button uk-margin-small-right mt-1 mb-1 blackM" uk-icon="instagram"></a>
                    @endif
                    @if(!empty($evento->linkedin))
                    <a target="_blank" href="{{$evento->linkedin}}" class="uk-icon-button uk-margin-small-right mt-1 mb-1 blackM" uk-icon="linkedin"></a>
                    @endif
                    @if(!empty($evento->youtube))
                    <a target="_blank" href="{{$evento->youtube}}" class="uk-icon-button uk-margin-small-right mt-1 mb-1 blackM" uk-icon="youtube"></a>
                    @endif
                  </p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex align-items-center">
                <div class="icon">
                  <span class="mainColor" uk-icon="cart"></span>
                </div>
                <div class="info-content pl-3">
                  <p class="m-0">
                    <small class="poppinBlack text-uppercase info-head">Boletos</small>
                  </p>
                  <p class="m-0">
                    <small class="text-muted"><a class="button-yellow" href="#">Comprar</a></small>
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div uk-filter="target: .js-filter" class="col-md-9">
        <ul class="uk-subnav uk-subnav-pill">
          <li uk-filter-control=".all"><a href="#"><span uk-icon="thumbnails"></span> TODOS</a></li>
          <li uk-filter-control=".live"><a href="#"><i class="fas fa-broadcast-tower"></i> EN VIVO</a></li>
          <li uk-filter-control=".ondemand"><a href="#"><span uk-icon="video-camera"></span> onDemand</a></li>
        </ul>
        <div class="row js-filter">

          @foreach($evento->conferencias as $conferencia)
          <div class="col-md-4 {{($conferencia->live) ? 'live' : 'ondemand'}} all">
            <div class="card mb-4 shadow-sm">
              <img src="{{asset('storage/' . '/' . $conferencia->banner)}}" alt="">
              <div class="card-body">
                <div class="title"><a href="{{route('conferencia.start' , $conferencia->slug)}}"><h2 class="text-uppercase"><strong>{{$conferencia->nombre}}</strong></h2></a></div>
                @if($conferencia->live)
                <div class="live-badge">
                  <small>En vivo <i class="fas fa-broadcast-tower"></i></small>
                </div>
                @endif
                <div class="date-event">
                  <span class="mainColor" uk-icon="calendar"></span>
                  <small class="poppinBlack text-uppercase info-head">Fecha</small>
                  <small class="text-muted">{{date('d M Y', strtotime($conferencia->fecha))}}</small>
                  <small class="text-muted">{{date('H:i', strtotime($conferencia->fecha))}}</small>
                </div>
                <div class="d-flex ponentes pt-2 pb-2">
                  @foreach($conferencia->ponentes as $ponente)
                  <small class="text-muted"><strong class="mainColor">Presenta:</strong> {{$ponente->nombre}}</small>
                  @endforeach
                </div>
                <div class="card-text">{!! \Illuminate\Support\Str::limit($conferencia->descripcion, 150, $end='...') !!}</div>
                <div class="d-flex justify-content-between align-items-center">
                  <div uk-tooltip="title: Ver conferencia" class="btn-group">
                    <a href="{{route('conferencia.start' , $conferencia->slug)}}" type="button" class="mainColor"><span uk-icon="play-circle"></span></a>
                  </div>
                  @if($conferencia->onDemand)
                  <small uk-tooltip="title: Duración" class="text-muted"><span class="mainColor" uk-icon="video-camera"></span>{{$conferencia->duracion}}</small>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
