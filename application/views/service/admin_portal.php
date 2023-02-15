
<div class=container ng-controller="adminController">
<table class="styled-table2" ng-init="alltickets()">
    <thead>
        <tr>
            <th>Ticketid</th>
            <th>Title</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="ticket in alltickets">
            <td>{{ticket.ticketid}}</td>
            <td>{{ticket.title}}</td>
			<td>{{ticket.t_status}}</td>            
        </tr>   
    </tbody>
</table>