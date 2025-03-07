<?php

namespace App\Http\Controllers;

use App\Helpers\General;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $array1 = [
            [
                "id" => 1,
                "name" => "Alice",
                "age" => 25,
                "city" => "Jakarta",
                "spent" => 1500000
            ],
            [
                "id" => 2,
                "name" => "Bob",
                "age" => 30,
                "city" => "Surabaya",
                "spent" => 2500000
            ],
            [
                "id" => 3,
                "name" => "Charlie",
                "age" => 28,
                "city" => "Bandung",
                "spent" => 1200000
            ],
            [
                "id" => 4,
                "name" => "David",
                "age" => 35,
                "city" => "Jakarta",
                "spent" => 3000000
            ],
            [
                "id" => 5,
                "name" => "Eve",
                "age" => 22,
                "city" => "Surabaya",
                "spent" => 1000000
            ]
        ];


        $array1 = collect($array1)
            ->sortByDesc('spent')
            ->filter(function ($row) {
                return $row['age'] >= 25 && $row['city'] == 'Jakarta';
            })
            ->map(function ($row) {
                return [
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "total_spent" => General::formatUang($row['spent']),
                ];
            })
            ->values();

        return $array1;
    }

    public function testNode()
    {
        return view('test.node');
    }
}
