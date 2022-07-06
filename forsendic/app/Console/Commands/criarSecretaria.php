<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class criarSecretaria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:secretaria';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se a conta da Secretaria ainda não existir, ela será criada';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $secretaria = User::where('email', 'secretaria@ic.ufal.br')->first();
        if ($secretaria == null) {
            $senha = readline('Defina a senha da Secretaria (min: 6): ');
            while (strlen($senha) < 6) {
                $senha = readline('Defina a senha da Secretaria: ');
            }
    
            $novo = [
                'name' => 'Secretaria',
                'email' => 'secretaria@ic.ufal.br',
                'password' => bcrypt($senha),
                'role_id' => 1
            ];
    
            if (User::create($novo))
                echo 'Secretaria criada com sucesso';
        }
        else
            echo 'Conta da Secretaria já existe';

        return 0;
    }
}
