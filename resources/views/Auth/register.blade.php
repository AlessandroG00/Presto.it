<x-layout>
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center">{{__('ui.registrati')}}</h1>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
    
        <div class="container form-custom">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form method="post" action="{{route('register')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="inputName" class="form-label">{{__('ui.Nome')}}</label>
                          <input name="name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp">
                        </div>

                        <div class="mb-3">
                            <label for="InputEmail1" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                        </div>
                          
                        <div class="mb-3">
                          <label for="InputPassword1" class="form-label">Password</label>
                          <input name="password" type="password" class="form-control" id="InputPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="InputConfermaPassword1" class="form-label">{{__('ui.Conferma-password')}}</label>
                            <input name="password_confirmation" type="password" class="form-control" id="InputConfermaPassword1">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">{{__('ui.invia')}}</button>
                      </form>
                </div>
            </div>
        </div>
</x-layout>