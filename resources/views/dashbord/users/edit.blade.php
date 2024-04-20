@extends('layout.add')

@section('content')
    <section class="bg-white">

        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded m-3 p-3"
                            href="/profile"> Back</a>
                    </div>
                </div>
            </div>
            <div class="m-6">
                <x-alert />
            </div>

            <form action="{{ route('users.update', auth()->user()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700 font-bold mb-2">Current Password:</label>
                    <input type="password" name="current_password" id="current_password"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- New Password Input -->
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 font-bold mb-2">New Password:</label>
                    <input type="password" name="new_password" id="new_password"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Image Input -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                    <input type="file" name="image" id="image"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Profile
                    </button>
                </div>
            </form>

        </div>
    </section>
@endsection
