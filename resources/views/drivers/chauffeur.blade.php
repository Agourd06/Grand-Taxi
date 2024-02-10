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
    <section style="background-size:100% 100%;"
        class="bg-[url('https://wallpapercrafter.com/th800/221623-a-taxi-cab-driving-down-a-new-york-city-street-wit.jpg')]    h-screen">
        <header class='shadow-md bg-white font-sans'>
            <section
                class='flex items-center lg:justify-center max-sm:flex-col   px-10 border-gray-200 border-b lg:min-h-[80px] max-lg:min-h-[60px]'>
                <a href="javascript:void(0)" class="max-md:w-full  "><img
                        src="{{ asset('storage/image/' . 'taxista.png') }}" alt="logo" class='md:w-[150px]  w-36' />
                </a>
                <div class="md:absolute md:right-10 md:flex md:items-center max-md:ml-auto">



                    <div class="inline-block border-gray-300 border-l-2 pl-6 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                            class="hover:fill-[#EACE00]">
                            <circle cx="10" cy="7" r="6" data-original="#000000" />
                            <path
                                d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                data-original="#000000" />
                        </svg>
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
        <div class="w-[80%] mx-auto mt-16">
            <h1 for="countries" class="block mb-2 text-[35px] text-center font-medium text-black  dark:text-white">
                Availability</h1>
            <form action="/availibality" method="post">
                @csrf
                <div class="flex gap-6">

                    <select id="countries" name="Desponability"
                        class="bg-gray-50 border border-[#EACE00] text-gray-900 text-sm rounded-lg outline-none focus:ring-[#EACE00] focus:border-[#EACE00] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Available">Available</option>
                        <option value="Reserved">Reserved</option>
                        <option value="In Use">In Use</option>
                    </select>

                    <button type="submit"
                        class="px-6 py-2 rounded-full text-white text-sm tracking-wider font-medium outline-none border-2 border-[#EACE00] hover:bg-[#EACE00] hover:text-white transition-all duration-300">Valid</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
