@extends('admin.layouts.master')
@section('header')
<div class="header">
    <h1 class="page-header">
      Form Inputs Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Books Manager</a></li>
      <li class="active">Add Books</li>
    </ol>
</div>
@endsection
@section('content')
<div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-action">
            Add Books
          </div>
          <div class="card-content">
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
              <li>{{$err}}</li>
              @endforeach
            </div>
            @endif
            @if(session('class'))
            <div class="alert alert-{{session('class')}}">
              <li>{{session('message')}}</li>
            </div>
            @endif
            <form action="{{ route('create-books') }}" method="POST" enctype="multipart/form-data" class="col s12">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="input-field col s12">
                  <input id="name" name="name" value="{{ old('name') }}" type="text" class="validate">
                  <label for="name">Book title</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="author" name="author" value="{{ old('author') }}" type="text" class="validate">
                  <label for="author">Author</label>
                </div>
                <div class="input-field col s6">
                  <input id="published_year" name="published_year" value="{{ old('published_year') }}" type="text" class="validate">
                  <label for="published_year">Publishing year</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="price" name="price" value="{{ old('price') }}" type="text" class="validate">
                  <label for="price">Price</label>
                </div>
                <div class="input-field col s6">
                  <input id="quantity" name="quantity" value="{{ old('quantity') }}" type="text" class="validate">
                  <label for="quantity">Quantity</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <div class="input-field inline">
                    <input id="img" name="img" value="{{ old('img') }}" type="file" class="validate">
                    <label for="img" data-error="wrong" data-success="right"></label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="describes" name="describes" value="{{ old('describes') }}" class="materialize-textarea"></textarea>
                  <label for="describes">Describes</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <button type="submit" class="waves-effect waves-light btn">Add Books</button>
                </div>
              </div>
            </form>
            <div class="clearBoth"></div>
          </div>
        </div>
      </div>
    </div>
@endsection