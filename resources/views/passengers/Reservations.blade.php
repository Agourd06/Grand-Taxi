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
    <div id="DriversContainer" class="min-h-[50vh] w-[70%] mx-auto rounded-xl mt-8">

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
                        <p class=" font-bold  lg:text-[14px] text-[12px]">Trip date :
                            {{ $route->date }}
                        </p>
                        <p class=" font-bold  lg:text-[14px] text-[12px]">Reservation Date :
                            {{ $route->created_at }}
                        </p>
                    </div>



                </div>
                @php
                    $reservDate = strtotime($route->date);

                    $timeDifference = $reservDate - $timenow;

                    $oneDayInSeconds = 24 * 60 * 60;
                @endphp
                <div
                    class="w-full  flex md:flex-col items-center justify-between gap-2 md:gap-0 md:justify-center  md:items-end">
                    @if ($timeDifference > $oneDayInSeconds)
                        <form action="/DeleteReservation" method="post" id="myForm">
                            @csrf

                            <input type="hidden" value="{{ $route->id }}" name="reservationId">


                            <button id="youCantDelete" type="submit"
                            class="py-2 px-3 text-sm font-medium flex gap-4 text-center items-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Cancel <svg xmlns="http://www.w3.org/2000/svg" height="15" viewBox="0 -960 960 960"
                                width="15">
                                <path
                                    d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                            </svg>
                        </button>

                        </form>
                    @else
                        <button id="youCantDelete" onclick="toggleModal('CantModal')"
                            class="py-2 px-3 text-sm font-medium flex gap-4 text-center items-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Cancel <svg xmlns="http://www.w3.org/2000/svg" height="15" viewBox="0 -960 960 960"
                                width="15">
                                <path
                                    d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                            </svg>
                        </button>
                    @endif



                </div>

            </div>
        @endforeach
    </div>
    <div id="CantModal"
        class="fixed hidden top-0 right-0 left-0 bottom-0 min-h-screen md:w-full w-[90%] mx-auto md:mx-0  bg-gray-300/10 py-6 flex flex-col justify-center items-center sm:py-12">
        <div class="relative w-full md:w-1/3 p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" onclick="toggleModal('CantModal')"
                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <p class="mb-4 text-gray-500 dark:text-gray-300">Sorry, You Can't Cancel This Reservation Anymore .
            </p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deleteModal" type="button" onclick="toggleModal('CantModal')"
                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Close
                </button>

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
    </script>
</body>

</html>
