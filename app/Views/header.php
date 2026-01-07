<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets2/img/kasir.png') ?>">
    <title>To Do List</title>
    
    <link rel="stylesheet" href="<?=base_url('assets2/compiled/css/app.css')?>" />
    <link rel="stylesheet" href="<?=base_url('assets2/compiled/css/app-dark.css')?>" />

        <!-- FontAwesome -->
    <link rel="stylesheet" href="<?=base_url('assets2/extensions/@fortawesome/fontawesome-pro/css/all.min.css')?>">

    <!-- Datatables -->
    <link rel="stylesheet" href="<?=base_url('assets2/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets2/compiled/css/table-datatable-jquery.css')?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url('assets2/custom/custom_style.css')?>">

    <!-- File Uploader -->
    <link rel="stylesheet" href="<?=base_url('assets2/extensions/filepond/filepond.css')?>" />
    <link rel="stylesheet" href="<?=base_url('assets2/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')?>"
    />
    <link rel="stylesheet" href="<?=base_url('assets2/extensions/toastify-js/src/toastify.css')?>"
    />

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet Geosearch CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Geosearch -->
    <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/bundle.min.js"></script>

    <!-- Leaflet Control Geocoder (for reverse geocoding) -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?=base_url('assets2/extensions/sweetalert2/sweetalert2.min.css')?>"/>

    <style>
        @media print {
            @page {
                margin-top: 30px;
                margin-bottom: 10px;
            }
        }
    </style>

    <link
      rel="stylesheet"
      href="<?php echo base_url('assets2/extensions/flatpickr/flatpickr.min.css')?>"/>

</head>

<body>
