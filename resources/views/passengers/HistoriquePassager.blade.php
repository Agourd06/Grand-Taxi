<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <li class='max-lg:border-b max-lg:py-2'><a href='/PaHistory'
                        class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>History</a></li>

            </ul>
        </div>
    </header>
    <div id="addNoteModal"
        class="fixed hidden top-0 right-0 left-0 bottom-0 min-h-screen bg-gray-300/65 py-6 flex flex-col justify-center sm:py-12">
        <div class="py-3 sm:max-w-xl sm:mx-auto">
            <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                <div class="px-12 py-5">
                    <h2 class="text-gray-800 text-3xl font-semibold">Your opinion matters to us!</h2>
                </div>
                <div class="bg-gray-200 w-full flex flex-col items-center">
                    <div class="flex flex-col items-center py-6 space-y-3">
                        <span class="text-lg text-gray-800">How was quality of the call?</span>
                        <div class="flex space-x-3">
                            <form action="/noter" method="post">
                                @csrf
                                <input type="hidden" name="note" value="1">
                                <button type="submit"
                                    class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">1
                                </button>
                            </form>

                            <form action="/noter" method="post">
                                @csrf
                                <input type="hidden" name="note" value="2">
                                <button type="submit"
                                    class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">2
                                </button>
                            </form>
                            <form action="/noter" method="post">
                                @csrf
                                <input type="hidden" name="note" value="3">
                                <button type="submit"
                                    class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">3
                                </button>
                            </form>
                            <form action="/noter" method="post">
                                @csrf
                                <input type="hidden" name="note" value="4">
                                <button type="submit"
                                    class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">4
                                </button>
                            </form>
                            <form action="/noter" method="post">
                                @csrf
                                <input type="hidden" name="note" value="5">
                                <button type="submit"
                                    class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">5
                                </button>
                            </form>
                        </div>
                    </div>
                    <button
                        class=" md:w-[150px] w-[70px] text-[10px] my-8 md:text-[15px] h-[40px] bg-black rounded duration-300 hover:bg-[#EACE00]  text-white">Rate
                        now</button>

                </div>
                <div class="h-20 flex items-center justify-center">
                    <a href="" id="closeModal" class="text-gray-600">Maybe later</a>
                </div>
            </div>


        </div>
    </div>
    <div class="bg-white p-4 font-[sans-serif]">
        <div>
            <div id="wikisContainer" class="min-h-full w-full lg:w-[70%] mx-auto rounded-xl ">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-8">History</h2>


                @foreach ($routes as $route)
                    <div class="md:flex w-[95%] mb-6  lg:max-h-[25vh] min-h-fit bg-slate-100 rounded-xl p-4 md:p-5 ">
                        <div class="w-full">
                            <div class="w-full  text-center md:text-left space-y-4">


                                <div class=" w-full  ">
                                    <div class="flex  justify-center md:mb-4 w-full md:justify-start">
                                        <p class="w-full text-[14px] font-bold">Trip : {{ $route->trip }}</p>
                                    </div>




                                </div>


                            </div>


                            <div class="flex md:gap-10 gap-2 md:flex-row flex-col  w-full my-6 md:my-0 md:mt-12 ">
                                <p class=" font-bold  lg:text-[14px] text-[10px]">Reservation date :
                                    {{ $route->date }}
                                </p>
                                <p class=" font-bold  lg:text-[14px] text-[10px]">Trip Date : {{ $route->created_at }}
                                </p>
                            </div>



                        </div>
                        <div
                            class="w-full  flex md:flex-col items-center justify-between gap-2 md:gap-0  md:items-end">
                            @if ((int) $route->favori === 1)
                                <form action="/favorit" method="POST">
                                    @csrf
                                    <input type="hidden" name="favori" value="0">
                                    <input type="hidden" name="routeId" value="{{ $route->id }}">
                                    <button type="submit"> <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2"
                                            data-name="Layer 1" width="34" height="34"
                                            viewBox="0 0 122.88 107.39">
                                            <defs>

                                            </defs>
                                            <title>red-heart</title>
                                            <path class="fill-[#ed1b24] hover:fill-[#cccccc]"
                                                d="M60.83,17.18c8-8.35,13.62-15.57,26-17C110-2.46,131.27,21.26,119.57,44.61c-3.33,6.65-10.11,14.56-17.61,22.32-8.23,8.52-17.34,16.87-23.72,23.2l-17.4,17.26L46.46,93.55C29.16,76.89,1,55.92,0,29.94-.63,11.74,13.73.08,30.25.29c14.76.2,21,7.54,30.58,16.89Z" />
                                        </svg> </button>
                                </form>
                            @else
                                <form action="/favorit" method="POST">
                                    @csrf

                                    <input type="hidden" name="favori" value="1">
                                    <input type="hidden" name="routeId" value="{{ $route->id }}">

                                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                            data-name="Layer 1" width="34" height="34"
                                            viewBox="0 0 122.88 107.39">
                                            <defs>

                                            </defs>
                                            <title>red-heart</title>
                                            <path class=" cursor-pointer hover:fill-[#ed1b24] fill-[#cccccc]"
                                                d="M60.83,17.18c8-8.35,13.62-15.57,26-17C110-2.46,131.27,21.26,119.57,44.61c-3.33,6.65-10.11,14.56-17.61,22.32-8.23,8.52-17.34,16.87-23.72,23.2l-17.4,17.26L46.46,93.55C29.16,76.89,1,55.92,0,29.94-.63,11.74,13.73.08,30.25.29c14.76.2,21,7.54,30.58,16.89Z" />
                                        </svg></button>
                                </form>
                            @endif

                            {{-- <form action="/reserveration" method="post">
                             
                                <input type="hidden" value="" name="driverId">
                                <input type="hidden" name="routeId" value=""> --}}

                            <div class="flex space-x-3">
                                <form action="/noter" method="post">
                                    @csrf
                                    <input type="hidden" name="note" value="1">
                                    <button type="submit"
                                        class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">1
                                    </button>
                                </form>

                                <form action="/noter" method="post">
                                    @csrf
                                    <input type="hidden" name="note" value="2">
                                    <button type="submit"
                                        class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">2
                                    </button>
                                </form>
                                <form action="/noter" method="post">
                                    @csrf
                                    <input type="hidden" name="note" value="3">
                                    <button type="submit"
                                        class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">3
                                    </button>
                                </form>
                                <form action="/noter" method="post">
                                    @csrf
                                    <input type="hidden" name="note" value="4">
                                    <button type="submit"
                                        class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">4
                                    </button>
                                </form>
                                <form action="/noter" method="post">
                                    @csrf
                                    <input type="hidden" name="note" value="5">
                                    <button type="submit"
                                        class="w-[50px] text-[20px] text-bold hover:bg-[#EACE00] h-[50px] rounded-md bg-[#EACE00]/50 flex text-white justify-center items-center ">5
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                    @endforeach
                </div>
        </div>
    </div>
    </div>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }


        document.getElementById('Profil').addEventListener('click', () => toggleModal('ProfilPop'));

        document.getElementById('closeModal').addEventListener('click', () => toggleModal('addNoteModal'));
    </script>
</body>

</html>
