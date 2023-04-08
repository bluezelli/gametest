<div class="container-md">
    <div class="row">
        <?php global $games ?>
<?php
foreach ($games as $game){
    echo "
            <div class='d-inline-flex mx-5 my-2' style='width:25%'>
                <img src='/" . $game->image . "' alt='/" . $game->image . "'>
                <div class='text-center'>
                    <h5 class='card-title text-light text-center'>".
        $game->name
        ."</h5>
                    <a href='$game->name' class='btn btn-dark cardButton'>Go to game details</a>
                </div>
            </div>
            ";
}
?>