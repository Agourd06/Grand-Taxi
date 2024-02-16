<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    @include('layout/passagerNav')
    @include('layout/passagerBurgerMenu')

    <div id="DriversContainer" class="min-h-[50vh] w-[70%] mx-auto rounded-xl mt-8">
        @if ($reservations && count($reservations) > 0)

            @foreach ($reservations as $route)
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
                            <p class=" font-bold  lg:text-[13px] text-[12px]">Trip date :
                                {{ str_replace('T', ' ', $route->date) }}
                            </p>
                            <p class=" font-bold  lg:text-[13px] text-[12px]">Reservation Date :
                                {{ $route->created_at }}
                            </p>
                        </div>



                    </div>
                    @php
                        $reservDate = strtotime($route->date);

                        $timeDifference = $reservDate - $timenow;
                        $timeLeft = $timeDifference / 3600;
                        $oneDayInSeconds = 10 * 60 * 60;
                    @endphp
                    <div
                        class="w-full  flex md:flex-col items-center justify-between gap-2 md:gap-0 md:justify-center  md:items-end">
                        @if ($timeDifference > $oneDayInSeconds)
                            <form action="/DeleteReservation" method="post" id="myForm">
                                @csrf

                                <input type="hidden" value="{{ $route->id }}" name="reservationId">


                                <button id="youCantDelete" type="submit"
                                    class="py-2 px-3 text-sm font-medium flex gap-4 text-center items-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    Cancel <svg xmlns="http://www.w3.org/2000/svg" height="15"
                                        viewBox="0 -960 960 960" width="15">
                                        <path
                                            d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg>
                                </button>

                            </form>
                        @elseif($timenow > $reservDate)
                            <form action="/DeleteDoneReservation" method="post" id="myForm">
                                @csrf

                                <input type="hidden" value="{{ $route->id }}" name="reservationId">
                                <div class="flex gap-4 items-center font-semibold">
                                    <p>You can Rate Your Trip Now :</p>
                                    <button id="youCantDelete" type="submit"
                                        class="py-2 px-3 text-sm font-medium flex gap-4 text-center items-center text-white bg-black rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Done <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white"
                                            viewBox="0 -960 960 960" width="24">
                                            <path
                                                d="m560-240-56-58 142-142H160v-80h486L504-662l56-58 240 240-240 240Z" />
                                        </svg>
                                    </button>
                                </div>

                            </form>
                        @else
                            <p class="font-bold">Less than {{ round($timeLeft) }} hours until your Trip begins. </p>
                        @endif



                    </div>

                </div>
            @endforeach
        @else
            <div class=" flex justify-center">
                <p class=" text-[14px] md:text-[20px]"> No reservation Found
                </p>
            </div>
        @endif
    </div>
 
    @include('layout/footer')
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
        document.getElementById('Profil').addEventListener('click', () => toggleModal('ProfilPop'));

        function burgermenu() {
            const sideBar = document.getElementById('burgerbar')
            sideBar.classList.toggle('hidden');
        }
    </script>
</body>

</html>
