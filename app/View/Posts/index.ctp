<h1>Blog posts</h1>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?= $post['Post']['id']; ?></td>
        <td>
            <?php 
// $this->Html is an instance of CakePHP HtmlHelper class which in this case is used to make the title a link

// url is made in array format with controller/action/param1*/param2*

            	echo $this->Html->link($post['Post']['title'],
					array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])
				);
			?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id'])
                );
            ?>

            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
        </td>
        <td><?= $post['Post']['created_at']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>