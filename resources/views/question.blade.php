<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            //alert("I am an alert box!");
            // timer = duration;
             window.location.href = "home";
        }
    }, 1000);
}

window.onload = function () {
    var tenMinutes = 60 * 10,
        display = document.querySelector('#time');
    startTimer(tenMinutes, display);
};
</script>

</body>
</html>

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Exam will ended in <span id="time"></span> minutes!
                </div>
                

                <div class="card-body">
                @foreach($data as $i)
               

                <h3>Q.{{$i->id}} {{$i->quename}}</h3>	
      
                <div style='padding: 2px;'>
                <label style=' padding: 5px; font-size: 1.5rem;'>
                 <input type='radio' name='option' onclick="myFunction(this.value)" value="{{$i->optA}}" style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' /> 
                 {{$i->optA}}</label>
                </div>

                <div style='padding: 2px;'>
                <label style=' padding: 5px; font-size: 1.5rem;'>
                 <input type='radio' name='option' onclick="myFunction(this.value)" value="{{$i->optB}}" style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' /> 
                 {{$i->optB}}</label>
                </div>

                <div style='padding: 2px;'>
                <label style=' padding: 5px; font-size: 1.5rem;'>
                 <input type='radio' name='option' onclick="myFunction(this.value)" value="{{$i->optC}}" style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' /> 
                 {{$i->optC}}</label>
                </div>

                <div style='padding: 2px;'>
                <label style=' padding: 5px; font-size: 1.5rem;'>
                 <input type='radio' name='option' onclick="myFunction(this.value)" value="{{$i->optD}}" style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' /> 
                 {{$i->optD}}</label>
                </div>

                
                <a href="?q_id={{$i->id}}&next=save" class="btn btn-primary" >Next</a>


                <form action="{{action('resultcontroller@save')}}" method="post">
                @csrf
                    <button type="submit" class="btn btn-primary" >Submit answer</button>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="q_id" value= "{{$i->id}}">
                
                    <script>
                        function myFunction(browser) {
                        document.getElementById("result").value = browser;
                        }
                    </script>
                    <input type="hidden" name="result" id="result" value=""/>
                </form>
                </div>
                <form action="{{action('resultcontroller@display')}}">
                    <button type="submit" class="btn btn-primary" >
                    Show Result 
                    </button>
                </form>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
