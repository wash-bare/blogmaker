<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @section('head_script')
        {{-- head_script --}}
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
        <link rel="stylesheet" href="{{ asset('/assets/style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    @show
</head>
<body class="bg-gray-100">
<!-- start navbar -->
<div class="md:fixed md:w-full md:top-0 md:z-20 flex bg-white p-6 border-gray-300">
    <div class="slide">
        <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
            <i class="fad fa-list-ul" style="margin-right:15px;">
        </button>
    </div>
    <div class="float-left w-4/5">
        <strong class="capitalize ml-1 align-middle">{{ config('app.name', 'Laravel') }}</strong>
    </div>
    <div class="float-right">
      @if(Auth::check())
      {{ Auth::user()->name }}
      @endif
    </div>
    <div class="clear-both"></div>
</div>
<!-- end navbar -->
<div class="h-screen flex flex-row max-w-full">
@section('sidebar')
    <!-- start sidebar -->
    <div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
      <!-- sidebar content -->
        <div class="flex flex-col">
          <!-- sidebar toggle -->
          <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
              <i class="fad fa-times-circle" style="margin-right:10px;"></i>
            </button>
          </div>
      @if(Auth::check())
          <a href="/moledig/home"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
              <i class="far fa-home text-xs mr-2"></i>
              HOME
          </a>
      @endif
          <form id="frm-logout" action="logout" method="POST">
            @csrf
            <a id="btn-logout"
              class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
               <i class="fas fa-sign-out-alt text-xs mr-2"></i>
              ログアウト
            </a>
          </form>
        </div>
        <!-- end sidebar content -->
    </div>
    <!-- end sidebar -->
@show
<!-- start content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <h1 class="h5">@yield('title')</h1>
    <hr class="my-5">
    <div class="card">
      <div class="card-body" style="min-width: 1024px;">
        @if(count($errors) > 0)
        <div class="alert alert-error mb-5">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if (session('flash_message'))
            <div class="alert alert-default mb-5">
              {{ session('flash_message') }}
            </div>
        @endif
        @yield('content')
      </div>
    </div>
</div>
@section('footer_script')
@show
</div>

<script>
$(function () {
  $('#btn-logout').click(function () {
    $('#frm-logout').submit();
  });
  var btn = document.getElementById('sliderBtn'),
    sideBar = ducument.getElementById('sideBar'),
    sideBarHideBtn = document.getElementById('sideBarHideBtn');

    // show sideBar
    btn.addEventListener('click', function () {
      if (sideBar.classList.contains('md:-ml-64')) {
        sideBar.classList.replace('md:-ml-64', 'md:ml-0');
        sideBar.classList.remove('md:slideOutLeft');
        sideBar.classList.classList.add('md:slideInLeft');
      }
      ;
    });
    // hide sideBar
    sideBarHideBtn.addEventListener('click', function() {
      if (sideBar.classList.contains('md:ml-0', 'slideInLeft')) {
        var _class = function () {
          sideBar.classList.remove('md:slideInLeft');
          sideBar.classList.add('md:slideOutLeft');
          console.log('hide');
        };
        var animate = async function () {
          await _class();
          setTimeout(function () {
            sideBar.classList.replace('md:ml-0', 'md:-ml-64');
            console.log('animated');
          }, 300);
        };
        _class();
        animate();
      }
      ;
    });
});
</script>
</body>
</html>
