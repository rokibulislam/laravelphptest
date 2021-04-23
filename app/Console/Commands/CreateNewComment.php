<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateNewComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:create {id} {comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new comment for a User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $comment = $this->argument('comment');
        $id   = $this->argument('id');
        $user = User::find($id);
        
        if ( !$user ) {
            $this->error('Invalid user id provided');
            return;
        }

        if( !$comment || $comment == "") {
            $this->error('comment can\'t be empty');
            return;
        }

        $user->comments .= "\n" . $comment;
        $user->save();

        $this->info('comment created');

        return 1;
    }
}
