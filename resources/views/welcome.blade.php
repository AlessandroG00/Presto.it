<x-layout>
    
  <div  class="text-center fw-bold">
      @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
  </div>

    <header class=" container-fluid mt-custom d-flex justify-content-center circle header-custom">
        <div class="row align-items-center">
            <div class="col-12 ">
                <div id="title" class="d-flex align-items-center justify-content-center">
                    <h5 class="word text-white ">
                        <span>P</span>
                        <span>R</span>
                        <span>E</span>
                        <span>S</span>
                        <span>T</span>
                        <span>O</span>
                    </h5>

                </div>
            </div>
        </div>
    </header>
    
    
    
    <div class="container">
        <h3 class="mt-5 text-center fw-bold fs-1 ">{{__('ui.ultimi-annunci')}}</h3>
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-3 my-3 mt-5">
                <div class="card card-custom " data-aos="fade-right" data-aos-duration="1000">
                    <img class="card-img-top   img-fluid  rounded-top width-card " src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : "https://picsum.photos/200"}}" alt="" >
                    <div class="card-body shadow d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-truncate fw-bold ">{{$announcement->title}}</h5>
                            <p class="card-text text-truncate">{{$announcement->body}}</p>
                            <p class="card-text text-danger">{{$announcement->price}} €</p>
                            <a href="{{route('category_show', ['category'=>$announcement->category])}}" class="my-2 card-link d-block text-primary">{{$announcement->category->name}}</a>
                        </div>
                        <div class="pt-3 d-flex flex-column justify-content-between align-items-start">
                            <div class="">
                                <a href="{{route('announcement_show',compact('announcement'))}}" class="btn btn-dark shadow">Visualizza</a>
                            </div>
                                <p class="card-footer m-0 mt-5">{{__('ui.pubblicato')}}: {{$announcement->created_at->format('d/m/Y')}} {{__('ui.autore')}}:
                                    {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div> 
        

    
    
</x-layout>
