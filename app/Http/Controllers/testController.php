<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rawilk\Printing\Facades\Printing;

class testController extends Controller
{
 public function index(){


        $printers = Printing::printers();
        return $printers;





    }
}
