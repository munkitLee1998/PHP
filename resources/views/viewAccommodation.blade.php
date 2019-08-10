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
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="h2">Home</a>
                    <a class="active" href="{{url('accommodations')}}">Accommodation</a>
                    <a href="{{url('branches')}}">Branch</a>
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
                    <a href="{{url('loans')}}">Loan</a>
                    <a href="{{url('maS')}}">Staff</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>
        </header>
        <div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            <h1>View Accommodation</h1>
            <table class="table table-striped">
                 <a href= "{{url('accommodations/create')}}" class="btn btn-primary">Add New Accommodation</a>
                <thead>
                    <tr>
                        <th>Accommodation Name</th>
                        <th>Accommodation Type</th>
                        <th>Accommodation Room Type</th>
                        <th>Accommodation Address</th>
                        <th>Accommodation Fees</th>
                        <th colspan="3">Action</th>
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
                        
                        
                        
                        <td>
                            <a href="{{action('AccommodationController@edit', $accommodation['id'])}}" class="btn btn-warning">Update</a>
                        </td>
                        
                        <td>
                            <form action="{{action('AccommodationController@destroy', $accommodation['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <?php
        interface Time {
            public function show();
        }
        
        abstract class TimeDecorator implements Time {
            protected $decoratedTime;
            function __construct($decoratedTime) {
                $this->decoratedTime = $decoratedTime;
            }
            public function show() {
                $this->decoratedTime->show();
            }
        }
        
        class DateDecorator extends TimeDecorator {
            function __construct($decoratedTime) {
                parent::__construct($decoratedTime);
            }
            public function show() {
                $this->decoratedTime->show();
                $this->showDate($this->decoratedTime);
            }
            private function showDate($decoratedTime) {
                $timeZone = $decoratedTime->getTimeZone();
                if($timeZone=="America")
                    date_default_timezone_set("America/New_York");
                if($timeZone=="Malaysia")
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                echo "Date: ". date("d/m/Y")."<br />";
            }
        }
        
        class America implements Time {
            protected $timezone = "America";
            function getTimezone() {
                return $this->timezone;
            }
            public function show() {
                date_default_timezone_set("America/New_York");
                echo "America Time: ".date("h:i:sa")."<br />";
            }
        }
        
        class Malaysia implements Time {
            protected $timezone = "Malaysia";
            function getTimezone() {
                return $this->timezone;
            }
            public function show() {
                date_default_timezone_set("Asia/Kuala_Lumpur");
                echo "Malaysia Time: ".date("h:i:sa")."<br />";
            }
        }
        
        $MY = new Malaysia();
        
        $dateMY = new DateDecorator(new Malaysia());
        $dateUS = new DateDecorator(new America());
        
        echo "Malaysia Time without date: <br />";
        $MY->show();
        
        echo "<br />Malaysia time with date: <br />";
        $dateMY->show();
        
        echo "<br />America time with date: <br />";
        $dateUS->show();
        ?>
    </body>
</html>

