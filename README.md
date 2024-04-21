route (index.php) ---> Controller ----> Service ----> Model

Model retourne une variable PHP, soit un array ou bien un model (Post par exemple)

Dans le service, apres avoir recuperer les donnees du model, fait include '' pour le fichier View. Et dans le fichier view, tu peux utiliser la variable PHP qui est cree dans le service deja.


Rabbi m3aaak
