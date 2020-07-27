@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($cat as $cats)
                <div class="card-header">{{$cats->category}}</div>
                <div class="card-body">
                    
                        <center>
                            <a href="question?cat_id={{$cats->id}}" class="btn btn-primary">Start</a>
                        </center>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <ul>
                        <li>Before starting the exam:</li>
                        <li>Please verify that the student's last name appears correctly within the User ID box.</li>
                        <li>During the exam:</li>
                        <li>The student may not use his or her textbook, course notes, or receive help from a proctor or any other outside source.Students must complete the 10-question multiple-choice exam within the 10-minute time frame allotted for the exam.Students must not stop the session and then return to it. This is especially important in the online environment where the system will "time-out" .</li>
                    </ul> -->