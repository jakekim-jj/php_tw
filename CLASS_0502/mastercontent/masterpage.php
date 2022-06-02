<?php
    include('./header.php');
?>
<main>
    <?php
        if(isset($_GET['p'])){
            switch($_GET['p']){
                case "home":
                    include ('./pages/home.php');
                break;
                case "about":
                    include('./pages/about.php');
                    break;
            }
        }else{
            include ('./pages/home.php');
        }
    ?>
</main>
<?php
    include('./footer.php');
?>