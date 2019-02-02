<div class="content">
    <table class="table">
        <tr>
            <th>Id</th>
            <th><?php echo url('Username', 'home', 'index', array('query' => 'orderby=username')); ?></th>
            <th><?php echo url('Email', 'home', 'index', array('query' => 'orderby=email')); ?></th>
            <th><?php echo url('Status', 'home', 'index', array('query' => 'orderby=status')); ?></th>
            <?php if(isset($user) && $user->id): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
        <?php foreach($tasks as $task): ?>
            <tr>
                <td><?php echo $task['id']; ?></td>
                <td><?php echo $task['username']; ?></td>
                <td><?php echo $task['email']; ?></td>
                <td><?php echo $task['status']; ?></td>
                <?php if(isset($user) && $user->id): ?>
                    <td><?php echo url('Edit', 'task', 'edit', array('query' => 'id='.$task['id'])); ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>