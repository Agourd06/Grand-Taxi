<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <title>Document</title>
</head>

<body class="min-h-screen">

    @include('layout/passagerNav')
    @include('layout/passagerBurgerMenu')

    <div class="bg-white p-4 font-[sans-serif]">
        <div>
            <div id="" class="min-h-full w-full lg:w-[70%] mx-auto rounded-xl ">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-8">History</h2>
                @if ($routes && count($routes) > 0)

                    @foreach ($routes as $route)
                        <div class="md:flex w-[95%] mb-6  lg:max-h-[25vh] min-h-fit bg-slate-100 rounded-xl  ">
                            <div class="w-full p-4 md:p-5">
                                <div class="  text-center md:text-left space-y-4">


                                    <div class=" w-full  ">
                                        <div class="flex  justify-center md:mb-4 w-full md:justify-start">
                                            <p class="w-full text-[14px] font-bold">Trip : {{ $route->trip }}</p>
                                        </div>




                                    </div>


                                </div>


                                <div class="flex md:gap-10 gap-2 md:flex-row flex-col   my-6 md:my-0 md:mt-12 ">
                                    <p class=" font-bold  lg:text-[13px] text-[12px]">Trip date :
                                        {{ str_replace('T', ' ', $route->date) }}
                                    </p>
                                    <p class=" font-bold  lg:text-[13px] text-[12px]">Reservation Date :
                                        {{ $route->created_at }}
                                    </p>
                                </div>



                            </div>
                            <div
                                class="w-full p-4 md:p-5 flex md:flex-col items-center justify-between gap-2 md:gap-0  md:items-end">
                                @if ((int) $route->favori === 1)
                                    <form action="/favorit" method="POST">
                                        @csrf
                                        <input type="hidden" name="favori" value="0">
                                        <input type="hidden" name="tripname" value="{{ $route->trip }}">
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
                                        <input type="hidden" name="tripname" value="{{ $route->trip }}">

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
                                <div class="flex space-x-3 items-center">
                                    <p class="font-bold  lg:text-[13px] text-[12px]"> Rate This Trip  :</p>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <form action="/noter" method="post">
                                            @csrf
                                            <input type="hidden" name="note" value="{{ $i }}" id="note{{ $i }}">
                                            <input type="hidden" value="{{ $route->id }}" name="routeId" id="routeId{{ $i }}">
                                
                                            @php
                                                $isActive = $route->Note == $i;
                                            @endphp
                                            
                                            <button type="submit"
                                                class="w-[25px] md:text-[17px] text-bold  {{ $isActive ? 'hover:bg-[#EACE00] bg-yellow-400 text-white rounded-md' : 'hover:bg-yellow-400 text-white bg-yellow-200 text-[12px] rounded-md' }} flex justify-center items-center">
                                                {{ $i }}
                                            </button>
                                        </form>
                                    @endfor
                                </div>
                    

                            </div>
                            <form action="/DeletHistorique" method="POST"
                                class="bg-red-600 w-12 rounded-r-xl flex items-center justify-center hover:bg-red-400 cursor-pointer">
                                @csrf
                                <input type="hidden" value="{{ $route->id }}" name="RouteId">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                        width="24">
                                        <path class="fill-slate-50"
                                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                @else
                    <div class=" flex justify-center">
                        <p class=" text-[14px] md:text-[20px]"> Your History is empty
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    @include('layout/footer')

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }


        document.getElementById('Profil').addEventListener('click', () => toggleModal('ProfilPop'));

        document.getElementById('closeModal').addEventListener('click', () => toggleModal('addNoteModal'));


        function burgermenu() {
            const sideBar = document.getElementById('burgerbar')
            sideBar.classList.toggle('hidden');
        }
    </script>
</body>

</html>
