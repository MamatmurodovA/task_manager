<form method="post" method="post">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
        </div>
        <div class="col">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <textarea class="form-control" name="description" placeholder="Task description" required></textarea>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Save task</button>
</form>