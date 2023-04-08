<div class="RaMRwPna container-fluid d-flex justify-content-center flex-grow-1 align-items-center flex-column mt-5">
    <form method="POST" action="" class="d-flex flex-column gap-3 p-5 mb-0 rounded">
        <input type="text" name="username" id="username" placeholder="Username" class="ab">
        <input type="password" name="password" id="password" placeholder="Password" class="ab">
        <div class="d-flex flex-column gap-1">
            <a href="#" class="fBLpnJUC">Forgot password?</a>
            <button type="submit" name="login" class="ad btn btn-dark">Login</button>
        </div>
    </form>
    <br>
    <?php
    echo "<h4 class='text-light'>" . $_SESSION['message'] . "</h4>";
    $_SESSION['message'] = "";
    ?>
</div>
