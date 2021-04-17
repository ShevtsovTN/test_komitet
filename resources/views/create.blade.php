@extends('layout')
@section('content')
    <div class="container">
            <form action="{{route('createAdd')}}" method="post" id="createAdd" name="createAdd" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="text">Text Add</label>
                    <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text"
                              placeholder="Required text your add"></textarea>
                    @error('text')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="price">Price add</label>
                    <input type="number" name="price" min="0" class="form-control @error('price') is-invalid @enderror" id="price">
                    @error('price')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="amount">Amount add</label>
                    <input type="number" name="amount" min="0" class="form-control @error('amount') is-invalid @enderror" id="amount">
                    @error('amount')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="input-group @error('banner') is-invalid @enderror">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input " id="banner" name="banner">
                        <label class="custom-file-label" for="banner">Choose image for your add...</label>
                    </div>
                </div>
                @error('banner')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <input type="submit" form="createAdd" class="btn btn-primary mt-3" value="Submit">
            </form>
        </div>
@endsection
