<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DestroySecretaria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:secretaria';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Apaga a conta da Secretaria se ela já tiver sido criadas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $secretaria = User::where('email', 'secretaria@ic.ufal.br')->first();
        if ($secretaria == null) 
            echo 'A conta da Secretaria ainda não foi criada';
        else if ($secretaria->delete())
            echo 'Conta da Secretaria excluída';
        return 0;
    }
}
