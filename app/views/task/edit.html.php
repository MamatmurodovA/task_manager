<form method="post" method="post">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Username" name="username" required value="<?php echo $task->username; ?>">
        </div>
        <div class="col">
            <input type="email" class="form-control" placeholder="Email" name="email" required value="<?php echo $task->email; ?>">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1">
            <label for="status">Status:</label>
        </div>
        <div class="col-11">
            <select id="status" name="status" class="form-control">
                <option value="in_process">In process</option>
                <option value="pending">Pending</option>
                <option value="finished">Finished</option>
                <option value="closed">Closed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <textarea class="form-control" name="description" placeholder="Task description" required><?php echo $task->description; ?></textarea>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Save task</button>
</form>