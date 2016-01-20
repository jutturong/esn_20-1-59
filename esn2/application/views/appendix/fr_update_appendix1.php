<head>
    <script type="text/javascript">
      function tx_disable(vx)
       {
           
           $(function(){ 
              // alert('t');
              // $('#date_ever_EEG').attr('readonly',false); 
              // $('#date_ever_EEG').datetimebox('readonly',false);
               $(vx).datetimebox('readonly',false);
           });
           
       }
       function  tx_enable(vx)
       {
           $(function(){
                //$('#date_ever_EEG').datetimebox('readonly',true);
                $(vx).datetimebox('readonly',true);
           });
       }
       function  txtboxSh(va)//ปลดการทำงานของ textbox
       {
           $(va).textbox({iconCls:'icon-add'});
           $(va).textbox('readonly',false);
       }
       function  txtboxHid(va)//ปลดการทำงานของ textbox
       {
           $(va).textbox({iconCls:'icon-lock'});
           $(va).textbox('readonly',true);
       }
  </script>
    
   <script type="text/javascript">
   $(function(){
       
       
        
       $('#fr_update_app1').form({
           
           url:'<?=base_url()?>index.php/appendix/update_app1/' + $('#id_appendix1_up').textbox('getText') , //action="index.php/appendix/update_app1/"
          onSubmit:function(){
               //alert('onsubmit');
               //$.messager.alert('Info','','info');
               //$.messger.progress();
            },
          success:function(data)
          {
              
             // $('#id_appendix1_up').textbox({ buttonText:'ID',readonly:false });
             // $('#id_appendix1_up').focus();
            // var url_up="<?=base_url()?>index.php/appendix/update_app1/" +  $('#id_appendix1_up').textbox('getText');
             //alert(url_up);
             // $('#fr_update_app1').attr('action',url_up );
              //$.messager.alert('Info',data,'info');  //ok
              $('#win_update_app1').window('close');
              $('#dg_app1').datagrid('reload');
                   
          }
       })
      // $('#fr_update_app1').submit();
       
       $('#win_app1').window('close');
       $('#dg_app1').datagrid('reload');  
       
   });
   
   function closewin()//ปิดหน้าต่างเมื่อไม่ใช้งาน
   {
       $('#win_update_app1').window('close');
       $('#dg_app1').datagrid('reload');  
   }
</script> 


    
</head>


<div id="win_update_app1" class="easyui-window" title="Appendix 1" data-options="modal:true,closed:true,iconCls:'icon-save',resizeable:true" style="width:700px;height:700px;padding:10px;">
    
 


<!-- <p style="font-size:14px">เรียกดูประวัติผู้ป่วย Appendix 1</p> -->            
    <!-- <div class="demo-info" style="margin-bottom:10px"> </div> -->
    <p style="font-size:12px">(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา</p>
    <div class="easyui-panel" title="เรียกดูประวัติผู้ป่วย Appendix 1" style="width:600px;height:700px;padding:10px;">
        <form id="fr_update_app1"  method="post" >
            <table>
                
                <tr>
                    <td></td>
                    <td>                     
                       <!-- <input name="id_appendix1_up" id="id_appendix1_up" class="f1 easyui-textbox" data-options="buttonText:'ID',iconCls:'icon-man',iconAlign:'left'" style="width:100px"></input> -->
                       <input id="id_appendix1_up" name="id_appendix1_up" class="easyui-combobox" >
                    </td>
                </tr>
                
                <tr>
                    <td>HN :</td>
                    <td>
                        
                        <input name="HN_app1_up" id="HN_app1_up" class="f1 easyui-textbox"></input>
                    
                    </td>
                </tr>
                <tr>
                    <td>เลขที่บัตรประชาชน :</td>
                    <td><input name="person_id_app1_up" id="person_id_app1_up" class="f1 easyui-textbox"></input></td>
                </tr>
                
                <tr>
                    <td>Epilepsy Number :</td>
                    <td><input name="ep_no_app1_up" id="ep_no_app1_up" class="f1 easyui-textbox"></input></td>
                </tr>
                
                <tr>
                    <td>ชื่อ :</td>
                    <td><input name="name_app1_up"  id="name_app1_up" class="f1 easyui-textbox"></input></td>
                </tr>
                <tr>
                    <td>นามสกุล :</td>
                    <td><input name="surname_app1_up" id="surname_app1_up" class="f1 easyui-textbox"></input></td>
                </tr>
                <tr>
                    <td>เพศ :</td>
                    <td >
                        <input type="radio" name="sex_app1_up"  id="female_up" value="1" class="easyui-switchbutton" >
                        (M) ชาย
                        <input type="radio" name="sex_app1_up" id="male_up" value="2" class="easyui-switchbutton" >
                        (F) หญิง
                        
                        
                    </td>
                </tr>
                
                <tr>
                    <td>จังหวัดเกิด :</td>
                    <td >
                    <input class="easyui-combobox" 
            name="prov_id_up"
            id="prov_id_up"
            data-options="
                    url:'<?=base_url()?>index.php/welcome/selProvince',
                    method:'get',
                    valueField:'prov_id',
                    textField:'prov_name',
                    panelHeight:'auto',
                    icons:[{
                        iconCls:'icon-search'
                    }
                    ],
                    onSelect:function(rec){
              var url='<?=base_url()?>index.php/welcome/sqlAmphur/' + $('#prov_id_up').combobox('getValue');
             
              $('#amphur_id_up').combobox('reload',url);
            }
                    " >
                       
                    </td>
                </tr>
                
                <tr>
                    <td>อำเภอเกิด :</td>
                    <td >   
                                   
           <input class="easyui-combobox" 
            name="amphur_id_up" 
            id="amphur_id_up"
            data-options="       
            valueField:'AMPHUR_CODE',
            textField:'AMPHUR_NAME',
            panelHeight:'auto',
            icons:[{ iconCls:'icon-search' }],
            onSelect:function(rec){
            var  url='<?=base_url()?>index.php/welcome/sqldistrict/' +  $('#amphur_id_up').combobox('getValue');
             
              $('#district_id_up').combobox('reload',url);
            }  
            ">
            
            
                    </td>
                </tr>
                
                   <tr>
                    <td>ตำบลเกิด :</td>
                    <td >
                     <input class="easyui-combobox" 
            name="district_id_up" 
            id="district_id_up"
            data-options="       
            valueField:'DISTRICT_CODE',
            textField:'DISTRICT_NAME',
            panelHeight:'auto',
            icons:[{ iconCls:'icon-search' }]" >
                       
                    </td>
                </tr>
                
                
                <tr>
                    <td>รหัสไปรษณีย์ :</td>
                    <td >
                        <input name="zipcode_up" id="zipcode_up" class="f1 easyui-textbox" data-options="validType:'minLength[5]'" ></input>
                       
                    </td>
                </tr>
                
                 <tr>
                    <td>ที่อยู่ :</td>
                    <td >
                        <input name="address_up" id="address_up" class="f1 easyui-textbox" style="width:400px"></input>
                       
                    </td>
                </tr>
                             
                <tr>
                    <td>เบอร์โทรศัพท์ :</td>
                    <td><input name="telephone_up" id="telephone_up" class="f1 easyui-textbox"></input></td>
                </tr>
                
                <tr>
                    <td>วัน-เดือน-ปี เกิด :</td>
                    <td>
                        <input class="easyui-datetimebox" id="birthdate_up"  name="birthdate_up"  style="width:200px">
                    </td>
                </tr>
                
                <tr>
                    <td>อายุ :</td>
                    <td>
                        <input class="easyui-textbox" id="age_up" name="age_up" style="width:80px;" 
                          data-options="
                                         iconCls:'icon-man',
                                         buttonText:'อายุ',
                                         iconAlign:'right',
                                         onClickButton:function(){
                                              var d = new Date();
                                                    var curY=d.getFullYear(); //ปี ปัจจุบัน
                                                    var  Ybrd= $('#birthdate_up').datetimebox('getValue');
                                                    var  spY=Ybrd.split(' ');              
                                                    var  subSPY=spY[0].split('/');                                 
                                                    var  yearBRD = subSPY[2]; //ปี เกิด
                                                    //alert(yearBRD);
                                                    var  calYBRD = parseInt(curY-yearBRD);
                                                    if( calYBRD > 0 )
                                                    {
                                                       $('#age_up').textbox('setValue',calYBRD);
                                                    }
                                                    else
                                                    {
                                                       $('#age_up').textbox('setValue','0');
                                                    } 
                                         }
                                       "   ></input>                            
                      ( ปี )
                    </td>
                </tr>
                
                <tr>
                    <td>อาชีพ :</td>
                    <td>
                        <select class="easyui-combobox" name="occupational_id_up" id="occupational_id_up" style="width:200px;">
                           <option value="">ระบุอาชีพ</option>
                           <option value="1">ไม่ระบุ</option>
                           <option value="2">รับราชการ/รัฐวิสาหกิจ/พนักงานของรัฐ</option>
                           <option value="3">ข้าราชการบำนาญ</option>
                           <option value="4">เกษตรกรรม</option>
                           <option value="5">ค้าขาย/นักธุรกิจ</option>
                           <option value="6">นักบวช</option>
                           <option value="7">พนักงาน/ลูกจ้างหน่วยงานเอกชน</option>
                           <option value="8">นักเรียน/นักศึกษา</option>
                           <option value="9">ไม่มีอาชีพ</option>
                           <option value="10">ครู/อาจารย์</option>
                           <option value="11">บุคลากรสาธารณสุข</option>
                       </select>
                    </td>
                </tr>
                
                <tr>
                    <td>ระดับการศึกษา :</td>
                    <td>
                        <select class="easyui-combobox" name="education_id_up" id="education_id_up" style="width:200px;">
                           <option value="">ระบุการศึกษา</option>
                           <option value="1">ประถมศึกษา</option>
                           <option value="2">มัธยมศึกษาตอนต้น</option>
                           <option value="3">มัธยมศึกษาตอนปลาย/ปวช.</option>
                           <option value="4">อนุปริญญา/ปวส.</option>
                           <option value="5">ปริญญาตรีขึ้นไป</option>
                           <option value="6">ไม่ได้ศึกษาเลย</option>                        
                       </select>
                    </td>
                </tr>
                
                 <tr>
                    <td>สิทธิการรักษา :</td>
                    <td>
                       <select class="easyui-combobox" name="payment_id_up" name="payment_id_up" style="width:200px;">
                           <option value="">ระบุสิทธิการรักษา</option>
                           <option value="1">เบิกต้นสังกัด/ข้าราชการ</option>
                           <option value="2">ชำระเงิน</option>
                           <option value="3">ประกันสังคม</option>
                           <option value="4">บัตรทองโรงพยาบาล</option>
                           <option value="5">บัตรทองส่งตัวมา</option>
                           <option value="6">พระภิกษุสามเณร</option>                        
                       </select>
                    </td>
                </tr>
                
                <tr>
                    <td>เริ่มมีการชักเมื่อปี :</td>
                    <td>
                        <input name="age_payment_up" id="age_payment_up" class="f1 easyui-textbox"></input> 
                    </td>
                </tr>
                
                <!--
                <tr>
                    <td>File:</td>
                    <td><input name="file" class="f1 easyui-filebox"></input></td>
                </tr>
                -->
                
                <tr>
                    <td>ชักมาแล้ว :</td>
                    <td>
                        <input class="easyui-numberspinner"  id="age_sick_up" name="age_sick_up" style="width:80px;" ></input>
                    ( ปี )
                    </td>
                </tr>
                
                <tr>
                    <td>รูปแบบการชักที่เป็นครั้งแรก :</td>
                    <td>
                        <select class="easyui-combobox" name="epilepsy_first_up" id="epilepsy_first_up" style="width:200px;" data-options="onSelect:function()
                                { 
                                  var  id_check=$('#epilepsy_first_up').combobox('getValue');                        
                                    if( id_check != 8 )
                                    {
                                      $('#detail_epilepsy_first_up').textbox('readonly',true);
                                      $('#detail_epilepsy_first_up').textbox({ iconCls:'icon-lock' });
                                    }
                                    else if( id_check == 8 )
                                    {
                                       //alert( id_check );
                                      // $.messager.alert('รูปแบบการชักที่เป็นครั้งแรก','Other/อื่นๆ','info');
                                       $('#detail_epilepsy_first_up').textbox('readonly',false);
                                       $('#detail_epilepsy_first_up').textbox({ iconCls:'icon-add' });
                                    }                                  
                                }">
                           <option value="">ระบุรูปแบบการชัก</option>
                           <option value="1">Simple partial seizure</option>
                           <option value="2">Complex partial seizure</option>
                           <option value="3">Absence</option>
                           <option value="4">Atonic</option>
                           <option value="5">Myocloneic</option>
                           <option value="6">Generalized tonic clonic</option>
                           <option value="7">Tonic seizure</option>
                           <option value="7">Tonic seizure</option>
                           <option value="8">Other/อื่นๆ</option>                          
                       </select>
                        <br>
                      อื่นๆ ระบุ :
                      <input name="detail_epilepsy_first_up" id="detail_epilepsy_first_up" class="f1 easyui-textbox" data-options="readonly:'true',iconCls:'icon-lock'  " style="width:300px;"></input>
                    </td>
                </tr>
                
                
                <tr>
                    <td>รูปแบบการชักที่ ณ ปัจจุบัน :</td>
                    <td>
                        <select class="easyui-combobox" name="current_epilepsy_up" id="current_epilepsy_up" style="width:200px;" data-options="
                                onSelect:function()
                                {
                                  var  id_cur=$('#current_epilepsy_up').combobox('getValue');
                                  if( id_cur == 9 )
                                  {
                                     $('#other_current_epilepsy_up').textbox('readonly',false);
                                     $('#other_current_epilepsy_up').textbox({iconCls:'icon-add'});
                                     
                                  }
                                  else
                                  {
                                    $('#other_current_epilepsy_up').textbox('readonly',true);
                                     $('#other_current_epilepsy_up').textbox({iconCls:'icon-lock'});
                                  }
                                }
                                ">
                           <option value="">ระบุรูปแบบการชัก</option>
                           <option value="1">Simple partial seizure</option>
                           <option value="2">Complex partial seizure</option>
                           <option value="3">Absence</option>
                           <option value="4">Atonic</option>
                           <option value="5">Myocloneic</option>
                           <option value="6">Generalized tonic clonic</option>
                           <option value="7">Tonic seizure</option>
                           <option value="8">Tonic seizure</option>
                           <option value="9">Other/อื่นๆ</option>                          
                       </select>
                        <br>
                      อื่นๆ ระบุ :
                      <input name="other_current_epilepsy_up" id="other_current_epilepsy_up" class="f1 easyui-textbox" style="width:300px" data-options="iconCls:'icon-lock',readonly:'true' "></input>
                    </td>
                </tr>
                
                <tr>
                    <td>เคยตรวจ EEG มาก่อนหรือไม่ : </td>
                    <td>
                        <input type="radio" name="ever_EEG_up" id="use_EEG_up" value="1" class="easyui-switchbutton" onclick="tx_disable('#date_ever_EEG_up')"> เคย (วัน-เดือน-ปี) <input id="date_ever_EEG_up" name="date_ever_EEG_up" class="easyui-datetimebox"  style="width:200px" data-options=" readonly:'true' ">
                       <br>
                       <input type="radio" name="ever_EEG_up" id="null_EEG_up" value="2" class="easyui-switchbutton" onclick="tx_enable('#date_ever_EEG_up')"> ไม่เคย 
                       
                    </td>
                </tr>
                
                <tr>
                    <td>ผลการตรวจ EEG : </td>
                    <td>
                        <input type="radio" name="results_EEG_up" id="use_results_EEG_up" value="1" class="easyui-switchbutton" onclick="tx_disable('#date_results_EEG_up')"> เคย (วัน-เดือน-ปี) <input class="easyui-datetimebox" name="date_results_EEG_up" id="date_results_EEG_up"   style="width:200px" data-options=" readonly:'true' ">
                       <br>
                       <input type="radio" name="results_EEG_up" id="null_results_EEG_up" value="2" class="easyui-switchbutton" onclick="tx_enable('#date_results_EEG_up')"> ไม่เคย 
                       
                    </td>
                </tr>
                
                <tr>
                    <td>เคยตรวจ CT/MRI มาก่อนหรือไม่ :</td>
                    <td>
                        <input type="radio" name="ever_CT_MRI_up" id="use_ever_CT_MRI_up" value="1" class="easyui-switchbutton" onclick="tx_disable('#date_ever_CT_MRI_up')"> เคย (วัน-เดือน-ปี) <input class="easyui-datetimebox" id="date_ever_CT_MRI_up" name="date_ever_CT_MRI_up" style="width:200px" data-options=" readonly:'true' ">
                       <br>
                       <input type="radio" name="ever_CT_MRI_up" id="null_ever_CT_MRI_up" value="2" class="easyui-switchbutton" onclick="tx_enable('#date_ever_CT_MRI_up')"> ไม่เคย 
                       
                    </td>
                </tr>
                
                <tr>
                    <td>เคยตรวจ CT/MRI :</td>
                    <td>
                        <input type="radio" name="result_CT_MRI_up" id="use_result_CT_MRI_up" value="1" class="easyui-switchbutton" onclick="tx_disable('#date_result_CT_MRI_up')"> เคย (วัน-เดือน-ปี) <input class="easyui-datetimebox" id="date_result_CT_MRI_up" name="date_result_CT_MRI_up" data-options=" readonly:'true' " style="width:200px">
                       <br>
                       <input type="radio" name="result_CT_MRI_up" id="null_result_CT_MRI_up" value="2" class="easyui-switchbutton" onclick="tx_enable('#date_result_CT_MRI_up')"> ไม่เคย 
                       
                    </td>
                </tr>
                
                <tr>
                    <td>
                        ลักษณะความผิดปกติจาก CT/MRI :
                    </td>
                    <td>
                        <select class="easyui-combobox" name="nature_CT_MRI_up" id="nature_CT_MRI_up" style="width:200px;" data-options="onSelect:function()
                                {
                                  
                                  var  id_ck=$('#nature_CT_MRI_up').combobox('getValue');
                                  //$.messager.alert('Info',id_ck,'info');
                                  if( id_ck == 14 )
                                  {
                                    $('#other_Nature_CT_MRI_up').textbox('readonly',false);
                                    $('#other_Nature_CT_MRI_up').textbox({ iconCls:'icon-add' });
                                  }
                                  else
                                  {
                                    $('#other_Nature_CT_MRI_up').textbox('readonly',true);
                                    $('#other_Nature_CT_MRI_up').textbox({ iconCls:'icon-lock' });
                                  }
                                  
                                }">
                           <option value="">: เลือก :</option>
                           <option value="1">Brain atrophy</option>
                           <option value="2">Brain metastasis</option>
                           <option value="3">Cortical dysplasia</option>
                           <option value="4">Cysticercosis</option>
                           <option value="5">Encephalomalacia</option>
                           <option value="6">Granulomatous lesion</option>
                           <option value="7">Hemorrhage stroke</option>
                           <option value="8">Heterotropia</option>
                           <option value="9">Hippocampal sclerosis</option>  
                           <option value="10">Hydrocephalus</option>
                           <option value="11">Ischemic stroke</option>
                           <option value="12">Post craniotomy</option>
                           <option value="13">Primary brain tumor</option>
                           <option value="14">Other</option>
                           <option value="15">Normal finding</option>
                       </select>
                        <br> 
                        อื่นๆ ระบุ :
                        <input name="other_Nature_CT_MRI_up" id="other_Nature_CT_MRI_up" class="f1 easyui-textbox" style="width:300px" data-options="iconCls:'icon-lock',readonly:'true'  "></input>
                   
                       
                    </td>
                </tr>
                
                <tr>
                    <td>
                        ยาที่ได้รับมาก่อนหน้านี้พร้อมระบุความรุนแรงและแบบแผนการใช้ยา :
                    </td>
                    <td>
                        <select class="easyui-combobox" name="drug_id_up" id="drug_id_up" style="width:200px;" data-options=" onSelect:function(){
                                 var id_ck=$('#drug_id_up').combobox('getValue');
                                 //alert(id_ck);
                                   if( id_ck == 9 )
                                   {
                                      $('#drug_other_up').textbox('readonly',false);
                                      $('#drug_other_up').textbox({iconCls:'icon-add'});
                                   }
                                   else
                                   {
                                      $('#drug_other_up').textbox('readonly',true);
                                      $('#drug_other_up').textbox({iconCls:'icon-lock'});
                                   }
                                }
                                ">
                           <option value="">: เลือก :</option>
                           <option value="1">1.Carbamazepine</option>
                           <option value="2">2.Phenobarbita</option>
                           <option value="3">3.Phenytoin</option>
                           <option value="4">4.Sodium valproate</option>
                           <option value="5">5.Gabapen</option>
                           <option value="6">6.Lamotrigine</option>
                           <option value="7">7.Levetiracetam</option>
                           <option value="8">8.Topiramate</option>
                           <option value="9">9.Other</option>
                       </select> 
                        <br>
                         อื่นๆ ระบุ :
                         <input name="drug_other_up" id="drug_other_up" class="f1 easyui-textbox" style="width:300px" data-options=" readonly:'true',iconCls:'icon-lock' "></input>
                   
                        
                    </td>
                </tr>
                
                <tr>
                    <td>
                    โรคร่วมอื่นๆ ของผู้ป่วย :    
                    </td>
                    <td>
                        <select class="easyui-combobox" name="disease_drug_id_up" id="disease_drug_id_up" style="width:200px;" data-options=" onSelect:function(){
                                 var id_ck=$('#disease_drug_id_up').combobox('getValue');
                                 //alert(id_ck);
                                   if( id_ck == 6 )
                                   {
                                      $('#disease_drug_other_up').textbox('readonly',false);
                                      $('#disease_drug_other_up').textbox({iconCls:'icon-add'});
                                   }
                                   else
                                   {
                                      $('#disease_drug_other_up').textbox('readonly',true);
                                      $('#disease_drug_other_up').textbox({iconCls:'icon-lock'});
                                   }
                                }
                                ">
                           <option value="">: เลือก :</option>
                           <option value="1">ไม่มี</option>
                           <option value="2">โรคไขมันในเลือดสูง</option>
                           <option value="3">โรคความดันโลหิตสูง</option>
                           <option value="4">โรคเบาหวาน</option>
                           <option value="5">โรคหลอดเลือดในสมองอุดตัน</option>
                           <option value="6">โรคอื่นๆ ระบุ</option>
                          
                       </select> 
                        <br>
                       อื่นๆ ระบุ :
                       <input name="disease_drug_other_up" id="disease_drug_other_up" class="f1 easyui-textbox" style="width:350px" data-options=" readonly:'true',iconCls:'icon-lock' "></input>
                    
                    </td>
                </tr>
                
                <tr>
                    <td>
                     ประวัติการแพ้ยา :   
                    </td>
                    <td>
                        <input type="radio" name="allergic_up" id="use_allergic_up" value="1" class="easyui-switchbutton" onclick="tx_disable('#date_allergic_up'),txtboxHid('#allergic_detail_up')"> เคย (วัน-เดือน-ปี) <input class="easyui-datetimebox" id="date_allergic_up" name="date_allergic_up" style="width:200px" data-options=" readonly:'true' ">
                       <br>
                       <input type="radio" name="allergic_up" id="nuLL_allergic_up" value="2" class="easyui-switchbutton" onclick="tx_enable('#date_allergic_up'),txtboxSh('#allergic_detail_up')"> ไม่เคย   
                       <br>
                       ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่นที่ไม่ใช่ยากันชัก ) :
                    <input name="allergic_detail_up" id="allergic_detail_up" class="f1 easyui-textbox" style="width:350px" data-options=" readonly:'true',iconCls:'icon-lock' "></input>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        ยากันชักที่แพ้ :
                    </td>
                    <td>
                        <select class="easyui-combobox" name="drug_epilepsy_up" id="drug_epilepsy_up" style="width:200px;" data-options=" onSelect:function(){
                                 var id_ck=$('#drug_epilepsy_up').combobox('getValue');
                                 //alert(id_ck);
                                   if( id_ck == 6 )
                                   {
                                      $('#drug_epilepsy_detail_up').textbox('readonly',false);
                                      $('#drug_epilepsy_detail_up').textbox({iconCls:'icon-add'});
                                   }
                                   else
                                   {
                                      $('#drug_epilepsy_detail_up').textbox('readonly',true);
                                      $('#drug_epilepsy_detail_up').textbox({iconCls:'icon-lock'});
                                   }
                                }
                                ">
                           <option value="">: เลือก :</option>
                           <option value="1">ไม่มี</option>
                           <option value="2">โรคไขมันในเลือดสูง</option>
                           <option value="3">โรคความดันโลหิตสูง</option>
                           <option value="4">โรคเบาหวาน</option>
                           <option value="5">โรคหลอดเลือดในสมองอุดตัน</option>
                           <option value="6">โรคอื่นๆ ระบุ</option>
                       </select>
                        <br>
                    อื่นๆ ระบุ :
                    <input name="drug_epilepsy_detail_up" id="drug_epilepsy_detail_up" class="f1 easyui-textbox" style="width:350px" data-options=" readonly:'true',iconCls:'icon-lock' "></input>    
                        
                    </td>
                </tr>
                
                <tr>
                    <td>
                        ลักษณะการแพ้ยากันชัก :
                    </td>
                    <td>
                        <select class="easyui-combobox" name="nature_drug_epilepsy_id_up" id="nature_drug_epilepsy_id_up" style="width:200px;" data-options=" onSelect:function(){
                                 var id_ck=$('#nature_drug_epilepsy_id_up').combobox('getValue');
                                 //alert(id_ck);
                                   if( id_ck == 6 )
                                   {
                                      $('#Nature_drug_epilepsy_other_up').textbox('readonly',false);
                                      $('#Nature_drug_epilepsy_other_up').textbox({iconCls:'icon-add'});
                                   }
                                   else
                                   {
                                      $('#Nature_drug_epilepsy_other_up').textbox('readonly',true);
                                      $('#Nature_drug_epilepsy_other_up').textbox({iconCls:'icon-lock'});
                                   }
                                }
                                ">
                           <option value="">: เลือก :</option>
                           <option value="1">Antiepileptic hypersensitivity syndrome</option>
                           <option value="2">Rash</option>
                           <option value="3">Stevent Johnson syndrome</option>
                           <option value="4">TEN</option>
                           <option value="5">Urticaria</option>
                           <option value="6">อื่นๆ ระบุ</option>
                       </select> 
                        <br>
                    อื่นๆ ระบุ :
                    <input name="Nature_drug_epilepsy_other_up" id="Nature_drug_epilepsy_other_up" class="f1 easyui-textbox" style="width:350px" data-options=" readonly:'true',iconCls:'icon-lock' "></input>    
                        
                    </td>
                </tr>
                
                <tr>
                    <td>
                        สิ่งกระตุ้นให้เกิดอาการชัก :
                    </td>
                    <td>
                        <select class="easyui-combobox" name="stimulate_epilepsy_id_up" id="stimulate_epilepsy_id_up" style="width:200px;" data-options=" onSelect:function(){
                                 var id_ck=$('#stimulate_epilepsy_id_up').combobox('getValue');
                                 //alert(id_ck);
                                   if( id_ck == 5 )
                                   {
                                      $('#stimulate_epilepsy_other_up').textbox('readonly',false);
                                      $('#stimulate_epilepsy_other_up').textbox({iconCls:'icon-add'});
                                   }
                                   else
                                   {
                                      $('#stimulate_epilepsy_other_up').textbox('readonly',true);
                                      $('#stimulate_epilepsy_other_up').textbox({iconCls:'icon-lock'});
                                   }
                                }
                                ">
                           <option value="">: เลือก :</option>
                           <option value="1">ความเครียด</option>
                           <option value="2">เครื่องดื่มแลกอฮอล์</option>
                           <option value="3">ประจำเดือน</option>
                           <option value="4">พักผ่อนไม่เพียงพอ</option>
                           <option value="5">อื่นๆ ระบุ</option>                           
                       </select> 
                        <br>
                    อื่นๆ ระบุ :
                    <input name="stimulate_epilepsy_other_up" id="stimulate_epilepsy_other_up" class="f1 easyui-textbox" style="width:350px" data-options=" readonly:'true',iconCls:'icon-lock' "></input>    
                        
                    </td>
                </tr>
                
                
                <tr>
                    <td>วัน-เดือน-ปี ที่สัมภาษณ์</td>
                    <td>
                        <input class="easyui-datetimebox"  id="interview_date_up" name="interview_date_up" required style="width:200px">
                    </td>
                </tr>
                
              
                <!--
                 <tr>
                    <td>ชื่อ ผู้สัมภาษณ์</td>
                    <td>
                        <input class="f1 easyui-textbox"  id="interview_name" name="interview_name"  style="width:150px">
                    </td>
                </tr>
                
                <tr>
                    <td>นามสกุล ผู้สัมภาษณ์</td>
                    <td>
                        <input class="f1 easyui-textbox"  id="interview_lastname" name="interview_name"  style="width:150px">
                    </td>
                </tr>
                -->
                
                 <tr>
                    <td></td>
                    <td>
                        
                    </td>
                </tr>
                
                
                
                <tr>                  
                    <td></td>
                    <td>
                        <input type="submit" id="btn_submit"  value="แก้ไขข้อมูล"></input>
                        <input type="button" value="ปิดหน้าต่าง" onclick="closewin()"></input>
                    </td>
                </tr>
                
                
                
            </table>
        </form>
    </div>

    
    
</div>
