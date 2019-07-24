<?php 
require_once("includes/header.php");
require_once("includes/classes/videoDetailsFormProvider.php");
?>
                    
    <div class="column">
        <?php
        $formProvider = new videoDetailsFormProvider($con);
        echo $formProvider->createUploadForms();

        ?>
    </div>


<?php require_once("includes/footer.php"); ?>
