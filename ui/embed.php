<?php
$protocol = Cohesionet_BuddyShopping::PROTOCOL;
$hostName = Cohesionet_BuddyShopping::HOSTNAME;
$accountID= get_option("accountID");
?>
<!-- Cohesionet ShopConnect Script -->
 <script type="text/javascript" async="" src='<?php echo $protocol ?>://<?php echo $hostName ?>/web/loadAddOn?co_hoststoreid=<?php echo $accountID ?>'> </script>
 
