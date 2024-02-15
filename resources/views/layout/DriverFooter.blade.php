<footer class="bg-gray-100 font-[sans-serif] ">
    <div class="py-8 px-4 sm:px-12">
        <div class="flex flex-wrap items-center justify-between">
            <div class="w-full md:w-auto  mb-6 md:mb-0">
                <a href="../" class=" w-full flex justify-center md:justify-start"><img
                        class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] "
                        src="{{ asset('storage/image/' . 'taxista.png') }}" alt="Taxista Logo" /></a>
            </div>
            <div class="w-full md:w-auto text-center">
                <ul class="flex items-center justify-center flex-wrap gap-y-2 md:justify-end space-x-6">
                    <li><a href="/chauffeur" class="text-gray-700 hover:text-gray-900 text-base">Home</a></li>
                    <li><a href="/DriverProfil" class="text-gray-700 hover:text-gray-900 text-base">profil</a>
                    </li>


                    <li><a href="/logout" class="text-gray-700 hover:text-gray-900 text-base">Log out</a></li>


                </ul>
            </div>
        </div>
        <hr class="my-6 border-gray-300" />
        <p class="text-center text-gray-700 text-base">
            Copyright © {{ date('Y') }} <a href="/passager" class="hover:underline mx-1">Taxista</a>
            All Rights Reserved.
        </p>

    </div>
</footer>