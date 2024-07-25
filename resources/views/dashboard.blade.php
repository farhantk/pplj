@extends('layout/layout')
@section('content')


<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-md font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-prior hover:text-prior dark:text-purple-500 dark:hover:text-purple-500 border-prior dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
      <li class="me-2" role="presentation">
         <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Penguntilan</button>
     </li>
     <li class="me-2" role="presentation">
         <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Pemupukan</button>
     </li>
     <li class="me-2" role="presentation">
         <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Pemanenan</button>
     </li>
     <li role="presentation">
         <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Perawatan</button>
     </li>
    </ul>
</div>

<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-xl px-4">
               <!-- Start coding here -->
               <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="overflow-x-auto p-10">
                     <table id="example" class="table-auto w-full">
                        <thead>
                           <tr>
                              <th class="px-4 py-4">No</th>
                              <th class="px-4 py-4">Nama Asisten</th>
                              <th class="px-4 py-4">Jumlah karyawan Penguntilan</th>
                              <th class="px-4 py-3">Pecahan Pupuk</th>
                              <th class="px-4 py-3">Jenis Pupuk</th>
                              <th class="px-4 py-3">Jumlah Pupuk (Kg)</th>
                              <th class="px-4 py-3">Dibuat Pada</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($penguntilans as $index => $penguntilan)
                           <tr>
                                 <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                 <td class="border px-4 py-2">{{ $penguntilan->user->name }}</td>
                                 <td class="border px-4 py-2">{{ $penguntilan->jumlah_karyawan }}</td>
                                 <td class="border px-4 py-2">{{ $penguntilan->pecahan_pupuk }}</td>
                                 <td class="border px-4 py-2">{{ $penguntilan->jenis_pupuk }}</td>
                                 <td class="border px-4 py-2">{{ $penguntilan->jumlah }}</td>
                                 <td class="border px-4 py-2">{{ $penguntilan->created_at }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div> 
               </div>
            </div>
         </section>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-xl px-4">
               <!-- Start coding here -->
               <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="overflow-x-auto p-10">
                     <table id="example1" class="table-auto w-full">
                        <thead>
                           <tr>
                              <th class="px-4 py-4">No</th>
                              <th class="px-4 py-4">Nama Asisten</th>
                              <th class="px-4 py-4">Nama Pupuk</th>
                              <th class="px-4 py-4">Jenis Pupuk</th>
                              <th class="px-4 py-3">Jumlah Piringan Pupuk</th>
                              <th class="px-4 py-3">Jumlah Pupuk (Kg)</th>
                              <th class="px-4 py-3">Dibuat Pada</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($pemupukans as $index => $pemupukan)
                           <tr>
                                 <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                 <td class="border px-4 py-2">{{ $pemupukan->user->name }}</td>
                                 <td class="border px-4 py-2">{{ $pemupukan->name }}</td>
                                 <td class="border px-4 py-2">{{ $pemupukan->jenis }}</td>
                                 <td class="border px-4 py-2">{{ $pemupukan->jumlah_piringan }}</td>
                                 <td class="border px-4 py-2">{{ $pemupukan->jumlah_pupuk }}</td>
                                 <td class="border px-4 py-2">{{ $pemupukan->created_at }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div> 
               </div>
            </div>
         </section> 
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-xl px-4">
               <!-- Start coding here -->
               <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="overflow-x-auto p-10">
                     <table id="example2" class="table-auto w-full">
                        <thead>
                           <tr>
                              <th class="px-4 py-4">No</th>
                              <th class="px-4 py-4">Nama Asisten</th>
                              <th class="px-4 py-4">Lokasi Panen/Afdelink</th>
                              <th class="px-4 py-3">Lokasi Area</th>
                              <th class="px-4 py-3">Jumlah Panen (Kg)</th>
                              <th class="px-4 py-3">Dibuat Pada</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($pemanenans as $index => $pemanenan)
                           <tr>
                                 <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                 <td class="border px-4 py-2">{{ $pemanenan->user->name }}</td>
                                 <td class="border px-4 py-2">{{ $pemanenan->lokasi }}</td>
                                 <td class="border px-4 py-2">{{ $pemanenan->area }}</td>
                                 <td class="border px-4 py-2">{{ $pemanenan->jumlah }}</td>
                                 <td class="border px-4 py-2">{{ $pemanenan->created_at }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div> 
               </div>
            </div>
         </section>  
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-xl px-4">
               <!-- Start coding here -->
               <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="overflow-x-auto p-10">
                     <table id="example3" class="table-auto w-full">
                        <thead>
                           <tr>
                              <th class="px-4 py-4">No</th>
                              <th class="px-4 py-4">Nama Asisten</th>
                              <th class="px-4 py-4">Lokasi Area Perawatan</th>
                              <th class="px-4 py-4">Jumlah Perawatan Pohon</th>
                              <th class="px-4 py-3">Jumlah Kerusakan Pohon</th>
                              <th class="px-4 py-3">Dibuat Pada</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($perawatans as $index => $perawatan)
                           <tr>
                                 <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                 <td class="border px-4 py-2">{{ $perawatan->user->name }}</td>
                                 <td class="border px-4 py-2">{{ $perawatan->area }}</td>
                                 <td class="border px-4 py-2">{{ $perawatan->jumlah_rawat }}</td>
                                 <td class="border px-4 py-2">{{ $perawatan->jumlah_rusak }}</td>
                                 <td class="border px-4 py-2">{{ $perawatan->created_at }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div> 
               </div>
            </div>
         </section>  
    </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 
 <script>
     $(document).ready(function() {
         $('#example').DataTable({
             // Add any customization options here
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#example1').DataTable({
             // Add any customization options here
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#example2').DataTable({
             // Add any customization options here
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#example3').DataTable({
             // Add any customization options here
         });
     });
 </script>
@endsection