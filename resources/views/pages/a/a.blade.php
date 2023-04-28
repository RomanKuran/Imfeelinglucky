@extends('layouts.app')

@push('styles')
    @vite(['resources/sass/imfeelinglucky.scss'])
@endpush

@push('scripts')
    @vite(['resources/js/imfeelinglucky.js'])

    <script>
        let route_create_history = "{{ route('a.createHistory', ['link' => $userLink]) }}";
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Your link:') }}
                        <a href="{{ route('a', ['link' => $userLink]) }}">{{ route('a', ['link' => $userLink]) }}</a>

                        <form action="{{ route('a.recreate', ['link' => $userLink]) }}" method="get">
                            <button>
                                Recreate
                            </button>
                        </form>

                        <form action="{{ route('a.deactivate', ['link' => $userLink]) }}" method="get">
                            <button>
                                Deactivate
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Imfeelinglucky') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button class="js-button-imfeelinglucky">Imfeelinglucky</button>

                        <div class="container-result-imfeelinglucky">
                            <div class="js-random-number">
                                ---
                            </div>
                            |
                            <div class="js-winning-status">
                                ---
                            </div>
                            |
                            <div class="js-amount-of-winning">
                                ---
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
