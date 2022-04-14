<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- datatable css start -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- datatable css end -->
    <!-- fa-fa-icon link start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fa-fa-icon link end -->
    <!-- bootstrap link start -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- bootstrap link end -->
  
</head>
    <!-- header section start -->
    <section class="header-section bg-info text-white text-center pt-2 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Manage User</h3>
                </div>
            </div>
        </div>        
    </section>
    <!-- header section end -->

    <!-- navbar section start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('manageuserdashboard')}}">  Manage User </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('user')}}"> LogOut <span class="sr-only">(current)</span></a>
                </li> 
            </ul>
        </div>
    </nav>
    <!-- navbar section end -->

    <!-- add user button section start -->
    <section>
        <div class="row mt-2 mb-2 ml-2">
            <div class="col-md-12 ">
                <form method="get" action="{{url('adduser')}}">
                    <button type="submit" class="btn btn-success float-md-left ">Add User</button>
                </form>
            </div>
        </div>
    </section>
    <!-- add user button section end -->
    
    <!-- datatable section start -->
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $users)
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td><a href="{{url('edituser',$users->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <button type= "button" class ="btn btn-danger" value="{{$users->id}}"><i class="fa fa-trash-o"></i></button></td> 
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   
    <script>
      $(document).ready(function() {
        $('#example').DataTable({
            
        });
      });
   
  $('.btn-danger').click(function(event) {
    
   event.preventDefault();
   
          var form =  $(this).closest("btn-danger");
         console.log(form);
         var id = $(this).val();
           console.log(id);
            
         
        
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                 url = "userremove";
                 var id = $(this).val();
                    console.log(url+'/'+id);
                    // return false;
                 window.location.href = url+'/'+id;
                
         }
      })
      });
</script>