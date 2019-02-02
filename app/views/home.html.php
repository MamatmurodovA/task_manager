<div class="content">
    <?php $page_num = (isset($_GET['page_num']))? 'page_num='.$_GET['page_num'].'&' : ''; ?>
    <table class="table">
        <tr>
            <th><?php echo url('Id', 'home', 'index', array('query' => $page_num.'orderby=id')); ?></th>
            <th><?php echo url('Username', 'home', 'index', array('query' => $page_num.'orderby=username')); ?></th>
            <th><?php echo url('Email', 'home', 'index', array('query' => $page_num.'orderby=email')); ?></th>
            <th><?php echo url('Status', 'home', 'index', array('query' => $page_num.'orderby=status')); ?></th>
            <?php if(isset($user) && $user->id): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
        <?php foreach($tasks as $task): ?>
            <tr>
                <td><?php echo $task['id']; ?></td>
                <td><?php echo $task['username']; ?></td>
                <td><?php echo $task['email']; ?></td>
                <td>
                    <?php if($task['status'] == 1): ?>
                        <i class="fa fa-check"></i>
                    <?php else: ?>
                        <i class="fa fa-times"></i>
                    <?php endif; ?>
                </td>
                <?php if(isset($user) && $user->id): ?>
                    <td><?php echo url('Edit', 'task', 'edit', array('query' => 'id='.$task['id'])); ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <ul class="pagination">
        <?php $query = (isset($_GET['orderby']))? 'orderby='.$_GET['orderby'].'&' : ''; ?>
        <?php if(isset($_GET['page_num']) && $_GET['page_num'] != 1): $prev_page = (int)$_GET['page_num'] - 1; ?>
            <li class="page-item">
                <?php echo url('<span aria-hidden="true">&laquo;</span>', 'home', 'index', array(
                    'class' => 'page-link', 'query' => $query.'page_num='.$prev_page)); ?>
            </li>
        <?php endif;?>
        <?php for($page = 1; $page <= $total_page_count; $page++): ?>
            <li class="page-item">
                <?php echo url($page, 'home', 'index', array('query'=>$query.'page_num='.$page, 'class' => 'page-link')); ?>
            </li>
        <?php endfor; ?>
        <?php if(isset($_GET['page_num']) && $_GET['page_num'] != $total_page_count): $next_page = (int)$_GET['page_num'] + 1; ?>
            <li class="page-item">
                <?php echo url('<span aria-hidden="true">&raquo;</span>', 'home', 'index', array(
                    'class' => 'page-link', 'query' => $query.'page_num='.$next_page)); ?>
            </li>
        <?php endif;?>
    </ul>
</nav>
</div>