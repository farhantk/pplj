<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
   <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
         <div class="flex items-center justify-start rtl:justify-end">
         <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
               <span class="sr-only">Open sidebar</span>
               <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
               </svg>
            </button>
         <a href="/" class="flex ms-2 md:me-24">
            <img src="{{URL::asset('/images/logo.png')}}" class="h-8 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-bold text-prior sm:text-2xl whitespace-nowrap dark:text-white">SIPKESA</span>
         </a>
         </div>
         <div class="flex items-center space-x-6 rtl:space-x-reverse">
         <p class="text-md font-semibold text-prior">{{ $name }}</p>
         <div class="flex items-center ms-3">
            <div>
               <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  @if($avatar === 'uploads/foto/avatar.jpg')
                     <img class="w-8 h-8 rounded-full" src="{{ asset('storage/uploads/foto/avatar.jpg') }}" alt="user photo">
                  @else
                     <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $avatar) }}" alt="user photo">
                  @endif
               </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
               <div class="px-4 py-3" role="none">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                     {{ $email }}
                  </p>
               </div>
               <ul class="py-1" role="none">
                  <li>
                     <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Pengaturan</a>
                  </li>
                  <li>
                     <form action="/signout" method='POST' class="block text-sm text-gray-700 hover:bg-gray-100">
                        @csrf
                        <button type='submit' class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                           Keluar
                        </button>
                     </form>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</nav>
 
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-prior border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-prior dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         @if ($role === 'admin')
            <li class="group">
               <a href="/" class="@if($isActive === 'beranda') bg-gray-100 @endif flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                  <svg class="w-8 h-8 bg-white rounded-md drop-shadow" data-icon-name="home-alt-1" data-style="flat-color" icon_origin_id="21093" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Flat Color" id="home-alt-1" class="icon flat-color" width="48" height="48"><path style="fill: rgb(9, 121, 105);" d="M21.71,11.29l-9-9a1,1,0,0,0-1.42,0l-9,9a1,1,0,0,0,1.42,1.42l.29-.3V20.3A1.77,1.77,0,0,0,5.83,22H8.5a1,1,0,0,0,1-1V16.1a1,1,0,0,1,1-1h3a1,1,0,0,1,1,1V21a1,1,0,0,0,1,1h2.67A1.77,1.77,0,0,0,20,20.3V12.41l.29.3a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,11.29Z" id="primary"></path></svg>           
                  <span class="ms-3 @if($isActive === 'beranda') text-prior @else text-white @endif group-hover:text-prior text-xl">Beranda</span>
               </a>
            </li>
         @else
            <li class="group">
               <a href="/penguntilan" class="@if($isActive === 'penguntilan') bg-gray-100 @endif flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                  <svg class="w-8 h-8 bg-white rounded-md drop-shadow" data-icon-name="coffee-beans" data-style="flat-color" icon_origin_id="19448" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Flat Color" id="coffee-beans" class="icon flat-color" width="48" height="48"><path style="fill: rgb(0, 158, 96);" d="M19.64,12.56a9.43,9.43,0,0,1-4.52,4.07,8.75,8.75,0,0,0-1.21-4.69,3.45,3.45,0,0,0-.2-.32,7.85,7.85,0,0,1,1.13-1c1.37-1,2.92-2.18,4.08-6.92,0,0,.07-.28.14-.66C21.38,5,21.68,9,19.64,12.56Zm-6.19-10a9.56,9.56,0,0,0-4.2,4,11.15,11.15,0,0,0-.68,1.39A6.8,6.8,0,0,1,12.46,10a9.49,9.49,0,0,1,1.19-1C14.85,8.15,16,7.3,17,3.26c0,0,.13-.51.24-1.12A5.71,5.71,0,0,0,13.45,2.59Z" id="secondary"></path><path style="fill: rgb(9, 121, 105);" d="M6.26,7.2c2.81-1,6.48.72,8.51,4.24,1.9,3.28,1.77,7-.12,9.06-.39-.31-.8-.65-1-.8-2.64-2.42-2.79-3.64-3-5.06-.2-1.69-.43-3.61-4-7A6.37,6.37,0,0,0,6.26,7.2Zm6.08,14c-3.2-2.92-3.41-4.64-3.61-6.3-.17-1.5-.34-2.9-3.35-5.78,0,0-.38-.36-.86-.76A5.72,5.72,0,0,0,3,11.82a9.52,9.52,0,0,0,1.33,5.62,9.56,9.56,0,0,0,4.2,4,6.29,6.29,0,0,0,2.59.6,4.78,4.78,0,0,0,1.76-.33C12.6,21.41,12.36,21.2,12.34,21.18Z" id="primary"></path></svg>
                  <span class="ms-3 @if($isActive === 'penguntilan') text-prior @else text-white @endif group-hover:text-prior text-xl">Penguntilan</span>
               </a>
            </li>
            <li class="group">
               <a href="/pemupukan" class="@if($isActive === 'pemupukan') bg-gray-100 @endif flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 group">
                  <svg class="w-8 h-8 bg-white rounded-md drop-shadow" data-icon-name="badminton-racket-2" data-style="flat-color" icon_origin_id="22357" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Flat Color" id="badminton-racket-2" class="icon flat-color" width="48" height="48"><path style="fill: rgb(0, 158, 96);" d="M17.75,16.76a1,1,0,0,1-.29.71,1,1,0,0,1-1.42,0l-4-4A1,1,0,0,1,12,12a1,1,0,0,1,1.42,0l4,4A1,1,0,0,1,17.75,16.76Z" id="secondary"></path><path style="fill: rgb(9, 121, 105);" d="M12.72,4.27A7.5,7.5,0,0,1,15,9.5a5.51,5.51,0,0,1-1.56,3.93c-2.34,2.33-6.45,2-9.16-.7s-3-6.83-.71-9.16S10,1.55,12.72,4.27Zm4,11.07-1.41,1.42a1,1,0,0,0,0,1.41l3.53,3.54a1,1,0,0,0,1.42,0l1.41-1.42a1,1,0,0,0,0-1.41l-3.53-3.54a1.05,1.05,0,0,0-.71-.29A1,1,0,0,0,16.75,15.34Z" id="primary"></path></svg>
                  <span class="ms-3 @if($isActive === 'pemupukan') text-prior @else text-white @endif group-hover:text-prior text-xl">Pemupukan</span>
               </a>
            </li>
            <li class="group">
               <a href="/pemanenan" class="@if($isActive === 'pemanenan') bg-gray-100 @endif flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-8 h-8 bg-white rounded-md drop-shadow" data-icon-name="axe" data-style="flat-color" icon_origin_id="25096" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="axe" class="icon flat-color" width="48" height="48"><path style="fill: rgb(0, 158, 96);" d="m16.78,2.37c-.18-.22-.45-.36-.74-.37-.29-.03-.57.1-.77.31-2.11,2.25-5.36,2.69-5.4,2.69-.5.06-.88.49-.88.99v6c0,.5.38.93.88.99.03,0,3.27.43,5.4,2.69.19.2.45.31.73.31.01,0,.02,0,.04,0,.29,0,.56-.14.74-.37,1.43-1.77,2.22-4.12,2.22-6.63s-.79-4.86-2.22-6.63Z" id="secondary"></path><path style="fill: rgb(9, 121, 105);" d="m7,22h2c1.1,0,2-.9,2-2V5c0-1.65-1.35-3-3-3s-3,1.35-3,3v15c0,1.1.9,2,2,2Z" id="primary"></path>
                  </svg>
                  <span class="ms-3 @if($isActive === 'pemanenan') text-prior @else text-white @endif group-hover:text-prior text-xl">Pemanenan</span>
               </a>
            </li>
            <li class="group">
               <a href="/perawatan" class="@if($isActive === 'perawatan') bg-gray-100 @endif flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-8 h-8 bg-white rounded-md drop-shadow" data-icon-name="water-flask" data-style="flat-color" icon_origin_id="25149" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="water-flask" class="icon flat-color" width="48" height="48"><path style="fill: rgb(0, 158, 96);" d="m9,15h-2c-1.65,0-3-1.35-3-3v-5c0-1.65,1.35-3,3-3h5c.55,0,1,.45,1,1s-.45,1-1,1h-5c-.55,0-1,.45-1,1v5c0,.55.45,1,1,1h2c.55,0,1,.45,1,1s-.45,1-1,1Z" id="secondary"></path><path style="fill: rgb(0, 158, 96);" d="m15,2h-2c-1.1,0-2,.9-2,2v3c0,.55.45,1,1,1h4c.55,0,1-.45,1-1v-3c0-1.1-.9-2-2-2Z" id="secondary-2"></path><path style="fill: rgb(9, 121, 105);" d="m17,6h-6c-1.65,0-3,1.35-3,3v11c0,1.1.9,2,2,2h8c1.1,0,2-.9,2-2v-11c0-1.65-1.35-3-3-3Z" id="primary"></path>
                  </svg>
                  <span class="ms-3 @if($isActive === 'perawatan') text-prior @else text-white @endif group-hover:text-prior text-xl">Perawatan</span>
               </a>
            </li>
         @endif
      </ul>
   </div>
</aside>
