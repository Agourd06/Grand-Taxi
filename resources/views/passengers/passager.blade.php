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

                        @foreach ($trips as $filtarg)
                            <option value="{{ $filtarg->trip }}">{{ $filtarg->trip }}
                            </option>
                        @endforeach
                    </select>

                </div>


                <div class="flex gap-8 mb-6">
                    <select id="filterSelect" name="filterNote"
                        class="border-0 cursor-pointer rounded-full outline-none  drop-shadow-md bg-black text-white hover:text-black w-60 md:w-40 duration-300 hover:bg-yellow-100 ">

                        <option value="{{ null }}">none</option>

                        @foreach ($trips as $filtarg)
                            <option value="{{ $filtarg->note }}">{{ $filtarg->note }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <label for="filterSelect">Vehicle types :</label>
                <div class="flex gap-8 mb-6">

                    <select id="filterSelect" name="filterCars"
                        class="border-0 cursor-pointer rounded-full px-4 outline-none drop-shadow-md bg-black  text-white hover:text-black w-60 md:w-40 duration-300 hover:bg-yellow-100 ">
                        <option value="{{ null }}">none</option>
                        @foreach ($carTypes as $filtarg)
                            <option value="{{ $filtarg->VoitureType }}">{{ $filtarg->VoitureType }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Filter</button>
                </div>

            </form>


        </div>

        <!--------------------------------------------------------------Drivers------------------------------------------------- -->


        <div id="DriversContainer" class="min-h-full w-[70%] mx-auto rounded-xl ">
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



        </div>
    </section>
    @include('layout/footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function toggleModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
            }


            document.getElementById('Profil').addEventListener('click', () => toggleModal('ProfilPop'));

            var scrollToId = '{{ $scrollToId }}';
            var element = document.getElementById(scrollToId);

            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                    inline: 'nearest'
                });
            }
        });
    </script>

</body>

</html>
