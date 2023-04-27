@extends('layouts.app')

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

                        <form action="" method="get">
                            <button>
                                Deactivate
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection