<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
   
<style>

:root {
--light: #edf2f9;
--dark: #152e4d;
--darker: #12263f;
}

.dark .dark\:text-light {
    color: var(--light);
}

.dark .dark\:bg-dark {
    background-color: var(--dark);
}

.dark .dark\:bg-darker {
    background-color: var(--darker);
}

.dark .dark\:text-gray-300 {
    color: #d1d5db;
}

.dark .dark\:text-indigo-700 {
c   olor: #4338ca;
}

.dark .dark\:text-indigo-500 {
    color: #6366f1;
}

.dark .dark\:text-indigo-100 {
    color: #e0e7ff;
}

.dark .dark\:hover\:text-light:hover {
    color: var(--light);
}

.dark .dark\:border-indigo-800 {
    border-color: #3730a3;
}

.dark .dark\:border-indigo-700 {
    border-color: #4338ca;
}

.dark .dark\:bg-indigo-600 {
    background-color: #4f46e5;
}

.dark .dark\:hover\:bg-indigo-600:hover {
    background-color: #4f46e5;
}

.dark .dark\:border-indigo-500 {
    border-color: #6366f1;
}

.dark .group:hover .dark\:group-hover\:text-indigo-400 {
    color: #818cf8;
}

.hover\:overflow-y-auto:hover {
    overflow-y: auto;
}
</style>

<div
    x-data="setup()"
    x-init="$refs.loading.classList.add('hidden')"
    :class="{ 'dark': isDark}"
    @resize.window="watchScreen()"
>
    <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">

    <div
        x-ref="loading"
        class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-indigo-800"
    >
        Loading.....
    </div>

  
    <div
        x-show="isSidebarOpen"
        @click="isSidebarOpen = false"
        class="fixed inset-0 z-10 bg-indigo-800 md:hidden"
        style="opacity: 0.5"
        aria-hidden="true"
    ></div>

    <aside
        x-show="isSidebarOpen"
        x-transition:enter="transition-all transform duration-300 ease-in-out"
        x-transition:enter-start="-translate-x-full opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition-all transform duration-300 ease-in-out"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="-translate-x-full opacity-0"
        x-ref="sidebar"
        @keydown.escape="window.innerWidth <= 768 ? isSidebarOpen = false : ''"
        tabindex="-1"
        class="fixed inset-y-0 z-10 flex flex-shrink-0 bg-white border-r md:static dark:border-indigo-800 dark:bg-darker focus:outline-none"
    >
        
        <nav class="flex flex-col flex-shrink-0 h-full px-2 py-4 border-r dark:border-indigo-800">

        
        <div class="flex flex-col items-center justify-center flex-1 space-y-4">
        
            <a
            href="/distribution"
            class="p-2 text-white transition-colors duration-200 bg-indigo-600 rounded-full hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
            >
            <span class="sr-only">Home</span>
            <svg
                class="w-7 h-7"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                />
            </svg>
            </a>
          
            <a
            href="/examination_committees"
            class="p-2 text-white transition-colors duration-200 bg-indigo-600 rounded-full hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
            >
            <span class="sr-only">Messages</span>
            <svg
                class="w-7 h-7"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                />
            </svg>
            </a>
            
            <a
            href="/examination_room"
            class="p-2 text-white transition-colors duration-200 bg-indigo-600 rounded-full hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
            >
            <span class="sr-only">Another Link</span>
            <svg
                class="w-7 h-7"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                />
            </svg>
            </a>

            <a
            href="/candidates"
            class="p-2 text-white transition-colors duration-200 bg-indigo-600 rounded-full hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
            >
            <span class="sr-only">Users</span>
            <svg
                class="w-7 h-7"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                />
            </svg>
            </a>
        </div>

        <a href="/login" class="flex items-center justify-center flex-shrink-0">
       
            <button
            class="p-2 text-indigo-400 transition-colors duration-200 rounded-full bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:bg-indigo-100 dark:focus:bg-indigo-700 focus:ring-indigo-800"
            >
            <span class="sr-only">Logout</span>
            <svg
                class="w-7 h-7"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
            </svg>
            </button>
        </a>
        </nav>
    </aside>

    <div class="flex flex-1 h-screen overflow-y-scroll">

        <main class="flex-1">
        <header class="flex items-center justify-between p-4">
            <div class="flex items-center space-x-4 md:space-x-0">
            
            <button
                @click="isSidebarOpen = true; $nextTick(() => { $refs.sidebar.focus() })"
                class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 md:hidden hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:ring"
            >
                <span class="sr-only">Open main manu</span>
                <span aria-hidden="true">
                <svg
                    x-show="!isSidebarOpen"
                    class="w-8 h-8"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
                <svg
                    x-show="isSidebarOpen"
                    class="w-8 h-8"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </span>
            </button>

<!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh -->

            <h1 class="text-2xl font-medium">Home</h1>
            </div>
            <div class="space-x-2">
            
            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                <div class="w-12 h-6 transition bg-indigo-100 rounded-full outline-none dark:bg-indigo-400"></div>
                <div
                class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                :class="{ 'translate-x-0 -translate-y-px  bg-white text-indigo-700': !isDark, 'translate-x-6 text-indigo-100 bg-indigo-800': isDark }"
                >
                <svg
                    x-show="!isDark"
                    class="w-4 h-4"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                    />
                </svg>
                <svg
                    x-show="isDark"
                    class="w-4 h-4"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                    />
                </svg>
                </div>
            </button>
            
            <!-- Search panel button 
            <button
                @click="openSearchPanel"
                class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:ring"
            >
                <span class="sr-only">Open search panel</span>
                <span aria-hidden="true">
                <svg
                    class="w-8 h-8"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
                </span>
            </button>-->

            <!-- User panel button
            <button
                @click="openUserPanel"
                class="p-1 text-indigo-400 transition-colors duration-200 rounded-md bg-indigo-50 xl:hidden hover:text-indigo-600 hover:bg-indigo-100 dark:hover:text-light dark:hover:bg-indigo-700 dark:bg-dark focus:outline-none focus:ring"
            >
                <span class="sr-only">Open user panel</span>
                <span aria-hidden="true">
                <svg
                    class="w-8 h-8"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                    />
                </svg>
                </span>
            </button> -->
            </div>
        </header>




     


<div class="m-5 relative overflow-x-auto shadow-md  sm:rounded-lg">
    <table class=" w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-00">
        <thead class="text-xs text-white uppercase bg-indigo-800 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    edit
                </th>
                <th scope="col" class="px-6 py-3">
                    delete
                </th>
            </tr>
        </thead>
        <tbody >
            <tr class="bg-indigo-600 border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">delete</a>
                </td>
            </tr>
            <tr class="bg-indigo-600 border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">delete</a>
                </td>
            </tr>
            <tr class="bg-indigo-600 border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">delete</a>
                </td>
            </tr>
            <tr class="bg-indigo-600 border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    Google Pixel Phone
                </th>
                <td class="px-6 py-4">
                    Gray
                </td>
                <td class="px-6 py-4">
                    Phone
                </td>
                <td class="px-6 py-4">
                    $799
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">delete</a>
                </td>
            </tr>
            <tr class="bg-indigo-600 border-blue-40">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    Apple Watch 5
                </th>
                <td class="px-6 py-4">
                    Red
                </td>
                <td class="px-6 py-4">
                    Wearables
                </td>
                <td class="px-6 py-4">
                    $999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-white hover:underline">delete</a>
                </td> 
            </tr>
        </tbody>
    </table>
</div>


        @yield('content')
        


        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.6.x/dist/component.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script>
    const setup = () => {
    const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
    }

    const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
    }

    return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
        },
        setLightTheme() {
            this.isDark = false
            setTheme(this.isDark)
        },
        setDarkTheme() {
            this.isDark = true
            setTheme(this.isDark)
        },
        watchScreen() {
            if (window.innerWidth <= 768) {
                this.isSidebarOpen = false
                this.isUserPanelOpen = false
            } else if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                this.isSidebarOpen = true
                this.isUserPanelOpen = false
            } else if (window.innerWidth >= 1280) {
                this.isSidebarOpen = true
                this.isUserPanelOpen = true
            }
        },
        isSidebarOpen: window.innerWidth >= 768 ? true : false,
        toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
        }
    }
}
</script>
</body>
</html>