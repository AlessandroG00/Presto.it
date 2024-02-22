<x-layout>
     <div class="container-fluid  mb-2">
        <div class="row">
            <div class="col-12 text-light p-5">
                 <h1 class="text-center text-dark fw-bold display-3">{{__('ui.annuncio')}} {{$announcement->title}}</h1>
            </div>
        </div>
    </div> 

    <div class="container form-custom">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div id="carouselExample" class="carousel slide">
                  @if($announcement->images)
                  <div class="carousel-inner">
                    @foreach ($announcement->images as $image)
                      
                    <div class="carousel-item active @if($loop->first)active @endif">
                      <img src="{{$image->getUrl(300, 300)}}" class="d-block w-100 img-fluid p-3 rounded" alt="...">
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
                  <h5 class="card-title mt-2 fw-bold">{{$announcement->title}}</h5>
                  <p class="card-text mt-2">{{$announcement->body}}</p>
                  <p class="card-text text-danger">{{$announcement->price}} €</p>
                  <a href="{{route('category_show', ['category'=>$announcement->category])}}" class="my-2 card-link d-block">{{$announcement->category->name}}</a>
                  
                  <p class="card-footer">{{__('ui.pubblicato')}}: {{$announcement->created_at->format('d/m/Y')}} - {{__('ui.autore')}}:
                    {{$announcement->user->name ?? ''}}</p>
            </div>
        </div>
    </div>
</x-layout>
