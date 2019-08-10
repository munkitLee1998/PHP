<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <head>
        <meta charset="UTF-8">
        <title>View Accommodation</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
          <div >
                <form action="/searchAC" method="get">
                    <div >
                        
                        <label for="type">Type:</label>
                        <select name="type">
                            <option value="Double Story">Double Story</option>
                            <option value="Flat">Flat</option>
                        </select>
                        <label for="roomType">Room Type:</label>
                        <select name="roomType">
                            <option value="Master Room">Master Room</option>
                            <option value="Small Room">Small Room</option>
                        </select>
                        <input type="search" name="search" class="form-control"/>
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>

                    </div>
                </form>
            </div>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th>Accommodation Name</th>
                        <th>Accommodation Type</th>
                        <th>Accommodation Room Type</th>
                        <th>Accommodation Address</th>
                        <th>Accommodation Fees</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accommodations as $accommodation)
                    <tr>
                        
                        <td>{{$accommodation['accName']}}</td>
                        <td>{{$accommodation['type']}}</td>
                        <td>{{$accommodation['roomType']}}</td>
                        <td>{{$accommodation['address']}}</td>
                        <td>{{$accommodation['accFees']}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
