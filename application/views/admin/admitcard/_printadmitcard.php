  <style type="text/css">
    @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}

    	*{padding: 0; margin:0;}
    	body{padding: 0; margin:0; font-family: arial; color: #000; font-size: 14px; line-height: normal;}
    	.tableone{}
    	.tableone td{padding:5px 10px}
    	table.denifittable  {border: 1px solid #999;border-collapse: collapse;}
    	.denifittable th {padding: 10px 10px; font-weight: normal;  border-collapse: collapse;border-right: 1px solid #999; border-bottom: 1px solid #999;}
		.denifittable td {padding: 10px 10px; font-weight: bold;border-collapse: collapse;border-left: 1px solid #999;}

	.mark-container{
      width: 1000px;position: relative;z-index: 2; margin: 0 auto; padding: 20px 30px;}

 .tcmybg {
    background:top center;
    background-size: 100% 100%;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  z-index: 1;
}
.tablemain{position: relative;z-index: 2}

    </style>


<?php 
if(!empty($student_details)){
	foreach ($student_details as $student_key => $student_value) {
	?>


	<div class="mark-container">
	<img src="<?php echo base_url('uploads/admit_card/'.$admitcard->background_img); ?>" class="tcmybg" width="100%" height="100%" />
		<table cellpadding="0" cellspacing="0" width="100%" class="tablemain">
		  <tr>
		  	<td valign="top">
		  		<table cellpadding="0" cellspacing="0" width="100%">
		  			<tr>
		  				<td valign="top" align="center"><img src="<?php echo base_url('uploads/admit_card/'.$admitcard->left_logo); ?>" width="100" height="100"></td>
		  				<td valign="top">
		  					<table cellpadding="0" cellspacing="0" width="100%">
		  						<tr>
									<td valign="top" style="font-size: 26px; font-weight: bold; text-align: center; text-transform: uppercase; padding-top: 10px;"><?php echo $admitcard->heading; ?></td>
								</tr>
								<tr><td valign="top" height="5"></td></tr>
								<tr>
									<td valign="top" style="font-size: 20px;text-align: center; text-transform: uppercase; text-decoration: underline;">
									<?php echo $admitcard->title; ?></td>
								</tr>
		  					</table>
		  				</td>
		  				<td valign="top" align="center"><img src="<?php echo base_url('uploads/admit_card/'.$admitcard->right_logo); ?>" width="100" height="100"></td>
		  			</tr>
		  		</table>
		  	</td>
		  </tr>
		
		  <tr>
			<td valign="top" style="text-align: center; text-transform: capitalize; text-decoration: underline; font-weight: bold; padding-top: 5px;"><?php echo $admitcard->exam_name; ?></td>
		  </tr>

			<tr><td valign="top" height="10"></td></tr>
			
			<tr>
		    	<td valign="top">
				    <table cellpadding="0" cellspacing="0" width="100%" style="text-transform: uppercase;">
				    	<tr>
				    		<td valign="top">
				    			 <table cellpadding="0" cellspacing="0" width="100%" >
				    			 	<tr>
										<td valign="top" width="25%" style="padding-bottom: 10px;"><?php echo $this->lang->line('roll_no')?></td>
										<td valign="top" width="30%" style="font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->roll_no; ?></td>
										<td valign="top" width="20%" style="padding-bottom: 10px;"><?php echo $this->lang->line('admission_no')?></td>
										<td valign="top" width="25%" style="font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->admission_no; ?></td>
									</tr>
				    			 	<tr>
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('candidates')." ".$this->lang->line('name')?></td>
				    			 		<td valign="top" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->firstname." ".$student_value->lastname; ?></td>
				    			 	</tr>

				    			 	<tr>
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('d_o_b');?></td>
				    			 		<td valign="top" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->dob; ?></td>
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('gender');?></td>
				    			 		<td valign="top" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->gender; ?></td>
				    			 	</tr>

				    			 	<tr>
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('fathers')." ".$this->lang->line('name')?></td>
				    			 		<td valign="top" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->father_name; ?></td>
				    			 	
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('mothers')." ".$this->lang->line('name');?></td>
				    			 		<td valign="top" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->mother_name; ?></td>
				    			 	</tr>
				    			 	<tr>
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('address');?></td>
				    			 		<td colspan="3" valign="top" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $student_value->current_address; ?></td>
				    			 	</tr>
				    			 	<tr>
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('school_name')?></td>
				    			 		<td valign="top" colspan="3" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $admitcard->school_name; ?></td>
				    			 	</tr>
				    			 	<tr>
				    			 		<td valign="top" style="padding-bottom: 10px;"><?php echo $this->lang->line('exam')." ".$this->lang->line('center');?></td>
				    			 		<td valign="top" colspan="3" style="text-transform: uppercase; font-weight: bold;padding-bottom: 10px;"><?php echo $admitcard->exam_center; ?></td>
				    			 	</tr>
				    			 </table>
				    		</td>

				    		<td valign="top" width="25%" align="right">
				    		
				    			<img src="<?php echo base_url() . $student_value->image; ?>" width="100" height="130" style="border: 2px solid #fff;
    outline: 1px solid #000000;">
    			
				    		</td>
				    	</tr>
				    </table>
				</td>
			</tr>

		  <tr><td valign="top" height="10"></td></tr>
		  <tr>
		  	<td valign="top">
		  		<table cellpadding="0" cellspacing="0" width="100%" class="denifittable">

		  			<tr>
		  				<th valign="top" style="text-align: center; text-transform: uppercase;"><?php echo $this->lang->line('theory_exam_date_time');?></th>
		  				<th valign="top" style="text-align: center; text-transform: uppercase;"><?php  echo $this->lang->line('paper_code')?></th>
		  				<th valign="top" style="text-align: center; text-transform: uppercase;"><?php echo $this->lang->line('subject'); ?></th>
		  				<th valign="top" style="text-align: center; text-transform: uppercase;"><?php  echo $this->lang->line('obted_by_student')?></th>
		  			</tr>
<?php 


foreach ($exam_subjects as $subject_key => $subject_value) {
	?>
	<tr>
		  				<td valign="top" style="text-align: center;"><?php echo $subject_value->date_from." ". $subject_value->time_from; ?></td>
		  				<td style="text-align: center;text-transform: uppercase;"><?php echo $subject_value->subject_code; ?></td>
		  				<td style="text-align: center;text-transform: uppercase;"><?php echo $subject_value->subject_name; ?></td>
		  				<td style="text-align: center;text-transform: uppercase;"><?php echo $subject_value->subject_type; ?></td>
		  			</tr>
	<?php 

}
		  			 ?>

		  		
		  		</table>
		  	</td>
		 </tr> 	
		 <tr><td valign="top" height="5"></td></tr>	
		 <tr>
		 	<td valign="top"><?php echo $this->lang->line('important')." ".$this->lang->line('note')?>:</td>
		 </tr>
		 <tr>
		 	<td valign="top">
		 		<ol style="padding-left: 15px; padding-top: 5px; font-size: 12px; line-height: 18px;">
		 			<li>Lorem Ipsum is simply dummy text of the printing and typesetting.</li>
		 			<li>Lorem Ipsum is simply dummy text of the printing and typesetting.</li>
		 			<li>Lorem Ipsum is simply dummy text of the printing and typesetting.</li>
		 			<li>Lorem Ipsum is simply dummy text of the printing and typesetting.</li>
		 			<li>Lorem Ipsum is simply dummy text of the printing and typesetting.</li>		
		 		</ol>
		 	</td>
		 </tr>		
		 <tr><td valign="top" height="20px"></td></tr>
		 <tr>
		  	 <td align="right" valign="top">
		  	 	<table cellpadding="0" cellspacing="0" width="100%" style="text-align: center;">
		  	 		<tr>
		  	 			
		  	 			<td valign="top">
		  	 				<img src="<?php echo base_url('uploads/admit_card/'.$admitcard->sign); ?>" width="100" height="38"  />
		  	 				<p><?php  echo $this->lang->line('principal'); ?></p>
		  	 			</td>

		  	 			
		  	 		</tr>
		  	 	</table>
		  	 </td>
		  </tr>

		
		</table>
	</div>
   <div class="pagebreak"> </div> 
	<?php 
	
	}
}

 ?>