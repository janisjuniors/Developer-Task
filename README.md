<p>Technologies used</p>
<ul>
    <li>PHP</li>
    <li>MySQL</li>
    <li>Laravel</li>
    <li>Vue.js</li>
    <li>TailwindCSS</li>
    <li>Docker</li>
</ul>

<h2>Instructions To Set Up Project With Laravel Sail</h2>


<h3>First Time Setup</h3>

<p>Install <a href="https://docs.docker.com/engine/install/">docker</a> and <a href="https://docs.docker.com/compose/install/">docker-compose</a></p>
<p>Open terminal and go into the project directory.</p>
<p>Create a copy of <code>.env.example</code> file and rename it to <code>.env</code></p>
<p>To be able to check confirmation emails - go to <a href="https://mailtrap.io/">Mailtrap</a> and register. 
<br>Then in "My Inbox" choose Laravel 7+ integration. 
<br>Replace the old Mail variables in your .env file with given values.</p> 
<p>Run below command to download vendor folder:</p>
<pre>
sudo docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
</pre>

<p>Run these commands to create, start and setup containers. 
<br>Run them one by one.
</p>
<pre>
sudo ./vendor/bin/sail up -d
sudo ./vendor/bin/sail php artisan key:generate
sudo ./vendor/bin/sail php artisan migrate
sudo ./vendor/bin/sail php artisan db:seed --class=DatabaseSeeder
sudo ./vendor/bin/sail npm install && npm run dev
</pre>

<p>After running all the above commands open <a href="http://127.0.0.1:8000/">localhost</a></p>

<p>For email to be sent to Mailtrap, in a new terminal you need to run:</p> 
<pre>sudo ./vendor/bin/sail php artisan queue:work</pre>


<h3>After First Time Setup</h3>
<pre>
sudo ./vendor/bin/sail up -d
sudo ./vendor/bin/sail npm run dev
</pre>


<p>To shut down containers:</p>
<pre>sudo ./vendor/bin/sail down</pre>

