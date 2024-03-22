<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/showcase', function () {
    return view('CSE-Showcase', [ // PLACEHOLDER
        'listings' => [
            [   
                'Team Name' => 'Sample Team',
                'YT_Link'=> 'https://www.youtube.com/embed/MYyJ4PuL4pY?si=vch-Vmz9gT0TiaUI',
                'Team Members'=> 'Jackson Wakefield, Jacob Licko',
                'Description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ],
            [   
                'Team Name' => 'Sample Team 2',
                'YT_Link'=> 'https://www.youtube.com/embed/MYyJ4PuL4pY?si=vch-Vmz9gT0TiaUI',
                'Team Members'=> 'Jackson Wakefield, Jacob Licko',
                'Description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ],
            [   
                'Team Name' => 'Sample Team 3',
                'YT_Link'=> 'https://www.youtube.com/embed/MYyJ4PuL4pY?si=vch-Vmz9gT0TiaUI',
                'Team Members'=> 'Jackson Wakefield, Jacob Licko',
                'Description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ],
            [   
                'Team Name' => 'Sample Team 4',
                'YT_Link'=> 'https://www.youtube.com/embed/MYyJ4PuL4pY?si=vch-Vmz9gT0TiaUI',
                'Team Members'=> 'Jackson Wakefield, Jacob Licko',
                'Description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ],
            [   
                'Team Name' => 'Sample Team 5',
                'YT_Link'=> 'https://www.youtube.com/embed/MYyJ4PuL4pY?si=vch-Vmz9gT0TiaUI',
                'Team Members'=> 'Jackson Wakefield, Jacob Licko',
                'Description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ]
        ]
    ]); 
});

Route::get('/seminars', function () {
    return view('welcome');
});

Route::get('/',function () {
    return view('survey');
});