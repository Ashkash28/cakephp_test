<h1>Add Post</h1>
<?php
echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'index'));

echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('created_at');
echo $this->Form->end('Save Post');
?>