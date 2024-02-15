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
        class="bg-[url('https://wallpapercrafter.com/th800/221623-a-taxi-cab-driving-down-a-new-york-city-street-wit.jpg')]    h-screen overflow-hidden">

      @include('layout/DriverNav')
      @include('layout/AddTripDriver')
      @include('layout/DriverBurgerMenu')
    
        <div class="md:w-[60%] w-[80%]  mx-auto mt-16">
            <h1 for="countries" class="block mb-2 text-[35px] text-center text-transparent bg-clip-text  font-bold bg-gradient-to-r from-[#EACE00] to-[#000000] ">
                Availability</h1>
            <form action="/availibality" method="post">
                @csrf
                <div class="flex gap-6 md:flex-row flex-col items-center">

                    <select id="countries" name="Desponability"
                        class="bg-gray-50 border border-[#EACE00] text-gray-900 text-sm rounded-lg outline-none focus:ring-[#EACE00] focus:border-[#EACE00] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>You Are : {{ $chauffeur->Desponability }}</option>

                        <option value="Available">Available</option>
                        <option value="Reserved">Reserved</option>
                        <option value="In Use">In Use</option>
                    </select>

                    <button type="submit"
                        class="md:px-6 py-2 w-1/2 md:w-auto rounded-full text-white text-sm tracking-wider font-medium outline-none border-2 border-[#EACE00] hover:bg-[#EACE00] hover:text-white transition-all duration-300">Valid</button>
                </div>
                <div class="text-red-500 text-[20px] w-full text-center">
                    @if ($errors->has('Desponability'))
                        <div>{{ $errors->first('Desponability') }}</div>
                    @endif
                </div>
            </form>
        </div>
    </section>
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
