@extends('layouts.app')

@section('content')
<br><br>
    <div class="jumbotron text-center front-card">
        <div id="hearder-m">
            <h1 style="font">Welcome to EventAston!</h1>
            <br>
            <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        </div>
    </div>

    <div class="card">
            <div class="card-body">
                <h1>My EventAston</h1>
                <p>My EventAston is a platform you allow you to see the Events that are going on at Aston University. Events are posted by event organiser,<br> to be become an event organiser all you have to do is to register. <br>
                As an event organiser, you can post events with pictures, update and delete the events that you have posted.
            </div>
    </div>
    <br><br>
    <div class="main-card">
                <div class="card cd">
                        <img class="card-img-top" src="./img/s3.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Join Aston University</h5>
                        <p class="card-text">Aston Freshers' is open to all new students to help you settle into your new home. There will be a mixture of academic, practical, cultural, social and fun activities. Many are free, and all are designed to help you make new friends, prepare for your studies and settle in to life at Aston quickly and easily.</p>
                        <a href="http://www.aston.ac.uk/campaigns/new-student/" class="btn btn-light">Find more info</a>
                        </div>
                </div>

                <div class="card cd">
                        <img class="card-img-top" src="./img/s2.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Become a Student Ambassador</h5>
                        <p class="card-text">Aston University student ambassadors are current Aston students who help the Student Recruitment and Outreach Team to promote university and student life to school pupils, prospective students and their families.</p>
                        <a href="http://www.aston.ac.uk/current-students/get-involved/ambassadors/" class="btn btn-light">Find more info</a>
                        </div>
                </div>

</div>
@endsection
