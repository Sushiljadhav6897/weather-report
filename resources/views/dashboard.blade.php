@if(!empty($records))
@php $sr = 0 ;
@endphp
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<section class="header-section bg-info text-white text-center pt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
        
    </section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                @if(Session::has('Admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{url('manageuserdashboard')}}">  Manage User </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{url('logout')}}"> LogOut <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    @if(Session::has('user_login'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('user_login')}}
                                </div>
                            @endif

  @if(!Session::has('Admin'))

  <form method="POST" action="{{url('search')}}">
                                @csrf
                                <div class="form-group">
                                <label>Name</label>
              <select class="form-control" name="city" value="{{ old('city')}}">
                <option value = "">{{'please select'}}</option>
                  @if(!empty($name))
                      @foreach ($name as $k => $v)
                    <option value="{{ $v->id}}" {{ old('city') == $v->id ? "selected" : "" }}>{{$v->name}}</option>
                      @endforeach
                  @endif   
              </select>
                                </div>
                                <div class="form-group">
                                <label>Weather</label>
              <select class="form-control" name="weather">
             
                <option value = "">{{'please select'}}</option>
               
                   @if(!empty($Weather))
                  
                      @foreach ($Weather as $k => $v) 
                    
                      <option value="{{$v->weather_condition}}" >{{$v->weather_condition}}</option>
                    
                    @endforeach
                   @endif    
              </select>
                                </div>
                                <button type="submit" class="btn btn-success">search</button>
                                <a href="{{route('dashboard')}}"><button type="button" class="btn btn-primary">cancel</button></a>
                              </form>
        @endif

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>City_Name</th>
                <th>Weather_Condition</th>
                <th>Temprature</th>
                <th>Feels_Like</th>
                <th>Humidity</th>
                <th>Wind_Speed</th>
                <th>Date</th>
                @if(Session::has('Admin'))
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
         @if(!empty($records))
               @foreach($records as $key => $value)    
                            <tr>
                                
                                <td>{{$value->city->name}}</td>
                                <td>{{$value->weather_condition}}</td>
                                <td>{{$value->temperature}}</td>
                                <td>{{$value->feels_like}}</td>
                                <td>{{$value->humidity}}</td>
                                <td>{{$value->wind_speed}}</td>
                                <td>{{$value->created_at}}</td>
                                @if(Session::has('Admin'))
                                <td colspan="2">
                                <a href="/edit-post/{{$value->id}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger" id="show" value="{{$value->id}}"><i class="fa fa-trash-o"></i></button>
                              </td>
                              @endif                            
                              </tr> 
                           @endforeach
                           @endif
                     </tbody>
                  </table>
      </div>
   </div>
   </div>
   
   <br>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   
    <script>
      $(document).ready(function() {
        $('#example').DataTable({
            "aaSorting": []
        });
      } );
   
  $('.btn-danger').click(function(event) {
    
   event.preventDefault();
   // url = "delete";
   //          id = $(this).val();
   //          editUrl = url + '/' + id ;
   //          $.get( {{ url('editUrl') }}, {name:name, country:country, 
          var form =  $(this).closest("btn-danger");
         // console.log(form);
          var href = $(this).val();
         // console.log(href);
        
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                 url = "delete";
            var id = $(this).val();
            // var editUrl = url + '/' + id ;
            // console.log(editUrl);
            
            window.location.href = ''+url+'/'+id;
         //       $.ajax({url:''+url+'/'+id, success: function(result){
         //          window.href('/dashboard');
            
         // }         
         //  })
         }
      })
      });
</script>
@endif 

