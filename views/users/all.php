<table>
    <thead>
    <td><strong>id</strong></td>
    <td><strong>nickname</strong></td>
    <td><strong>password</strong></td>
    <td><strong>about</strong></td>
    </thead>
<?php foreach($items as $item): ?>
<tr>
    <td><?php echo $item->id; ?></td>
    <td><?php echo $item->nickname; ?></td>
    <td><?php echo $item->password; ?></td>
    <td><?php echo $item->about; ?></td>
</tr>
<?php endforeach; ?>
</table>