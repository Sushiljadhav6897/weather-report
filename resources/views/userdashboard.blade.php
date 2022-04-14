
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <!-- datatable css start -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- datatable css end -->
    <style>
        .header-section{
          background-color:#9cd9e5;
          color:white;
          text-align:center;
          height:70px;
          margin-bottom:20px;
        }
        h3{
          padding-top:25px;
        }
        .body-section{
          padding: 20px 0px 0px 0px;
        }
    </style>
</head>

    <section class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </section>

        <form method="POST" action="">
                                @csrf
                                <div class="form-group">
                                <label>Name</label>
              <select class="form-control" name="city" >
                <option value = "a">{{'please select'}}</option>
                  @if(!empty($name))
                      @foreach ($name as $k => $v)
                    <option value="{{ $v->id}}" @if(!empty(request()->get('name'))) @if(in_array($v->id, request()->get('name'))) {{'selected'}} @endif @endif >{{$v->name}}</option>
                      @endforeach
                  @endif   
              </select>
                                </div>
                                <div class="form-group">
                                <label>Weather</label>
              <select class="form-control" name="weather">
             
                <option value = "a">{{'please select'}}</option>
               
                   @if(!empty($Weather))
                  
                      @foreach ($Weather as $k => $v) 
                    
                      <option value="{{$v->weather_condition}}" >{{$v->weather_condition}}</option>
                    
                    @endforeach
                   @endif    
              </select>
                                </div>
                                <button type="submit" class="btn btn-success">search</button>
                                <button type="button" class="btn btn-danger">cancel</button>
                              </form>
        
  <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Cityname</th>
                <th>Weather_Condition</th>
                <th>Temprature</th>
                <th>Feels_Like</th>
                <th>Humidity</th>
                <th>Wind_Speed</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($records as $key => $post)
          <tr>
            <td>{{$post->city->name}}</td>
            <td>{{$post->weather_condition}}</td>
            <td>{{$post->temperature}}</td>
            <td>{{$post->feels_like}}</td>
            <td>{{$post->humidity}}</td>
            <td>{{$post->wind_speed}}</td>
            <td>{{$post->created_at}}</td>
          </tr>
        @endforeach
            <!-- <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
                <td>$320,800</td>
            </tr> -->
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#example').DataTable({
          "aaSorting": []
        });
      } );
    </script>



    