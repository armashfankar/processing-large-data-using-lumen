<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DownloadPincodeDataJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Read the "all_india_pin_code.csv" file row by row
     * using curl request and then insert each row in a queue. 
     * 
     * Execute the job.
     * @return void
     */
    public function handle()
    {
        $url = 'https://data.gov.in/sites/default/files/all_india_pin_code.csv';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $result = curl_exec($curl);
        curl_close($curl);
        if ($result === false) {
            throw curl_error($curl);
        } else {
            $rows = explode("\n", $result);
            foreach ($rows as $rowNumber => $row) {
                // 1st row will be header. Skipping it
                if($rowNumber > 0) {
                    $job = (new InsertAddressJob($row))->onQueue('insertQueue');
                    dispatch($job);
                }
            }
        }
    }
}
