<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/s-favican.png">
	<meta http-equiv="X-UA-Compatible" content="" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="theme-color" content="" />
    <style type="text/css">
    	*{padding: 0; margin:0;}
    	body{padding: 0; margin:0; font-family: arial; color: #000; font-size: 14px; line-height: normal;}
    	.tableone{}
    	.tableone td{border:1px solid #000; padding: 5px 0}
    	.denifittable th{border-top: 1px solid #999;}
    	.denifittable th,
    	.denifittable td {border-bottom: 1px solid #999;
    	 border-collapse: collapse;border-left: 1px solid #999;}
    	.denifittable tr th {padding: 10px 10px; font-weight: normal;}
		.denifittable tr td {padding: 10px 10px; font-weight: bold;}

    </style>
</head>
<body>
	<div style="width: 1000px; margin: 0 auto; border:1px solid #000; padding: 10px 5px 5px">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td valign="top">
				   <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top" style="font-size: 42px; font-weight: bold; text-align: center;"><?php echo $marksheet->heading; ?></td>
                                            </tr>

                                            <tr>
                                                <td valign="top" style="font-size: 20px; font-weight: 900; text-align: center; text-transform: uppercase;"><?php echo $marksheet->title; ?></td>
                                            </tr>
                                            <tr><td valign="top" height="5"></td></tr>
                                        </table>
			</td>
		  </tr>
		  <tr>
		  	<td valign="top">
		  	     <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top" align="center"><img src="<?php echo base_url('uploads/marksheet/' . $marksheet->left_logo); ?>" width="100" height="100"> </td>
                                                <td valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">

                                                        <tr>
                                                            <td valign="top" style="font-size: 20px; font-weight: bold; text-align: center; text-transform: uppercase;">
                                                                <?php echo $marksheet->exam_name; ?></td>
                                                        </tr>
                                                        <tr><td valign="top" height="5"></td></tr>
                                                        <tr><td style="text-align: center; font-weight: bold" valign="top">2021</td></tr>
                                                       
                                                    </table>
                                                </td>
                                                <td valign="top" align="center"><img src="<?php echo base_url('uploads/marksheet/' . $marksheet->left_logo); ?>" width="100" height="100"></td>
                                            </tr>
                                        </table>
		  	</td>
		  </tr>
		  <tr>
		  	<td valign="top">
		  		<table cellpadding="0" cellspacing="0" width="100%" class="">
		  			<tr>
		  				<td valign="top">
		  					<table cellpadding="0" cellspacing="0" width="98%" class="denifittable">
		  		               <tr>

                                                            <th valign="top" style="text-align: center; text-transform: uppercase;">
                                                                <?php echo $this->lang->line('admission_no')?></th>

                                                            <th valign="top" style="text-align: center; text-transform: uppercase; border-right:1px solid #999"><?php echo $this->lang->line('roll_no')?></th>
                                                        </tr>
                                                        <tr>

                                                            <td valign="" style="text-transform: uppercase;text-align: center;">XXXXXX</td>
                                                            <td valign="" style="text-transform: uppercase;text-align: center;border-right:1px solid #999">XXXXXX</td>
                                                        </tr>

		  			<tr>
		  				<td valign="top" colspan="5" style="text-align: center; text-transform: uppercase; border:0">
		  					
		  				<?php echo $this->lang->line('certificated_that')?></td>
		  			</tr>
		  		</table>
		  				</td>
		  				<td valign="top" align="center"><img src="<?php echo base_url('uploads/student_images/no_image.png'); ?>" width="100" height="100" /></td>
		  			</tr>
		  		
		  		</table>
		  	</td>
		  </tr>
		  <tr>
		  	<td valign="top">
		  		<table cellpadding="0" cellspacing="0" width="100%" class="">
		  			<tr>
		  				<td valign="top" style="text-transform: uppercase; padding-bottom: 15px;"><?php echo $this->lang->line('name_prefix');?><span style="padding-left: 30px; font-weight: bold;">Reeta singh</span></td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-transform: uppercase; padding-bottom: 15px;"> <?php  echo $this->lang->line('marksheet_father_name')?><span style="padding-left: 30px; font-weight: bold;">Mangu singh</span></td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-transform: uppercase; padding-bottom: 15px;"> <?php echo $this->lang->line('exam_mother_name');?><span style="padding-left: 30px; font-weight: bold;">sombati singh</span></td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-transform: uppercase; padding-bottom: 15px; line-height: normal;"> <?php echo $this->lang->line('marksheet_body_text')?> :-</td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-transform: uppercase; padding-top: 15px; padding-bottom: 20px;" ><?php echo $this->lang->line('exam')." ".$this->lang->line('center')?><span style="text-transform: uppercase; padding-top: 15px; font-weight: bold; padding-bottom: 20px; padding-left: 30px;"><?php echo $this->lang->line('name_prefix');?><?php echo $marksheet->exam_center; ?></span></td>
		  			</tr>
		  		</table>
		  	</td>
		  </tr>
		  <tr>
		  	<td valign="top">
		  		<table cellpadding="0" cellspacing="0" width="100%" class="denifittable" style="text-align: center; text-transform: uppercase;">
		  			<tr>
		  				<th valign="middle" width="35%"><?php echo $this->lang->line('subjects')?></th>
		  				<th valign="middle"><?php echo $this->lang->line('max')." ".$this->lang->line('marks')?></th>
		  				<th valign="middle"><?php echo $this->lang->line('min')." ".$this->lang->line('marks')?></th>
		  				<th valign="top"><?php echo $this->lang->line('marks')." ".$this->lang->line('obtained')?></th>
		  				<th valign="middle" style="border-right:1px solid #999"><?php echo $this->lang->line('remarks')?></th>
		  			</tr>
		  		
		  			<tr>
		  				<td valign="top" style="text-align: left;">Hindi [special]</td>
		  				<td valign="top">100</td>
		  				<td valign="top">33</td>
		  				<td valign="top" style="text-align: left;">085</td>
		  				<td valign="top" style="text-align: left;border-right:1px solid #999">Distin</td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-align: left;">English [General]</td>
		  				<td valign="top">100</td>
		  				<td valign="top">33</td>
		  				<td valign="top" style="text-align: left;">051</td>
		  				<td valign="top" style="text-align: left;border-right:1px solid #999"></td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-align: left;">Physics</td>
		  				<td valign="top">100</td>
		  				<td valign="top">25</td>
		  				<td valign="top" style="text-align: left;">066</td>
		  				<td valign="top" style="text-align: left;border-right:1px solid #999"></td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-align: left;">Chemistry</td>
		  				<td valign="top">100</td>
		  				<td valign="top">027</td>
		  				<td valign="top" style="text-align: left;">049</td>
		  				<td valign="top" style="text-align: left;border-right:1px solid #999"></td>
		  			</tr>
		  			<tr>
		  				<td valign="top" style="text-align: left;">Mathematics</td>
		  				<td valign="top">100</td>
		  				<td valign="top">33</td>
		  				<td valign="top" style="text-align: left;">033</td>
		  				<td valign="top" style="text-align: left;border-right:1px solid #999"></td>
		  			</tr>
		  			<tr>
		  				<td valign="top"></td>
		  				<td valign="top" colspan="0" style="border-left:0">500</td>
		  				<td valign="top" colspan="0"><?php echo $this->lang->line('grand')." ".$this->lang->line('total');?></td>
		  				<td valign="top" style="text-align: left;">284</td>
		  				<td valign="top" style="text-align: left;border-right:1px solid #999"></td>
		  			</tr>
		  			<tr>
		  				<td valign="top" colspan="5" width="20%" style="font-weight: normal; text-align: left; border-bottom:0;border-right: 1px solid #999;"><?php echo $this->lang->line('grand_total_in_words')?>: <span style="text-align: left;font-weight: bold; padding-left: 30px;">Two hundred eighty four</span></td>
		  				<!-- <td valign="top" style="text-align: left;border-bottom:0"></td> -->
		  			</tr>
		  			<tr>
		  				<td valign="top" colspan="5" width="20%" style="font-weight: normal; text-align: left; border-top:0;border-right: 1px solid #999;"><?php echo $this->lang->line('result'); ?><span style="text-align: left;font-weight: bold; padding-left: 30px;"><?php echo $this->lang->line('pass_in_second_division');?></span></td>
		  				<!-- <td valign="top" style="text-align: left; border-top:0"></td> -->
		  			</tr>
		  			
		  		</table>
		  	</td>
		  </tr>

		

		  <tr>
		  	<td valign="top" style="font-weight: bold; padding-left: 30px; padding-top: 10px;">12-8-2014</td>
		  </tr>
		  <tr><td valign="top" height="30"></td></tr>

		  <tr>
		  	<td valign="top">
		  		<table cellpadding="0" cellspacing="0" width="100%" class="">
		  			<tr>
		  				<td valign="bottom" style="font-size: 12px;">
		  					
		  				</td>


		  				<td valign="bottom" align="center" style="text-transform: uppercase;">
                                                    <img src="<?php echo base_url('uploads/marksheet/' . $marksheet->left_sign); ?>"  width="100" height="50">
                                                    <p><?php echo $this->lang->line('seal_and_signature_of_the_principal');?></p></td>
                                                <td valign="bottom" align="center" style="text-transform: uppercase;">

                                                    <img src="<?php echo base_url('uploads/marksheet/' . $marksheet->middle_sign); ?>" width="100" height="50">
                                                    <p><?php echo $this->lang->line('secretary')?></p></td>
                                                <td valign="bottom" align="center" style="text-transform: uppercase;">

                                                    <img src="<?php echo base_url('uploads/marksheet/' . $marksheet->right_sign); ?>" width="100" height="50">
                                                    <p><?php echo $this->lang->line('secretary')?></p></td>
		  			</tr>
		  		</table>
		  	</td>
		  </tr>
		  <tr><td valign="top" height="20"></td></tr>
		</table>
	</div>
</body>
</html>    