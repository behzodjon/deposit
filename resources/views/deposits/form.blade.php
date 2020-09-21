@csrf
<input type="hidden" value="{{$wallet->id}}" name="wallet_id">    
<div class="form-group">
      <label>Balance To Deposit</label>
      <input type="text" class="form-control" name="invested">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  