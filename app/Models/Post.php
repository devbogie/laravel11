<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    // mendefinisikan bahwa 1 post hanya ditulis oleh 1 user (belongs to)
    // jika sudah didefinisikan, tabel post dan user akan terhubung dengan cara memanggil function author()
    // contoh: hanya dengan author_id pada tabel post, bisa mengetahui nama penulisnya
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // mendefinisikan bahwa 1 post hanya mempunyai 1 kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
