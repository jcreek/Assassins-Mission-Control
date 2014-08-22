<?php
//rename the addresses-not-released file to addresses-released
rename("addresses-not-released","addresses-released");
?>
<?php include "return-to-admin-page.php"; ?>