@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>
@endSection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($users as $user)
                            <li class="flex justify-between items-center gap-x-6 py-4">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user['name'] }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user['email'] }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    @if ($currentUser->is_admin == true && $currentUser['id'] !== $user['id'])
                                        <div class="flex gap-1">
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}" data-username="{{ $user->name }}">Delete</button>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-bold" id="exampleModalLabel">Delete user!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal content goes here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button class="btn btn-primary" id="delete-user">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to retrieve and populate data in the modal -->
    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('id')
            var username = button.data('username')


            var modal = $(this);
            modal.find('.modal-body').html('<p>Are you sure you want to delete <b>' + username + '</b></p>');

            // Handle click event for the "Save changes" button
            $('#delete-user').click(function() {
                // Perform your action here, for example, you can send data to the server via AJAX
                // Here's a simple alert to demonstrate the click event
                alert('Saving changes for user with id ' + userId);

                // Close the modal if needed
                modal.modal('hide');
                userId = undefined;
                username = undefined;
            });
        });
    </script>
@endSection
