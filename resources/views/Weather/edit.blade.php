<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weather Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header"> 
                        {{$pagetitle}}
                        </div>
                        <div class="card-body">
                       
                            <form method="POST" action="{{route('update')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="id" class="form-control" value ="{{$records[0]->id}}" hidden/>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="cityname">City name</label>
                                    
                                    <input type="text" name="name" class="form-control" value ="{{$records[0]->city->name}}" placeholder="Enter your city name" readonly />
                                    
                                </div>
                                <div class="form-group">
                                    <label for="Weather_Condition">Weather Condition</label>
                                    <input type="text" name="Weather_condition" class="form-control" value ="{{$records[0]->weather_condition}}" placeholder="Enter your email address" />
                                    <span style = "color : red;">@error('Weather_condition'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="temperature">Temperature</label>
                                    <input type="text" name = "temperature"class="form-control" value = {{$records[0]->temperature}}></textarea>
                                    <span style = "color : red;">@error('temperature'){{$message}}@enderror</span> 
                                </div>
      
                                <div class="form-group">
                                    <label for="Feels_like">Feels Like</label>
                                    <input type="text" name = "Feels_like"class="form-control" value = {{$records[0]->feels_like}}></textarea>
                                    <span style = "color : red;">@error('Feels_like'){{$message}}@enderror</span> 
                                </div>
                                <div class="form-group">
                                    <label for="Humidity">Humidity</label>
                                    <input type="text" name = "Humidity"class="form-control" value = {{$records[0]->humidity}}></textarea>
                                    <span style = "color : red;">@error('Humidity'){{$message}}@enderror</span> 
                                </div>
                                <div class="form-group">
                                    <label for="Wind_Speed">Wind Speed</label>
                                    <input type="text" name = "wind_speed"class="form-control" value = {{$records[0]->wind_speed}}></textarea>
                                    <span style = "color : red;">@error('wind_speed'){{$message}}@enderror</span> 
                                </div>
                                <div class="form-group">
                                    <label for="Date">Date</label>
                                    <input type="Date" name = "created"class="form-control" value = {{$records[0]->created_at}} readonly></textarea>
                                    <span style = "color : red;">@error('created'){{$message}}@enderror</span> 
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>