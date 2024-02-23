<x-layout>
  
  <div class="container-fluid mt-3 mb-3">
    <div class="row">
      <div class="col-12 text-light">
        
        <h1 class="text-dark text-center fw-bold mt-3">
          {{$announcement_to_check ? __('ui.Annunci-da-revisionare') : __('ui.Non-ci-sono-annunci-da-revisionare')}}
        </h1>
        
      </div>
    </div>
  </div>
  
  
  <div  class="text-center fw-bold">
    @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif
  </div>
      
      @if($announcement_to_check)
      <div class="container form-custom">
        <div class="row justify-content-around">
          <div class="col-12 col-md-4">
            <div id="carouselExample" class="carousel slide">
              @if($announcement_to_check->images->isNotEmpty())
              <div class="carousel-inner">
                @foreach ($announcement_to_check->images as $image)
                <div class="p-2">
                  @if($image->labels)
                  @foreach($image->labes as $label)
                  <p class="d-inline">{{$label}},</p>
                  @endforeach
                  @endif
                </div>
                <div class="carousel-item active @if($loop->first)active @endif">
                  <img src="{{$image->getUrl(300, 300)}}" class="d-block w-100 img-fluid  rounded" alt="...">
                </div>
                @endforeach
                @else 
                <div class="carousel-item">
                  <img src="https://picsum.photos/200/200" class="d-block w-100 img-fluid p-3 rounded" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="https://picsum.photos/200/200" class="d-block w-100 img-fluid p-3 rounded" alt="...">
                </div>
              </div>
              @endif
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div> 
      

            {{-- body --}}
            <div class="text-center">
              <h5 class="card-title mt-2 fw-bold">{{$announcement_to_check->title}}</h5>
              <p class="card-text mt-2">{{$announcement_to_check->body}}</p>                
              <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}} - Autore:
                {{$announcement->user->name ?? ''}}</p>
            </div>


            {{-- button --}}
            <div class="d-flex justify-content-evenly">
              <form action="{{route('revisor_accept_announcement', ['announcement'=>$announcement_to_check])
              }}" method="POST">
              @csrf
              @method ( 'PATCH')
              <button
              type="submit" class="btn btn-success shadow"><i class="fa-solid fa-check"></i></button>
            </form>
            
            <form action="{{route('revisor_reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST"> 
              @csrf
              @method ('PATCH' )
              <button type="submit" class="btn btn-danger shadow"><i class="fa-solid fa-xmark"></i></button>
            </form>
            
            </div>

          </div>
        </div>


        <div class="col-12 col-md-4 mt-5">
          <h5 class="tc-accent fw-bold">Criteri di valutazione immagini</h5>
            <p>Adulti: <span class="{{$image->adult}}"></span></p>
            <p>Satira: <span class="{{$image->spoof}}"></span></p>
            <p>Medicina: <span class="{{$image->medical}}"></span></p>
            <p>Violenza: <span class="{{$image->violence}}"></span></p>
            <p>Contenuto Ammiccanti: <span class="{{$image->racy}}"></span></p>
        </div>

      </div>
    </div>
    @endif
  </x-layout>