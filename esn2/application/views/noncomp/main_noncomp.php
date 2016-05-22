<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        function   fr_insert()
        {
            $('#win_noncomp').window('open');
            url ='<?=base_url()?>index.php/noncomp/insertNoncomp/';
            
        }
        function  saveNon()
        {
            $('#fr_noncomp').form('submit',{
                //url:url,
                url:'<?=base_url()?>index.php/noncomp/insertNoncomp/',
                success:function(result)
                {
                    //alert(result);
                    if( result  == '1'  )
                    {
                         $.messager.alert('สถานะการบันทึก','บันทึกข้อมูลสำเร็จ','Info');   
                     }
                       else     if( result  == '0'  )
                    {
                         $.messager.alert('สถานะการบันทึก','บันทึกข้อมูลล้มเหลว','Error');   
                     }
                     
                    $("#win_noncomp").window('close');
                    $('#dg_noncomp').datagrid('reload');
                }
            });
        }
    </script>
    
</head>

<body>
    
    
    
    <div style="margin:10px 0 10px 0;"></div>
    <div class="easyui-panel" title="ตารางหลักก Non Compliance" style="width:1000px;height:200px;padding:10px;"
            data-options="
            iconCls:'icon-print',
            size:'large',
            closable:false,
            ">
       
        
        <table id="dg_noncomp" class="easyui-datagrid" data-options="
              
               url:'<?=base_url()?>index.php/noncomp/loadnoncomp',
               fitColumns:true,
               rownumbers:true,
               sigleSelect:true,
               
                columns:[[  
                   { field:'HN',title:'HN' },
                   { field:'MonitoringDate',title:'MonitoringDate'   },
                  // { field:'DRPselection1',title:'Non Compliance Type' },
                  { field:'selectiondetail',title:'Non Compliance Type' },
                   { field:'NonComplianceDrug1',title:'Drug/Product' },
                   { field:'NonComplianceDetail1',title:'Detail' },
                   //{ field:'Action1',title:'Action' },      
                  // { field:'Action1',title:'Action(1=Prevent,2=Correct)' },    
                     { field:'action_detail',title:'Action' },     
                  // { field:'Response1',title:'Result' }, 
                    { field:'result_detail',title:'Result' }, 
                   { field:'ResponseDetail1',title:'Result detail' },  
                   { field:'Cause1_1',title:'สาเหตุจากตัวผู้ป่วย' },  
                   { field:'Cause1_2',title:'สาเหตุจากโรค' }, 
                   { field:'Cause1_3',title:'สาเหตุจากยา' }, 
                   { field:'Cause1_4',title:'สาเหตุจากผู้ดูแล' }, 
                   { field:'Cause1_5',title:'สาเหตุอื่นๆ' }, 
                   { field:'followup_non',title:'follow up' }, 
                   { field:'week_non',title:'week' }, 
                    
                ]],
                toolbar:[ 
                {  text:'Reload',iconCls:'icon-reload',handler:function(data){ $('#dg_noncomp').datagrid('reload'); }  },           
                
                {  text:'เพิ่มข้อมูล Non Compliance',iconCls:'icon-add' , handler:function()
                                  {
                                       //  fr_insert();
                                       $('#win_noncomp').window('open');
                                  }  },
                            {  text:'ลบข้อมูล' ,  iconCls:'icon-remove',handler:function()
                                {
                                  var row = $('#dg_noncomp').datagrid('getSelected');
                                  if(row)
                                    {
                                      
                                      // alert(row.HN); //HN
                                      //  alert(row.MonitoringDate);
                                      var  url='<?=base_url()?>index.php/noncomp/delNon/' +  row.HN +  '/'  +  row.MonitoringDate ;
                                      //alert(url);
                                      
                                      
                                       $.post( url ,function(data)
                                       {
                                          //alert(data.result);
                                          if( data.result == 1  )
                                          {
                                            $.messager.alert('Status datagrid',' ข้อมูลถูกลบแล้ว ','info');
                                            $('#dg_noncomp').datagrid('reload');
                                          }
                                          else if( data.result == 0  )
                                          {
                                             $.messager.alert('Status datagrid',' ไม่สามารถลบข้อมูลได้ ','error');
                                             $('#dg_noncomp').datagrid('reload');
                                          }
                                          
                                       },'json');
                                      
                                       
                                       
                                    }
                                } 
                            },
                            {
                               text:'แก้ไขข้อมูล',iconCls:'icon-edit',handler:function(data){
                                    var row = $('#dg_noncomp').datagrid('getSelected');
                                    if( row )
                                    {
                                        
                                         $('#win_noncomp').window('open');                                                                       
                                        // var  _url_='<?=base_url()?>index.php/noncomp/fetchNoncomp/'   +  row.HN  + '/' + row.MonitoringDate;
                                         
                                         
                                         $('#fr_noncomp').form('load','<?=base_url()?>index.php/noncomp/fetchNoncomp/'  +  row.HN  + '/' + row.MonitoringDate );
                                         
                                          _url='<?=base_url()?>index.php/noncomp/updateNoncomp/'   +  row.HN  + '/' + row.MonitoringDate;
                                         
                                    }     
                               }
                            }
                            ],
            
               ">
            
        </table>
        
        
    </div>
    
    <div id="win_noncomp" class="easyui-window" title="เพิ่มข้อมูล/แก้ไขข้อมูล Non Compliance" data-options="
         modal:false,
         closed:true,
         iconCls:'icon-large-smartart',
         size:'large',
         " 
         style="width:600px;height:600px;padding:10px;">
                        <form id="fr_noncomp" method="post" enctype="multipart/form-data"   >
                            <table cellpadding="5">
                                <tr>
                                    <td>
                                        HN :
                                    </td>
                                    <td>
                                      <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_non" name="HN_non" data-options="iconCls:'icon-man',readonly:true " required="require" >
                                    </td>
                                </tr>
                                <tr>
                                    
                                    
                <tr>
                    <td>
                       MonitoringDate : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_non" name="MonitoringDate_non"  required="require" />
                    </td>
                </tr>
                
                <tr> 
                                    <td>
                                        Non Compliance Type :
                                    </td>
                                    <td>
                                         <select class="easyui-combobox" name="DRPselection1" id="DRPselection1" style="width:200px;height: 30px" >
                                                <option value=0>No</option>
                                                <option value=1>Over dosage</option>
                                                 <option value=2>Under dosage</option>
                                                 <option value=3>Not compliance with the life style</option>
                                                 <option value=4>Incorrect technique</option>
                                        </select>
                                        
                                        <a href="#" class="easyui-linkbutton"  data-options=" iconCls:'icon-print' "  onclick=" $('#dia_non').dialog('open'); " >View</a>  
                                        <a href="#"  class="easyui-linkbutton"  data-options=" iconCls:'icon-add' " >Add</a>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td> Drug/Product : </td>
                                    <td>
                                        <input class="easyui-combobox" name="NonComplianceDrug1" id="NonComplianceDrug1"  style="height: 30px;" data-options="
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
                                        <input class="easyui-textbox"  id="NonComplianceDetail1" name="NonComplianceDetail1" style="width:200px;height: 30px;"  data-options=" iconCls:'icon-man'   " >
                                     </td>
                                </tr>
                                
                                 <tr>
                                    <td> Action : </td>
                                    <td>
                                        <input  type="radio" name="Action1" id="Action1_use" value="1" /> Prevent
                                        <input  type="radio" name="Action1" id="Action1_no"  value="2"/> Correct 
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
                                        <input  type="radio" name="Response1" id="Response1_Resolved"  value="1" /> Resolved
                                        <input  type="radio" name="Response1" id="Response1_Improved" value="2"/> Improved 
                                        <input  type="radio" name="Response1" id="Response1_Not_Improved" value="3" /> Not Improved
                                        <input  type="radio" name="Response1" id="Response1_N/A" value="4"/> N/A 
                                        <br>
                                        <input class="easyui-textbox" style="width:300px;height: 40px" data-options=" iconCls:'icon-man' " id="ResponseDetail1" name="ResponseDetail1" />
                                     </td>
                                </tr>
                                
                                       <tr>
                                    <td> Cause : </td>
                                    <td>
                                        <input  type="checkbox" name="Cause1_1"  value="Y" />  สาเหตุจากตัวผู้ป่วย
                                        <input  type="checkbox" name="Cause1_4" value="Y" /> สาเหตุจากตัวผู้ดูแล
                                        <br>
                                         <input  type="checkbox" name="Cause1_3" value="Y" />  สาเหตุจากยา
                                          <input  type="checkbox" name="Cause1_5" value="Y" />  สาเหตุอื่นๆ
                                          <br>
                                           <input  type="checkbox" name="Cause1_2" value="Y" />  สาเหตุจากโรค
                                     </td>
                                       </tr>
                                       
                                       <tr>
                                           <td>
                                               Follow Up :
                                           </td>
                                           <td>
                                               <input class="easyui-numberbox" id="followup_non"  name="followup_non"  style="width:50px;height: 30px;" />
                                           </td>
                                       </tr>
                                       
                                       <tr>
                                           <td>
                                               week :
                                           </td>
                                           <td>
                                               <input class="easyui-datebox" id="week_non" name="week_non"  style="height: 30px;" >
                                           </td>
                                       </tr>
                                       
                                       
                                       <tr>
                                           <td colspan="2">
                                               <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-add',size:'large' "  style="height:30px" onclick="saveNon()" >บันทึก/แก้ไข </a>
                                           <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-remove',size:'large' "    style="height:30px"  onclick=" $('#win_noncomp').window('close');">ปิด </a>
                                           </td>
                                       </tr>
                                       
                                       
                                       
                            </table>
                        </form>    
    </div>
    
    <!--   B.Identify DRPs (Non Compliance) HIstory    Popup -->
      <div class="easyui-dialog"  id="dia_non"  style="width:750px;height: 700px;padding: 10px;left:30px;top:30px;"  title=" B.Identify DRPs (Non Compliance) History "   
         data-options=" 
             closed:true,
             iconCls:'icon-large-chart',
             buttons:[   
                {  text:'Close',iconCls:'icon-cancel', handler:function(){  $('#dia_non').dialog('close');  } },        
                         ]
         " 
         >
          
          <div style="padding: 10px;">
              <label>
                  Monitoring Date : <input class="easyui-combobox"   id="MonitoringDate_non_v" name="MonitoringDate_non_v"   style="width:200px;height: 40px;"    
                                            data-options="
                                           //  url:'<?=base_url()?>index.php/noncomp/dmy_noncomp/AA0096/25/08/2554' ,
                                              url:'<?=base_url()?>index.php/noncomp/dmy_noncomp/' +   $('#HN_non').textbox('getValue')  + '/'      ,
                                              valueField:'MonitoringDate',
                                               textField:'MonitoringDate',
                                               onSelect:function()
                                               {
                                                    var  url_  = '<?=base_url()?>index.php/noncomp/dmy_hn_noncomp/'  +    $('#HN_non').textbox('getValue') +   '/'  +  $('#MonitoringDate_non_v').combobox('getValue')   ;
                                                    $.getJSON(  url_   ,function(data)
                                                          {
                                                               $.each(data,function(v,k)
                                                                     {
                                                                           var  NonComplianceDrug1=k.NonComplianceDrug1;
                                                                          // alert( NonComplianceDrug1 );
                                                                           $('#DRPDrug3_non').combobox('setValue',NonComplianceDrug1);
                                                                     
                                                                             var  DRPselection1=k.DRPselection1;
                                                                             //alert( DRPselection1 );
                                                                             $('#DRPselection1_non').combobox('setValue',DRPselection1);
                                                                             
                                                                             var  NonComplianceDetail1=k.NonComplianceDetail1;
                                                                              //alert( NonComplianceDetail1 );
                                                                              $('#NonComplianceDetail1_non').textbox('setValue',NonComplianceDetail1);
                                                                              
                                                                              var  Action1=k.Action1;
                                                                              //alert( Action1 );
                                                                              if(    Action1 == '1'  )
                                                                              {
                                                                                   $('#Action3_non_1').attr('checked',true);
                                                                              }
                                                                              else  if(    Action1 == '2'  )
                                                                              {
                                                                                   $('#Action3_non_2').attr('checked',true);
                                                                              }
                                                                              
                                                                          var  InterventionPT1_1=k.InterventionPT1_1;
                                                                         // alert( InterventionPT1_1 );
                                                                          if( InterventionPT1_1 == 'Y' )
                                                                          {
                                                                               $('#InterventionPT1_1_non').attr('checked',true);
                                                                          }
                                                                          
                                                                          var  InterventionPT1_2=k.InterventionPT1_2;
                                                                        //alert(    InterventionPT1_2  ); 
                                                                         if(  InterventionPT1_2 == 'Y'  )
                                                                         {
                                                                             $('#InterventionPT1_2_non').attr('checked',true);
                                                                         }
                                                                         
                                                                         var  InterventionPT1_3=k.InterventionPT1_3;
                                                                         //alert( InterventionPT1_3 );
                                                                         if(  InterventionPT1_3 == 'Y'  )
                                                                         {
                                                                             $('#InterventionPT1_3_non').attr('checked',true);
                                                                         }
                                                                        
                                                                         var  InterventionPT1_4=k.InterventionPT1_4;
                                                                        // alert( InterventionPT1_4 );
                                                                         if(  InterventionPT1_4 == 'Y'  )
                                                                         {
                                                                               $('#InterventionPT1_4_non').attr('checked',true);
                                                                         }
                                                                         
                                                                         var  InterventionPT1_5=k.InterventionPT1_5;
                                                                         //alert( InterventionPT1_5 );
                                                                         if( InterventionPT1_5 == 'Y'  )
                                                                         {
                                                                             $('#InterventionPT1_5_non').attr('checked',true);
                                                                         }
                                                                         
                                                                         var   InterventionPT1_6=k.InterventionPT1_6;
                                                                       //  alert( InterventionPT1_6 );
                                                                         if(  InterventionPT1_6 == 'Y'  )
                                                                         {
                                                                             $('#InterventionPT1_6_non').attr('checked',true);
                                                                         }
                                                                       
                                                                       var  InterventionPT1_7=k.InterventionPT1_7;
                                                                      // alert( InterventionPT1_7 );
                                                                      if(  InterventionPT1_7 == 'Y'  )
                                                                      {
                                                                            $('#InterventionPT1_7_non').attr('checked',true);
                                                                      }
                                                                       
                                                                      var  InterventionDoctor1_1=k.InterventionDoctor1_1;
                                                                      //alert(  InterventionDoctor1_1 );
                                                                      if(    InterventionDoctor1_1 == 'Y'   )
                                                                      {
                                                                             $('#InterventionDoctor1_1_non').attr('checked',true);
                                                                      }
                                                                      
                                                                      var  InterventionDoctor1_2=k.InterventionDoctor1_2;
                                                                    // alert( InterventionDoctor1_2 );
                                                                     if(    InterventionDoctor1_2  == 'Y'   )
                                                                     {
                                                                           $('#InterventionDoctor1_2_non').attr('checked',true);
                                                                     }
                                                                 
                                                                     var   InterventionDoctor1_3=k.InterventionDoctor1_3;
                                                                    // alert( InterventionDoctor1_3 );
                                                                      if(   InterventionDoctor1_3  == 'Y'  )
                                                                      {
                                                                              $('#InterventionDoctor1_3_non').attr('checked',true);
                                                                      }
                                                                        
                                                                      var  InterventionDoctor1_4=k.InterventionDoctor1_4;
                                                                    //  alert( InterventionDoctor1_4 );
                                                                      if( InterventionDoctor1_4 == 'Y' )
                                                                      {
                                                                             $('#InterventionDoctor1_4_non').attr('checked',true);
                                                                      }
                                                                    
                                                                      var  InterventionDoctor1_5=k.InterventionDoctor1_5;
                                                                     // alert( InterventionDoctor1_5 );
                                                                      if( InterventionDoctor1_5 == 'Y'  )
                                                                      {
                                                                            $('#InterventionDoctor1_5_non').attr('checked',true);
                                                                      }
                                                                      
                                                                      var  InterventionDoctor1_6=k.InterventionDoctor1_6;
                                                                      //alert( InterventionDoctor1_6 );
                                                                      if(  InterventionDoctor1_6 == 'Y'  )
                                                                      {
                                                                           $('#InterventionDoctor1_6_non').attr('checked',true);
                                                                      }
                                                                      
                                                                      var  InterventionDoctor1_7=k.InterventionDoctor1_7;
                                                                      //alert( InterventionDoctor1_7 );
                                                                      if( InterventionDoctor1_7 == 'Y' )
                                                                      {
                                                                            $('#InterventionDoctor1_7_non').attr('checked',true);
                                                                      }
                                                                      
                                                                      var  Response1=k.Response1;
                                                                     // alert( Response1 );
                                                                      if( Response1 == '1' )
                                                                      {
                                                                           $('#non_response').attr('checked',true);
                                                                      }
                                                                      else if(  Response1 == '3'  )
                                                                      {
                                                                           $('#non_notim').attr('checked',true);
                                                                      }
                                                                      else if( Response1 == '2'  )
                                                                      {
                                                                           $('#non_improved').attr('checked',true);
                                                                      }
                                                                       else if( Response1 == '4'  )
                                                                      {
                                                                           $('#non_na').attr('checked',true);
                                                                      }
                                                                     
                                                                      
                                                                      var  	ResponseDetail1=k.ResponseDetail1;
                                                                    // alert( ResponseDetail1  );
                                                                       $('#ResponseDetail1_non').textbox('setValue',ResponseDetail1);
                                                                       
                                                                       var  Cause1_1=k.Cause1_1;
                                                                      // alert( Cause1_1);
                                                                       if(  Cause1_1 == 'Y'  )
                                                                       {
                                                                           $('#Cause1_1_non').attr('checked',true);
                                                                       }
                                                                       
                                                                       var  Cause1_2=k.Cause1_2;
                                                                       //alert( Cause1_2 );
                                                                        if(  Cause1_2 == 'Y'  )
                                                                       {
                                                                           $('#Cause1_2_non').attr('checked',true);
                                                                       }
                                                                       
                                                                       var  Cause1_3=k.Cause1_3;
                                                                      // alert( Cause1_3 );
                                                                       if(  Cause1_3 == 'Y'  )
                                                                       {
                                                                           $('#Cause1_3_non').attr('checked',true);
                                                                       }
                                                                       
                                                                       
                                                                      var  Cause1_4=k.Cause1_4;
                                                                      //alert( Cause1_4 );
                                                                       if(  Cause1_4 == 'Y'  )
                                                                       {
                                                                           $('#Cause1_4_non').attr('checked',true);
                                                                       }
                                                                       
                                                                       
                                                                      var  Cause1_5=k.Cause1_5;
                                                                      //alert( Cause1_5 );
                                                                       if(  Cause1_5 == 'Y'  )
                                                                       {
                                                                           $('#Cause1_5_non').attr('checked',true);
                                                                       }
                                                                       
                                                                       
                                                                        
                                                                     });
                                                          });
                                               }
                                            "
                                           />
              </label>
          </div>
          
          <div style="padding: 10px;">
            <label>
                Drug/Product : <input class="easyui-combobox"   id="DRPDrug3_non"   style="width: 200px;height: 40px;" 
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
                <input class="easyui-combobox"  id="DRPselection1_non"  style="width: 200px;height: 30px;" 
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
              <label>
                  Detail : <input class="easyui-textbox"  id="NonComplianceDetail1_non"   multiline="true"  style="width:300px;height: 50px;"   />
              </label>
          </div>
          
           <div style="padding: 10px;">
             
             Action :   <input  type="radio" id="Action3_non_1"      value="1"> Prevent
             <input  type="radio"  id="Action3_non_2"    value="2"> Correct
        
            
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
                <input  type="checkbox"  id=""  name="InterventionPT1_1_non" /> Adjust for appropriate therapy due to health system
            <input  type="checkbox"  id="InterventionDoctor1_1_non"   /> Add new medication
            </label>
        </div>
        
        <div style="padding: 10px;">
            <label>
                <input  type="checkbox" id="InterventionPT1_2_non"  name="InterventionPT1_2_non"  /> Correct technique of administration
                <input  type="checkbox"   id="InterventionDoctor1_2_non"  /> Adjust dosage reqimen
            </label>
        </div>
        
        <div style="padding: 10px;">
            <label>
                <input  type="checkbox" id="InterventionPT1_3_non"  name="InterventionPT1_3_non" /> Improve compliance
                <input  type="checkbox"  id="InterventionDoctor1_3_non"  /> Confirm prescription
            </label>
        </div>
        
                <div style="padding: 10px;">
            <label>
                <input  type="checkbox" id="InterventionPT1_4_non"  name="InterventionPT1_4_non" /> Inform drug related problems
                <input  type="checkbox"  id="InterventionDoctor1_4_non" /> Discontinue medication
            </label>
        </div>
        
                        <div style="padding: 10px;">
            <label>
                <input  type="checkbox"  id="InterventionPT1_5_non"  name="InterventionPT1_5_non" /> Life style modication
                <input  type="checkbox"  id="InterventionDoctor1_5_non" /> Inform drug related problems
            </label>
        </div>
        
         <div style="padding: 10px;">
            <label>
                <input  type="checkbox"  id="InterventionPT1_6_non"  name="InterventionPT1_6_non" /> Monitor efficacy and toxicity
                <input  type="checkbox"  id="InterventionDoctor1_6_non"  /> Suggest changing medication
            </label>
        </div>
        
                 <div style="padding: 10px;">
            <label>
                <input  type="checkbox"  id="InterventionPT1_7_non" name="InterventionPT1_7_non" /> Prevention of Adverse drug reaction
                <input  type="checkbox"  id="InterventionDoctor1_7_non" /> Suggest laboratory
            </label>
        </div>
          
          <div style="padding: 10px">
            <label>
                 Response :
            </label>
            
        </div>
          
           <div style="padding: 10px">
            <label>
               
                <input type="radio" id="non_response"  /> Resolved
                <input type="radio" id="non_improved" /> Improved 
                
                
                <input class="easyui-textbox"  data-options=" multiline:true "  id="	ResponseDetail1_non"    style="width:300px;height: 50px;"   />
                  
                <br>
                
                <input type="radio" id="non_notim"    /> Not Improved
                <input type="radio"  id="non_na"  /> N/A
                
            </label>

        </div>
          
           <div style="padding: 10px">
              <label>
                   Cause: 
              </label>
          </div>
          
          <div style="padding: 10px">
            <label>
               
                <input type="checkbox"  id="Cause1_1_non"   />  สาเหตุจากตัวผู้ป่วย
                <input type="checkbox"  id="Cause1_3_non"    />  สาเหตุจากโรค
                <input type="checkbox"  id="Cause1_5_non"  />  สาเหตุจากยา
            </label>
        </div>
        
         <div style="padding: 10px">
            <label>
   
                <input type="checkbox"  id="Cause1_2_non"  />  สาเหตุจากตัวผู้ดูแล
                <input type="checkbox"  id="Cause1_4_non"   />  สาเหตุอื่นๆ
                
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
     <!--   B.Identify DRPs (Non Compliance) HIstory    Popup -->
</body>
</html>
    