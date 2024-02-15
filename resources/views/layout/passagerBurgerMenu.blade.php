   <!-- --------------------------------burger menu ----------------------------- -->

   <div id="burgerbar"
       class=" hidden z-50 absolute top-0 right-0 w-72 md:w-1/6 bg-slate-200 opacity-75 flex flex-col font-bold text-xl gap-6 min-h-screen pl-2">
       <a class="hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300]" id="close" onclick="burgermenu()"
           href="#"><svg xmlns="http://www.w3.org/2000/svg" height="36" viewBox="0 -960 960 960" width="36">
               <path
                   d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
           </svg></a>
       <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
           href="/passager">
           <i class="fas fa-home mr-2"></i>Home
       </a>




       <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
           href="/PaReservation">
           <i class="fas fa-home mr-2"></i>Reservation
       </a>



       <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
           href="/PaHistory">
           <i class="fas fa-file-alt mr-2"></i>History
       </a>

       <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white"
           href="/favoritTrip">
           <i class="fas fa-file-alt mr-2"></i>Favori
       </a>



       <a class="block text-black font-bold py-2.5 px-4 my-2 rounded duration-300 hover:bg-gradient-to-r hover:from-[#EACE00] hover:to-[#3a3300] hover:text-white "
           href="/logout">
           <i class=" mr-2"></i>Log Out
       </a>

   </div>
   <!-- --------------------------------burger menu ----------------------------- -->
