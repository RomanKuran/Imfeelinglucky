$(document).ready(function (e) {

    // event click on imfeelinglucky
    $(document).on('click', '.js-button-imfeelinglucky', function (e) {
        imfeelinglucky();
    });
    // ----

});

// function click on imfeelinglucky
function imfeelinglucky() {

    // generate random number
    let random_number = Math.floor(Math.random() * 1000) + 1;
    $('.js-random-number').text(random_number);
    // ----

    // check winning status
    let amount_of_winning = 0;
    let winning_status = null;
    if (random_number % 2 == 1) {
        $('.js-winning-status').text(translate_lose);
        winning_status = false;
        $('.js-amount-of-winning').text(0);
    } else {
        $('.js-winning-status').text(translate_win);
        winning_status = true;
        amount_of_winning = findResultWining(random_number);
    }
    // ----

    // request create history item
    $.ajax({
        type: "POST",
        url: route_create_history,
        dataType: 'json',
        data: {
            random_number: random_number,
            winning_status: winning_status,
            amount_of_winning: amount_of_winning,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            console.log('success');
        }
    });
    // ----

}
// ----

// function find result wining
function findResultWining(random_number) {
    let percent_1 = 70;
    let percent_2 = 50;
    let percent_3 = 30;
    let percent_4 = 10;

    let max_random_nummber_1 = 900;
    let max_random_nummber_2 = 600;
    let max_random_nummber_3 = 300;

    let amount_of_winning = 0;

    if (random_number > max_random_nummber_1) {
        amount_of_winning = calculateAmountOfWinning(random_number, percent_1);
    } else if (random_number > max_random_nummber_2) {
        amount_of_winning = calculateAmountOfWinning(random_number, percent_2);
    } else if (random_number > max_random_nummber_3) {
        amount_of_winning = calculateAmountOfWinning(random_number, percent_3);
    } else if (random_number <= max_random_nummber_3) {
        amount_of_winning = calculateAmountOfWinning(random_number, percent_4);
    }
    amount_of_winning = amount_of_winning.toFixed(2);

    $('.js-amount-of-winning').text(amount_of_winning);

    return amount_of_winning;
}
// ----

// function calculation amount of winning
function calculateAmountOfWinning(random_number, percent) {
    return random_number / 100 * percent;
}
// ----