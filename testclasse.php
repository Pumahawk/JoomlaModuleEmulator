<?php
    require_once 'classe.php';
	$filemanager = new JMEmulator("mod_filemanager", array("dirpartenza" => "prove"));
?>
<div class="emulatore">
    <?php 
        exit("Applicazione in pausa...");
        $filemanager -> stampa(); 
    ?>
</div>
