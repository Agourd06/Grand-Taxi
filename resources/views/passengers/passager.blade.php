<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <title>Document</title>
</head>

<body>
    <header class='shadow-md bg-white font-sans'>
        <section
            class='flex items-center lg:justify-center   px-10 border-gray-200 border-b lg:min-h-[80px] max-lg:min-h-[60px]'>
            <a href="javascript:void(0)" class="max-md:w-full  "><img src="{{ asset('storage/image/' . 'taxista.png') }}"
                    alt="logo" class='md:w-[150px]  w-36' />
            </a>
            <div class="md:absolute md:right-10 md:flex md:items-center max-md:ml-auto">




                <div class=" inline-block w- border-gray-300 border-l-2 pl-6 cursor-pointer " id="Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                        class="hover:fill-[#EACE00]">
                        <circle cx="10" cy="7" r="6" data-original="#000000" />
                        <path
                            d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                            data-original="#000000" />
                    </svg>
                    <div class="absolute z-50 w-[120px] hidden h-[85px] top-full rounded-md right-2 drop-shadow-2xl"
                        id="ProfilPop">
                        <a href='/profilPassager'
                            class='hover:bg-[#EACE00] rounded-t-md duration-300 hover:text-white w-full h-[50%] bg-white text-gray-600 font-bold text-[15px] flex items-center justify-center'>Profile</a>
                        <a href='/logout'
                            class='hover:bg-[#EACE00] rounded-b-md duration-300 hover:text-white w-full h-[50%] bg-gray-300 text-gray-600 font-bold text-[15px] flex items-center justify-center'>log
                            out</a>
                    </div>
                </div>


            </div>
        </section>
        <div class='flex flex-wrap py-3.5 px-10 overflow-x-auto'>
            <div class='flex ml-auto lg:order-1 lg:hidden'>
                <button id="toggle" class='ml-7'>
                    <svg class="w-7 h-7" fill="#EACE00" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <ul id="collapseMenu"
                class='lg:!flex justify-center lg:space-x-10 max-lg:space-y-3 max-lg:hidden w-full max-lg:mt-2'>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>Today Trip</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>History</a></li>

            </ul>
        </div>
    </header>


    <div class="relative w-full">
        <video class="w-full h-[40vh] md:h-[40vh] lg:h-[50vh] xl:h-[80vh] object-cover" autoplay loop muted>
            <source src="{{ asset('storage/image/' . 'taxiviedo.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center">
            <h2 class="text-xl md:text-4xl lg:text-6xl font-bold">Welcome to Our Premium Service
            </h2>
            <p class="mt-2 text-md md:text-lg lg:text-2xl">Discover the ease of transportation as you navigate the city
                with Taxista – where convenience meets exceptional service.</p>
        </div>
    </div>


    <section class="flex min-h-screen mt-8 flex-col  md:flex-row">
        <!-------------------------------------------------------------Filter------------------------------------------------- -->
        <div class="md:w-[19%] md:ml-auto md:mt-12 mb-8 md:mb-0 flex flex-col items-center">
            {{-- filter by Traji --}}

            <form id="filterForm" action="/filter" method="POST" class="mb-8">
                @csrf

                <label for="filterSelect">Trips :</label>
                <div class="flex gap-8 mb-6">
                    <select id="filterSelect" name="filtertrip"
                        class="border-0 cursor-pointer rounded-full outline-none  drop-shadow-md bg-black text-white hover:text-black w-60 md:w-40 duration-300 hover:bg-yellow-100 ">

                        <option value="{{ null }}">none</option>
                        @foreach ($filtarge as $filtarg)
                            <option value="{{ $filtarg->trip }}">{{ $filtarg->trip }}
                            </option>
                        @endforeach
                    </select>

                    {{-- <button type="submit">Filter</button> --}}
                </div>

                {{-- </form> --}}
                {{-- filter by CarType --}}

                {{-- <form id="filterForm" action="/filter" method="POST" class="mb-12"> --}}
                @csrf

                <label for="filterSelect">Vehicle types :</label>
                <div class="flex gap-8 mb-6">

                    <select id="filterSelect" name="filterCars"
                        class="border-0 cursor-pointer rounded-full px-4 outline-none drop-shadow-md bg-black  text-white hover:text-black w-60 md:w-40 duration-300 hover:bg-yellow-100 ">
                        <option value="{{ null }}">none</option>
                        @foreach ($filtarge as $filtarg)
                            <option value="{{ $filtarg->VoitureType }}">{{ $filtarg->VoitureType }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Filter</button>
                </div>

            </form>


        </div>

        <!--------------------------------------------------------------Drivers------------------------------------------------- -->


        <div id="wikisContainer" class="min-h-full w-[70%] mx-auto rounded-xl ">
            <div class="w-full text-[30px] text-center text-bold mb-4"> <span
                    class="underline underline-offset-3 decoration-8 decoration-[#EACE00] dark:decoration-blue-600">Our
                    Drivers</span>
            </div>

            @foreach ($chauffeurs as $chauffeur)
                <div
                    class="md:flex w-[95%] cursor-pointer md:flex-col lg:flex-row  lg:max-h-[35vh] min-h-fit bg-slate-100 rounded-xl p-4 md:p-0  hover:scale-105 mb-8 md:mb-6">
                    <img class="lg:max-w-[20%] w-[50%]  lg:min-h-[25vh] max-h-[5%]  md:max-h-auto md:rounded-xl rounded-xl mx-auto lg:mx-0"
                        src="{{ asset('storage/image/' . $chauffeur->user->profile_image) }}" alt=""
                        width="384" height="512">
                    <div class="pt-6 lg:w-[37%] w-full md:p-8 text-center md:text-left space-y-4">
                        <div class="text-[#EACE00] text-2xl font-bold">
                            <h1>{{ $chauffeur->user->name }}</h1>
                        </div>

                        <div class=" w-full  ">
                            <div class="flex gap-2 justify-center mb-4 md:justify-start">
                                <p class=" font-bold">Car Type : </p>
                                <p> {{ $chauffeur->VoitureType }}</p>
                            </div>

                            <div class="flex gap-2 justify-center md:h-[6vh] items-center mb-4 md:justify-start">
                                <p class=" font-bold">Avaibility : </p>
                                <p> {{ $chauffeur->Desponability }}</p>


                                {{-- --------------------------- Condition For Dispo icon ------------------------- --}}


                                @if ($chauffeur->Desponability === 'Available')
                                    <img srcset="https://img.icons8.com/?size=48&amp;id=FkQHNSmqWQWH&amp;format=png 1x, https://img.icons8.com/?size=96&amp;id=FkQHNSmqWQWH&amp;format=png 2x,"
                                        src="https://img.icons8.com/?size=96&amp;id=FkQHNSmqWQWH&amp;format=png"
                                        alt="emoji-cercle-vert" loading="lazy" width="20" height="20"
                                        style="width: 15px; height: 15px; " lazy="loaded">
                                @endif

                                {{-- --------------------------- Condition For Dispo icon ------------------------- --}}

                            </div>
                            <div class="flex gap-2 justify-center  mb-4 md:justify-start">
                                <p class=" font-bold">Payment by : </p>
                                <p> {{ $chauffeur->TypeDePayment }}</p>
                            </div>

                        </div>


                    </div>
                    <div
                        class="lg:w-[39%] w-full   flex lg:flex-col justify-between gap-2 md:gap-0 items-center md:items-end md:gap-4 lg:gap-0 my-4 lg:items-right">
                        <p class="md:ml-4 lg:ml-0 font-bold text-[10px] md:text-[17px]">Today Trip :
                            {{ $chauffeur->trip }}
                        </p>
                        <form action="/reserveration" method="post">
                            @csrf
                            <input type="hidden" value="{{ $chauffeur->id }}" name="driverId">
                            <button type="submit" name="wikiId"
                                class=" md:w-[150px] w-[70px] text-[10px] md:text-[15px] h-[40px] md:mr-4 lg:mr-0 bg-black rounded duration-300 hover:bg-[#EACE00]  text-white"
                                value="">Reserve Road</button>
                        </form>
                    </div>

                </div>
            @endforeach



        </div>
    </section>
    <footer class="bg-gray-100 font-[sans-serif] mt-8">
        <div class="py-8 px-4 sm:px-12">
            <div class="flex flex-wrap items-center justify-between">
                <div class="w-full md:w-auto  mb-6 md:mb-0">
                    <a href="../" class=" w-full flex justify-center md:justify-start"><img
                            class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] "
                             src="{{ asset('storage/image/' . 'taxista.png') }}" alt="Taxista Logo" /></a>
                </div>
                <div class="w-full md:w-auto text-center">
                    <ul class="flex items-center justify-center flex-wrap gap-y-2 md:justify-end space-x-6">
                        <li><a href="/passager" class="text-gray-700 hover:text-gray-900 text-base">Home</a></li>
                        <li><a href="/profilPassager"
                                class="text-gray-700 hover:text-gray-900 text-base">profil</a></li>


                        <li><a href="/logout"
                                class="text-gray-700 hover:text-gray-900 text-base">Log out</a></li>


                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-300" />
            <p class="text-center text-gray-700 text-base">
                Copyright © {{ date('Y') }} <a href="/passager" class="hover:underline mx-1">Taxista</a>
                All Rights Reserved.
            </p>

        </div>
    </footer>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }


        document.getElementById('Profil').addEventListener('click', () => toggleModal('ProfilPop'));
    </script>

</body>

</html>
