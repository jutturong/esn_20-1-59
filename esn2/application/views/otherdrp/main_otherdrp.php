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
            { field:'DRPselection3',title:'Other DRPs' },
            { field:'DRPDrug3',title:'Drug/Product' },
            { field:'DRPDetail3',title:'Detail' },
            { field:'Action3',title:'Action' },
            { field:'Response3',title:'Result' },
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
             closed:false,
             iconCls:'icon-large-chart',
             buttons:[   
                {  text:'<< Prev',handler:function(){  alert('t'); }     },
                  { text:'Next >>', handler:function(){  alert('t'); }  },
                {  text:'Close',iconCls:'icon-cancel', handler:function(){  $('#dia_drp').dialog('close');  } },        
             ]
         " 
         >
        <div style="padding: 10px;">
            <label>
                Monitoring Date : <input class="easyui-datebox"  id="drp_date" style="width:200px;height: 30px;" 
                                         
                                         
                                         />
            </label>
            
        </div>
        <div style="padding: 10px;">
            <label>
                Drug/Product : <input class="easyui-combobox"   style="width: 200px;height: 30px;" 
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
                <input class="easyui-combobox"   style="width: 200px;height: 30px;" 
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
             
             Action :   <input  type="radio"   name="action_drp"   value="1"> Prevent
                           <input  type="radio"   name="action_drp"   value="2"> Correct
        
            
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
            <input  type="checkbox" /> Adjust for appropriate therapy due to health system
            <input  type="checkbox" /> Add new medication
            </label>
        </div>
        
        <div style="padding: 10px;">
            <label>
            <input  type="checkbox" /> Correct technique of administration
            <input  type="checkbox" /> Adjust dosage reqimen
            </label>
        </div>
        
        <div style="padding: 10px;">
            <label>
            <input  type="checkbox" /> Improve compliance
            <input  type="checkbox" /> Confirm prescription
            </label>
        </div>
        
                <div style="padding: 10px;">
            <label>
            <input  type="checkbox" /> Inform drug related problems
            <input  type="checkbox" /> Discontinue medication
            </label>
        </div>
        
                        <div style="padding: 10px;">
            <label>
            <input  type="checkbox" /> Life style modication
            <input  type="checkbox" /> Inform drug related problems
            </label>
        </div>
        
         <div style="padding: 10px;">
            <label>
            <input  type="checkbox" /> Monitor efficacy and toxicity
            <input  type="checkbox" /> Suggest changing medication
            </label>
        </div>
        
                 <div style="padding: 10px;">
            <label>
            <input  type="checkbox" /> Prevention of Adverse drug reaction
            <input  type="checkbox" /> Suggest laboratory
            </label>
        </div>
        
        <div style="padding: 10px">
            <label>
                 Response :
            </label>
            
        </div>
        
        <div style="padding: 10px">
            <label>
               
                <input type="radio"   name="drp_response"  /> Resolved
                <input type="radio"   name="drp_response" /> Improved 
                
                
                  <input class="easyui-textbox"  data-options=" multiline:true "  style="width:300px;height: 50px;"   />
                  
                <br>
                
                <input type="radio"  name="drp_im" /> Not Improved
                <input type="radio"  name="drp_im" /> N/A
                
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
                         ผู้ประเมิน : <input class="easyui-combobox"  style="width:200px;height: 30px;"  
                                             data-options="
                                             
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
         style="width:600px;height:600px;padding:10px;">
                        <form id="fr_drp" class="easyui-form" method="post" data-options="novalidate:true">
                            <table cellpadding="5">
                                <tr>
                                    <td>
                                        HN :
                                    </td>
                                    <td>
                                      <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_drp" name="HN_drp" data-options="iconCls:'icon-man',readonly:true " required="require" >
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
                                        
                                        <a href="#" class="easyui-linkbutton"  data-options=" iconCls:'icon-print' " >View</a>  
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
                                               <a id="btn_save_adr"  href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-add',size:'large' "  style="height:30px" onclick="savedrp('<?=base_url()?>index.php/otherdrp/insertdrp')" > บันทึก </a>
                                               
                                               <!-- onclick="saveADR('<?=base_url()?>index.php/adr/insertADR/')" -->
                                               
                                               <a id="btn_save_adr"  href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-edit',size:'large' "  style="height:30px" onclick="updatedrp('<?=base_url()?>index.php/otherdrp/updatedrp')" > แก้ไข </a> 
                                               
                                               
                                               <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-remove',size:'large' "    style="height:30px"  onclick=" $('#win_drp').window('close');">ปิด </a>
                                               
                                           </td>
                                       </tr>
                                       
                                       
                                       
                            </table>
                        </form>    
    </div>
    
</body>
</html>
    