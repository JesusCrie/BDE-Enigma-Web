@extends('layouts.app')

@section('content')
    <div class="container-screen-center">

        <div class="container-home">
            <!-- Title -->
            <div class="big-title mb-10 lg:mb-20">
                <h1>BDE DDOS</h1>
            </div>

            <!-- Challenge Submission -->
            <form action="TODO" method="post" class="container-auto-wrap">
                @csrf
                <input type="text" placeholder="Enter challenge code here" class="input-text big blue" required autofocus>
                <input type="submit" value="Submit" class="btn blue-dark w-full lg:w-auto mt-4 lg:mt-0 lg:ml-4">
            </form>
        </div>
    </div>
@endsection
