Pour démarrer le projet il faut suivre les étapes suivantes :

étape 1 : git clone https://github.com/BrandPasOn/Projet.git

étape 2 : cd Projet

étape 3 : composer install ( si l'installation échoue désactiver votre antivirus le temps de celle-ci )

étape 4 : npm i

étape 5 : php artisan key:generate

étape 6 : mettre les donnés lié a votre base de donnée 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

étape 7 : php artisan migrate

étape 8 : renseignez vos clés api dans le .env pour vous connecter a igdb 
    TWITCH_CLIENT_ID=
    TWITCH_CLIENT_SECRET=

étape 9 : php artisan serve

étape 10 : npm run dev

log admin :

email: test@test.fr
mdp = Azertyuiop12!
