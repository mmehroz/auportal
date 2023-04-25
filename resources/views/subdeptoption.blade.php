    <select class='form-control'  name="subdeptname" required >
    @foreach ($subde as $key => $stores) 
      <option value={{$stores->sd_id }}>{{$stores->sd_name}}</option> 
    @endforeach
    </select>