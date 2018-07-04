<style>
 div.collapse{
    border-bottom: 6px solid black;
    background-color: White;
     line-height: 200%;
}

button{

align:right;


}

</style>
<div class="container content">
  <h2>Ticket Details</h2>  <input type="button" onclick="window.history.back();" style="float: right;" value="Back">

    
  
  <div>

      <p> <strong>Refrence no. : </strong> <?php echo $demo[0]['ticket'];?></p>
 		<p> <strong> Client ID : </strong><?php echo $demos[0]['client']; ?>
       	        <p> <strong> Status of the ticket : </strong> <?php $stat= $demo[0]['status'];
       		if($stat==1){
       		echo "Open";
       		}elseif($stat==2){
       		echo "Queued";
       		
       		}elseif($stat==3){
       		
       		echo "Resolved";
       		}
       		
       		?> </p>
      
  
  </div>
  <div class="panel-group" id="accordion">
  <?php foreach ($demo as $key=>$details){?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title" style="">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key;?>">
  <?php echo ($details['type']==1?"Client":"Agent(".$details['agent'].")");
        echo  " to ";
        echo  ($details['type']==1?"Agent(".$details['agent'].")":"Client");
   ?>
       <span  class="pull-right"><?php echo $details['date']; ?></span>
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $key;?>" class="panel-collapse collapse<?php if($key==0){
    echo 'in';}?>">
      <div class="panel-body">
        	<p> <strong> Message : </strong> <?php $text =$details['text'];
        	if($text==NULL){
        	echo "No message found.";                   
        	}else
        	{
        	    echo $text;
        	}?></p>
       		
       		
      </div>
    </div>
  </div>
  <?php }?>
  </div>
  <?php // print_r($_SESSION['id']);
  
  
  if($_SESSION['id']==$details['agent']){?>
  
  <form method="post" action="<?php echo base_url()?>tickets/update">
  <div>
  <input type="text" name='agent' value="<?php echo $details['agent'];?>" hidden/>
  <input type="text" name='ticket' value="<?php echo$details['ticket'];?>" hidden/>
  <input type="text" name='status' value="<?php echo $details['status']?>" hidden/>
  

   <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="text"></textarea>
   <br><br>
   <button type="submit">Reply</button> 
  </div>
  </form>
  <?php }?>
</div>

<script>


</script>



