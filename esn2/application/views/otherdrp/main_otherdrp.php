<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        function   fr_insert()
        {
            $('#win_drp').window('open');
           // var url='<?=base_url()?>index.php/adr/insertADR/';
            
        }
        function  savedrp(url)  //savedrp
        {
            $('#fr_drp').form('submit',{
                //url: '<?=base_url()?>index.php/adr/insertdrp/' ,
                url:url ,
                success:function(result)
                {
                      //alert(result);
                      if( result  == '1' )
                      {
                           $.messager.alert('สถานะการบันทึก','บันทึกข้อมูลสำเร็จ','Info');    
                      }
                      else if(   result == '0' )
                      {
                            $.messager.alert('สถานะการบันทึก','บันทึกข้อมูลล้มเหลว','Error');    
                       }
                    //  $("#win_drp").window('close');
                     $('#dg_drp').datagrid('reload');
                }
            });
        }
        function updatedrp(url)
        {
           $('#fr_drp').form('submit',{
                //url: '<?=base_url()?>index.php/adr/insertADR/' ,
                url:url ,
                success:function(result)
                {
                     //alert(result);
                    $("#win_drp").window('close');
                    $('#dg_drp').datagrid('reload');
                }
            }); 
        }
 
 //-- datagrid Main---
 $(function(){
     
  $('#dg_drp').datagrid({
            url:'<?=base_url()?>index.php/otherdrp/loadOtherdrp/',
            rownumbers:true,
            fitColumns:true,
            singleSelect:true,
            columns:[[ 
            { field:'HN',title:'HN'   },
            { field:'MonitoringDate',title:'MonitoringDate'  },
           // { field:'DRPselection3',title:'Other DRPs' },
            { field:'selectiondetail',title:'Other DRPs' },
            { field:'DRPDrug3',title:'Drug/Product' },
            { field:'DRPDetail3',title:'Detail' },
            //{ field:'Action3',title:'Action' },
             { field:'action_detail',title:'Action' }, 
           // { field:'Response3',title:'Result' },
             { field:'result_detail',title:'Result' },
            { field:'ResponseDetail3',title:'Result Detail' },
            { field:'followup',title:'followup' },
            { field:'week',title:'week' },
             
             
            /*
            { field:'DRPselection4',title:'Medication error' },
            { field:'MedicationErrorDrug4',title:'Drug/Product' },
            { field:'MedicationErrorDetail',title:'Detail' },
            { field:'Action4',title:'Action' },
            { field:'Response4',title:'Result'},
            { field:'ResponseDetail4',title:'Result Detail' },
            { field:'followup',title:'follow up' },
            { field:'week',title:'week' },
            */
            
            
                    ]],
            toolbar:[  
                        { text:'Reload',iconCls:'icon-reload',handler:function(data){ $('#dg_drp').datagrid('reload');   }    },
                        { text:'เพิ่มข้อมูล',iconCls:'icon-add',handler:function(data)
                            { 
                                //$.messager.alert('t'); 
                                $('#win_drp').window('open');
                                
                                
                                /*
                                  $('#btn_save_adr').bind('click',function()
                                        {
                                            //alert('t');
                                            saveADR('<?=base_url()?>index.php/adr/insertADR/');
                                        });
                                */
                                
                            }    
                        },
                        { text:'ลบข้อมูล', iconCls:'icon-remove',handler:function(data)
                                {  
                                     var  row=$('#dg_drp').datagrid('getSelected');
                                     if(row)
                                     {
                         
                                           $.messager.confirm('สถานะการลบข้อมูล','คุณแน่ต้องการลบข้อมูลหรือไม่',function(r)
                                           {
                                               
                                               
                                                if(r) 
                                                   { 
                                                        $.post("<?=base_url()?>index.php/otherdrp/deldrp/" + row.HN + "/"  +  row.MonitoringDate ,function(data)
                                                          {                                                                                                     
                                                            var ck=data.success;
                                                             if( ck == 1 )
                                                             {
                                                                 $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','Info');
                                                                 $('#dg_drp').datagrid('reload'); 
                                                             }
                                                             else if( ck == 0 )
                                                             {
                                                                 $.messager.alert('สถานะการลบข้อมูล','ไม่สามารถลบข้อมูลได้','error');
                                                             }
                                                          },'json');
                                                   
                                                    }     
                                                   
                                           });
                                   
                                     }
                                             
                                }  
                        },
                        {  
                           text:'แก้ไขข้อมูล',iconCls:'icon-edit',handler:function(data)
                            {
                                var  row=$('#dg_drp').datagrid('getSelected');
                                if( row ) 
                                    { 
                                                       
                                           //alert('t');            
                                                      
                                          $('#win_drp').window('open');
                                          $('#fr_drp').form('load','<?=base_url()?>index.php/otherdrp/fetchdrp/'  +  row.HN  + '/' + row.MonitoringDate );
                                         
                                         // _url='<?=base_url()?>index.php/noncomp/updateNoncomp/'   +  row.HN  + '/' + row.MonitoringDate;
                                          
                                                   
                                    } 
                            }
                        }
                     ] 
        });   
     
     
 });
 
 





    </script>
    
</head>

<body>
    
    
    
    <div style="margin:10px 0 10px 0;"></div>
    
  
    
    <table id="dg_drp" class="easyui-datagrid">           
    </table>
    
    <!--  Popup B.Ientity -->
    <div class="easyui-dialog"  id="dia_drp"  style="width:750px;height: 500px;padding: 10px;left:30px;top:30px;"  title="B.Identify DRPs(Non Compliance) History"   
         data-options=" 
             closed:true,
             iconCls:'icon-large-chart',
             buttons:[   
             //  {  text:'<< Prev',handler:function(){  alert('t'); }     },
             //     { text:'Next >>', handler:function(){  alert('t'); }  },
                {  text:'Close',iconCls:'icon-cancel', handler:function(){  $('#dia_drp').dialog('close');  } },        
             ]
         " 
         >
        <div style="padding: 10px;">
            <label>
                
                 Monitoring Date :
                 
                <!-- url:'<?=base_url()?>index.php/otherdrp/loadOtherdrp/',  -->
                <input class="easyui-combobox"   id="drp_date"   style="width:200px;height: 30px;" 
                       data-options="
                        //  url:'<?=base_url()?>index.php/otherdrp/loadOtherdrp/'  +   $('#HN_drp').textbox('getValue')   ,
                        url:'<?=base_url()?>index.php/otherdrp/hn_dmy_other/ab3540/'   +    $('#HN_drp').textbox('getValue')   ,
                          valueField:'MonitoringDate',
                          textField:'MonitoringDate',
                          onSelect:function()
                          {
                                  var   d=$('#drp_date').combobox('getValue');
                                //  alert(d);
                                $.getJSON(  '<?=base_url()?>index.php/otherdrp/view_otherdrp/'  +  d   +   '/'   +   $('#HN_drp').textbox('getValue')    ,function(data) 
                                {   
                                     $.each(data,function(v,k)
                                     {  
                                            //alert( v  +  k.HN  );  
                                            $('#DRPDrug3_view').combobox('setValue',k.DRPDrug3);
                                            $('#DRPselection3_view').combobox('setValue',k.DRPselection3);
                                            
                                             var  Action3=k.Action3;
                                            //  alert(Action3);
                                              
                                           if(   Action3 == 1  )
                                           {
                                                $('#Action3_drp_1').attr('checked',true);
                                           }else if(     Action3 == 2  )
                                           {
                                                $('#Action3_drp_2').attr('checked',true);
                                           }
                                          
                                              var  InterventionPT3_1= k.InterventionPT3_1;
                                             // alert( InterventionPT3_1 );
                                             if(   InterventionPT3_1 == 'Y' )
                                             {
                                                   $('#InterventionPT3-1_drp').attr('checked',true);   // Adjust for appropriate therapy due to health system
                                             }
                                          
                                             
                                             
                                             var  InterventionPT3_2=k.InterventionPT3_2;
                                         //  alert(InterventionPT3_2);
                                             if(    InterventionPT3_2 == 'Y'  )
                                             {
                                                 $('#InterventionPT3_2_drp').attr('checked',true);    //Correct technique of administration
                                             }
                                    
                                              var   InterventionPT3_3=k.InterventionPT3_3;
                                              //alert(InterventionPT3_3);
                                              if(  InterventionPT3_3 == 'Y'  )
                                              {
                                                  $('# InterventionPT3_3_drp').attr('checked',true); // Improve compliance
                                              }
                                              
                                              var InterventionPT3_4=k.InterventionPT3_4;  // Inform drug related problems
                                            //  alert(InterventionPT3_4);
                                               if(  InterventionPT3_4  == 'Y' )
                                               {
                                                   $('#InterventionPT3_4_drp').attr('checked',true); 
                                               }
                                             
                                               var   InterventionPT3_5=k.InterventionPT3_5;  // Life style modication
                                               //alert( InterventionPT3_5 );
                                               if( InterventionPT3_5 == 'Y'  )
                                               {
                                                   $('#InterventionPT3_5_drp').attr('checked',true);
                                               }
                                               
                                               var  InterventionPT3_6=k.InterventionPT3_6;  //Monitor efficacy and toxicity 
                                             //  alert(InterventionPT3_6);
                                               //InterventionPT3_6_drp
                                               if(  InterventionPT3_6 == 'Y'  )
                                               {
                                                   $('#InterventionPT3_6_drp').attr('checked',true);
                                               }
                                               
                                               var  InterventionPT3_7=k.InterventionPT3_7;  //Prevention of Adverse drug reaction
                                               //InterventionPT3_7_drp
                                              // alert( InterventionPT3_7   );
                                               if( InterventionPT3_7 == 'Y' )
                                               {
                                                    $('#InterventionPT3_7_drp').attr('checked',true);
                                               }
                                               
                                               var   InterventionDoctor3_1=k.InterventionDoctor3_1;
                                             //  alert( InterventionDoctor3_1);
                                               if(  InterventionDoctor3_1 == 'Y'  )
                                               {
                                                  $('#InterventionDoctor3_1_drp').attr('checked',true);
                                               }
                                               
                                               var  InterventionDoctor3_2=k.InterventionDoctor3_2; //Adjust dosage reqimen
                                             //  alert(  InterventionDoctor3_2  );
                                               if(   InterventionDoctor3_2  == 'Y'  )
                                               {
                                                   $('#InterventionDoctor3_2_drp').attr('checked',true);
                                               }
                                               
                                               var  InterventionDoctor3_3=k.InterventionDoctor3_3;   //Confirm prescription 
                                               //alert(   InterventionDoctor3_3  );
                                               if(   InterventionDoctor3_3  == 'Y'  )
                                               {
                                                    $('#InterventionDoctor3_3_drp').attr('checked',true);
                                               }
                                               
                                               var  InterventionDoctor3_4=k.InterventionDoctor3_4;  //Discontinue medication
                                             //  alert(  InterventionDoctor3_4  );
                                                 if(     InterventionDoctor3_4  == 'Y'  )
                                                 {
                                                         $('#InterventionDoctor3_4_drp').attr('checked',true);
                                                 }
                                              
                                               var   InterventionDoctor3_5=k.InterventionDoctor3_5;
                                             //  alert(InterventionDoctor3_5);
                                               if(  InterventionDoctor3_5_drp  == 'Y'  )
                                               {
                                                   $('#InterventionDoctor3_5_drp').attr('checked',true);   
                                               }
                                              
                                               var  InterventionDoctor3_6=k.InterventionDoctor3_6;  //Suggest changing medication
                                              // alert(InterventionDoctor3_6);
                                               if( InterventionDoctor3_6 == 'Y' )
                                               {
                                                    $('#InterventionDoctor3_6_drp').attr('checked',true);
                                               }
                                               
                                               var  InterventionDoctor3_7=k.InterventionDoctor3_7;  //Suggest laboratory 
                                              // alert(   InterventionDoctor3_7   );
                                               if( InterventionDoctor3_7 == 'Y' )
                                               {
                                                    $('#InterventionDoctor3_7_drp').attr('checked',true);
                                               }
                                               
                                              
                                           
                                               
                                               /*
                                               drp_response      Resolved
                                               drp_improved       Improved 
                                                drp_notim        Not Improved
                                                drp_na          N/A
                                                */
                                                var  Response3=k.Response3;
                                                if( Response3 == 1 )
                                                {
                                                     $('#drp_response').attr('checked',true);
                                                }
                                                else if (  Response3 == 2 )
                                                {
                                                     $('#drp_improved').attr('checked',true);
                                                }
                                                else if(   Response3 == 3 )
                                                {
                                                     $('#drp_notim').attr('checked',true);
                                                }
                                                else if(    Response3 == 4   )
                                                {
                                                      $('#drp_na').attr('checked',true);
                                                }
                                               
                                               var   ResponseDetail3=k.ResponseDetail3;
                                               //alert( ResponseDetail3 );
                                               $('#ResponseDetail3_drp').textbox('setValue',ResponseDetail3); 
                                               
                                     });
                                });
                          }
                       "
                       />
                
               
            </label>
            
        </div>
        <div style="padding: 10px;">
            <label>
                Drug/Product : <input class="easyui-combobox"   id="DRPDrug3_view"  name="DRPDrug3_view"  style="width: 200px;height: 30px;" 
                                      data-options="
                                      url:'<?=base_url()?>index.php/otherdrp/tb_drug',
                                      valueField:'Drug',
                                      textField:'Drug',
                                      mode:'remote',
                                      
                                      "
                                      />
            </label>
        </div>
        <div style="padding: 10px;">
            <label>
                Non Compliance Type : 
                <input class="easyui-combobox"  id="DRPselection3_view" name="DRPselection3_view"  style="width: 200px;height: 30px;" 
                                      data-options="
                                      valueField:'value',
                                      textField:'label',
                                      data:[
                                         { value:0,label:' No ' },
                                         {  value:1,label:'Over dosage'    },
                                         {  value:2,label:'Under dosage'    },
                                         {  value:3,label:'Not compliance with the life style'    },
                                         {  value:4,label:'Incorrect technique'    },
                                      ]
                                      "
                                      />
                ร้อยละของความร่วมมือไม่ร่วมมือ : 20.0 
                <a  href="javascript:void(0)" class="easyui-linkbutton"    style="width:100px;height: 50px;"  > แก้ไขร้อยละของความไม่ร่วมมือ </a>
            </label>
        </div>
        
         <div style="padding: 10px;">
             
             Action :   <input  type="radio" id="Action3_drp_1"      value="1"> Prevent
             <input  type="radio"  id="Action3_drp_2"    value="2"> Correct
        
            
        </div>
        
        <div style="padding: 10px;">
            <label>
                  Intervention :       
            </label>
                           
        </div>
        <div style="padding: 10px;">
            <?=nbs(10)?>
            <label>
                   Patient                                
            </label>
            <?=nbs(70)?>
            <label>
                   Doctor
            </label>
            
        </div>
        <div style="padding: 10px;">
            <label>
                <input  type="checkbox"  id="InterventionPT3-1_drp"  name="InterventionPT3-1_drp" /> Adjust for appropriate therapy due to health system
            <input  type="checkbox"  id="InterventionDoctor3_1_drp"  name="InterventionDoctor3_1_drp" /> Add new medication
            </label>
        </div>
        
        <div style="padding: 10px;">
            <label>
                <input  type="checkbox" id="InterventionPT3_2_drp"  name="InterventionPT3_2_drp"  /> Correct technique of administration
                <input  type="checkbox"  id="InterventionDoctor3_2_drp"  name="InterventionDoctor3_2_drp"  /> Adjust dosage reqimen
            </label>
        </div>
        
        <div style="padding: 10px;">
            <label>
                <input  type="checkbox" id="InterventionPT3_3_drp"  name="InterventionPT3_3_drp" /> Improve compliance
                <input  type="checkbox"   id="InterventionDoctor3_3_drp"   name="InterventionDoctor3_3_drp"  /> Confirm prescription
            </label>
        </div>
        
                <div style="padding: 10px;">
            <label>
                <input  type="checkbox" id="InterventionPT3_4_drp"  name="InterventionPT3_4_drp" /> Inform drug related problems
                <input  type="checkbox"  id="InterventionDoctor3_4_drp"  name="InterventionDoctor3_4_drp" /> Discontinue medication
            </label>
        </div>
        
                        <div style="padding: 10px;">
            <label>
                <input  type="checkbox"  id="InterventionPT3_5_drp"  name="InterventionPT3_5_drp" /> Life style modication
                <input  type="checkbox"  id="InterventionDoctor3_5_drp"  name="InterventionDoctor3_5_drp"  /> Inform drug related problems
            </label>
        </div>
        
         <div style="padding: 10px;">
            <label>
                <input  type="checkbox"  id="InterventionPT3_6_drp"  name="InterventionPT3_6_drp" /> Monitor efficacy and toxicity
                <input  type="checkbox"  id="InterventionDoctor3_6_drp"  name="InterventionDoctor3_6_drp" /> Suggest changing medication
            </label>
        </div>
        
                 <div style="padding: 10px;">
            <label>
                <input  type="checkbox"  id="InterventionPT3_7_drp" name="InterventionPT3_7_drp" /> Prevention of Adverse drug reaction
                <input  type="checkbox"  id="InterventionDoctor3_7_drp"  name="InterventionDoctor3_7_drp" /> Suggest laboratory
            </label>
        </div>
        
        <div style="padding: 10px">
            <label>
                 Response :
            </label>
            
        </div>
        
        <div style="padding: 10px">
            <label>
               
                <input type="radio"  id="drp_response"  name="drp_response"  /> Resolved
                <input type="radio"  id="drp_improved"  name="drp_improved" /> Improved 
                
                
                <input class="easyui-textbox"  data-options=" multiline:true "  id="ResponseDetail3_drp"  name="ResponseDetail3_drp"  style="width:300px;height: 50px;"   />
                  
                <br>
                
                <input type="radio" id="drp_notim"   name="drp_notim" /> Not Improved
                <input type="radio"  id="drp_na" name="drp_na" /> N/A
                
            </label>

        </div>
        
          <div style="padding: 10px">
              <label>
                   Cause: 
              </label>
          </div>
        
        <div style="padding: 10px">
            <label>
               
                <input type="checkbox"    />  สาเหตุจากตัวผู้ป่วย
                <input type="checkbox"    />  สาเหตุจากโรค
                <input type="checkbox"    />  สาเหตุจากยา
            </label>
        </div>
        
         <div style="padding: 10px">
            <label>
   
                <input type="checkbox"    />  สาเหตุจากตัวผู้ดูแล
                <input type="checkbox"    />  สาเหตุอื่นๆ
                
            </label>
        </div>
        
                 <div style="padding: 10px">
                     <label>
                         ผู้ประเมิน : <input class="easyui-combogrid"  style="width:200px;height: 30px;"  
                                             data-options="
                                                url:'<?=base_url()?>index.php/otherdrp/tb_user',
                                             idField:'UserCode',
                                              textField:'UserName'  ,
                                              mode:'remote',
                                             method:'post',
                                             singleSelect:true,
                                          
                                              fitColumns:true,
                                              columns : [[
                                                {  field:'UserName', title:'UserName', },
                                                {  field:'UserSurname',title:'UserSurname', },
                                                
                                              ]]
                                             "
                                             />    
                     </label>
              </div>

        
    </div>
     <!--  Popup B.Ientity -->
    
    
    <div id="win_drp" class="easyui-window" title="เพิ่มข้อมูล/แก้ไขข้อมูล Other DRPs" data-options="
         modal:true,
         closed:true,
         iconCls:'icon-large-smartart',
         size:'large',
         " 
         style="width:600px;height:600px;padding:10px;top:10px;left:10px;">
                        <form id="fr_drp" class="easyui-form" method="post" data-options="novalidate:true">
                            <table cellpadding="5">
                                <tr>
                                    <td>
                                        HN :
                                    </td>
                                    <td>
                                      <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_drp" name="HN_drp" data-options="iconCls:'icon-man',readonly:true " required="requireed" >
                                    </td>
                                </tr>
                                <tr>
                                    
                                    
                <tr>
                    <td>
                       MonitoringDate : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_drp" name="MonitoringDate_drp"  required="true">
                    </td>
                </tr>
                
                                <tr>  
                                    <td>
                                        Other DRPs :
                                    </td>
                                    <td>
                                         <select class="easyui-combobox" name="DRPselection3" id="DRPselection3" style="width:200px;height: 30px" >
                                                <option value=0>No</option>
                                                <option value=1>Need for addition drug therapy</option>
                                                 <option value=2>Improper drug selection</option>
                                                 <option value=3>Improper dosage regimen</option>
                                                 <option value=4>Failure to receive medication</option>
                                                 <option value=5>Drug interaction</option>
                                                 <option value=6>Unnecessary drug therapy</option>
                                                 <option value=7>Duplication/Repeated</option>
                                                 <option value=8>Other</option>
                                        </select>
                                        
                                        <a href="#" class="easyui-linkbutton"  data-options=" iconCls:'icon-print' "  onclick=" $('#dia_drp').dialog('open');  " >View</a>  
                                        <a href="#"  class="easyui-linkbutton"  data-options=" iconCls:'icon-add' " onclick="$('#dia_drp').dialog('open');" >Add</a>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td> Drug/Product : </td>
                                    <td>
                                        <input class="easyui-combobox" name="DRPDrug3" id="DRPDrug3"  style="height: 30px;" data-options="
                                               url:'<?=base_url()?>index.php/noncomp/option_drug',
                                               method:'post',
                                               valueField:'Drug',
                                               textField:'Drug',
                                               panelHeight:'auto',
                                               " />
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td> Detail : </td>
                                    <td>
                                        <input class="easyui-textbox"  id="DRPDetail3" name="DRPDetail3" style="width:200px;height: 30px;"  data-options=" iconCls:'icon-man'   " >
                                     </td>
                                </tr>
                                
                                 <tr>
                                    <td> Action : </td>
                                    <td>
                                        <input  type="radio" name="Action3" id="Action2_use" value="1" /> Prevent
                                        <input  type="radio" name="Action3" id="Action2_no"  value="2"/> Correct 
                                     </td>
                                </tr>
                                
                                <tr>
                                    <td> Intervention : </td>
                                    <td>
                                        <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-print',size:'large' "  style="height:30px" >Click To Add Intervention</a>
                                     </td>
                                </tr>
                                
                                  <tr>
                                    <td> Result : </td>
                                    <td>
                                        <input  type="radio" name="Response3" id="Response2_Resolved"  value="1" /> Resolved
                                        <input  type="radio" name="Response3" id="Response2_Improved" value="2"/> Improved 
                                        <input  type="radio" name="Response3" id="Response2_Not_Improved" value="3" /> Not Improved
                                        <input  type="radio" name="Response3" id="Response2_N/A" value="4"/> N/A 
                                        <br>
                                        <input class="easyui-textbox" style="width:300px;height: 40px" data-options=" iconCls:'icon-man' " id="ResponseDetail3" name="ResponseDetail3" />
                                     </td>
                                </tr>
                                
                                      
                                       
                                       <tr>
                                           <td>
                                               Follow Up :
                                           </td>
                                           <td>
                                               <input class="easyui-numberbox" id="followup_drp"  name="followup_drp"  style="width:50px;height: 30px;" />
                                           </td>
                                       </tr>
                                       
                                       <tr>
                                           <td>
                                               week :
                                           </td>
                                           <td>
                                               <input class="easyui-datebox" id="week_drp" name="week_drp"  style="height: 30px;" >
                                           </td>
                                       </tr>
                                       
                                       
                                       <tr>
                                           <td colspan="2">
                                              <!-- <a id="btn_save_adr"  href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-add',size:'large' "  style="height:30px" onclick="savedrp('<?=base_url()?>index.php/otherdrp/insertdrp')" > บันทึก </a> -->
                                               <input  type="submit"   onclick="
                                                       //alert('t');
                                                       var    url='<?=base_url()?>index.php/otherdrp/insertdrp';
                                                       savedrp(url);
                                                       
                                                       /*
                                                           $('#fr_drp').form({
                                                               url:'<?=base_url()?>index.php/otherdrp/insertdrp',
                                                                      success:function(data)
                                                                       {
                                                                             alert(data);
                                                                        }
                                                           });    
                                                           */
                                                           
                                                       "   />
                                               
                                               <!-- onclick="saveADR('<?=base_url()?>index.php/adr/insertADR/')" -->
                                            
                                               <!--
                                               <a id="btn_save_adr"  href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-edit',size:'large' "  style="height:30px" onclick="updatedrp('<?=base_url()?>index.php/otherdrp/updatedrp')" > แก้ไข </a> 
                                               -->
                                               
                                               <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-remove',size:'large' "    style="height:30px"  onclick=" $('#win_drp').window('close');">ปิด </a>
                                               
                                           </td>
                                       </tr>
                                       
                                       
                                       
                            </table>
                        </form>    
    </div>
    
</body>
</html>
    