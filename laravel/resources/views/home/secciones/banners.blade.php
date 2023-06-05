<section id="header" class="pt-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="d-flex align-items-center">
          <div class="logo">
            <img src="{{asset('images/logo.png')}}" alt="Logo">
          </div>
        </div>        
      </div>
    </div>
  </div>
  <div class="container pt-5">
    <div class="row">
      <div class="col pt-5">
        <h2 class="centuryF text-light">
          Videos
        </h2>
        <nav style="{{isset($tituloConferencia) ? 'width:100% !important;' : ''}}" class="breadCustom" aria-label="breadcrumb">
          <ol class="breadcrumb listBreadCustom">
            <li class="breadcrumb-item"><a href="/eventos">Home</a></li>
            <li class="breadcrumb-item {{isset($tituloConferencia) ? 'text-light' : 'active'}}" aria-current="page">Streaming</li>
            @isset($tituloConferencia)
            <li class="breadcrumb-item active" aria-current="page">{{$tituloConferencia}}</li>
            @endisset
          </ol>
        </nav>
        
      </div>
    </div>
  </div>
</section>

