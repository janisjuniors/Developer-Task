<h1>E-commerce Application</h1>
<p>Technologies used:</p>
<ul>
    <li>PHP 8</li>
    <li>MySQL 8</li>
    <li>Laravel v9.19</li>
    <li>Vue.js v3.2</li>
    <li>TailwindCSS v3.1</li>
    <li>Docker v20.10</li>
</ul>
<br>
<p>Front-End User list view.</p>

![Screenshot from 2022-08-30 18-29-18](https://user-images.githubusercontent.com/104723218/187481912-a95cb80f-ca2c-4a67-a8af-b11d4901a63e.png)
<p>Front-End User detail view.</p>

![Screenshot from 2022-08-30 18-29-10](https://user-images.githubusercontent.com/104723218/187481985-3cf55b33-f5b9-4476-857b-33e090350b1a.png)



<h2>Instructions To Set Up Project With Laravel Sail</h2>


<h3>First Time Setup</h3>

<p>Clone or download the repository.</p>
<p>Install <a href="https://docs.docker.com/engine/install/">docker</a> and <a href="https://docs.docker.com/compose/install/">docker-compose</a></p>
<p>Open terminal and go into the project directory.</p>
<p>Create a copy of <code>.env.example</code> and name it <code>.env</code></p>
<p>To be able to check confirmation emails - go to <a href="https://mailtrap.io/">Mailtrap</a> and register. 
<br>Then in "My Inbox" choose Laravel 7+ integration. 
<br>Replace the old Mail variables in your .env file with given values.</p> 
<p>Run below command to download vendor folder:</p>
<pre>
docker run --rm \
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
./vendor/bin/sail up -d
./vendor/bin/sail php artisan key:generate
./vendor/bin/sail php artisan migrate
./vendor/bin/sail php artisan db:seed --class=DatabaseSeeder
./vendor/bin/sail npm install && npm run dev
</pre>

<p>After running all the above commands open <a href="http://127.0.0.1:8000/">localhost</a></p>

<p>For email to be sent to Mailtrap, in a new terminal you need to run:</p> 
<pre>./vendor/bin/sail php artisan queue:work</pre>


<h3>After First Time Setup</h3>
<pre>
./vendor/bin/sail up -d
./vendor/bin/sail npm run dev
</pre>


<p>To shut down containers:</p>
<pre>./vendor/bin/sail down</pre>

