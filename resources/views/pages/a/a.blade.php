@extends('layouts.app')

@push('styles')
    @vite(['resources/sass/imfeelinglucky.scss'])
@endpush

@push('scripts')
    @vite(['resources/js/imfeelinglucky.js'])
    @vite(['resources/js/history.js'])

    <script>
        let route_create_history = "{{ route('a.createHistory', ['link' => $userLink]) }}";
        let route_load_histories = "{{ route('a.loadHistories', ['link' => $userLink]) }}";
    </script>
@endpush

@section('content')
    <div class="container">

        @include('pages.a.link')

        @include('pages.a.imfeelinglucky')
        
        @include('pages.a.histories')

    </div>
@endsection
