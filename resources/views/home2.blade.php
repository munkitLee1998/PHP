<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main Page</title>
         <link rel="stylesheet" href="{{asset('css/app.css')}}">
         <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                   <a class="active" href="h2">Home</a>
                   <a href="{{route('ma')}}">Main Admin</a> 
                   <a href="{{route('fa')}}">Faculty Admin</a>
                   <a href="{{route('de')}}">Department Staff</a>
                   <a href="{{route('fs')}}">Faculty Staff</a>
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
        <h1>Welcome</h1>

        <?php
         class Subject {
            private $observers;
            private $state;
            function __construct() {
                $this->observers = new SplObjectStorage();
            }
  
            public function getState() {
                return $this->state;
            }
  
            public function setState($state) {
                $this->state = $state;
                $this->notifyAllObservers();
            }
  
            public function attach($observer) {
                $this->observers->attach($observer);
            }
  
            public function notifyAllObservers() {
                foreach ($this->observers as $observer) {
                    $observer->update();
                }
            }
        }
        
        abstract class Observer {
            protected $subject;
            public abstract function update();
        }
        
        class DateObserver extends Observer {
            function __construct($subject) {
                $this->subject = $subject;
                $this->subject->attach($this);
            }
            public function update() {
                $timeZone = $this->subject->getState();
                if($timeZone=="New York")
                    date_default_timezone_set("America/New_York");
                if($timeZone=="Kuala Lumpur")
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                
                echo "Date: " . date("d-m-Y") . "<br />";
            }
        }
        
        class TimeObserver extends Observer {
            function __construct($subject) {
                $this->subject = $subject;
                $this->subject->attach($this);
            }
            public function update() {
                $timeZone = $this->subject->getState();
                if($timeZone=="New York")
                    date_default_timezone_set("America/New_York");
                if($timeZone=="Kuala Lumpur")
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                
                echo "Time: " . date("h:i:sa") . "<br />";
            }
        }
        
        $subject = new Subject();
        
        new DateObserver($subject);
        new TimeObserver($subject);
    
    
        echo "Now the time in New York is<br />";
        $subject->setState("New York");
        echo "<br/>Now the time in Kuala Lumpur is <br />";
        $subject->setState("Kuala Lumpur");
        ?>
    </body>
</html>
