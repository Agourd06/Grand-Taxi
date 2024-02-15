<header class='shadow-md bg-white font-sans'>
    <section
        class='flex items-center lg:justify-center   px-10 border-gray-200 border-b lg:min-h-[80px] max-lg:min-h-[60px]'>
        <a href="/passager" class="max-md:w-full  "><img src="{{ asset('storage/image/' . 'taxista.png') }}"
                alt="logo" class='md:w-[150px]  w-36' />
        </a>
        <div class="md:absolute md:right-10 md:flex md:items-center max-md:ml-auto">




            <div class=" inline-block w- border-gray-300 border-l-2 pl-6 cursor-pointer ">
                <button onclick="toggleModal('ProfilPop')"><svg xmlns="http://www.w3.org/2000/svg" width="20px"
                        height="20px" viewBox="0 0 24 24" class="hover:fill-[#EACE00]">
                        <circle cx="10" cy="7" r="6" data-original="#000000" />
                        <path
                            d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                            data-original="#000000" />
                    </svg>
                </button>
                <div class="absolute z-50 w-[120px] hidden h-[85px] md:top-full rounded-md right-2 drop-shadow-2xl"
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
        <div class='flex ml-auto lg:order-1 lg:hidden' id="burger" onclick="burgermenu()">
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
            <li class='max-lg:border-b max-lg:py-2'><a href='/passager'
                    class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>Drivers</a></li>
            <li class='max-lg:border-b max-lg:py-2'><a href='/PaReservation'
                    class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>Reservation</a></li>
            <li class='max-lg:border-b max-lg:py-2'><a href='/PaHistory'
                    class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>History</a></li>

            <li class='max-lg:border-b max-lg:py-2'><a href='/favoritTrip'
                    class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>favorit</a></li>

        </ul>
    </div>
</header>
