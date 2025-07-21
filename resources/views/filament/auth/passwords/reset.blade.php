{{-- @extends('filament::auth.layout') --}}

@section('content')
    <div class="w-full max-w-md mx-auto">
        <x-filament::card>
            <h2 class="text-center text-2xl font-semibold mb-4">Reset Your Password</h2>

            <form action="{{ route('admin.reset-password') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <x-filament::input name="email" label="Email Address" type="email" required />
                    <x-filament::input name="password" label="New Password" type="password" required />
                    <x-filament::input name="password_confirmation" label="Confirm Password" type="password" required />

                    <x-filament::button class="w-full" type="submit">Reset Password</x-filament::button>
                </div>
            </form>
        </x-filament::card>
    </div>
@endsection
