@extends('layouts.app')

@section('content')
    <div class="flex items-center h-screen">

        <div class="home-container">
            <!-- Title -->
            <div class="mb-10 lg:mb-20 text-center text-2xl">
                <h1>BDE DDOS</h1>
            </div>

            <!-- Challenge Submission -->
            <form action="TODO" method="post" class="flex flex-wrap lg:flex-no-wrap">
                @csrf
                <input type="text" placeholder="Enter challenge code here" class="input-text-big" required>
                <input type="submit" value="Submit" class="btn blue-dark w-full lg:w-auto mt-4 lg:mt-0 lg:ml-4">
            </form>
        </div>
    </div>
@endsection
