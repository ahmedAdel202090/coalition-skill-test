@extends('Layouts.form-layout')

@section('content')
<div class="m-auto" style="width:40%;position:relative;top:30px">
    <form id="form-product" method="POST" action="/submit">
        {{csrf_field()}}
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="product" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity: </label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
        </div>
        <div class="form-group">
            <label for="price">Price: </label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="m-auto" style="width:80%;position:relative;top:50px">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{$row->product}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{$row->price}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection