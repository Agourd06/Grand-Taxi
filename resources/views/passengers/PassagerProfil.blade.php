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
            class='flex items-center lg:justify-center max-sm:flex-col   px-10 border-gray-200 border-b lg:min-h-[80px] max-lg:min-h-[60px]'>
            <a href="javascript:void(0)" class="max-md:w-full  "><img src="{{ asset('storage/image/' . 'taxista.png') }}"
                    alt="logo" class='md:w-[150px]  w-36' />
            </a>
            <div class="md:absolute md:right-10 md:flex md:items-center max-md:ml-auto">




                <div class="relative inline-block border-gray-300 border-l-2 pl-6 cursor-pointer " id="Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                    class="hover:fill-[#EACE00]">
                    <circle cx="10" cy="7" r="6" data-original="#000000" />
                    <path
                      d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                      data-original="#000000" />
                  </svg>
                    <div class="absolute  w-[120px] hidden h-[85px] top-full rounded-md right-2 drop-shadow-2xl"
                        id="ProfilPop">
                        <a href='/passager'
                            class='hover:bg-[#EACE00] rounded-t-md duration-300 hover:text-white w-full h-[50%] bg-white text-gray-600 font-bold text-[15px] flex items-center justify-center'>Home</a>
                        <a href='/logout'
                            class='hover:bg-[#EACE00] rounded-b-md duration-300 hover:text-white w-full h-[50%] bg-gray-300 text-gray-600 font-bold text-[15px] flex items-center justify-center'>log
                            out</a>
                    </div>
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
                <li class='max-lg:border-b max-lg:py-2' id="addTripButton"><a href='javascript:void(0)'
                        class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>Today Trip</a></li>
                <li class='max-lg:border-b max-lg:py-2'><a href='javascript:void(0)'
                        class='hover:text-[#EACE00] text-black font-bold text-[15px] block'>History</a></li>

            </ul>
        </div>
    </header>
    <div id="addTripModal" class="hidden fixed z-50 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="/trip" method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title">
                                    Chose Your Today Trip :
                                </h3>
                                <div class="text-red-500 text-[20px] w-full text-center">
                                    @if ($errors->has('Depart') || $errors->has('Destination'))
                                        <div>{{ $errors->first() }}</div>
                                        <script>
                                            document.getElementById('addTripModal').classList.toggle('hidden');
                                        </script>
                                    @endif
                                </div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mt-2">
                                    Departure :</label>
                                <input type="text" name="Depart" id="depart"
                                    class="mt-1 p-2 block w-full border-gray-300 rounded-md outline-none border border-solid border-black"
                                    placeholder="Enter Departure">
                                <label for="name" class="block text-sm font-medium text-gray-700 mt-2">
                                    Destination :</label>
                                <input type="text" name="Destination" id="name"
                                    class="mt-1 p-2 block w-full border-gray-300 rounded-md outline-none border border-solid border-black"
                                    placeholder="Enter Destination">
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 w-full px-4 py-3 sm:px-6 gap-y-4 flex justify-end flex-col md:flex-row">
                        <button id="" type="submit"
                            class="w-full  inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-black text-base font-medium text-white hover:bg-[#EACE00] duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Confirm
                        </button>
                        <button id="closeModalButton" type="button"
                            class="w-full  inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white duration-300 hover:bg-[#EACE00] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Close
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="w-full relative shadow-2xl rounded  overflow-hidden">
        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative">
            <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                alt="" class="bg w-full h-full object-cover object-center absolute z-0">
            <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                <img src="{{ asset('storage/image/' . $user->profile_image) }}"
                    class="h-24 w-24 object-cover rounded-full">
                <h1 class="text-2xl font-semibold">{{ $user->name }}</h1>
                <h4 class="text-sm font-semibold">Joined Since : {{ $user->created_at }}</h4>
            </div>
        </div>
        <div class="grid grid-cols-12 bg-white ">

            <div
                class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4  border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">

                <div>
                    <h3 class="text-xl font-semibold">Passenger Information</h3>
                    <hr>
                </div>

            </div>

            <div
                class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
                <div class="px-4 pt-4">





                    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4  mt-6">

                        <div class="form-item w-full">
                            <label class="text-xl ">Full Name</label>
                            <input type="text" value="{{ $user->name }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>

                        <div class="form-item w-full">
                            <label class="text-xl ">Email</label>
                            <input type="text" value="{{ $user->email }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 mt-6">

                        <div class="form-item w-full">
                            <label class="text-xl ">Phone Number</label>
                            <input type="text" value="{{ $passager->Phone }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>

                      
                    </div>

               




                </div>
            </div>


        </div>
    </div>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }


        document.getElementById('Profil').addEventListener('click', () => toggleModal('ProfilPop'));
   
    </script>
</body>

</html>
