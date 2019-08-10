<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Staff Details</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
        
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a href="{{url('accommodations')}}">Accommodation</a>
                    <a href="{{url('branches')}}">Branch</a>
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
                    <a href="{{url('loans')}}">Loan</a>
                    <a class="active" href="{{url('maS')}}">Staff</a>
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
        <h1>Update Staff Details</h1><br/>
        <form method="post" action="{{action('maStaffController@update',$id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            
            <p>
                <label for="staffName">Staff Name : </label>
                <input type="text" name="staffName" value="{{$user->staffName}}">
            </p> 
            <p>
                <label for="staffType">Staff Type : </label>
                <<select name="staffType">
                    <option value="faculty admin">Faculty Admin</option>
                    <option value="department staff">Department Staff</option>
                    <option value="faculty staff">Faculty Staff</option>
                </select>
            </p>
            <p>
                <label for="email">Staff Email : </label>
                <input type="text" name="email" value="{{$user->email}}">
            </p>
            <p>
                <label for="password">Password : </label>
                <input type="password" name="password" value="{{$user->password}}">
            </p>
           <p>
                <label for="password_confirmation">Password Confirmation :</label>
                <input type="password" name="password_confirmation">
                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
            </p>
            <p>
                <button type="submit">Submit</button>
            </p>
        </form>
            
        <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData);
                       foreach($__currentLoopData as $error): $__env->increamentLoopIndices();
                       $loop = $__env->getLastLoop();?>
                <li><?php echo e($error); ?></li>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </body>
</html>
