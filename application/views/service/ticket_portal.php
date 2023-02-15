 <div class='container' ng-controller="ticketController" ng-init="tickets()">
 <div class="main-div">
<div class="ticket_portal">
            <h2>Add a Ticket</cmd
<?php if($this->session->flashdata('ticket-error')){?>
    <p><?php  echo $this->session->flashdata('ticket-error');?></p>  
<?php } ?>     
 <form name="myform" ng-submit="ticketadd()" >
 <span ng-show="myForm.ticket-title.$error.required">Title is required.</span>
                        <input type="text"  id="title" placeholder="Title"name="ticket-title" ng-model="tickettitle" /><br/>
                        <textarea id="ticket-detail"    placeholder="Description" name="ticket-detail" ng-model="ticketdetail"  rows="1"cols="30"maxlength="255"></textarea>
                        <!-- <label for="#file">Attachment</label>
                        <input type='file' name='file' file-model='myFile' id='file'><br/> -->
                        <!-- <input type="file" id="attachment" name="attachment" > -->
                        <input type ="submit" id="btn" name="form-submit1" value="submit" ng-click="ticketadd()">
</form>
</div>
</div>
<div class="tabular-data"ng-show="present">
   <table class="styled-table1">
    <thead>
        <tr>
            <th>Ticketid</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat='ticket in tickets'>
            <td>{{ ticket.ticketid }}</td>
            <td>{{ ticket.title }}</td>
            <td>{{ ticket.t_status }}</td> 
            <td><a href='service/view_details'>View Details</a></td>           
        </tr>
        <tr >
    </tbody>
</table>
</div>
</div>