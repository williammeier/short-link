{{-- The navbar with `sticky` and `full-width` --}}
<div class="sticky top-0 z-10 border-b bg-base-100 border-base-300">
    <div class="flex items-center max-w-screen-xl p-5 mx-auto">
        <div class="flex items-center flex-1">
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="mr-3 lg:hidden">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <div>
                <b><i>Short Link</i></b>
            </div>
        </div>

        {{-- Right side actions --}}
        <div class="flex items-center gap-4">
            @auth
                <x-button label="Dashboard" link="{{ url('/dashboard') }}"
                    class="btn-ghost" responsive />
            @else
                <x-button label="Log in" link="{{ url('/login') }}"
                    class="btn-ghost" responsive />

                @if (Route::has('register'))
                    <x-button label="Sign up Free" link="{{ url('/register') }}"
                        class="text-base-100 btn-primary" responsive />
                @endif
            @endauth

            <x-theme-toggle />

        </div>
    </div>
</div>
