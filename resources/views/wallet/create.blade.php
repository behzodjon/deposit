@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <form method="post" action="{{route('wallet.store')}}">
     @include('wallet.form')
    </form>
    </div>
  </div>
</div>
@endsection