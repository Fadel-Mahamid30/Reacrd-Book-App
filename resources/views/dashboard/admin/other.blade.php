@extends('dashboard.admin.template.dashboard_template')
@section('content')

<section class="max-w-full w-full h-full flex flex-grow items-start gap-4">
    <a href="{{ route('dashboard-divisi') }}" class="w-80 border-r-4 border-l-4 border-primary h-auto p-6 bg-white rounded-md flex flex-col items-center justify-center">
        <div class="w-full flex flex-col justify-center items-center">
            <div class="w-fit mb-[18px]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-[90px] h-[90px] fill-primary">
                    <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />
                    <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                </svg>  
            </div>
            <p class="text-2xl text-primary font-semibold w-fit">Divisi</p>
        </div>
    </a>

    <a href="{{ route('dashboard-shift') }}" class="w-80 border-r-4 border-l-4 border-primary h-auto p-6 bg-white rounded-md flex flex-col items-center justify-center">
        <div class="w-full flex flex-col justify-center items-center">
            <div class="w-fit mb-[18px]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[90px] h-[90px] fill-primary">
                    <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z" clip-rule="evenodd" />
                </svg>                   
            </div>
            <p class="text-2xl text-primary font-semibold w-fit">Shift</p>
        </div>
    </a>
</section>

<script src="{{ asset('/js/admin/dashboard.js') }}"></script>
@endsection