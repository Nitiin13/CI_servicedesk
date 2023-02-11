 <div class='container'>
 <div class="main-div">
            <h2>Add a Ticket</h2>
            <!--  -->
            <?php echo validation_errors();?>
            <?php echo form_open_multipart('service/ticket_add');?>
            <!--  <form id="ticketform" onsubmit="return myfunction()" autocomplete="off"method="post" enctype="multipart/form-data" action="? -->
            <?php if($this->session->flashdata('ticket-error')){?>
<p style="color:red"><?php  echo $this->session->flashdata('ticket-error');?></p>  
<?php } ?>     
            <label for="#title">Title</label>
                        <input type="text" id="title" placeholder="Title "name="ticket-title"  /><br/>
                        <label for="#desc">Description</label>
                        <textarea id="ticket-detail"   placeholder="Description" name="ticket-detail"   rows="1"cols="30"maxlength="255"></textarea>
                        <label for="#myfile">Attachment</label>
                        <input type="file" id="attachment" name="attachment">
                        <button id="btn" name="form-submit" >Submit</button>
           </form>
</div>

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
       <?php if($tickets){?>
       <?php foreach($tickets as $ticket):?>
        <tr>
            <td><?php echo $ticket['ticketid'] ?></td>
            <td><?php echo $ticket['title']?></td>
            <td><?php echo $ticket['t_status']?></td> 
            <td><a href='service/view_details'>View Details</a></td>           
        </tr>
    <?php endforeach ?>
    <?php
}else {
?>
<?php 

    ?>
            <tr>
            <td>NO tickets submitted</td>           
        </tr>
    <?php
     } 
     ?>
    </tbody>
</table>
</div>
</div>
<!-- <div id="modal">
            <div class="modal-content">
                <h1>Here's What we Got!</h1> -->
            <!-- <p id="text"></p> -->
            <!-- <p id ="details"></p> -->
            <!-- <p id="json-details"></p> -->
            <!-- <<p id="asawait-demo"></p> --> 
          <!--   </div> 
        </div>
    </div> 
   <script> -->
      <!--  var modal=document.getElementById("modal");
    //     var btn=document.getElementById("btn");
    //     var title=document.getElementById("title");
    //     var desc=document.getElementById("ticket-detail");
        
   
    //     function myfunction(){
            
    //         if(title.value=="" && desc.value=="")
    //         {
    //             alert("form cannot be empty");
    //         }
    //         else if(title.value=="" )
    //         {
    //             alert("title cannot be empty");
    //         }
    //         else if(desc.value=="")
    //         {
    //             alert("desc cannot be empty");
    //         }
    //         else{
               
    //         modal.style.display="flex";
            
    //       let out1= title.value;
    //       let out2=desc.value;
          
    //       document.getElementById('text').innerHTML=out1;
    //     document.getElementById('details').innerHTML=out2;
        
    //     window.onclick=function(event){
    //         if(event.target==modal){
    //             modal.style.display="none";
               
    //         }
        
           
    //         }
    //     }
    // } -->
    
    <!-- </script>   --> 