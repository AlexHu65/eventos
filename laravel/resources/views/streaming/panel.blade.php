@extends('master')
@section('title', $conferencia->nombre)
@section('content')

@include('home.secciones.banners')

<style media="screen">
#contentPanel{
  background: white !important;
  min-height: 1024px !important;
}
</style>
<section class="pt-5 pb-5" id="contentPanel">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="title text-justify bg-dark text-light p-2">{{$conferencia->nombre}}</h2>
        <span class="font-weight-bold mainColor">Presentado por:</span>
        @foreach($conferencia->ponentes as $ponente)
        <p class="mt-2 mb-2"> <img width="40" height="40" src="{{asset('storage/') . '/' . $ponente->img}}"> {{$ponente->nombre}}</p>
        @endforeach
        <p class="m-0">
          <span class="mainColor" uk-icon="calendar"></span>
          <small class="text-muted">{{date('d M Y', strtotime($conferencia->fecha))}}</small>
          <small class="text-muted">{{date('H:i', strtotime($conferencia->fecha))}}</small>
        </p>
        <iframe src="{{$conferencia->video->url}}" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </div>
        
      <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
        @if($conferencia->live)
        <iframe src="https://vimeo.com/live-chat/{{$conferencia->video_id}}/" width="400" frameborder="0"></iframe>
        @else
        <p>{!! $conferencia->descripcion !!}</p>
        @endif
      </div>
    </div>
  </div>
</div>
</section>

@endsection
