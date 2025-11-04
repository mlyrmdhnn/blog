<?php

namespace App\Models;

use Illuminate\Support\Arr;

class coba
{
    public static function all()
    {
        return[
            [
                "id" => "1",
                "slug" => "data-mulya-ramadhan",
                "nama" => "mulya ramadhan",
                "jurusan" => "teknik informatika",
                "npm" => "12345",
                "semester" => "1"
            ],
            [
                "id" => "2",
                "slug" => "data-abel-putri-rasya",
                "nama" => "abel putri rasya",
                "jurusan" => "administrasi bisnis",
                "npm" => "67890",
                "semester" => "5"
            ],
            [
                "id" => "3",
                "slug" => "data-rahadian-dzaky",
                "nama" => "rahadian dzaky",
                "jurusan" => "teknik informatika",
                "npm" => "54321",
                "semester" => "3"
            ]
        ];
    }

    public static function find($slug)
    {
        $arr = static::all();
        // $hasil = Arr::first($arr, function($value) use ($slug) {
        //     return $value['slug'] == $slug;
        // });
        $hasil = Arr::first($arr, fn($value) => $value['slug'] == $slug);
        return $hasil;
    }

}
