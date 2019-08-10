<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Accommodation</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a class="active" href="{{url('accommodations')}}">Accommodation</a>
                    <a href="{{url('branches')}}">Branch</a>
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
                    <a href="{{url('loans')}}">Loan</a>
                    
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
        <h2>Add New Accommodation</h2>
        <form method="post" action="{{url('accommodations')}}">
            @csrf
            <p>
                <label for="name">Accommodation Name:</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="type">Type:</label>
                <select name="type">
                    <option value="Double Story">Double Story</option>
                    <option value="Flat">Flat</option>
                </select>
            </p>
            <p>
                <label for="roomType">Room Type:</label>
                <select name="roomType">
                    <option value="Master Room">Master Room</option>
                    <option value="Small Room">Small Room</option>
                </select>
            </p>
            <p>
                <label for="addrerss">Accommodation Address:</label>
                <input type="text" name="address">
            </p>
            <p>
                <label for="fees">Fees (per month):</label>
                <input type="text" name="fees">
            </p>
            <p>
                <button type="submit">Add Accommodation</button>
            </p>
        </form>
        
        <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData);
                      foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); 
                      $loop = $__env->getLastLoop();?>
                
                <li><?php echo e($error); ?></li>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </ul>
        </div>
        <?php endif; ?>
        
    </body>
</html>
