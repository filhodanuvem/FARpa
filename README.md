FARpa
==============
Project only to fun. It use PHP with active record pattern to search facebook data using 
FQl.

Requirements
-------

1. PHP5.3+
2. Facebook GraphApi (found on https://github.com/facebook/php-sdk)


TODO
-------
- Use lib GraphApi like a real dependencie.
- To code the methods getAll, save, load and any method to inner join

Configuring 
---------
- Create the app on https://developers.facebook.com/apps 
- On code, set the include_path using SplClassLoader. Look: 

    <?php
        set_include_path('/my/library' . PATH_SEPARATOR . '/path/to/lib' . PATH_SEPARATOR . get_include_path());
        require_once 'SplClassLoader.php';
        $myLoader = new \SplClassLoader();
        $myLoader->register();

- Define the app's constants like 

    <?php
        define('F_APP_ID',...);
        define('F_SECRET',...);


Using
---------

$user = new User();
$user->load(); // $user is you facebook profile 

License
===============
SimpleAnnotation    
Copyright (C) 2012 Claudson Oliveira

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
