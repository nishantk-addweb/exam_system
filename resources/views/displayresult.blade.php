@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Result</div>

                <div class="card-body">
                    <form method="get" action="{{action('resultcontroller@display')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Student Id</label>

                            <div class="col-md-6">
                                <label id="qname" type="text" class="form-control" name="qname">{{ Auth::user()->id }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Student Name</label>

                            <div class="col-md-6">
                                <label id="qname" type="text" class="form-control" name="qname">{{ Auth::user()->name }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Total Questions</label>

                            <div class="col-md-6">
                                <label id="qname" type="text" class="form-control" name="qname">{{$totalquestions}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Correct Answers</label>

                            <div class="col-md-6">
                                <label id="qname" type="text" class="form-control" name="qname">{{$totalcorrectans}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Total Marks</label>

                            <div class="col-md-6">
                                <label id="qname" type="text" class="form-control" name="qname">{{$totalcorrectans}}/{{$totalquestions}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                               
                                  <a href="{{route('home')}}">Go to Homepage
                               </a>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection