@extends('layouts.app')

@section('content')

<div class="p-6 bg-pink-50 min-h-screen">

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">

        <div class="flex items-center gap-4 mb-6">

            <div class="w-16 h-16 rounded-full bg-pink-500 text-white flex items-center justify-center text-2xl font-bold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Profile Saya
                </h2>

                <p class="text-gray-500">
                    Informasi akun pengguna
                </p>
            </div>

        </div>

        <div class="space-y-5">

            <div>
                <label class="text-sm text-gray-500">
                    Nama Lengkap
                </label>

                <div class="mt-1 p-3 bg-pink-50 rounded-lg border">
                    {{ auth()->user()->name }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">
                    Email
                </label>

                <div class="mt-1 p-3 bg-pink-50 rounded-lg border">
                    {{ auth()->user()->email }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">
                    Role
                </label>

                <div class="mt-1 p-3 bg-pink-50 rounded-lg border">
                    {{ auth()->user()->role }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection