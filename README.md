<h3>Event Listener In Laravel</h3>
1) Create Route and Controller -> RegisterController
2) Create the event class -> php artisan make:event SendEmail
<code>
     public $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }
</code>
3) Create the event listener -> php artisan make:listener SendEmailListen --event=SendEmail 
<code>
     public function handle(SendMail $event): void
    {
        //get id and get data of that id and send mail to that user
        $user = User::find($event->userId)->toArray();
        Mail::send('welcome',$user,function($message) use($user){
            $message->to($user['email']);
            $message->subject('Test Subject');
        } );
    }
</code>
and apply mail function in this listner
4)  Register the event and listener into **app/Providers/EventServiceProvider.php**
<code>
     SendMail::class =>[
            SendMailListen::class, 
        ],
</code>
5)  Trigger the event in Controller
<code>
     event(new SendMail($user->id));
</code>

