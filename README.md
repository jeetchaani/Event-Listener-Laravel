1) Create Route and Controller -> RegisterController
2) Create the event class -> php artisan make:event SendEmail
3) Create the event listener -> php artisan make:listener SendEmailListen --event=SendEmail 
and apply mail function in this listner
4)  Register the event and listener into **app/Providers/EventServiceProvider.php**
5)  Trigger the event in Controller

