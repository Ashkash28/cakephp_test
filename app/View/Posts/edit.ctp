<h1>Edit Post</h1>
<?php
echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'index'));

echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('updated_at');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>