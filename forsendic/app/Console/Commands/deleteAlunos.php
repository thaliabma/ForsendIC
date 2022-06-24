<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class deleteAlunos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:alunos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Apaga os alunos na tabela "users" que tenham sido criados há pelo menos 20 minutos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(User::all() as $user) {
            $now = Carbon::now();
            if ($user->role_id === 2 && $now->diffInMinutes($user->created_at) >= 20) {
                $user->delete();
                echo "Usuário excluído";

            }
        }
    }
}
