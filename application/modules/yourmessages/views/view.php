<h3>Your Messages</h3>
<span><?= $date_created ?></span>
<br /><br />
<a href="<?= base_url() ?>yourmessages/create/<?= $code ?>" class="btn btn-default">Reply</a>

<h2>
	<?= $subject ?>
</h2>

<p>
	<?= $message ?>
</p>