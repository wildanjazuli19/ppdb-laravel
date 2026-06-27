@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

            <h1 class="text-2xl font-bold mb-6">
                Profile
            </h1>

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

            @include('profile.partials.update-password-form')

        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

            @include('profile.partials.delete-user-form')

        </div>

    </div>
</div>

@endsection