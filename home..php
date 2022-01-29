  <?php
 $url = "https://www.canalti.com.br/api/pokemons.json";

 $pokemons = json_decode(file_get_contents($url));
  
  ?>

  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumindo API</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
  </head>
  <body>
    <div class="container text-center">
     <div class="header bg-dark">
       <br>
   <h1 class="mt-3" style="color:white;">POKEMONS E SUAS EVOLUÇÕES </h1>
   <br>
     </div><!--header-->

     <?php
     if(count($pokemons->pokemon)) {
       $i = 0;
       foreach($pokemons->pokemon as $pokemon) {
         $i++;
     ?>
    <?php if($i % 3 == 1) { ?>
     <div class="columns features">
     <?php } ?>
    <div class="column is-4">
     <div class="card">
 <div class="card-image has-text-centered">
  <figure class="image is-128x128">
   <img src="<?=$pokemon->img ?>" data-target="model-image2">
  </figure>
 </div><!--card image-->

 <div class="card-content has-text-centered">
  <div class="content">
  <h4><?=$pokemon->name?></h4>
  <p>
    <ul>
      <?php 
     if(isset($pokemon->next_evolution)) {
       echo "proximas evoluções: ";
       foreach($pokemon->next_evolution as $proximaEvolucao) {
         echo $proximaEvolucao->name . " ";
       };
     } else {
       echo "Não possui próximas evoluções";
     }
      ?>
    </ul>
  </p>
  </div><!--content-->
 </div><!--card-content-->
     </div><!--card-->
    </div><!--columns is-4-->
<?php if($i % 3 == 0) { ?>
     </div><!--columns features-->
<?php }}} else { ?>
  <strong>Nenhum pokemon retornado pela API</strong>
<?php } ?>


     <div class="footer bg-dark" style=" position: fixed; bottom:0;margin-left:30%;padding-left:10%;padding-right:10%;">
       <small style="color:white;">@GabrielViccari</small>
     </div><!--footer-->
    </div><!--container-->
  </body>
  </html>