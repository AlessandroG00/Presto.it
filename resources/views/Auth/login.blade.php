<x-layout>

    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center">{{__('ui.Accedi')}}</h1>
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
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email </label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
               
                <button type="submit" class="btn btn-primary">{{__('ui.Accedi')}}</button>
              </form>
        </div>
    </div>
</div>


</x-layout>