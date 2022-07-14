@extends('layouts.base')

@push('styles')
    <link href="{{asset('MilleniumTravelAgency/TravelBlog/travelBlog.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('scripts')
    <script src="{{asset('MilleniumTravelAgency/TravelBlog/travelBlog.js')}}"></script>

    <script>
        $('#blog').addClass('this');
    </script>
@endpush
