<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <title>Document</title>
</head>

<body>
    @include('layout/passagerNav')
    @include('layout/passagerBurgerMenu')



    <div class="relative w-full">
        <video class="w-full h-[40vh] md:h-[40vh] lg:h-[50vh] xl:h-[80vh] object-cover" autoplay loop muted>
            <source src="{{ asset('storage/image/' . 'taxiviedo.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center">
            <h2 class="text-xl md:text-4xl lg:text-6xl font-bold">Welcome to Our Premium Service
            </h2>
            <p class="mt-2 text-center text-sm md:text-lg lg:text-2xl">Discover the ease of transportation as you
                navigate the city
                with Taxista – where convenience meets exceptional service.</p>
        </div>
    </div>


    <section class="flex min-h-screen mt-8 flex-col  md:flex-row">
        <!-------------------------------------------------------------Filter------------------------------------------------- -->
        <div class="md:w-[19%]  md:ml-auto md:mt-12 mb-8 md:mb-0 flex flex-col items-center">
            {{-- filter by Traji --}}

            <form id="filterForm" action="/filter" method="POST" class="mb-8 flex items-center flex-col">
                @csrf

                <label for="filterSelect" class="text-md font-bold mb-2">Trips :</label>
                <div class="flex gap-8 mb-6">
                    <select id="filterSelect" name="filtertrip"
                        class="border-0 cursor-pointer rounded-md outline-none  drop-shadow-lg bg-white  hover:text-white w-60 md:w-40 duration-300 hover:bg-black ">

                        <option value="{{ null }}">none</option>

                        @foreach ($trips as $filtarg)
                            <option value="{{ $filtarg->trip }}">{{ $filtarg->trip }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <label for="filterSelect" class="text-md font-bold mb-2"> Drivers Rating :</label>

                <div class="flex gap-8 mb-6">
                    <select id="filterSelect" name="filterNote"
                        class="border-0 cursor-pointer rounded-md outline-none  drop-shadow-lg bg-white  hover:text-white w-60 md:w-40 duration-300 hover:bg-black ">
                        <option value="{{ null }}">none</option>

                        <option class="cursor-pointer" value="5">5 Stars</option>
                        <option class="cursor-pointer" value="4">4 Stars</option>
                        <option class="cursor-pointer" value="3">3 Stars</option>
                        <option class="cursor-pointer" value="2">2 Stars</option>
                        <option class="cursor-pointer" value="1">1 Stars</option>

                    </select>


                </div>
                <label for="filterSelect" class="text-md font-bold mb-2">Vehicle types :</label>
                <div class="flex gap-8 mb-6">

                    <select id="filterSelect" name="filterCars"
                        class="border-0 cursor-pointer rounded-md px-4 outline-none drop-shadow-lg bg-white   hover:text-white w-60 md:w-40 duration-300 hover:bg-black ">
                        <option value="{{ null }}">none</option>
                        @foreach ($carTypes as $filtarg)
                            <option value="{{ $filtarg->VoitureType }}">{{ $filtarg->VoitureType }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/2 mr-4">
                    <button type="submit"
                        class="text-gray-900 duration-500 hover:text-white border border-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-8 py-2  text-center me-2 mb-2 ">Filter</button>

                </div>

            </form>

            <h1 class="mb-2 font-bold">Top Rating Drivers</h1>
            <div class="bg-white w-[95%] mx-auto md:w-full  font-[sans-serif] mb-4">

                <div>
                    <div class="grid grid-cols-3 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-4">
                        @foreach ($topRates as $chauffeur)
                            <div
                                class="bg-white rounded-lg  transition-all duration-300">
                                <img src="{{ asset('storage/image/' . $chauffeur->user->profile_image) }}"
                                    alt="Blog Post 1" class="w-full h-32 object-cover" />
                                <div class="p-6">
                                    <div class="flex justify-between">
                                        <h3 class="lg:text-xl w-full md:text-md text-[12px] font-bold text-gray-800 mb-2">
                                        {{ $chauffeur->user->name }}</h3>
                                        <div class="flex items-center md:gap-2">

                                            
                                            <svg class="md:w-4 md:h-4 w-3 h-3 text-yellow-300 me-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        <p class="md:text-md text-[12px]">{{ $chauffeur->Average }}</p>
                                        </div>

                                    </div>
                                    
                                    <p class="text-gray-600 text-[12px] md:text-sm">{{ $chauffeur->trip }}</p>

                                </div>
                                <form action="/reserveration" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $chauffeur->id }}" name="driverId">
                                    <button type="submit" name="wikiId"
                                        class=" w-full text-[10px] md:text-[15px] py-2 md:mr-4 lg:mr-0 bg-black rounded-b-md duration-300 hover:bg-[#EACE00]  text-white"
                                        value="">Reserve Road</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



        </div>

        <!--------------------------------------------------------------Drivers------------------------------------------------- -->


        <div id="DriversContainer" class="min-h-full w-[70%] mx-auto rounded-xl ">
            <div class="w-full text-[30px] text-center text-bold mb-4"> <span
                    class="underline underline-offset-3 font-semibold decoration-8 decoration-[#EACE00] dark:decoration-blue-600">Our
                    Drivers</span>
            </div>
            @if ($chauffeurs && count($chauffeurs) > 0)

                @foreach ($chauffeurs as $chauffeur)
                    <div
                        class="md:flex w-[95%]  md:flex-col lg:flex-row  lg:max-h-[35vh] min-h-fit bg-slate-100 rounded-xl p-4 md:p-0  hover:scale-105 mb-8 md:mb-6">
                        <img class="lg:max-w-[20%] w-[50%]  lg:min-h-[25vh] max-h-[5%]  md:max-h-auto md:rounded-xl rounded-xl mx-auto lg:mx-0"
                            src="{{ asset('storage/image/' . $chauffeur->user->profile_image) }}" alt=""
                            width="384" height="512">
                        <div class="p-6 lg:w-[37%] w-full md:p-8  text-center md:text-left space-y-4">
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

                                @if ((int) $chauffeur->Average > 0)
                                    <div class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>

                                        <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">
                                            {{ $chauffeur->Average }}</p>

                                    </div>
                                @else
                                    <div class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>

                                        <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">No Rate</p>

                                    </div>
                                @endif

                            </div>


                        </div>
                        <div
                            class="lg:w-[39%] w-full   flex lg:flex-col justify-between gap-2  items-center md:items-end md:gap-4 lg:gap-0 my-4 lg:items-right">
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
            @else
                <div class=" flex justify-center h-32 items-center">
                    <p class=" text-[16px] md:text-[20px] "> No matching drivers found.
                    </p>
                </div>
            @endif



        </div>
    </section>
    @include('layout/footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {



            var scrollToId = '{{ $scrollToId }}';
            var element = document.getElementById(scrollToId);

            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',

                });
            }
        });


        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }


        function burgermenu() {
            const sideBar = document.getElementById('burgerbar')
            sideBar.classList.toggle('hidden');
        }
    </script>

</body>

</html>
