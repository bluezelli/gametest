<div class="container-md">
    <?php global $detailGame ?>
    <?php global $review ?>
    <?php global $userReview ?>
    <?php global $postReview ?>
    <?php
    foreach ($detailGame as $game){
    echo "
            <div class='row'>
                <div class='col-6'>
                    <div class='card d-inline-flex mx-5 border-0' style='width:75%'>
                    <img src='/" . $game->image . "' class='rounded'>
                    <div class='card-img-overlay text-center'>
                    <h5 class='card-title text-light text-center bg-dark bg-opacity-50'>". $game->name ."</h5>
                    </div>
                </div>
                
            </div>
            ";

    echo "<div class='col-3'><h2 class='text-light'>Description</h2><br><p class='text-light'>" . $game->description . "</p>";
    echo "</div>";
    echo "<h2 class='text-light mt-5 mb-3'>reviews</h2>";
    echo "<div class='row'><div class='col-8'>";

    ?>

    <form method="post" class='border border-light p-2 my-4 text-break text-center'>
        <label><h5 class="text-light">Schrijf een review!</h5></label>
        <br>
        <table>
            <tr>
                <input type="text" name="title" value="" placeholder="Title here.." class="my-2 w-75 text-center">
            </tr>
            <tr>
                <input type="text" name="review" value="" placeholder="Review here.." class="my-3 w-75 text-center">
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit" class="btn btn-light">
    </form>
    <?php echo "<h3 class='text-light'>" . $_SESSION['message'] . "</h3>";
    $_SESSION['message'] = "";
    ?>
