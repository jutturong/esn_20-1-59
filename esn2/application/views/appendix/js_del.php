<script type="text/javascript">
 //#-- $('#dg_app1').datagrid ต้องการลบและ update ข้อมูลใน appendix 1
 
$(function(){
    //$.messager.alert('del_app1');
    
     $('#dg_app1').datagrid({
                      onClickCell:function(rowIndex,rowData,id){
                        
                         //$.messager.alert('Info',id,'info');
                        
                        
                        $.messager.confirm('Confirm','คุณแน่ใจว่าต้องการลบจริงหรือไม่',function(r,index,row){
                            if(r){   
                                
                                $.post("<?=base_url()?>index.php/appendix/del_app1/" + id ,function(result)
                                {
                                    //alert('ลบข้อมูลแล้ว');
                                    $('#dg_app1').datagrid('reload');    
                                   
                                });    
                                
                                /*
                                $('#dg_app1').datagrid({ 
                                          url: '<?php echo base_url();?>index.php/appendix/del_app1/' + id ,
                                          
                                          
                                     });
                                 */   
                                     
                                     //$('#dg_app1').datagrid('reload'); 
                                 }
                            else
                            {
                                $('#win_update_app1').window('open');
                                //$.messager.alert(id);
                                /*
                                $.post('<?=base_url()?>index.php/appendix/fetch_appendix1/' + id ,function(result){
                                    
                                });
                                */
                                   $.ajax({
                                       dataType:'json',
                                       url:'<?=base_url()?>index.php/appendix/fetch_appendix1/' + id,
                                       
                                       success:function(data){
                                           //alert(data['id_appendix1']);
                                           $.each(data,function(key,val){
                                              //alert(val['HN']);
                                              /*
                                              $('#tb').textbox({
    buttonText:'Search',
    iconCls:'icon-man',
    iconAlign:'left'
})
*/
                                            
                                             // $('#id_appendix1_up').textbox('setText',val['id_appendix1']); //ok
                                              $('#id_appendix1_up').combobox('setValue',val['id_appendix1']);
                                                  
                                             
                                             
                                              
                                             // $('#id_appendix1_up').focus();
                                             // $('#id_appendix1_up').focus();
                                              
                                              //$('#firstname').textbox('setText',firstname);
                                               $('#HN_app1_up').textbox('setText',val['HN']);
                                               $('#person_id_app1_up').textbox('setText',val['person_id']);
                                               //ep_no
                                               $('#ep_no_app1_up').textbox('setText',val['ep_no']);
                                               //name_app1_up
                                               $('#name_app1_up').textbox('setText',val['name']);
                                               //surname_app1_up
                                               $('#surname_app1_up').textbox('setText',val['surname']);
                                              
                                               //เพศ
                                               //var sex_id=$('#male_up').val();
                                               //alert( sex_id );
                                               var  sex_id=val['sex'];
                                               //alert(sex_id);
                                               if( sex_id == 1 )
                                               {
                                                   $('#female_up').attr('checked',true);
                                               }
                                               else if( sex_id == 2 )
                                               {    
                                                   $('#male_up').attr('checked',true); 
                                                }     
                                             
                                              //$('#cc').combobox('setValue', '001');
                                              
                                                $('#prov_id_up').combobox('setValue',val["prov_id"]);
                                              
                                                $('#amphur_id_up').combobox('setValue',val["amphur_id"]);
                                                
                                                $('#district_id_up').combobox('setValue',val["district_id"]);
                                                
                                              //  $('#zipcode_up').textbox('setText',val['zipcode']);
                                                
                                              //  $('#address').textbox('address',val['address']);
                                                
                                             //   $('#telephone').textbox('telephone',val['telephone']);
                                              
                                               $('#zipcode_up').textbox('setText',val['zipcode']);
                                               
                                               $('#address_up').textbox('setText',val["address"]);
                                               //alert(val["address"]);
                                               $('#telephone_up').textbox('setText',val["telephone"]);
                                               
                                               $('#birthdate_up').textbox('setText',val["birthdate"]);
                                               
                                               $('#age_up').textbox('setText',val["age"]);
                                               
                                               $('#occupational_id_up').combobox('setValue',val["occupational_id"]);
                                               
                                               $('#education_id_up').combobox('setValue',val["education_id"]);
                                               
                                               $('#payment_id_up').combobox('setValue',val["payment_id"]);
                                               
                                               $('#age_payment_up').textbox('setText',val["age_payment"]); //เริ่มชักเมื่อปี
                                              
                                               $('#age_sick_up').textbox('setText',val["age_sick"]); //ชักมาแล้ว
                                               
                                               $('#epilepsy_first_up').combobox('setValue',val["epilepsy_first"]); //รูปแบบการชักที่เป็นครั้งแรก
                                               
                                               $('#detail_epilepsy_first_up').textbox('setText',val["detail_epilepsy_first"]); //รูปแบบการชักที่เป็นครั้งแรก อื่นๆ
                                               
                                               $('#current_epilepsy_up').combobox('setValue',val["current_epilepsy"]); //รูปแบบการชักที่ ณ ปัจจุบัน
                                               
                                               $('#other_current_epilepsy_up').textbox('setText',val["other_current_epilepsy"]);
                                               
                                               
                                               var  id_ever_EEG=val['ever_EEG']; //เคยตรวจ EEG มาก่อนหรือไม่
                                               //alert( id_ever_EEG );                                                                                        
                                               if( id_ever_EEG == 1 )
                                               {
                                                   $('#use_EEG_up').attr('checked',true);
                                               }
                                               else if( id_ever_EEG == 2 )
                                               {
                                                   $('#null_EEG_up').attr('checked',true);
                                               }
                                               
                                               $('#date_ever_EEG_up').textbox('setText',val['dmy_EEG']);
                                               
                                               //ผลการตรวจ EEG :
                                               var  id_use_results_EEG=val['results_EEG'];
                                               //alert(id_use_results_EEG);
                                               if( id_use_results_EEG == 1 )
                                               {
                                                   $('#use_results_EEG_up').attr('checked',true);
                                               }
                                               else if( id_use_results_EEG == 2 )
                                               {
                                                   $('#null_results_EEG_up').attr('checked',true);
                                               }
                                               
                                               $('#dmy_results_EEG').textbox('setText',val['dmy_results_EEG']);
                                               
                                               //เคยตรวจ CT/MRI มาก่อนหรือไม่ 
                                               var  id_ever_CT_MRI=val['ever_CT_MRI'];
                                               //alert(id_ever_CT_MRI);
                                               if( id_ever_CT_MRI == 1 )
                                               {
                                                   $('#use_ever_CT_MRI_up').attr('checked',true);
                                               }
                                               else if( id_ever_CT_MRI == 2 )
                                               {
                                                   $('#null_ever_CT_MRI_up').attr('checked',true);
                                               }
                                               
                                               $('#date_ever_CT_MRI_up').textbox('setText',val['dmy_ever_CT_MRI']);
                                               
                                               //เคยตรวจ CT/MRI
                                               var id_result_CT_MRI=val['result_CT_MRI'];
                                               //alert(id_result_CT_MRI);
                                               if( id_result_CT_MRI == 1 )
                                               {
                                                   $('#use_result_CT_MRI_up').attr('checked',true);
                                               }
                                               else if( id_result_CT_MRI == 2 )
                                               {
                                                   $('#null_result_CT_MRI_up').attr('checked',true);
                                               }
                                               $('#date_result_CT_MRI_up').textbox('setText',val['dmy_result_CT_MRI']);
                                               
                                               //ลักษณะความผิดปกติจาก CT/MRI
                                               $('#nature_CT_MRI_up').combobox('setValue',val['nature_CT_MRI']);
                                               $('#other_Nature_CT_MRI_up').textbox('setText',val['other_Nature_CT_MRI']);
                                               
                                               //ยาที่ได้รับมาก่อนหน้านี้พร้อมระบุความรุนแรงและแบบแผนการใช้ยา
                                               $('#drug_id_up').combobox('setValue',val['drug_id']);
                                               
                                               $('#drug_other_up').textbox('setText',val['drug_other']);
                                               
                                               //โรคร่วมอื่นๆ ของผู้ป่วย
                                               $('#disease_drug_id_up').combobox('setValue',val['disease_drug_id']);
                                               
                                               $('#disease_drug_other_up').textbox('setText',val['disease_drug_other']);
                                               
                                               var  id_allergic=val['allergic'];
                                               //alert(id_allergic);
                                               if( id_allergic == 1 )
                                               {
                                                   $('#use_allergic_up').attr('checked',true);
                                               }
                                               else if( id_allergic == 2 )
                                               {
                                                   $('#nuLL_allergic_up').attr('checked',true);
                                               }
                                               
                                               
                                               $('#allergic_detail_up').textbox('setTextbox',val['allergic_detail']);
                                               
                                               //ยากันชักที่แพ้ :
                                               $('#drug_epilepsy_up').combobox('setValue',val['drug_epilepsy']);
                                               
                                               //ยากันชักที่แพ้ อื่นๆ
                                               $('#drug_epilepsy_detail_up').textbox('setText',val['drug_epilepsy_detail']);
                                               
                                               $('#nature_drug_epilepsy_id_up').combobox('setValue',val['nature_drug_epilepsy_id']);
                                               
                                               $('#Nature_drug_epilepsy_other_up').textbox('setText',val['Nature_drug_epilepsy_other']);
                                               
                                               $('#stimulate_epilepsy_id_up').combobox('setValue',val['stimulate_epilepsy_id']);
                                               
                                               $('#stimulate_epilepsy_other_up').textbox('setText',val['stimulate_epilepsy_other']);
                                               
                                               $('#interview_date_up').textbox('setText',val['interview_date']);
                                               
                                           });
                                       }  
                                   });
                                   
                                    //$('#fr_update_app1').form({  success:function(result){  alert(result);  } });
                                   
                                   
                            }
                                 
                        });
                        
                      }
                   });
});


</script>
