<h2><?php echo __('Menu', 'menu'); ?></h2>
<br />

<?php
    echo (
            Html::anchor(__('Create new item', 'menu'), 'index.php?id=menu&action=add', array('title' => __('Create new page', 'menu'), 'class' => 'btn btn-small')) 
        ); 
?>

<br /><br />

<table class="table table-bordered">
    <thead>
        <tr>
            <td><?php echo __('Name', 'menu'); ?></td>
            <td class="span2"><?php echo __('Order', 'menu'); ?></td>
            <td width="30%"><?php echo __('Actions', 'menu'); ?></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) { ?>
        <?php
            $pos = strpos($item['link'], 'http://');
            if ($pos === false) {
                $link = Option::get('siteurl').$item['link'];
            } else {
                $link = $item['link'];
            }
        ?>
        <tr>
            <td>
                <a target="_blank" href="<?php echo $link; ?>"><?php echo $item['name']; ?></a>
            </td>
            <td>
                <?php echo $item['order']; ?>
            </td>
            <td>
                <?php echo Html::anchor(__('Edit', 'menu'), 'index.php?id=menu&action=edit&item_id='.$item['id'], array('class' => 'btn btn-actions')); ?>
                <?php echo Html::anchor(__('Delete', 'menu'),
                           'index.php?id=menu&delete_item='.$item['id'],
                           array('class' => 'btn btn-actions', 'onclick' => "return confirmDelete('".__('Delete item :name', 'menu', array(':name' => $item['name']))."')"));
                 ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 