@extends('home')
@section('head')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>Asdosku</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="asdosku assiten dosen" name="keywords">
  <meta content="No.1 di Indonesia Untuk Dosen" name="description">

  <!-- Favicons -->
  <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->

  <link href="{{ asset('asset/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- Libraries CSS Files -->
  <link href="{{ asset('asset/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
@endsection