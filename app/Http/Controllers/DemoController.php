<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController
{
    // Properties
    public $name;
    public $color;

    // Methods
    function demo($name)
    {
        $this->name = $name;
    }
    function get_name()
    {
        $a = $this->name;
        // dd($a);
        return view('demo', ['dd' => $a]);
    }
}
$apple = new DemoController();
$banana = new DemoController();
$badssnana = new DemoController();
$apple->demo('Apple');
$banana->demo('Banana');
$badssnana->demo('sfh');

echo $apple->get_name();
echo $banana->get_name();
echo $badssnana->get_name();
