<!DOCTYPE html>
<html>
    
<head>
   <title>NIMR PUBLICATIONS</title>


</head>

<body>

  <div class="container">

      
          
     <table class="table table-bordered table-striped" >
     	
     	<tr><th colspan="5"><center><b>PUBLICATIONS DATABASE REPORT</b></center></th></tr>
     	 <tr> <th colspan="5"><center>REPORTS SHOW OVERALL  SUMMARY OF PUBLICATIONS UPLOADED</center></th></tr> 
	
		<tr>
			<th></th>
			<th colspan="4">TITLE</th>
		</tr>
		@foreach ($pubs as $key => $item)
		<tr>
			
			
			<td>{{ ++$key }}</td>
			 <td colspan="4">{{$item->title}}</td>
            </tr>
 @endforeach
				
		
	</table>            
</table>
       </div>






</div>
</div>

</body>
</html>



<html>



	<br/>
	


	
</div>

</div>

</html>
