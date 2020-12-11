<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Queue;
use Log;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobFailed;
use App\Jobs\ImportProductsJob;
use App\Models\JobTrack;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::after(function (JobProcessed $event) {
            
            switch($event->job->resolveName()){
                
                case ImportProductsJob::class:
                    $job_track = JobTrack::where('nome_job', ImportProductsJob::class)->orderBy('created_at', 'desc')->first();
                    $job_track->status = 'FINALIZADO';
                    $job_track->save();
                
                default:
                    Log::notice($event->job->resolveName());
            }
            
        });

        Queue::failing(function (JobFailed $event) {

            switch($event->job->resolveName()){
                
                case ImportProductsJob::class:
                    $job_track = JobTrack::where('nome_job', ImportProductsJob::class)->orderBy('created_at', 'desc')->first();
                    $job_track->status = 'ERRO';
                    $job_track->save();
                
                default:
                    Log::error($event->job->resolveName());
            }
            
        });
    }
}
