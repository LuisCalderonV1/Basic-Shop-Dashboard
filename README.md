![logo_laravel](logo_laravel.png)
<h1>ecommerce platform made with Laravel</h1>
</hr>
<h2>Online store based on Laravel 7 + Bootstrap 4.6</h2> 
</hr>
<h3> Available functions </h3>
<ul>
     <li> Administration panel to load products </li>
     <li> Administration panel to create categories </li>
     <li> Category, image, price, offers and description for each product </li>
     <li> Login by user </li>
     <li> User roles </li>
     <li> Online catalog </li>
     <li> Inventory control </li>
     <li> Shopping cart </li>
</ul>
<h3> How to install </h3>
<ul>
    <li>Download or clone the repo and cd into it</li>
    <li>Run composer install and npm install</li>
    <li>Rename or copy .env.example file to .env</li>
    <li>Run php artisan key:generate</li>
    <li>Create a new database</li>
    <li>Set your database credentials in your .env file</li>
    <li>Import mystore.sql into your new database</li>
    <li>Set you app name in your .env file</li>
    <li>Run php artisan db:seed</li>
    <li>Access admin panel with credentials:</li>
    <ul>
        <li>e-mail: admin@store.com</li>
        <li>password: admin@store.com</li>
    </ul>
</ul>
<h3>Mailing</h3>
<ul>
    <li>Configure mail credentials at your .env file as follows:</li>
    <ul>
            <li>MAIL_MAILER=smtp</li>
            <li>MAIL_HOST=smtp.googlemail.com</li>
            <li>MAIL_PORT=465</li>
            <li>MAIL_USERNAME=your account</li>
            <li>MAIL_PASSWORD=your password</li>
            <li>MAIL_ENCRYPTION=ssl</li>
            <li>MAIL_FROM_ADDRESS=your account</li>
            <li>MAIL_FROM_NAME="${APP_NAME}"</li>
    </ul>
    <li>Uncomment the following line at frontend/CheckoutController:</li>
    <p>Mail::to($mailAddress)->send(new SendMail($details));</p>
    <li>IMPORTANT! For production purposes comment the following lines:</li>
    <p>
        'stream' => [
            'ssl' => [
                'allow_self_signed' => true,
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]
   </p> 
</ul>
