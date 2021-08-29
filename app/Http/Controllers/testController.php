<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class testController extends Controller
{
 public function index(Request $request)
    {

            $connector = new WindowsPrintConnector($request->name);
            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            $printer -> text("hello printer");
            $printer->cut();
            /* Close printer */
            $printer -> close();


    }
}
