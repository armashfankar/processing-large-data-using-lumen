<?php

namespace App\Jobs;

use App\Models\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class InsertAddressJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    protected $row;
    public $tries = 1;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $row)
    {
        $this->row = $row;
    }

    /**
     * Fetch row by row record of the csv and insert in the "addresses" table.
     * If pincode already existing log that pincode record as a warning in a Log file.
     * 
     * Execute the job.
     * @return void
     */
    public function handle()
    {
        $log = new Logger('InsertQueueLogs');
        $log->pushHandler(new StreamHandler('storage/logs/InsertQueueLogs.log', Logger::WARNING));

        $columns = str_getcsv($this->row, ",", "\"", "\\");

        $pincode = $columns[1];
        $existing_count = Address::select('id')->where('pincode', $pincode)->count();
        if ($existing_count > 0) {
            $log->warning("Duplicate pincode: " . $pincode);
        } else {
            Address::create($pincode,$columns);
        }
    }
}
