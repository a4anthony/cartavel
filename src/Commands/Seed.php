<?php

namespace A4anthony\Cartavel\Commands;

use A4anthony\Cartavel\CartavelServiceProvider;
use Illuminate\Console\Command;
use A4anthony\Cartavel\Traits\Seedable;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\Process;


class Seed extends Command
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/../DummyDatabase/seeds/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cartavel:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds cart table';

    /**
     * Execute console command
     *
     *
     * @return void
     * @author Anthony Akro <anthonygakro@gmail.com> [a4anthony]
     */
    public function handle()
    {
        $this->info('Publishing dummy content');
        $tags = ['seeds'];
        $this->call('vendor:publish', ['--provider' => CartavelServiceProvider::class, '--tag' => $tags, '--force' => true]);
        $this->info('Migrating dummy tables');
        $this->call('migrate');

        $this->info('Seeding dummy data');
        $this->seed('CartDummyDatabaseSeeder');

        $this->info('Successfully installed a4anthony/coupon! Enjoy');
    }
}
