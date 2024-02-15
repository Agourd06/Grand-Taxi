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
                                    class="mt-1 p-2 block w-full border-gray-300 rounded-md outline-none border border-solid "
                                    placeholder="Enter Departure">
                                <label for="name" class="block text-sm font-medium text-gray-700 mt-2">
                                    Destination :</label>
                                <input type="text" name="Destination" id="name"
                                    class="mt-1 p-2 block w-full border-gray-300 rounded-md outline-none border border-solid "
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
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 "
                                disabled>
                        </div>

                        <div class="form-item w-full">
                            <label class="text-xl ">Email</label>
                            <input type="text" value="{{ $user->email }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 "
                                disabled>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 mt-6">

                        <div class="form-item w-full">
                            <label class="text-xl ">Phone Number</label>
                            <input type="text" value="{{ $passager->Phone }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 "
                                disabled>
                        </div>


                    </div>






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

        function burgermenu() {
            const sideBar = document.getElementById('burgerbar')
            sideBar.classList.toggle('hidden');
        }

    </script>
</body>

</html>
