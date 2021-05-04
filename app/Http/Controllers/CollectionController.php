<?php

namespace App\Http\Controllers;

use DateTime;

class CollectionController extends Controller
{
    public function test_get_employees_names(){
        $employees = [
          ['name' => "John" , 'department' => 'Sales'],
          ['name' => "Jane" , 'department' => 'Marketing'],
          ['name' => "Dave" , 'department' => 'Marketing'],
          ['name' => "Dana" , 'department' => 'Engineering'],
          ['name' => "Beth" , 'department' => 'Marketing'],
          ['name' => "Kyle" , 'department' => 'Engineering'],
        ];

        $employeesName = collect($employees)->map(function ($employee){
           return $employee['name'];
        });
        return $employeesName;

    }

    public function test_get_the_year_from_each_date(){
        $dates = [
          new DateTime('2015-01-05'),
          new DateTime('1967-11-23'),
          new DateTime('1988-10-14'),
          new DateTime('1995-05-04'),
          new DateTime('2007-08-09'),
        ];
        $date = collect($dates)->map(function ($data){
            return $data->format('Y');;
        });
        return $date;
    }

    public function priceIncets(){
        $pricesInCents = [
            79,
            599,
            699,
            289,
            89,
            249,
            785,
        ];
        $cent = collect($pricesInCents)->map(function ($data){
            return "$".$data * 0.01;
        });
        return $cent;
    }

    public function get_the_part_time_employees(){
        $employees = [
            ['name' => "John" , 'department' => 'Sales', 'employment' => 'Part Time'],
            ['name' => "Jane" , 'department' => 'Marketing', 'employment' => 'Part Time'],
            ['name' => "Dave" , 'department' => 'Marketing', 'employment' => 'Salary'],
            ['name' => "Dana" , 'department' => 'Engineering', 'employment' => 'Full Time'],
            ['name' => "Beth" , 'department' => 'Marketing', 'employment' => 'Part Time'],
            ['name' => "Kyle" , 'department' => 'Engineering', 'employment' => 'Full Time'],
        ];

        $employeesName = collect($employees)->filter(function ($item){
            return $item['employment'] == 'Part Time';

            });
        return $employeesName;

    }

    public function test_get_products_in_stock(){
        $products = [
          ['product' => ' Banana' , 'stock_qty' => 12],
          ['product' => ' Milk' , 'stock_qty' => 0],
          ['product' => ' Cream' , 'stock_qty' => 34],
          ['product' => ' Sugar' , 'stock_qty' => 0],
          ['product' => ' Apple' , 'stock_qty' => 22],
          ['product' => ' bread' , 'stock_qty' => 11],
          ['product' => ' Coffee' , 'stock_qty' => 0],
        ];
        $product = collect($products)->filter(function ($data){
            return $data['stock_qty'] > 0;
        });
        return $product;
    }

    public function test_get_cities_with_more_than_120_000_people(){
        $cities = [
          ['name' => 'Kitchener','population' => 204688],
          ['name' => 'London','population' => 366150],
          ['name' => 'Woodstock','population' => 37754],
          ['name' => 'Cambridge','population' => 120375],
          ['name' => 'Milton','population' => 84362],
          ['name' => 'Guelph','population' => 114940],
        ];
        $city = collect($cities)->filter(function ($data){
            return $data['population'] > 120000;
        });
        return $city;
    }
}
