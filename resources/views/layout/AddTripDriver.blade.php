<div id="addTripModal" class="hidden fixed z-50 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full md:w-1/4">
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
                                class="mt-1 p-2 block w-full  rounded-md outline-none border border-solid border-black"
                                placeholder="Enter Departure">
                            <label for="name" class="block text-sm font-medium text-gray-700 mt-2">
                                Destination :</label>
                            <input type="text" name="Destination" id="name"
                                class="mt-1 p-2 block w-full  rounded-md outline-none border border-solid border-black"
                                placeholder="Enter Destination">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 w-full px-4 py-3 sm:px-6 gap-y-4 flex justify-end flex-col md:flex-row">
                    <button id="" type="submit"
                        class="w-full  inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-black text-base font-medium text-white hover:bg-[#EACE00] duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Confirm
                    </button>
                    <button id="closeModalButton" type="button" onclick="toggleModal('addTripModal')"
                        class="w-full  inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white duration-300 hover:bg-[#EACE00] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>