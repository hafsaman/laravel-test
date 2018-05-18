
@extends('layouts.app')

@section('content')

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="border-left"><h2>User List</h2></div>
             <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone no</th>
      
      </tr>
    </thead>
    <tbody>
     @foreach($arrUser as $item)
     
	  <tr>
              <td></th>
                                                    <td  >{{$item->firstname}}{{$item->lastname}}</td>
                                                      <td  >{{$item->lastname}}</td>
                                                    <td  >{{$item->email}}</td>
                                                    <td>{{$item->phone}}</td>
													
                                                </tr>
    @endforeach
    </tbody>
  </table>
        {{ $arrUser->links() }}    
  </div>
</div>

              
        
@endsection
