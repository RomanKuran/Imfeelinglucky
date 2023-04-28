@extends('layouts.app')

@push('styles')
    @vite(['resources/sass/admin/pages/users/users.scss'])
@endpush

@push('scripts')
    @vite(['resources/js/admin/pages/users/users.js'])

    <script>
        let route_edit_user = "{{ route('admin.editUser') }}";
        let route_delete_user = "{{ route('admin.deleteUser') }}";
        let route_create_user = "{{ route('admin.createUser') }}";
    </script>
@endpush

@section('content')
    <div class="container">
        <b>To edit a user - double click on the field, edit and click outside the field!!!!!!</b>
        <table class="js-users-table">
            <thead>
                <th>
                    username
                </th>
                <th>
                    phonenumber
                </th>
                <th>
                    link
                </th>
            </thead>

            <tr class="js-user-item js-example" data-user-id="">
                <td>
                    <input class="js-edit-user-field" type="text" name="username" value="" disabled>
                </td>
                <td>
                    <input class="js-edit-user-field" type="text" name="phonenumber" value="" disabled>
                </td>
                <td>
                    <input class="js-edit-user-field" type="text" name="link" value="" disabled>
                </td>
                <td>
                    <button class="js-delete-user">Delete</button>
                </td>
            </tr>

            <tr class="js-user-item-create">
                <td>
                    <input class="js-create-user-field" type="text" name="username">
                </td>
                <td>
                    <input class="js-create-user-field" type="text" name="phonenumber">
                </td>
                <td>
                    <input class="js-create-user-field" type="text" name="link">
                </td>
                <td>
                    <button class="js-create-user">Create</button>
                </td>
            </tr>
            @foreach ($users as $user)
                <tr class="js-user-item" data-user-id="{{ $user->id }}">
                    <td>
                        <input class="js-edit-user-field" type="text" name="username" value="{{ $user->username }}"
                            disabled>
                    </td>
                    <td>
                        <input class="js-edit-user-field" type="text" name="phonenumber" value="{{ $user->phonenumber }}"
                            disabled>
                    </td>
                    <td>
                        <input class="js-edit-user-field" type="text" name="link" value="{{ $user->link }}"
                            disabled>
                    </td>
                    <td>
                        <button class="js-delete-user">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
