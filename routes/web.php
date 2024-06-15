<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', [
        'nama' => 'Bogie',
        'title' => 'About'
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Bogie',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos eveniet, corporis dicta cum in officia neque natus non magni blanditiis quisquam facilis officiis itaque assumenda aut adipisci sapiente unde tempore?'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Ganilaga',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi placeat, nulla doloribus at itaque iste, sint non ipsam ipsum omnis ipsa laudantium ut maxime unde sit velit necessitatibus atque amet.'
            ]
        ]
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Bogie',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos eveniet, corporis dicta cum in officia neque natus non magni blanditiis quisquam facilis officiis itaque assumenda aut adipisci sapiente unde tempore?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Ganilaga',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi placeat, nulla doloribus at itaque iste, sint non ipsam ipsum omnis ipsa laudantium ut maxime unde sit velit necessitatibus atque amet.'
        ]
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
