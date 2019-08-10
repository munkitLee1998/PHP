<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Display Programmes</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
          <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                   <a href="/">Home</a>
                   <a href="/displayCourse">Search Course</a> 
                   <a class="active" href="/search">Search Programme</a>
                   <a href="login">Login</a>
               </div>
            </nav>
        </header>
        <div class="container">
            <form action="/search" method="post"/>
            @csrf
            <table class="table table-striped">
                <div class="container">
                    <p> The Search results for your programmes are :</p>
                    <h2>Program details</h2>

                    <p>Level of Study:
                        <select name="level">
                            <option value="all">All</option>
                            <option value="diploma">Diploma</option>
                            <option value="degree">Degree</option>
                            <option value="master">Master</option>
                            <option value="phd">PhD</option>
                        </select>

                        &emsp;Duration: 
                        <select name="duration">
                            <option value="all">All</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </p>

                    <div class="input-group">
                        <input type="search" name="search" class="form-control"/>
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Program Code</th>
                                <th>Program Name</th>
                                <th>Program Description</th>
                                <th>Program Duration</th>
                                <th>Level of Study</th>
                                <th>Faculty Code</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="progid">
                            @foreach($programmes as $programme)
                            <tr>
                                <td>{{$programme['id']}}</td>
<!--                                <td>{{$loop->index+1}}</td>-->
                                <td>{{$programme->progCode}}</td>
                                <td>{{$programme->progName}}</td>
                                <td>{{$programme->desc}}</td>
                                <td>{{$programme->duration}}</td>
                                <td>{{$programme->levelOfStudy}}</td>
                                <td>{{$programme->faculty->facultyCode}}</td>
                                <td><a href="{{action('ProgrammeController@showProgram', $programme['id'])}}">View</a></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </table>
             
        </div>
        <?php
        interface Time {
            public function show();
        }
        
        class TimeZoneFactory {
            public function getTime($TimeZoneType) {
                if ($TimeZoneType == null)
                    return null;
                if (strcasecmp($TimeZoneType, "America") == 0)
                        return new America();
                if (strcasecmp($TimeZoneType, "Japan") == 0)
                        return new Japan();
                if (strcasecmp($TimeZoneType, "Malaysia") == 0)
                        return new Malaysia();
                return null;
            }
        }
        
        class America implements Time {
            public function show() {
                date_default_timezone_set("America/New_York");
                echo "Time Zone of New York in America:" . date("h:i:sa") . "<br />";
            }
        }
        
        class Japan implements Time {
            public function show() {
                date_default_timezone_set("Asia/Tokyo");
                echo "Time Zone of Tokyo in Japan:" . date("h:i:sa") . "<br />";
            }
        }
        
        class Malaysia implements Time {
            public function show() {
                date_default_timezone_set("Asia/Kuala_Lumpur");
                echo "Time Zone of Kuala Lumpur in Malaysia:" . date("h:i:sa") . "<br />";
            }
        }
        
        $TimeZoneFactory = new TimeZoneFactory();
        
        $timeZone1 = $TimeZoneFactory->getTime("America");
        $timeZone1->show();
    
        $timeZone2 = $TimeZoneFactory->getTime("Japan");
        $timeZone2->show();
    
        $timeZone3 = $TimeZoneFactory->getTime("Malaysia");
        $timeZone3->show();
        ?>
    </body>
</html>
