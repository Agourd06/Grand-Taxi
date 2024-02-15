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
    @include('layout/DriverNav')

    @include('layout/AddTripDriver')
    @include('layout/DriverBurgerMenu')


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
                    <h3 class="text-2xl font-semibold">Driver Information</h3>
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
                            <label class="text-xl ">Registration</label>
                            <input type="text" value="{{ $chauffeur->immatricule }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>

                        <div class="form-item w-full">
                            <label class="text-xl ">Paymente Type</label>
                            <input type="text" value="{{ $chauffeur->TypeDePayment }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 mt-6">

                        <div class="form-item w-full">
                            <label class="text-xl ">Car Type</label>
                            <input type="text" value="{{ $chauffeur->VoitureType }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>

                        <div class="form-item w-full">
                            <label class="text-xl ">Availibality</label>
                            <input type="text" value="{{ $chauffeur->Desponability }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold mt-6 ">Today Trip</h3>
                        <hr>
                    </div>
                    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 mt-6">

                        <div class="form-item w-full">
                            <label class="text-xl ">Departure - Destination</label>
                            <input type="text" value="{{ $chauffeur->trip }}"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>
                        </div>


                    </div>

                    <div>
                        <h3 class="text-2xl font-semibold mt-6 ">More About Me</h3>
                        <hr>
                    </div>

                    <div class="form-item w-full mt-6">
                        <label class="text-xl ">Biography</label>
                        <textarea cols="30" rows="10"
                            class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                            disabled>"{{ $chauffeur->Description }}"</textarea>
                    </div>



                </div>
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
