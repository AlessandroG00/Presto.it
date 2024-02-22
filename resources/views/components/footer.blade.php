{{-- 
<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
  <div class="col mb-3">
    <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>
    <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© Presto 2024</font></font></p>
  </div>

  <div class="col mb-3">

  </div>
<div class="col mb-3">
    <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lavora con noi</font></font></h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vuoi lavorare con noi?</font></font></a></li>
      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrati e clicca qui</font></font></a></li>
      <li class="nav-item mb-2 mt-2"><a href="{{ route('lavora_con_noi') }}"class="btn btn-category fw-bold">
        Candidati <div class=""></div></a></li>
    </ul>
  </div> --}}

{{-- <div class="col mb-3">
    <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sezione</font></font></h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Casa</font></font></a></li>
      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Caratteristiche</font></font></a></li>
      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Prezzi</font></font></a></li>
      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Domande frequenti</font></font></a></li>
      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Di</font></font></a></li>
    </ul>
  </div> --}}
{{-- </footer> --}}



<footer class="container mt-5">
  <div class="row border-top justify-content-around">

    <div class="col-12 col-md-3 mt-4 mb-5">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© Presto 2024</font></font></p>
    </div>

    {{-- <div class="col-12 col-md-3 mt-4">
 
    </div> --}}

    <div class="col-12 col-md-3 mt-4">
      <h5 class="fw-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('ui.lavora-con-noi')}}</font></font></h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('ui.vuoi-lavorare-con-noi')}}</font></font></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('ui.clicca-e-accedi')}}</font></font></a></li>
        <li class="nav-item mb-2 mt-2"><a href="{{ route('lavora_con_noi') }}"class="btn btn-category fw-bold">
          {{__('ui.candidati')}} <div class=""></div></a></li>
      </ul>
    </div>

    <div class="col-12 col-md-3 mt-4 ">
      <h5 class="fw-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('ui.social')}}</font></font></h5>
      <div class="row mt-3 text-center">
        <div class="col-12 col-md-2"><i class="fa-brands fa-facebook" style="color: #0957dc;"></i>
        </div>
        <div class="col-12 col-md-2"><i class="fa-brands fa-twitter" style="color: #74C0FC;"></i></div>
        <div class="col-12 col-md-2"><i class="fa-brands fa-tiktok" style="color: #020812;"></i></div>
      </div>
    </div>
  </div>
</footer>




