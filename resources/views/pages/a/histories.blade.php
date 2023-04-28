<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('History') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <button class="js-button-history">{{ __('History') }}</button>

                <div class="js-container-histories">
                    <div class="container-history js-container-history js-example">
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
