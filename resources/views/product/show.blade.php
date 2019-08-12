@extends('layouts.app')

@section('content')
            <div class="container">
                <div class="row">
                    <h1>Product Details</h1>
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="card-heading">
                                <h1>{{ title_case('Product'.$product->id) }}</h1>
                                <h1>{{ $product->name}}</h1>
                                    <ul>
                                        <li>Description:{{ $product->description }} </li>
                                        <li>Price: {{ $product->price }} MMK</li>
                                        <li>Produced_On: {{ $product->produced_on }}</li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection