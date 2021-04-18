@extends('app')

@section('content')
    <div v-for="product in products">
        <h1>@{{ product.name }}</h1>
        <h2>@{{ product.brand }}</h2>
        <h3>@{{ product.type }}</h3>
        <h3>@{{ product.category }}</h3>
    </div>
@endsection
