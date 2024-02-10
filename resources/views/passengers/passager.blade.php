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
    <header class='shadow-md bg-white font-sans'>
        <section
            class='flex items-center lg:justify-center max-sm:flex-col relative  px-10 border-gray-200 border-b lg:min-h-[80px] max-lg:min-h-[60px]'>
            <a href="javascript:void(0)" class="max-md:w-full  "><img src="{{ asset('storage/image/' . 'taxista.png') }}"
                    alt="logo" class='md:w-[150px]  w-36' />
            </a>
            <div class="md:absolute md:right-10 flex items-center max-md:ml-auto">



                <div class="inline-block border-gray-300 border-l-2 pl-6 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                        class="hover:fill-[#007bff]">
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
                    <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <ul id="collapseMenu"
                class='lg:!flex justify-center lg:space-x-10 max-lg:space-y-3 max-lg:hidden w-full max-lg:mt-2'>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-[#007bff] font-bold text-[15px] block'>Home</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Team</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Feature</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Blog</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>About</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Contact</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Source</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Store</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Fashion</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>Partner</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='/logout'
                        class='hover:text-[#007bff] text-gray-600 font-bold text-[15px] block'>log out</a></li>
            </ul>
        </div>
    </header>
</body>

</html>
