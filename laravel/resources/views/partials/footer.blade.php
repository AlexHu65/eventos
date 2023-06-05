<div class="container">
  <div class="d-flex justify-content-between align-items-center">
    <div class="copy">
      <small>
        &copy; TODOS LOS DERECHOS RESERVADOS SUMMITBLVRD 2020
      </small>
    </div>
    <div class="social">
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
      <a href="#modal-search" class="uk-icon-button uk-margin-small-right mt-1 mb-1 blackM" uk-icon="search" uk-toggle></a>
    </div>
  </div>
</div>
