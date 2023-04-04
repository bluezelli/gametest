<div class="container-md">
    <div class="row mt-5">
        <?php

        global $categories ?>
        <?php
        foreach ($categories as $category){
            echo "<div class='col-4'>
                    <div class='card d-inline-flex mx-5 my-3 overflow-hidden' style='height: 20vh; width: 30vh'>
                        <img class='img-fluid' src='/" . $category->image . "' style='width: 100%; height: 100%'>
                        <div class='card-img-overlay text-center'>
                            <h5 class='card-title text-light bg-dark bg-opacity-50 text-center' style='width: 100%'>".
                $category->name
                ."</h5>
                            <div class='align-self-baseline'>
                                <a href='$category->id' class='btn btn-dark cardButton'>Go to collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        ?>
    </div>
</div>
