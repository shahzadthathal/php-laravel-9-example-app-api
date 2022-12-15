<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;

use App\Models\User;
use App\Models\Post;

class NewsletterMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send monthly Newsletter to users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        \Log::info("Send Newsletter Cron Started: ".date("Y-m-d H:i:s"));

        $mail_from_address = 'example@web.com';

        $startDate = date("Y").'-'.(date("m")-1).'-01';
        $endDate = date("Y").'-'.(date("m")-1).'-31';

        //\Log::info("startDate ".$startDate);
        //\Log::info("endDate ".$endDate);


        $posts = Post::select('title','slug','feature_image_url','description','created_at')->whereBetween('created_at', ["$startDate", "$endDate"])->get();
        //\Log::info("Total posts found ".count($posts));
        if(count($posts)==0)
            return;

        $modelCount = User::count();
        //\Log::info("Total users found ".$modelCount);

        $page = 1;
        $limit = 2;  
        $number_of_page = ceil ($modelCount / $limit);
        for($page = 1; $page<= $number_of_page; $page++) {
        
          //  \Log::info("page ".$page);
            $offset = ($page-1) * $limit;
            // \Log::info("offset ".$offset);

            $records = Subscriber::select('email')->where(['website_id'=>$website->id,'status'=>1])->offset($offset)->limit($limit)->get();
            foreach($records as $record){
               // \Log::info("record->email: ".$record->email);

                $data = array('to'=>$record->email,'website'=>$website,"posts"=>$posts);
                Mail::send('mails.newsletter', $data, function($message) use($record,$mail_from_address) {
                   $message->to($record->email, $website_name)->subject
                      ($website_name.' '.date("F Y").' Newsletter');
                   $message->from($mail_from_address,$website_name);
                });

            }
            //\Log::info("Sleeping for 1 seconds ");
            //\Log::info("-------------------------");
            sleep(1);//sleep for 1 seconds

        }

        \Log::info("Send Newsletter Cron Finished: ".date("Y-m-d H:i:s"));


    }
}
