<div class="w3-display-bottomright w3-round-xlarge <?php if (!$context->notif) echo "w3-green"; else echo "w3-red"; ?>">
    <?php if($context->notif) echo "succes"; else echo $context->notifMsg; ?>
</div>