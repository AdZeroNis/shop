<!DOCTYPE html>
<html lang="en">

@include("Home.layouts.head")

<body>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
  @include("Home.layouts.header")


  @yield("content")


  @include("Home.layouts.startfooter")
  @include("Home.layouts.footer")
  @include("Home.layouts.js")
</body>
</html>
