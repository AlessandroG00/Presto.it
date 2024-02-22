<x-layout>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-12 text-center  "><h1>{{__('ui.lavora-con-noi')}}</h1></div>
            <div class="col-12 text-center "><p>{{__('ui.richieste')}}</p></div>
        </div>
    </div>
    <div class="container form-custom ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="post" action="{{route('become_revisor')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-bold">Name</label>
                        <input name="name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp">
                    </div>
                    
                    <div class="mb-3">
                        <label for="InputEmail1" class="form-label fw-bold">Email</label>
                        <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-dark shadow px-5 py-1 mt-3 mb-4">{{__('ui.invia')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
