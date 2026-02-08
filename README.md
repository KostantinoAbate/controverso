# Controverso
[controverso.it](https://controverso.it) repo

## Init

```bash
    git clone git@github.com:KostantinoAbate/controverso.git
    
    cd controverso
    docker-compose build
    docker-compose up -d
    docker exec -it controverso-app bash
    
    composer install
    php artisan key:generate
    php artisan storage:link
    php artisan migrate:fresh --seed
    
    npm i
```