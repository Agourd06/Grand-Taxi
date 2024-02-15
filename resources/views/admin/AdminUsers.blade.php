<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="bg-gray-100">
    <div class="flex flex-col min-h-screen bg-gray-100 ">



        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">


            <div class="flex items-center">
                <div class="flex items-center gap-2 ml-4">
                    <a href="/admin" class="w-24 h-18 mr-2 "><img src="{{ asset('storage/image/' . 'taxista.png') }}"
                        alt="logo"  />
                </a>  
                    <p
                        class="text-transparent bg-clip-text  text-[20px] font-bold bg-gradient-to-r from-[#EACE00] to-[#3a3300]">
                        Administration</p>

                </div>
            </div>
            <!-- --------------------------------burger icon ----------------------------- -->
            <div class="space-x-5">
                <button type="button" id="burger" onclick="burgermenu()"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <!-- --------------------------------burger icon ----------------------------- -->

        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div id="burgerbar"
            class=" hidden absolute top-0 right-0 w-72 md:w-1/2 bg-slate-200 opacity-75 flex flex-col font-bold text-xl gap-6 min-h-screen pl-2">
            <a class="hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300]" id="close"
                onclick="burgermenu()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="36"
                    viewBox="0 -960 960 960" width="36">
                    <path
                        d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg></a>
            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
                href="/admin">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>


            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
                href="/AdminUsers">
                <i class="fas fa-file-alt mr-2"></i>Users
            </a>



            <a class="block text-black font-bold py-2.5 px-4 my-2 rounded duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white "
                href="/logout">
                <i class=" mr-2"></i>Log Out
            </a>

        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div class="flex-1 flex flex-wrap">
            <!-- --------------------------------SideBar ----------------------------- -->

            <div class="p-2 bg-white w-full md:w-60 flex flex-col lg:flex hidden" id="sideNav">
                <nav><a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
                        href="/admin">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>


                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
                        href="/AdminUsers">
                        <i class="fas fa-file-alt mr-2"></i>Users
                    </a>



                    <a class="block text-black font-bold py-2.5 px-4 my-2 rounded duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white "
                        href="/logout">
                        <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                    </a>
                </nav>



            </div>
            <!-- --------------------------------SideBar ----------------------------- -->

            <div class="flex-1 p-4 w-full md:w-1/2">


                <div class="mt-4 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

                    <h2 class="text-gray-500 text-lg font-semibold pb-4">Drivers</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white font-[sans-serif]">
                            <thead class="bg-gradient-to-r from-[#EACE00] to-[#3a3300] whitespace-nowrap">
                                <tr>

                                    <th
                                        class="px-6 py-3 text-left max-w-4  md:text-[15px] text-[12px] font-semibold text-white">
                                        Profile
                                    </th>
                                    <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        FullName
                                    </th>
                                    <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        Trip
                                    </th>
                                    <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        Registration
                                    </th>
                                    <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="whitespace-nowrap">
                                @foreach ($chauffeurs as $chauffeur)
                                    <tr class="even:bg-blue-50">
                                        <td class="md:text-[15px] max-w-1  text-[12px]">
                                            <img class="w-full"
                                                src="{{ asset('storage/image/' . $chauffeur->user->profile_image) }}"
                                                alt="">

                                        </td>
                                        <td class="pl-2 py-4 md:text-[15px] text-[12px]">
                                            {{ $chauffeur->user->name }}
                                        </td>
                                        <td class="pl-2 py-4 md:text-[15px] text-[12px]">
                                            {{ $chauffeur->trip }}
                                        </td>


                                        <td class="pl-12 py-4 md:text-[15px] text-[12px] ">
                                            {{ $chauffeur->immatricule }}

                                        </td>

                                        <td class="pl-10 pt-8 flex">
                                            @if ((int) $chauffeur->archive === 0)
                                                <form action="/archiveUser" method="post">
                                                    @csrf
                                                    <input type="hidden" name="UserId" value="{{ $chauffeur->id }}">
                                                    <input type="hidden" name="archiveUs" value="1">
                                                    <input type="hidden" name="role" value="chauffeur">
                                                    <button class="mr-4" title="archive" name="archive"
                                                        value="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                            fill="red" viewBox="0 -960 960 960" width="24">
                                                            <path
                                                                d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                        </svg>
                                                    </button>


                                                </form>
                                            @else
                                                <form action="/archiveUser" method="post">
                                                    @csrf
                                                    <input type="hidden" name="UserId"
                                                        value="{{ $chauffeur->id }}">
                                                    <input type="hidden" name="archiveUs" value="0">
                                                    <input type="hidden" name="role" value="chauffeur">

                                                    <button class="mr-4" title="archive" name="unarchive"
                                                        value="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                            fill="green" viewBox="0 -960 960 960" width="24">
                                                            <path
                                                                d="M480-560 320-400l56 56 64-64v168h80v-168l64 64 56-56-160-160Zm-280-80v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                        </svg>

                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

                    <h2 class="text-gray-500 text-lg font-semibold pb-4">Passengers</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white font-[sans-serif]">
                            <thead class="bg-gradient-to-r from-[#EACE00] to-[#3a3300] whitespace-nowrap">
                                <tr>

                                    <th
                                        class="px-6 py-3 text-left max-w-4  md:text-[15px] text-[12px] font-semibold text-white">
                                        Profile
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        FullName
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        Phone
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        E-mail
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="whitespace-nowrap">
                                @foreach ($passagers as $passager)
                                    <tr class="even:bg-blue-50">
                                        <td class="md:text-[15px] max-w-1  text-[12px]">
                                            <img class="w-full"
                                                src="{{ asset('storage/image/' . $passager->user->profile_image) }}"
                                                alt="">

                                        </td>
                                        <td class="pl-2 py-4 md:text-[15px] text-[12px]">
                                            {{ $passager->user->name }}
                                        </td>
                                        <td class="pl-2 py-4 md:text-[15px] text-[12px]">
                                            {{ $passager->Phone }}
                                        </td>


                                        <td class="  md:text-[15px] text-left text-[12px] ">
                                            {{ $passager->user->email }}

                                        </td>

                                        <td class="pl-10 pt-8 flex">
                                            @if ((int) $passager->archive === 0)
                                                <form action="/archiveUser" method="post">
                                                    @csrf
                                                    <input type="hidden" name="UserId"
                                                        value="{{ $passager->id }}">
                                                    <input type="hidden" name="archiveUs" value="1">
                                                    <input type="hidden" name="role" value="passager">
                                                    <button class="mr-4" title="archive" name="archive"
                                                        value="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                            fill="red" viewBox="0 -960 960 960" width="24">
                                                            <path
                                                                d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                        </svg>
                                                    </button>


                                                </form>
                                            @else
                                                <form action="/archiveUser" method="post">
                                                    @csrf
                                                    <input type="hidden" name="UserId"
                                                        value="{{ $passager->id }}">
                                                    <input type="hidden" name="archiveUs" value="0">
                                                    <input type="hidden" name="role" value="passager">

                                                    <button class="mr-4" title="archive" name="unarchive"
                                                        value="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                            fill="green" viewBox="0 -960 960 960" width="24">
                                                            <path
                                                                d="M480-560 320-400l56 56 64-64v168h80v-168l64 64 56-56-160-160Zm-280-80v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                        </svg>

                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    <script>
        function burgermenu() {
            const sideBar = document.getElementById('burgerbar')
            sideBar.classList.toggle('hidden');
        }
    </script>

</body>

</html>
