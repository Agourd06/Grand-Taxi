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

    @include('layout/DriverNav')
    @include('layout/AddTripDriver')
    @include('layout/DriverBurgerMenu')


    <div class="bg-white p-4 font-[sans-serif] lg:mb-[70px]  mb-48">
        <div>
            <div id="wikisContainer" class="min-h-full w-full lg:w-[70%] mx-auto rounded-xl ">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-8">History</h2>
                @if ($routes && count($routes) > 0)

                    @foreach ($routes as $route)
                        <div
                            class="md:flex w-[95%] mb-6  lg:max-h-[25vh] min-h-fit bg-slate-100 rounded-xl ">
                            <div class="w-full p-4 md:p-5 ">
                                <div class="w-full  text-center md:text-left space-y-4">


                                    <div class=" w-full  ">
                                        <div class="flex  justify-center md:mb-4 w-full md:justify-start">
                                            <p class="w-full text-[14px] font-bold">Trip : {{ $route->trip }}</p>
                                        </div>




                                    </div>


                                </div>


                                <div class="flex md:gap-10 gap-2 md:flex-row flex-col  w-full my-6 md:my-0 md:mt-12 ">
                                    <p class=" font-bold  lg:text-[14px] text-[12px]">Reservation date :
                                        {{ $route->date }}
                                    </p>
                                    <p class=" font-bold  lg:text-[14px] text-[12px]">Trip Date :
                                        {{ $route->created_at }}
                                    </p>
                                </div>



                            </div>

                            <form action="/DeletHistoriqueDriver" method="POST"
                            class="bg-red-600 w-10 rounded-r-xl flex items-center justify-center hover:bg-red-400 cursor-pointer">
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
                    <p class="w-full text-[15px]"> Your History is empty
                    </p>
                @endif
            </div>
        </div>
    </div>
    @include('layout/DriverFooter')

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
