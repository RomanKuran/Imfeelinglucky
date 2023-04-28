$(document).ready(function (e) {

    // event click on history and load histories
    $(document).on('click', '.js-button-history', function (e) {
        loadHistories();
    });
    // ----

});

// function load histories
function loadHistories() {
    // request load histories
    $.ajax({
        type: "GET",
        url: route_load_histories,
        dataType: 'json',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            // inserts a story into html
            let histories = result.histories;
            $('.js-container-history:not(.js-example)').remove();
            let history_item = $('.js-container-history');
            
            for (const history of histories) {
                let clone_history_item = history_item.clone();
                clone_history_item.removeClass('js-example');

                clone_history_item.find('.js-random-number').text(history.random_number);
                clone_history_item.find('.js-winning-status').text(history.winning_status == 1 ? translate_win : translate_lose);
                clone_history_item.find('.js-amount-of-winning').text(history.amount_of_winning);

                $('.js-container-histories').append(clone_history_item);
            }
            // ----
        }
    });
    // ----
}
// ----