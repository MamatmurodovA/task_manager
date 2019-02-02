<div class="content">
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Status</th>
        </tr>
        <?php foreach($users as $user): ?>
            <th><?php echo $user['id']; ?></th>
            <th><?php echo $user['username']; ?></th>
            <th>E-mail</th>
            <th>Status</th>
        <?php endforeach; ?>
    </table>
</div>