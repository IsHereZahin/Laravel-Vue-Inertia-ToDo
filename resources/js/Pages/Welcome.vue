<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-gray-800 dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <svg
                            class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]"
                            viewBox="0 0 62 65"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                                fill="currentColor"
                            />
                        </svg>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div
                        class="flex flex-col items-start gap-6 overflow-hidden rounded-lg px-6 py-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20] lg:col-span-12"
                    >
                        <div class="mx-auto mt-10">
                            <div class="flex justify-center items-center gap-4 w-full">
                                <!-- Laravel Icon -->
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="32" height="32">
  <path fill="#FF2D20" d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" />
</svg>
                                </div>

                                <!-- Vue Icon -->
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#42B883]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path fill="#42B883" d="M12 0L0 21h4.8L12 7.2 19.2 21H24L12 0z"/>
                                        <path fill="#35495E" d="M4.8 21L12 7.2 19.2 21H15.6L12 14.4 8.4 21H4.8z"/>
                                    </svg>
                                </div>

                                <!-- Inertia Icon -->
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#6366F1]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path fill="#6366F1" d="M12 2a10 10 0 1 0 10 10A10.012 10.012 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8z"/>
                                        <path fill="#6366F1" d="M16.293 8.293a1 1 0 0 0-1.414 0L12 11.172 9.121 8.293A1 1 0 0 0 7.707 9.707l3.586 3.586a1 1 0 0 0 1.414 0l3.586-3.586a1 1 0 0 0 0-1.414z"/>
                                    </svg>
                                </div>
                            </div>

                            <h1
                                class="text-3xl font-bold text-center mb-8 mt-8 text-[#ffffff]"
                            >
                                Step-by-Step Laravel Vue Inertia Setup
                            </h1>

                            <div class="p-6 rounded-lg shadow-md">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    1. Install PHP, Composer, and Laravel Installer
                                </h2>
                                <p class="text-base text-gray-700 dark:text-gray-300">
                                    Before creating a Laravel application, ensure PHP, Composer, and the Laravel installer are installed on your machine. If not, install them using the appropriate commands for your OS (macOS, Windows, Linux).
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300 mt-2">
                                    For detailed instructions, visit the
                                    <a href="https://laravel.com/docs" class="text-[#FF2D20] font-semibold hover:underline">official Laravel documentation</a>.
                                </p>
                                <pre class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-4">composer global require laravel/installer</pre>
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    2. Create a New Laravel Project
                                </h2>
                                <p>
                                    Run the following command to create a new
                                    Laravel project:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
laravel new</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    3. Enter Project Name
                                </h2>
                                <p>
                                    When prompted, enter the name of your
                                    project:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
What is the name of your project?:
> ToDo</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    4. Choose Starter Kit
                                </h2>
                                <p>
                                    When asked about the starter kit, you'll be
                                    given several options:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
Would you like to install a starter kit? [No starter kit]:
[none     ] No starter kit
[breeze   ] Laravel Breeze
[jetstream] Laravel Jetstream</pre
                                >
                                <p>Choose:</p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
> breeze</pre
                                >
                                <p>
                                    This installs the Breeze scaffolding, which
                                    provides basic authentication and setup.
                                </p>
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    5. Select Breeze Stack
                                </h2>
                                <p>
                                    After selecting Breeze, you'll be asked
                                    which stack you would like to use for your
                                    project. Here are the available options:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
Which Breeze stack would you like to install? [Blade with Alpine]:
[blade              ] Blade with Alpine
[livewire           ] Livewire (Volt Class API) with Alpine
[livewire-functional] Livewire (Volt Functional API) with Alpine
[react              ] React with Inertia
[vue                ] Vue with Inertia
[api                ] API only</pre
                                >
                                <p>Choose:</p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
> vue</pre
                                >
                                <p>
                                    This installs Vue.js with Inertia.js for a
                                    Single Page Application (SPA).
                                </p>
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    6. Optional Features
                                </h2>
                                <p>
                                    Next, you’ll be asked if you want any
                                    optional features. The options are:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
Would you like any optional features? [None]:
[none      ] None
[dark      ] Dark mode
[ssr       ] Inertia SSR
[typescript] TypeScript
[eslint    ] ESLint with Prettier</pre
                                >
                                <p>Choose:</p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
> none</pre
                                >
                                <p>
                                    This means you do not want to add any extra
                                    features like Dark Mode, Inertia SSR,
                                    TypeScript, or ESLint.
                                </p>
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    7. Choose Testing Framework
                                </h2>
                                <p>
                                    After that, you’ll be asked which testing
                                    framework you want to use. The options are:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
Which testing framework do you prefer? [Pest]:
[0] Pest
[1] PHPUnit</pre
                                >
                                <p>Choose:</p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
> 0</pre
                                >
                                <p>This sets up Pest for testing.</p>
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    8. Project Creation
                                </h2>
                                <p>
                                    Laravel will now create your project. During
                                    the setup, you’ll see messages like this:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
> @php -r "file_exists('.env') || copy('.env.example', '.env');"
INFO  Application key set successfully.</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    9. Choose Database
                                </h2>
                                <p>
                                    You’ll be prompted to choose a database. The
                                    available options are:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
Which database will your application use? [MySQL]:
[mysql  ] MySQL
[mariadb] MariaDB
[sqlite ] SQLite
[pgsql  ] PostgreSQL
[sqlsrv ] SQL Server</pre
                                >
                                <p>Choose:</p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
> mysql</pre
                                >
                                <p>This sets up MySQL as your database.</p>
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    10. Run Database Migrations
                                </h2>
                                <p>
                                    After selecting your database, you’ll be
                                    asked if you want to run the default
                                    migrations to set up the database:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
Default database updated. Would you like to run the default database migrations? (yes/no) [yes]:
> yes</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    11. Completion of Breeze Installation
                                </h2>
                                <p>
                                    Laravel will install the Breeze scaffolding
                                    and set up your application. You'll see a
                                    message like this:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
INFO  Breeze scaffolding installed successfully.
INFO  Application ready in [YoDo]. You can start your local development using:</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    12. Change Directory
                                </h2>
                                <p>Now, navigate to your project folder:</p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
cd ToDo</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    13. Install Dependencies
                                </h2>
                                <p>
                                    Run the following command to install the
                                    necessary JavaScript dependencies:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
npm install && npm run build</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    14. Start the Development Server
                                </h2>
                                <p>
                                    Finally, start the Laravel development
                                    server by running:
                                </p>
                                <pre
                                    class="bg-gray-100 p-4 rounded-lg text-gray-700 mt-2"
                                >
composer run dev</pre
                                >
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">
                                    15. Application Ready
                                </h2>
                                <p>
                                    After following these steps, your
                                    application is ready, and you can start
                                    working on your ToDo app or any other
                                    functionality.
                                </p>
                            </div>

                            <div class="p-6 rounded-lg shadow-md mt-6">
                                <h2 class="text-2xl font-semibold mb-4 text-white">In Summary:</h2>
                                <ul class="list-decimal pl-6 text-gray-300">
                                    <li class="mb-3"><strong>Create project:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">laravel new</span></li>
                                    <li class="mb-3"><strong>Enter project name:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">ToDo</span></li>
                                    <li class="mb-3"><strong>Choose starter kit:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">Breeze</span></li>
                                    <li class="mb-3"><strong>Select stack:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">Vue (with Inertia.js)</span></li>
                                    <li class="mb-3"><strong>Optional features:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">None</span></li>
                                    <li class="mb-3"><strong>Testing framework:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">Pest</span></li>
                                    <li class="mb-3"><strong>Database:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">MySQL</span></li>
                                    <li class="mb-3"><strong>Run migrations:</strong> <span class="bg-gray-800 text-white px-2 py-1 rounded">Yes</span></li>
                                    <li class="mb-3"><strong>Follow up with commands:</strong></li>
                                <pre class="bg-gray-100 text-gray-700 p-4 rounded-md mt-2">
cd ToDo
npm install && npm run build
composer run dev</pre>
                                </ul>
                                <p class="mt-4 text-gray-300">
                                    This sets up your Laravel project with Breeze, Vue, and Pest. You're ready to start coding! Let me know if you need any help.
                                </p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
