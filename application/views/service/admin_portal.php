<?php
	// var_dump($all_tickets);
?>

<div class=container>

<table class="styled-table2">
    <thead>
        <tr>
            <th>Ticketid</th>
            <th>Title</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
    	<?php //var_dump($all_tickets); 
    	foreach($all_tickets as $ticket):?>
        <tr>
            <td><?php echo $ticket['ticketid'] ?></td>
            <td><?php echo $ticket['title']?></td>
			<td><?php echo $ticket['t_status']?></td>            
        </tr>
    <?php endforeach ?>
    </tbody>
</table>