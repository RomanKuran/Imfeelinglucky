$(document).ready(function (e) {

    // enabled user field
    $(document).on('dblclick', '.js-edit-user-field', function (e) {
        $(this).removeAttr("disabled");
    });
    // ----

    // event edit user
    $(document).on('focusout', '.js-edit-user-field', function () {
        let user = $(this);
        let user_id = user.parents('tr').attr('data-user-id');
        let field_name = user.attr('name');
        let value = user.val();
        user.attr('disabled', 'disabled');

        editUser(user_id, field_name, value);
    });
    // ----

    // event delete user
    $(document).on('click', '.js-delete-user', function () {
        let user = $(this);
        let user_id = user.parents('tr').attr('data-user-id');

        deleteUser(user_id);
    });
    // ----

    // event create user
    $(document).on('click', '.js-create-user', function () {
        let username = $('.js-create-user-field[name="username"]').val();
        let phonenumber = $('.js-create-user-field[name="phonenumber"]').val();
        let link = $('.js-create-user-field[name="link"]').val();

        createUser(username, phonenumber, link);
    });
    // ----

})

// function edit user
function editUser(user_id, field_name, value) {
    $.ajax({
        type: "PUT",
        url: route_edit_user,
        dataType: 'json',
        data: {
            user_id: user_id,
            field_name: field_name,
            value: value,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {

        },
        error: function (result) {
            alert(result.responseJSON.message);
        }
        
    });
}
// ----

// function edit user
function deleteUser(user_id) {
    $.ajax({
        type: "DELETE",
        url: route_delete_user,
        dataType: 'json',
        data: {
            user_id: user_id,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            $(`tr[data-user-id=${user_id}]`).remove();
        },
        error: function (result) {
            alert(result.responseJSON.message);
        }
    });
}
// ----

// function create user
function createUser(username, phonenumber, link) {
    $.ajax({
        type: "post",
        url: route_create_user,
        dataType: 'json',
        data: {
            username: username,
            phonenumber: phonenumber,
            link: link,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {

            // add tr to table
            let user_id = result.userId;
            let user_item = $('.js-user-item.js-example').clone();
            user_item.removeClass('js-example');

            user_item.attr('data-user-id', user_id);

            user_item.find('.js-edit-user-field[name="username"]').val(username);
            user_item.find('.js-edit-user-field[name="phonenumber"]').val(phonenumber);
            user_item.find('.js-edit-user-field[name="link"]').val(link);

            $('.js-user-item-create').after(user_item);
            // ----

        },
        error: function (result) {
            alert(result.responseJSON.message);
        }
    });
}
// ----