<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    // fungsi menampilkan semua post
    public static function all()
    {
        return
            [
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
    }

    // fungsi menampilkan post spesifik
    public static function find($slug): array
    {
        $post =  Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        // jika post tidak ada
        if (!$post) {
            abort(404);
        }

        // jika post ada
        return $post;
    }
}
