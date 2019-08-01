<div class="wrapper admin">
    <div class="container">
        <a class="nav-link" href="/">Home</a>
        <h1>Contact Form Admin Panel</h1>
        <div class="content">

            <?php if(is_array($data)) : ?>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Messages</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($data as $row) : ?>
                        <tr class="item" id="<?= $row['id'] ?>">
                            <td class="id"><?= $row['id'] ?></td>
                            <td class="name"><?= $row['name'] ?></td>
                            <td class="phone"><?= $row['phone'] ?></td>
                            <td class="address"><?= $row['address'] ?></td>
                            <td class="message"><?= $row['message'] ?></td>
                            <td><button class="btn btn-delete" data-itemid="<?= $row['id'] ?>">Delete</button></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php else : ?>

                <div><?= $data ?></div>

            <?php endif; ?>

        </div>
    </div>
</div>

<div class="popup">
    <div class="popup-inner">
        <div class="popup-content">
            You are about to delete a record. Are you sure?
        </div>
        <div class="btn-panel">
            <button class="btn btn-cancel">Cancel</button>
            <button class="btn btn-sure-delete">Delete</button>
        </div>
    </div>
</div>