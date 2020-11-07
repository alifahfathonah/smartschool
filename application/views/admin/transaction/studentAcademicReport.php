<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>

<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-money"></i> <?php echo $this->lang->line('fees_collection'); ?> <small> <?php echo $this->lang->line('filter_by_name1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_finance'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull"></div>
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>
                    <form action="<?php echo site_url('admin/transaction/studentacademicreport') ?>"  method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?><small class="req"> *</small></label>
                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?><small class="req"> *</small></label>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                             <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php 
                                            foreach($section_list as $value){
                                                ?>
                                                <option  <?php  if($value['section_id']==$section_id){ echo "selected";}?> value="<?php echo $value['section_id']; ?>"><?php echo $value['section'];?></option>
                                            <?php

                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>   </div>
                    </form>
                  <div class="box-header ptbnull"></div>  
                
                <?php
                if (isset($student_due_fee)) {
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="" id="transfee">
                                <div class="box-header ptbnull">
                                    <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('balance_fees_report'); ?></h3>
                                </div>                              
                                <div class="box-body table-responsive">
                                    <div class="download_label"><?php echo $this->lang->line('balance_fees_report')."<br>";
                                    $this->customlib->get_postmessage(); ?></div>    
                                    <table class="table table-striped table-bordered table-hover example">
                                        <thead>
                                            <tr>
                                                <th class="text text-left"><?php echo $this->lang->line('class'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('section'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('student_name'); ?></th>
                                              
												<th class="text text-left"><?php echo $this->lang->line('admission_no'); ?></th>
                                                <?php  if ($sch_setting->roll_no) {  ?>
												<th class="text text-left"><?php echo $this->lang->line('roll_no'); ?></th>
												<?php }  if ($sch_setting->father_name) {  ?>
                                                <th class="text text-left"><?php echo $this->lang->line('father_name'); ?></th>
												<?php } ?>
                                                <th class="text text-right"><?php echo $this->lang->line('total_fees'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('discount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('fine'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('paid_fees'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>

                                                <th class="text-right"><?php echo $this->lang->line('balance'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                            </tr>
                                        </thead>  
                                        <tbody> 
                                            <?php $grdtotal_total=0;
                                                    $grdtotal_paid=0;
                                                    $grdtotal_discount=0;
                                                    $grdtotal_fine=0;
                                                    $grdtotal_balanc=0;
                                                    // echo "<pre>";
                                                    // print_r($resultarray);
                                                    // echo "</pre>";die;
                                            foreach ($resultarray as $key => $value) {
                                                    $name="";
                                                    $admission_no="";
                                                    $roll_no="";
                                                    $father_name="";
                                                    $totalfeelabel="";
                                                    $depositfeelabel="";
                                                    $discountlabel="";
                                                    $finelabel="";
                                                    $balancelabel="";                        
                                                    $total_total=0;
                                                    $total_paid=0;
                                                    $total_discount=0;
                                                    $total_fine=0;
                                                    $total_balanc=0;
                                                    $grd_total = 0;
                                                    $grd_paid = 0;
                                                    $grd_discount = 0;
                                                    $grd_fine = 0;
                                                    $grd_balance= 0;

                                             foreach($value as $key=>$section){
                                                    $name.="</br>";
                                                    $admission_no.="</br>";
                                                    $roll_no.="</br>";
                                                    $father_name.="</br>";
                                                    $totalfeelabel.="</br>";
                                                    $depositfeelabel.="</br>";
                                                    $discountlabel.="</br>";
                                                    $finelabel.="</br>";
                                                    $balancelabel.="</br>";
                                                    
                                                foreach($section['result'] as $students){
                                                  
                                                    $name.=$students->name."</br>";
                                                    $admission_no.=$students->admission_no."</br>";
                                                    $roll_no.=$students->roll_no."<br>";

                                                    $father_name.=$students->father_name."</br>";
                                                    

                                                        $grd_total +=$students->totalfee;
                                                        $totalfeelabel.=number_format($students->totalfee,2,'.','')."<br>";
                                                   
                                                

                                                        $grd_paid +=$students->deposit;
                                                        $depositfeelabel.=number_format($students->deposit,2,'.','')."<br>";
                                                  
                                                   

                                                        $grd_discount +=$students->discount;
                                                        $discountlabel.=number_format($students->discount,2,'.','')."<br>";
                                                   
                                                   
                                                        $grd_fine +=$students->fine;
                                                        $finelabel.=number_format($students->fine,2,'.','')."<br>";
                                                   
                                                 
                                                        $grd_balance+=$students->balance;
                                                        $balancelabel.=$students->balance."<br>";
                                                   

                                                }
                                             

                                                $total_total+=$grd_total;
                                                $total_paid+=$grd_paid;
                                                $total_discount+=$grd_discount;
                                                $total_fine+=$grd_fine;
                                                $total_balanc+=$grd_balance;
                                                

                                               

                                                    $totalfeelabel.="<b>".number_format($grd_total,2,'.','')."</b>";

                                               
                                                
                                               

                                                    $depositfeelabel.="<b>".number_format($grd_paid,2,'.','')."</b>";

                                             
                                                
                                             
                                                    $discountlabel.="<b>".number_format($grd_discount,2,'.','')."</b>";
                                             
                                                
                                                    $finelabel.="<b>".number_format($grd_fine,2,'.','')."</b>";
                                               
                                               
                                                   $balancelabel.="<b>".number_format($grd_balance,2,'.','')."</b>"; 
                                              
                                                 $name.="<br>";
                                                    $admission_no.="<br>";
                                                    $roll_no.="<br>";
                                                    $father_name.="<br>";
                                                $totalfeelabel.="<hr>";
                                                $depositfeelabel.="<hr>";
                                                $discountlabel.="<hr>";
                                                $finelabel.="<hr>";
                                                $balancelabel.="<hr>";
                                                $grd_total = 0;
                                                $grd_paid = 0;
                                                $grd_discount = 0;
                                                $grd_fine = 0;
                                                $grd_balance= 0;

                                                 }

                                               
                                              ?>
                                               <tr>  
                                            <td><?php echo $value[0]['class_name']; ?></td>
                                            <td><?php  foreach($value as $key=>$section){

                                                echo $section['section_name'];
                                                foreach($section as $students){
                                                    echo "<br>";

                                                }


                                              } ?></td>
                                             <td><?php  echo $name; ?></td>
											 
                                            <td><?php echo $admission_no; ?></td>
											 <?php  if ($sch_setting->roll_no) {  ?>
                                            <td><?php echo  $roll_no; ?></td>
											<?php }  if ($sch_setting->father_name) {  ?>
                                            <td><?php echo $father_name; ?></td>
											<?php } ?>
                                            <td class="text text-right"><?php echo $totalfeelabel;  ?></td>
                                            <td class="text text-right"><?php echo $depositfeelabel; ?></td>
                                            <td class="text text-right"><?php  echo $discountlabel; ?></td>
                                            <td class="text text-right"><?php   echo $finelabel; ?></td>
                                            <td class="text text-right"><?php  echo  $balancelabel;?></td>
                                      </tr>
                                      <tr  class="box box-solid total-bg">
                                            <td></td>
                                            <td></td>
											<?php if ($sch_setting->father_name) {  ?>
                                            <td></td>
											<?php } if (!$adm_auto_insert) {  ?>
                                            <td></td>
											<?php } if ($sch_setting->roll_no) {  ?>
                                            <td></td>
											<?php } ?>
                                            <td class="text text-right">
                                                <?php echo $this->lang->line('total'); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($total_total, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($total_discount, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($total_fine, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($total_paid, 2, '.', '') ); ?>
                                            </td> 

                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format(($total_total - ($total_paid + $total_discount)), 2, '.', '')); ?>
                                            </td>
                                        </tr>
                                              <?php

                                             $grdtotal_total+=$total_total;
                                                $grdtotal_paid+=$total_paid;
                                                $grdtotal_discount+=$total_discount;
                                                $grdtotal_fine+=$total_fine;
                                                $grdtotal_balanc+=$total_balanc;   
                                            }
                                            ?>
                                            <tr  class="box box-solid total-bg">
                                            <td></td>
                                            <td></td>
                                           <?php if ($sch_setting->father_name) {  ?>
                                            <td></td>
											<?php } if (!$adm_auto_insert) {  ?>
                                            <td></td>
											<?php } if ($sch_setting->roll_no) {  ?>
                                            <td></td>
											<?php } ?>

                                            <td class="text text-right">
                                                <?php echo $this->lang->line('grand_total'); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($grdtotal_total, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($grdtotal_discount, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($grdtotal_fine, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format($grdtotal_paid, 2, '.', '') ); ?>
                                            </td> 

                                            <td class="text text-right">
                                                <?php echo ($currency_symbol . number_format(($grdtotal_total - ($grdtotal_paid + $grdtotal_discount)), 2, '.', '')); ?>
                                            </td>
                                        </tr>
                                            <?php
                                            ?>
                                       

                                        </tbody> 
                                    </table>
                                </div>                            
                            </div>                       
                        </div>
                    </div>
                 </div><!--./box box-primary-->
                    <?php

                }

                ?>
            </div>
        </div>
                </section>
            </div>

            <script type="text/javascript">
                function getSectionByClass(class_id, section_id) {
                    if (class_id != "" && section_id != "") {
                        $('#section_id').html("");
                        var base_url = '<?php echo base_url() ?>';
                        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
                        $.ajax({
                            type: "GET",
                            url: base_url + "sections/getByClass",
                            data: {'class_id': class_id},
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, obj)
                                {
                                    var sel = "";
                                    if (section_id == obj.section_id) {
                                        sel = "selected";
                                    }
                                    div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                                });
                                $('#section_id').append(div_data);
                            }
                        });
                    }
                }
                $(document).ready(function () {
                    $(document).on('change', '#class_id', function (e) {
                        $('#section_id').html("");
                        var class_id = $(this).val();
                        var base_url = '<?php echo base_url() ?>';
                        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
                        $.ajax({
                            type: "GET",
                            url: base_url + "sections/getByClass",
                            data: {'class_id': class_id},
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, obj)
                                {
                                    div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                                });

                                $('#section_id').append(div_data);
                            }
                        });
                    });
                    $(document).on('change', '#section_id', function (e) {
                        getStudentsByClassAndSection();
                    });
                    var class_id = $('#class_id').val();
                    var section_id = '<?php echo set_value('section_id') ?>';
                    getSectionByClass(class_id, section_id);
                });
                function getStudentsByClassAndSection() {
                    $('#student_id').html("");
                    var class_id = $('#class_id').val();
                    var section_id = $('#section_id').val();
                    var base_url = '<?php echo base_url() ?>';
                    var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
                    $.ajax({
                        type: "GET",
                        url: base_url + "student/getByClassAndSection",
                        data: {'class_id': class_id, 'section_id': section_id},
                        dataType: "json",
                        success: function (data) {
                            $.each(data, function (i, obj)
                            {
                                div_data += "<option value=" + obj.id + ">" + obj.firstname + " " + obj.lastname + "</option>";
                            });
                            $('#student_id').append(div_data);
                        }
                    });
                }

                $(document).ready(function () {
                    $("ul.type_dropdown input[type=checkbox]").each(function () {
                        $(this).change(function () {
                            var line = "";
                            $("ul.type_dropdown input[type=checkbox]").each(function () {
                                if ($(this).is(":checked")) {
                                    line += $("+ span", this).text() + ";";
                                }
                            });
                            $("input.form-control").val(line);
                        });
                    });
                });
                $(document).ready(function () {
                    $.extend($.fn.dataTable.defaults, {
                        ordering: false,
                        paging: false,
                        bSort: false,
                        info: false
                    });
                });
            </script>


