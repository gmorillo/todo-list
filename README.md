primer paso para que el proyecto funcione se debe hacer lo siguiente:

# ###################################################################################
#              Se debe crear la base de datos (mysql) para poder hacer 
#              las migraciones pertinentes, esta debe tener el nombre de "todolist"
# ###################################################################################


# Es importante el uso de APIs para hacer tener un mejor control de rendimiento de la aplicación, debido a esto las rutas para ahcer el CRUD se usaron mediante APIs para acortar la consultas al servidor.



# Una vez creada la base de datos, procedemos a la migración de las tablas.
# La tabla "categories" se alimentará automáticamente mediante el seeder creado

1.  php artisan migrate:refresh --seed

