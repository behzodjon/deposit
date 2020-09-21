@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Balance</th>
                <th scope="col">Fill your balance</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                {{-- <td>{{$userWallet->name}}</td>
                <td>{{$userWallet->balance}}</td>
              <td><a href="/walletcreate/{{auth()->id()}}" class="btn btn-success">Fill</a></td> --}}
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection