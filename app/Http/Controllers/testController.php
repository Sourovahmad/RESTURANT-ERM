<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class testController extends Controller
{
 public function index()
    {



            $connector = new WindowsPrintConnector("EPSON L380 Series");

            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            $printer -> text("hello my name is khan");
            $printer->cut();


            /* Close printer */
            $printer -> close();



    }
}
