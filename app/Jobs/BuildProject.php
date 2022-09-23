<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BuildProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //https://symfony.com/doc/current/components/process.html

        $images = '';
        foreach ($this->data['images'] as $key => $image) {
            $images .= $image;
        }

        $title = Str::replace(' ', '_', $this->data['title']);

        $build_process = new Process(
            ['sh', storage_path() . '/app/base-build/build.sh'],
            null,
            [
                'PROJECT_NAME' => $title,
                'FILE_NAME' => $this->data['file_name'],
                'COMPONENT_PAGES' => $this->data['pages'],
                'IMAGES' => $images
            ]
        );
        $build_process->setWorkingDirectory(
            storage_path() . '/app/base-build/'
        );

        $build_process->run();
        if (!$build_process->isSuccessful()) {
            throw new ProcessFailedException($build_process);
        }

        //Log::info($build_process->getOutput());
    }
}
