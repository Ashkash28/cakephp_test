<h1><?= h($post['Post']['title']); ?></h1>

<p><small>Created: <?= $post['Post']['created_at']; ?></small></p>

<p><?= h($post['Post']['body']); ?></p>

<?php 
	echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'index'));
?>