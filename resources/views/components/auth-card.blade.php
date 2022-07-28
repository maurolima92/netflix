

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-bcklogin ">
    <nav x-data="{ open: false }">
        <!-- Primary Navigation Menu -->
        <div class=" bg-transparent ">
            <x-login-logo class="block h-10 w-auto fill-current text-gray-600" />
        </div>
    </nav>
    <div class="w-full sm:max-w-md mt-6 px-12 py-20 bg-darktransparent  shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
</div>
