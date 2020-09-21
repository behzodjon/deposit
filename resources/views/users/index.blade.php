@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
        <div class="d-flex" style="justify-content: flex-end; "> <a href="{{route('wallet.create',$user)}}" class="btn btn-success">Fill your balance</a>
        </div> <br>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Card Balances</th>
                <th scope="col">Create deposit</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($userwallets as $wallet )
              <tr>
                <td>{{$wallet->id}}</td>
                <td>{{$wallet->balance}}</td>
              <td><a href="{{route('deposit.create',[$user,$wallet])}}">Create deposit</a></td>
              </tr>    
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection