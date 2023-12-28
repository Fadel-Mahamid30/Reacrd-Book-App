<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>{{ $title }}</title>

    {{-- jquery --}}
    <script src="/js/jquery.js"></script>
    <script src="/js/sweetalert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- leaflet  --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>


</head>
<body class="font-poppins bg-gray-100 min-h-screen">
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white">
        <a href="https://flowbite.com/" class="flex items-center pl-2.5 ml-1 mb-6 sm:mb-10 mt-1">
            <img src="/img/logo_radian.png" class="h-6 mr-3 sm:h-7" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Radian Edu</span>
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard-admin') }}" class="hover:bg-blue-50 flex items-center p-3 group hover:text-primary @if( $sidebar == 'dashboard') bg-blue-50 text-primary @else text-gray-500 @endif rounded-lg">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap font-medium">Dashboard</span>
                </a>
            </li>
            @role("admin")
                <div id="button-dropdown-sidebar" class="cursor-pointer hover:bg-blue-50 flex justify-between items-center p-3 group hover:text-primary @if($sidebar == 'users' || $sidebar == 'user_access' || $sidebar == 'user_registration') bg-blue-50 text-primary @else text-gray-500 @endif rounded-lg">
                    <div href="#" class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-primary">
                            <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                        </svg>                      
                        <span class="flex-1 ml-3 whitespace-nowrap font-medium">Users</span>
                    </div>

                    <div class="w-fit h-fit">
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            @endrole
            <li  id="dropdown-sidebar" class="bg-gray-100 rounded-lg overflow-hidden @if($sidebar !== 'users' && $sidebar !== 'user_access' && $sidebar !== 'user_registration') hidden @endif">
                <a href="{{ route('dashboard-users-admin') }}" class="hover:bg-gray-200 flex items-center p-3 group hover:text-gray-700 @if( $sidebar == 'users') bg-gray-200 text-gray-700 @else text-gray-500 @endif rounded-lg">
                    <span class="flex-1 ml-3 whitespace-nowrap font-medium text-sm">Users</span>
                </a>
                <a href="{{ route('dashboard-user-access') }}" class="hover:bg-gray-200 flex items-center p-3 group hover:text-gray-700 @if( $sidebar == 'user_access') bg-gray-200 text-gray-700 @else text-gray-500 @endif rounded-lg">
                    <span class="flex-1 ml-3 whitespace-nowrap font-medium text-sm">User Access</span>
                </a>
                <a href="{{ route('dashboard-user-registration') }}" class="hover:bg-gray-200 flex items-center p-3 group hover:text-gray-700 @if( $sidebar == 'user_registration') bg-gray-200 text-gray-700 @else text-gray-500 @endif rounded-lg">
                    <span class="flex-1 ml-3 whitespace-nowrap font-medium text-sm">User Registration</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard-admin-absensi') }}" class="hover:bg-blue-50 flex items-center p-3 group hover:text-primary @if( $sidebar == 'absensi') bg-blue-50 text-primary @else text-gray-500 @endif rounded-lg">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-primary"><path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" /></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap font-medium">Absensi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard-admin-logbook') }}" class="hover:bg-blue-50 flex items-center p-3 group hover:text-primary @if( $sidebar == 'logbook') bg-blue-50 text-primary @else text-gray-500 @endif rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-primary" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap font-medium">Logbook</span>
                </a>
            </li>
            @role("admin")
                <li>
                    <a href="{{ route('dashboard-admin-other') }}" class="hover:bg-blue-50 flex items-center p-3 group hover:text-primary @if( $sidebar == 'other') bg-blue-50 text-primary @else text-gray-500 @endif rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-primary" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M2.25 4.5A.75.75 0 013 3.75h14.25a.75.75 0 010 1.5H3a.75.75 0 01-.75-.75zm0 4.5A.75.75 0 013 8.25h9.75a.75.75 0 010 1.5H3A.75.75 0 012.25 9zm15-.75A.75.75 0 0118 9v10.19l2.47-2.47a.75.75 0 111.06 1.06l-3.75 3.75a.75.75 0 01-1.06 0l-3.75-3.75a.75.75 0 111.06-1.06l2.47 2.47V9a.75.75 0 01.75-.75zm-15 5.25a.75.75 0 01.75-.75h9.75a.75.75 0 010 1.5H3a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>  
                        <span class="flex-1 ml-3 whitespace-nowrap font-medium">Other</span>
                    </a>
                </li>
            @endrole
            <li>
                <a href="{{ route('logout') }}" class="hover:bg-blue-50 flex items-center p-3 group hover:text-primary @if( $sidebar == 'logout') bg-blue-50 text-primary @else text-gray-500 @endif rounded-lg">
                    <svg aria-hidden="true" class="w-6 h-6 group-hover:text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                    <span class="ml-3 whitespace-nowrap font-medium">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<div class="sm:ml-64 ">
    <div class=" py-4 px-4 sm:px-6 bg-white w-full flex justify-between items-center">

        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <form action="" method="GET" class="sm:flex items-center w-[300px] hidden">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600" value="{{ $search ?? "" }}" placeholder="Search">
            </div>
        </form>

        <div class="w-fit flex flex-row items-center">
            <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-gray-900 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button"><svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

            <!-- Dropdown menu -->
            <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDividerButton">
                    <li>
                        <a href="{{ route('profil') }}" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                    </li>
                </ul>
                <div class="py-2">
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log Out</a>
                </div>
            </div>
            <p class="text-sm 8x90:block hidden text-gray-900 font-semibold mr-4">{{ $user->nama ?? "Admin" }}</p>
            <img src="{{ asset($user->foto ? 'storage/' . $user->foto : '/img/user.png') }}" alt="" class="rounded-full w-11 h-11">
        </div>

    </div>
    <div class="h-full w-full sm:w-full px-4 sm:px-6 mt-6 ">
        @yield('content')
    </div>
</div>
 

</body>
</html>