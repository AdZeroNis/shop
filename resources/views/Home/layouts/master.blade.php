<!DOCTYPE html>
<html lang="en">

@include("Home.layouts.head")

<body>
  @include("Home.layouts.header")
  @include("Home.layouts.menu")

  @yield("content")


  @include("Home.layouts.startfooter")
  @include("Home.layouts.footer")
  @include("Home.layouts.js")
</body>
</html>
