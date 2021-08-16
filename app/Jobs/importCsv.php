<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;

class importCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
protected  $fileName;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $csv = Reader::createFromPath(storage_path('app/products/temp/' . $this->fileName), 'r');
        $csv->setHeaderOffset(0);
        foreach ($csv as $row) {
            Product::create([
                'description' => $row['nome'],
                'quantity' => $row['quantidade'],
                'amount' => $row['valor']
            ]);
        }
        File::delete(storage_path('app/products/temp/' . $this->filename));
    }
}
