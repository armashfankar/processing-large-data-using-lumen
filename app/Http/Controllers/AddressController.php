<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadPincodeDataJob;
use App\Models\Address;

class AddressController extends Controller
{

    /**
     * Render index page
     * URL: /
     * Method: GET
     * @return $addresses     
    */
    public function index() {
        $addresses = Address::paginate(50);
        return view("index")->with("addresses", $addresses);
    }

    /**
     * Start the data loading from csv file using queue
     * URL: /
     * Method: POST
     * @return    
    */
    public function addToQueue()
    {
        dispatch(new DownloadPincodeDataJob);
        return redirect("/");
    }
}
