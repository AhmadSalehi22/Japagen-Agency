<body>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header">All Users Data</h5>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    if (sizeof($users) > 0) {
                        foreach ($users as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo htmlspecialchars($row->id, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row->email, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row->role, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <a type="button" href="<?php echo base_url('user/delete/' . $row->id); ?>"
                                        class="btn btn-sm btn-danger">Delete
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "No user";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>