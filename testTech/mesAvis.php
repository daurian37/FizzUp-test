<?php

# Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');

# Récupération de l'auteur


# Récupération des articles

$avis = getAvis();

?>

	 <div class="p-3 mx-auto text-center">
        <h1 class="display-4">Les avis publiés sur ce site</h1>
    </div>

	<table class="table container">
  <thead>
    <tr>
      <th scope="col">Pseudo</th>
        <th scope="col">Image</th>
      <th scope="col">Email</th>
      <th scope="col">Commentaire</th>
        <th scope="col">Note</th>
        <th scope="col">Date de publication</th>
    </tr>
  </thead>

<?php 

foreach ($avis as $avi) { ?>
 
  <tbody>
    <tr>
      <th scope="row"><?= $avi['pseudo'] ?></th>

        <td>
            <img class="card-img-top" style="width:50px;"
                 src="assets/uploads/<?=$avi['image']?>"
                 alt="<?= $avi['pseudo'] ?>">
        </td>

      <td><?= $avi['email'] ?></td>

        <td><?= $avi['commentaire'] ?></td>


        <td><?= $avi['noteID'] ?></td>

        <td><?= $avi['createdAt'] ?></td>

    </tr>
    
  </tbody>


<?php
	
}


 ?> 
</table>
