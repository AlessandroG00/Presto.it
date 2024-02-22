<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12-col-md-6">
                <h1 class="display-2 text-center">{{__('ui.eccoinostriannunci')}}</h1>
            </div>
        </div>
    </div>
    
    
    <div class="container">
        <div class="row">
            
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-3 my-3 mt-5">
                <div class="card card-custom " data-aos="fade-right" data-aos-duration="1000">
                    <img class="card-img-top   img-fluid  rounded-top width-card " src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : "https://picsum.photos/200"}}" alt="">
                    <div class="card-body shadow d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-truncate fw-bold ">{{$announcement->title}}</h5>
                            <p class="card-text text-truncate">{{$announcement->body}}</p>
                            <p class="card-text text-danger">{{$announcement->price}} €</p>
                            <a href="{{route('category_show', ['category'=>$announcement->category])}}" class="my-2 card-link d-block text-primary">{{$announcement->category->name}}</a>
                        </div>
                        <div class="pt-3 d-flex flex-column justify-content-between align-items-start">
                            <div class="">
                                <a href="{{route('announcement_show',compact('announcement'))}}" class="btn btn-dark shadow">{{__('ui.dettaglio')}}</a>
                            </div>
                                <p class="card-footer m-0 mt-5">{{__('ui.pubblicato')}}: {{$announcement->created_at->format('d/m/Y')}} {{__('ui.autore')}}:
                                    {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h2 class="text-center mt-3  fw-bold ">{{__('ui.pubblicalo')}}!
                <p class="fs-3 text-center">{{__('ui.noannunci')}}</p>
                <div class="text-center mt-3">
                    <a href="{{ route('announcement_create') }}"class="btn btn-category fw-bold">
                        {{__('ui.Inserisci-annuncio')}}</a>
                </div>
            @endforelse
            <div class="mt-3 mb-3">
                {{$announcements->links()}}
            </div>
        </div>
    </div> 
    
        
    </x-layout>