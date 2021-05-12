@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @foreach($product as $p)
        <form method="POST" action="{{route('update', $p->id)}}">
        @csrf
        @method('POST')
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand" value="{{$p->brand}}" name="brand">            
            </div>
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" value="{{$p->productName}}" name="productName">            
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" value="{{$p->description}}" name="description">            
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" value="{{$p->price}}" name="price">            
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" id="quantity" value="{{$p->quantity}}" name="quantity">            
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endforeach
    </div>
</div>
@endsection
