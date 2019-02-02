<div class="content">
    <table class="table">
        <tr>
            <th>Id</th>
            <th><?php echo url('Username', 'home', 'index', array('query' => 'orderby=username')); ?></th>
            <th><?php echo url('Email', 'home', 'index', array('query' => 'orderby=email')); ?></th>
            <th><?php echo url('Status', 'home', 'index', array('query' => 'orderby=status')); ?></th>
        </tr>
        <?php foreach($tasks as $task): ?>
            <th><?php echo $task['id']; ?></th>
            <th><?php echo $task['username']; ?></th>
            <th>E-mail</th>
            <th>Status</th>
        <?php endforeach; ?>
    </table>
</div>