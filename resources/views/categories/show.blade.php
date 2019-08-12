@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if(\Session::has('Success'))
                <div class="alert alert-success">
                    {{\Session::get('Success')}}
                </div>
            @endif
            <div class="panal panal-primary">
                <div class="panal-body">
                    <table class="table table-striprd" style="margin: 0 auto">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Produced On</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><a href="{{ action( 'CategoryController@show', $product->category->id) }}">
                                {{$product->category->name}}</a>
                            </td>
                            <td>{{ $product->description}}</td>
                            <td>{{ $product->price }}MMK</td>
                            <td>{{ $product->produced_on }}</td>
                            <td>
                                <a href="{{ action('ProductController@show', $product->id)}}" class="btn btn-primary">Detail</a>

                                <a href="{{ action('ProductController@edit', $product->id)}}" class="btn btn-primary">Update</a>

                                <a href="{{ action('ProductController@destroy', $product->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        {{$products->links()}}
                        <a href="{{ action('ProductController@create') }}"class="btn btn-primary">Create</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
 @endsection            