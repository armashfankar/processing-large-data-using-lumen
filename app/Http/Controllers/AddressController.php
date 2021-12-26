<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadPincodeDataJob;
use App\Models\Address;

class AddressController extends Controller
{

    public function index() {
        $addresses = Address::paginate(100);
        return view("index")->with("addresses", $addresses);
    }

    public function addToQueue()
    {
        dispatch(new DownloadPincodeDataJob);
        return redirect("/");
    }
}
