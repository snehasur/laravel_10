@extends('frontend.layout.layout')

@section('space-work')

<div class="card">
  <div class="card-header">
    Student Login
  </div>
  {{-- <div class="card-body">
    <form action="{{route('students.login')}}" method="post">
        @csrf
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{old('email')}}">
            @error('email')  <span style='color:red'>{{$errors->first('email')}}</span>  @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Password" name="password" value="{{old('password')}}">
            @error('password')  <span style='color:red'>{{$errors->first('password')}}</span>  @enderror
          </div>   
      
        
       
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        
      </form> 
    

  </div>--}}
</div>
@endsection
