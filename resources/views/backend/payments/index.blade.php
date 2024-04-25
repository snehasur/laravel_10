@extends('backend.layout.layout')

@section('space-work')
<body>
    <div class="card">
    <div class="card-header">
      Payment List
    </div>
    <br>
        <a href="{{route('payments.create')}}"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>                   

</body>
@endsection