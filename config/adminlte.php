<?php

return [
    'title'         => 'RuangKonsul Admin',
    'title_prefix'  => '',
    'title_postfix' => ' | RuangKonsul',

    'logo'          => '<b>Ruang</b>Konsul',
    'logo_img'      => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class'=> 'brand-image img-circle elevation-3',
    'logo_img_alt'  => 'RuangKonsul',

    'auth_guards' => ['admin'],

    'use_route_url' => true,

    'dashboard_url' => 'admin.dashboard',

    'logout_url'    => 'admin.logout',
    'logout_method' => 'POST',

    'login_url'     => 'admin.login',

    'menu' => [
        ['header' => 'UTAMA'],
        [
            'text'    => 'Dashboard',
            'url'     => 'admin/dashboard',
            'icon'    => 'fas fa-fw fa-tachometer-alt',
            'active'  => ['admin/dashboard'],
        ],
        ['header' => 'MANAJEMEN'],
        [
            'text'    => 'Dokter',
            'url'     => 'admin/dokter',
            'icon'    => 'fas fa-fw fa-user-md',
            'active'  => ['admin/dokter*'],
        ],
        [
            'text'    => 'Customer',
            'url'     => 'admin/customer',
            'icon'    => 'fas fa-fw fa-users',
            'active'  => ['admin/customer*'],
        ],
        [
            'text'    => 'Chat Dokter',
            'url'     => 'admin/chat',
            'icon'    => 'fas fa-fw fa-comments',
            'active'  => ['admin/chat*'],
        ],
        ['header' => 'PRODUK & PESANAN'],
        [
            'text'    => 'Produk ALKES',
            'url'     => 'admin/produk',
            'icon'    => 'fas fa-fw fa-box',
            'active'  => ['admin/produk*'],
        ],
        [
            'text'    => 'Pemesanan',
            'url'     => 'admin/pemesanan',
            'icon'    => 'fas fa-fw fa-shopping-bag',
            'active'  => ['admin/pemesanan*'],
        ],
    ],

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files'  => [
                ['type' => 'js',  'asset' => true, 'location' => 'vendor/datatables/js/jquery.dataTables.min.js'],
                ['type' => 'js',  'asset' => true, 'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js'],
                ['type' => 'css', 'asset' => true, 'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css'],
            ],
        ],
    ],
];