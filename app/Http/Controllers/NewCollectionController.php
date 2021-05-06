<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class NewCollectionController extends Controller
{
    public function MarketingEmployeeEmail(){
        $employees = collect([
            ['name' => 'John', 'department' => 'Sales', 'email' => 'john3@example.com'],
            ['name' => 'Jane', 'department' => 'Marketing', 'email' => 'jane8@example.com'],
            ['name' => 'Dave', 'department' => 'Marketing', 'email' => 'dave1@example.com'],
            ['name' => 'Dana', 'department' => 'Engineering', 'email' => 'dana8@example.com'],
            ['name' => 'Beth', 'department' => 'Marketing', 'email' => 'beth4@example.com'],
            ['name' => 'Kyle', 'department' => 'Engineering', 'email' => 'kyle8@example.com'],
        ]);

        /*return collect($employees)->filter(function ($item){
           return $item['department'] == 'Marketing';
        })->map(function ($data){
            return $data['email'];
        });*/

        return collect($employees)->filter(function ($item){
            return $item['department'] == 'Marketing';
        })->pluck('email');
//        $this->assertEquals([
//            'jane8@example.com',
//            'dave1@example.com',
//            'beth4@example.com',
//        ], $emails->all());
    }

    public function shoppingCart(){
        $shoppingCart = collect([
            ['product' => 'Banana',  'unit_price' => 79,   'quantity' => 3],
            ['product' => 'Milk',    'unit_price' => 499,  'quantity' => 1],
            ['product' => 'Cream',   'unit_price' => 599,  'quantity' => 2],
            ['product' => 'Sugar',   'unit_price' => 249,  'quantity' => 1],
            ['product' => 'Apple',   'unit_price' => 76,   'quantity' => 6],
            ['product' => 'Bread',   'unit_price' => 229,  'quantity' => 2],
        ]);

        $collection =  collect($shoppingCart)->map(function ($item){
            return $item['unit_price'] * $item['quantity'];
        })->sum();

        return ['sum' => $collection];
//        $this->assertEquals(3097, $totalPrice);
    }

    public function getDayFromDate(){
        $employees = collect([
            ['name' => 'John',  'department' => 'Sales',        'date_of_birth' => '1988-07-11'],
            ['name' => 'Jane',  'department' => 'Marketing',    'date_of_birth' => '1981-09-06'],
            ['name' => 'Dave',  'department' => 'Marketing',    'date_of_birth' => '1986-05-08'],
            ['name' => 'Dana',  'department' => 'Engineering',  'date_of_birth' => '1976-09-26'],
            ['name' => 'Beth',  'department' => 'Marketing',    'date_of_birth' => '1977-03-09'],
            ['name' => 'Kyle',  'department' => 'Engineering',  'date_of_birth' => '1990-02-28'],
            ['name' => 'Steve', 'department' => 'Sales',        'date_of_birth' => '1980-12-01'],
            ['name' => 'Liz',   'department' => 'Engineering',  'date_of_birth' => '1976-07-06'],
            ['name' => 'Joe',   'department' => 'Marketing',    'date_of_birth' => '1978-06-13'],
        ]);

        $day = "Monday";

//        return $employees->filter(function ($employee) use ($day){
//            return (new DateTime($employee['date_of_birth']))->format('l') == $day;
//        })->values();

        return $employees->map(function ($item){
            $item['Day'] = (new DateTime($item['date_of_birth']))->format('l');
            return $item;
        })->groupBy('Day');


//        $this->assertEquals([
//            ['name' => 'Jane',  'department' => 'Marketing',    'date_of_birth' => '1981-09-06'],
//            ['name' => 'Dana',  'department' => 'Engineering',  'date_of_birth' => '1976-09-26'],
//        ], $this->employeesBornOn($employees, 'Sunday')->all());
//        $this->assertEquals([
//            ['name' => 'John',  'department' => 'Sales',        'date_of_birth' => '1988-07-11'],
//            ['name' => 'Steve', 'department' => 'Sales',        'date_of_birth' => '1980-12-01'],
//        ], $this->employeesBornOn($employees, 'Monday')->all());
//        $this->assertEquals([
//            ['name' => 'Liz',   'department' => 'Engineering',  'date_of_birth' => '1976-07-06'],
//            ['name' => 'Joe',   'department' => 'Marketing',    'date_of_birth' => '1978-06-13'],
//        ], $this->employeesBornOn($employees, 'Tuesday')->all());
//        $this->assertEquals([
//            ['name' => 'Beth',  'department' => 'Marketing',    'date_of_birth' => '1977-03-09'],
//            ['name' => 'Kyle',  'department' => 'Engineering',  'date_of_birth' => '1990-02-28'],
//        ], $this->employeesBornOn($employees, 'Wednesday')->all());
//        $this->assertEquals([
//            ['name' => 'Dave',  'department' => 'Marketing',    'date_of_birth' => '1986-05-08'],
//        ], $this->employeesBornOn($employees, 'Thursday')->all());
//        $this->assertEquals([], $this->employeesBornOn($employees, 'Friday')->all());
//        $this->assertEquals([], $this->employeesBornOn($employees, 'Saturday')->all());
    }

    public function countDepartmentsEmployee(){
        $employees = collect([
            ['name' => 'John',  'department' => 'Sales',        'email' => 'john3@example.com'],
            ['name' => 'Jane',  'department' => 'Marketing',    'email' => 'jane8@example.com'],
            ['name' => 'Dave',  'department' => 'Marketing',    'email' => 'dave1@example.com'],
            ['name' => 'Dana',  'department' => 'Engineering',  'email' => 'dana8@example.com'],
            ['name' => 'Beth',  'department' => 'Marketing',    'email' => 'beth4@example.com'],
            ['name' => 'Kyle',  'department' => 'Engineering',  'email' => 'kyle8@example.com'],
            ['name' => 'Steve', 'department' => 'Sales',        'email' => 'steve7@example.com'],
            ['name' => 'Liz',   'department' => 'Engineering',  'email' => 'liz6@example.com'],
            ['name' => 'Joe',   'department' => 'Marketing',    'email' => 'joe5@example.com'],
        ]);

        return collect($employees)->groupBy('department')->map(function ($employee) {
            return $employee->count();
        });

        /*$this->assertEquals([
            'Sales' => 2,
            'Marketing' => 4,
            'Engineering' => 3,
        ], $departmentCounts->all());*/
    }

    public function countCommentsFor(){
        $posts = collect([
            [
                'title' => "Tips for Testing Emails in Laravel",
                'comments' => [
                    ['user' => 'Jane Smith', 'message' => "Very helpful!"],
                    ['user' => 'Bob Jones', 'message' => "Great post!"],
                    ['user' => 'Bob Jones', 'message' => "By the way, any tips for testing ElasticSearch?"],
                ],
            ],
            [
                'title' => "Testing ElasticSearch Queries",
                'comments' => [
                    ['user' => 'Bob Jones', 'message' => "Perfect, just what I needed!"],
                    ['user' => 'Kyle Johnson', 'message' => "You are seriously running ElasticSearch on your Mac and not a VM?"],
                    ['user' => 'Dana Smith', 'message' => "Would this work with Algolia?"],
                ],
            ],
            [
                'title' => "New Features in PHPUnit 5",
                'comments' => [
                    ['user' => 'Kyle Johnson', 'message' => "You should be using PHPSpec, you don't know what you're doing."],
                ],
            ],
            [
                'title' => "Using Factories to Clean up Your Tests",
                'comments' => [
                    ['user' => 'Dana Smith', 'message' => "When do you use factories instead of fixtures?"],
                    ['user' => 'Kyle Johnson', 'message' => "Your tests should never hit the database to begin with."],
                ],
            ],
            [
                'title' => "Refactoring Your Test Suite",
                'comments' => [
                    ['user' => 'Bob Jones', 'message' => "I had never thought to create my own assertions, awesome!"],
                    ['user' => 'Dana Smith', 'message' => "Never used spies before, very cool!"],
                ],
            ]
        ]);

        $data['countDanaSmith'] = $this->commentCount($posts, 'Dana Smith');
        $data['countBobJones'] = $this->commentCount($posts, 'Bob Jones');
        $data['countKyleJohnson'] = $this->commentCount($posts, 'Kyle Johnson');
        $data['countJaneSmith'] =$this->commentCount($posts, 'Jane Smith');
        return $data;
//        $grouped = $posts->map(function ($item) {
//            return collect($item['comments'])->countBy(function ($item){
//                return $item['user'];
//            });
//        });
//
//        return collect($grouped);





       /* $this->assertEquals(1, $this->countCommentsFor($posts, 'Jane Smith'));
        $this->assertEquals(4, $this->countCommentsFor($posts, 'Bob Jones'));
        $this->assertEquals(3, $this->countCommentsFor($posts, 'Kyle Johnson'));
        $this->assertEquals(3, $this->countCommentsFor($posts, 'Dana Smith'));*/
    }

    private function commentCount($posts , $user)
    {
        return $posts->pluck('comments')->flatten(1)->filter(function ($comment) use ($user){
            return $comment['user'] == $user;
        })->count();

    }
}
