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
            return $carry * $item;
        },1);
        return $total;
    }

    public function reduceEmails(){
        $users = [
          ['name'=>'Jhon', 'email'=>'john@example.com'],
          ['name'=>'Jane', 'email'=>'Jane@example.com'],
          ['name'=>'Dana', 'email'=>'Dana@example.com'],
        ];

        $email = collect($users)->reduce(function ($item, $employee) {
//            dd($employee);
            $item[$employee['name']] = $employee['email'];
            return $item;
        });
        return $email;
    }

    public function departmentCounts(){
        $employees = [
            ['name' => "John" , 'department' => 'Sales'],
            ['name' => "Jane" , 'department' => 'Marketing'],
            ['name' => "Dave" , 'department' => 'Marketing'],
            ['name' => "Dana" , 'department' => 'Engineering'],
            ['name' => "Beth" , 'department' => 'Marketing'],
            ['name' => "Kyle" , 'department' => 'Engineering'],
        ];

//        return collect($employees)->groupBy('department')->map(function ($employee) {
//            return $employee->count();
//        });

        return collect($employees)->countBy(function ($item) {
            return $item['department'];
        });
    }
}







//$this->assertEquals([
//    "Sales" => 1,
//    "Marketing"=> 3,
//    "Engineering"=> 2
//]);
