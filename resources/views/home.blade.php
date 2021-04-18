@extends('app')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mt-3">Ultimi arrivi</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-container d-flex flex-wrap justify-content-around">
                        <div v-for="product in products" class="card m-5" style="width: 18rem;">
                            <img src="{{asset('images/logo.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
