<!DOCTYPE html>
<html lang="en">
 @include('Admin.layouts.head-tage')

 <body>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    @include('Admin.layouts.Navbar-part')
    @include('Admin.layouts.Navbar-part-two')
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
        @include('Admin.layouts.Sidebar-part')
        <div id="content" class="main-content" style="background-color: #C9D9C3 !important">
            @yield("content")
            @include('Admin.layouts.footer-tag')
        </div>
        @include('Admin.layouts.js')

    </div>

 </body>



</html>
