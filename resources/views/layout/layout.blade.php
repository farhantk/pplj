@extends('layout.main')
@extends('layout.navigation')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-prior border-dashed rounded-lg dark:border-gray-700 mt-14">
       @yield('content')
    </div>
</div>

