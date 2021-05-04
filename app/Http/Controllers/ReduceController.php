<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReduceController extends Controller
{
    public function reduce(){
        $num = [
            1,2,3,4,5,6
        ];
        $total = collect($num)->reduce(function ($carry, $item) {
            return $carry + $item;
        },699);
        return $total;
    }

    public function reduceEmails(){
        $users = [
          ['name'=>'Jhon', 'email'=>'john@example.com'],
          ['name'=>'Jane', 'email'=>'Jane@example.com'],
          ['name'=>'Dana', 'email'=>'Dana@example.com'],
        ];

        $email = collect($users)->reduce(function ($email, $employee) {
            $email[$employee['name']] = $employee['email'];
            return $email;
        });
        return $email;
    }

    public function Count(){
        $employees = [
            ['name' => "John" , 'department' => 'Sales'],
            ['name' => "Jane" , 'department' => 'Marketing'],
            ['name' => "Dave" , 'department' => 'Marketing'],
            ['name' => "Dana" , 'department' => 'Engineering'],
            ['name' => "Beth" , 'department' => 'Marketing'],
            ['name' => "Kyle" , 'department' => 'Engineering'],
        ];


        $count = collect($employees)->map(function ($item) {
            return collect($item)->reduce(function ($name, $department) {
                $name = $department;
            });

            return $name;
        });
        return $count;
    }
}
