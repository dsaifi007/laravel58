<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- Plugin css for this page -->
    @stack("style")
    <!-- End plugin css for this page -->

    <link rel="stylesheet" href="{{ URL::asset('admin/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ URL::asset('admin/images/favicon.png') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ URL::asset('admin/js/common.js') }}"></script>
    <script>
    var base_url = "<?php echo url('/'); ?>";
    $(window).on("load",function(){
         $(".pixel-loader").fadeOut("slow");
    });
    </script>
  </head>