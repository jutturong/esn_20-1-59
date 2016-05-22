<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        function   fr_insert()
        {
            $('#win_adr').window('open');
           // var url='<?=base_url()?>index.php/adr/insertADR/';
            
        }
        function  saveADR(url)
        {
            $('#fr_adr').form('submit',{
                //url: '<?=base_url()?>index.php/adr/insertADR/' ,
                url:url ,
                success:function(result)
                {
                    // alert(result);
                      if( result == '1' )
                      {
                            $.messager.alert('สถานะการบันทึก','บันทึกสำเร็จ','Info');
                      }
                      else if( result == '0'  )
                      {
                             $.messager.alert('สถานะการบันทึก','บันทึกล้มเหลว','Err');
                      }
                    $("#win_adr").window('close');
                    $('#dg_adr').datagrid('reload');
                }
            });
        }
        function updateADR()
        {
           $('#fr_adr').form('submit',{
                //url: '<?=base_url()?>index.php/adr/insertADR/' ,
                url:url ,
                success:function(result)
                {
                   // alert(result);
                    $("#win_adr").window('close');
                    $('#dg_adr').datagrid('reload');
                }
            }); 
        }
 
 //-- datagrid Main---
 $(function(){
     
  $('#dg_adr').datagrid({
            url:'<?=base_url()?>index.php/adr/loadADR/',
            rownumbers:true,
            fitColumns:true,
            singleSelect:true,
            columns:[[ 
            { field:'HN',title:'HN'   },
            { field:'MonitoringDate',title:'MonitoringDate'  },
            { field:'DRPselection2',title:'ADRs' },
            { field:'DRPDrug2',title:'Drug/Products'},
            { field:'ADRDetail2',title:'Detail'},
           // { field:'Action2',title:'Action'     },
            
            { field:'action_detail',title:'Action' }, 
             
            //{ field:'Response2',title:'Result' },
            
               { field:'result_detail',title:'Result' },
            
            { field:'ResponseDetail2',title:'Result รายละเอียด' },
            {  field:'followup_adr',title:'Follow up' },
            {  field:'week_adr',title:'Week' },
            
                    ]],
            toolbar:[  
                        { text:'Reload',iconCls:'icon-reload',handler:function(data){ $('#dg_adr').datagrid('reload');   }    },
                        { text:'เพิ่มข้อมูล',iconCls:'icon-add',handler:function(data)
                            { 
                                //$.messager.alert('t'); 
                                $('#win_adr').window('open');
                                
                                
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
                                     var  row=$('#dg_adr').datagrid('getSelected');
                                     if(row)
                                     {
                         
                                           $.messager.confirm('สถานะการลบข้อมูล','คุณแน่ต้องการลบข้อมูลหรือไม่',function(r)
                                           {
                                               
                                               
                                                if(r) 
                                                   { 
                                                        $.post("<?=base_url()?>index.php/adr/delADR/" + row.HN + "/"  +  row.MonitoringDate ,function(data)
                                                          {                                                                                                     
                                                            var ck=data.success;
                                                             if( ck == 1 )
                                                             {
                                                                 $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลแล้ว','Info');
                                                                 $('#dg_adr').datagrid('reload'); 
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
                                var  row=$('#dg_adr').datagrid('getSelected');
                                if( row ) 
                                    { 
                                                       
                                           //alert('t');            
                                                      
                                          $('#win_adr').window('open');
                                          $('#fr_adr').form('load','<?=base_url()?>index.php/adr/fetchADR/'  +  row.HN  + '/' + row.MonitoringDate );
                                         
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
    
  
    
    <table id="dg_adr" class="easyui-datagrid">           
    </table>
    
    <div id="win_adr" class="easyui-window" title="เพิ่มข้อมูล/แก้ไขข้อมูล ADRs" data-options="
         modal:false,
         closed:true,
         iconCls:'icon-large-smartart',
         size:'large',
         " 
         style="width:600px;height:600px;padding:10px;">
                        <form id="fr_adr" class="easyui-form" method="post" data-options="novalidate:true">
                            <table cellpadding="5">
                                <tr>
                                    <td>
                                        HN :
                                    </td>
                                    <td>
                                      <input class="easyui-textbox" style="width:70%;height: 30px" id="HN_adr" name="HN_adr" data-options="iconCls:'icon-man',readonly:true,required:true "  >
                                    </td>
                                </tr>
                                <tr>
                                    
                                    
                <tr>
                    <td>
                       MonitoringDate : 
                    </td>
                    <td>
                         <input  class="easyui-datebox" id="MonitoringDate_adr" name="MonitoringDate_adr"  required="true">
                    </td>
                </tr>
                
                                <tr>  
                                    <td>
                                        ADRs :
                                    </td>
                                    <td>
                                         <select class="easyui-combobox" name="DRPselection2" id="DRPselection2" style="width:200px;height: 30px" >
                                                <option value=0>No</option>
                                                <option value=1>Over dosage</option>
                                                 <option value=2>Under dosage</option>
                                                 <option value=3>Not compliance with the life style</option>
                                                 <option value=4>Incorrect technique</option>
                                        </select>
                                        
                                        <a href="#" class="easyui-linkbutton"  data-options=" iconCls:'icon-print' "  onclick=" $('#dia_adr').dialog('open');  " >View</a>  
                                        <a href="#"  class="easyui-linkbutton"  data-options=" iconCls:'icon-add' " >Add</a>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td> Drug/Product : </td>
                                    <td>
                                        <input class="easyui-combobox" name="DRPDrug2" id="DRPDrug2"  style="height: 30px;" data-options="
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
                                        <input class="easyui-textbox"  id="ADRDetail2" name="ADRDetail2" style="width:200px;height: 30px;"  data-options=" iconCls:'icon-man'   " >
                                     </td>
                                </tr>
                                
                                 <tr>
                                    <td> Action : </td>
                                    <td>
                                        <input  type="radio" name="Action2" id="Action2_use" value="1" /> Prevent
                                        <input  type="radio" name="Action2" id="Action2_no"  value="2"/> Correct 
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
                                        <input  type="radio" name="Response2" id="Response2_Resolved"  value="1" /> Resolved
                                        <input  type="radio" name="Response2" id="Response2_Improved" value="2"/> Improved 
                                        <input  type="radio" name="Response2" id="Response2_Not_Improved" value="3" /> Not Improved
                                        <input  type="radio" name="Response2" id="Response2_N/A" value="4"/> N/A 
                                        <br>
                                        <input class="easyui-textbox" style="width:300px;height: 40px" data-options=" iconCls:'icon-man' " id="ResponseDetail2" name="ResponseDetail2" />
                                     </td>
                                </tr>
                                
                                      
                                       
                                       <tr>
                                           <td>
                                               Follow Up :
                                           </td>
                                           <td>
                                               <input class="easyui-numberbox" id="followup_adr"  name="followup_adr"  style="width:50px;height: 30px;" />
                                           </td>
                                       </tr>
                                       
                                       <tr>
                                           <td>
                                               week :
                                           </td>
                                           <td>
                                               <input class="easyui-datebox" id="week_adr" name="week_adr"  style="height: 30px;" >
                                           </td>
                                       </tr>
                                       
                                       
                                       <tr>
                                           <td colspan="2">
                                               <a id="btn_save_adr"  href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-add',size:'large' "  style="height:30px" onclick="saveADR('<?=base_url()?>index.php/adr/insertADR/')" > บันทึก </a>
                                               
                                               <!-- onclick="saveADR('<?=base_url()?>index.php/adr/insertADR/')" -->
                                               
                                               <a id="btn_save_adr"  href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-add',size:'large' "  style="height:30px" onclick="saveADR('<?=base_url()?>index.php/adr/updateADR/')" > แก้ไข </a> 
                                               
                                               
                                               <a href="#" class="easyui-linkbutton" data-options=" iconCls:'icon-remove',size:'large' "    style="height:30px"  onclick=" $('#win_adr').window('close');">ปิด </a>
                                               
                                           </td>
                                       </tr>
                                       
                                       
                                       
                            </table>
                        </form>    
    </div>
    
    
    
     <!--  Popup B.Ientity  ADR-->
    <div class="easyui-dialog"  id="dia_adr"  style="width:750px;height: 600px;padding: 10px;left:30px;top:30px;"  title="B.Identify DRPs(ADRs) History"   
         data-options=" 
             closed:true,
             iconCls:'icon-large-chart',
             buttons:[   
             //  {  text:'<< Prev',handler:function(){  alert('t'); }     },
             //     { text:'Next >>', handler:function(){  alert('t'); }  },
                {  text:'Close',iconCls:'icon-cancel', handler:function(){  $('#dia_adr').dialog('close');  } },        
             ]
         " 
         >
        <div style="padding: 10px;">
            <label>
                
                 Monitoring Date :
                 
                <!-- url:'<?=base_url()?>index.php/otherdrp/loadOtherdrp/',  -->
                <input class="easyui-combobox"   id="adr_date"   style="width:200px;height: 30px;" 
                       data-options="
                       //http://drugstore.kku.ac.th/esn2/index.php/adr/date_adr/
                          url:'<?=base_url()?>index.php/adr/date_adr/'  +   $('#HN_adr').textbox('getValue')   ,
                          valueField:'MonitoringDate',
                          textField:'MonitoringDate',
                          onSelect:function()
                          {
                                  var   d=$('#adr_date').combobox('getValue');
                                   var   url = '<?=base_url()?>index.php/adr/data_hn_dar/'  +   $('#adr_date').combobox('getValue')    +   '/'   +  $('#HN_adr').textbox('getValue');  
                                  
                              //    var   test_url = 'http://drugstore.kku.ac.th/esn2/index.php/adr/data_hn_dar/04/10/2555/AA0105'
                               //  alert(url);
                                 
                                /* 
                                 $.post(url,function(data)
                                     {   
                                          alert(data);
                                     });
                           */

                                $.getJSON( url   ,function(data)
                                   {  
                                        $.each(data,function(v,k)
                                        {

                                              var  DRPselection2=k.DRPselection2;  //DRPselection2_adr
                                              // alert(DRPselection2);
                                             $('#DRPselection2_adr').combobox('setValue',DRPselection2);
                                          
                                               
                                        
                                             var  DRPDrug2=k.DRPDrug2;
                                             //  alert(DRPDrug2);
                                               $('#DRPDrug2_adr').combobox('setValue',DRPDrug2);
                                         
                                               
                                             var  ADRDetail2=k.ADRDetail2;
                                             $('#ADRDetail2_adr').textbox('setValue', ADRDetail2 );
                                             
                                             
                                             var  Action2=k.Action2;
                                             if( Action2 == '1' )
                                             {
                                                  $('#Action2_1').attr('checked',true);
                                             }
                                             else if( Action2 == '2'  )
                                             {
                                                 $('#Action2_2').attr('checked',true);
                                             }
                                      
                                         
                                         var   InterventionPT2_1 = k.InterventionPT2_1;
                                       //  alert(  InterventionPT2_1  ); 
                                         if( InterventionPT2_1 == 'Y' )
                                         {
                                             $('#InterventionPT2-1_adr').attr('checked',true);
                                         }
                                      
                                        
                                         var  InterventionPT2_2=k.InterventionPT2_2;
                                         // alert(  InterventionPT2_2 );
                                         if(   InterventionPT2_2 == 'Y'   )
                                         {
                                                $('#InterventionPT2-2_adr').attr('checked',true);
                                         }
                                 
                                         var  InterventionPT2_3=k.	InterventionPT2_3;
                                             //  alert( InterventionPT2_3  );
                                         if(   InterventionPT2_3 == 'Y'   )
                                         {
                                                $('#InterventionPT2-3_adr').attr('checked',true);
                                         }  
                                       
                                         var   InterventionPT2_4=k.InterventionPT2_4;
                                           // alert(   InterventionPT2_4   );
                                         if(  InterventionPT2_4 == 'Y'   )
                                         {
                                                $('#InterventionPT2-4_adr').attr('checked',true);
                                         } 
                                         
                                         var InterventionPT2_5=k.InterventionPT2_5;
                                         if(  InterventionPT2_5 == 'Y'  )
                                         {
                                                    $('#InterventionPT2-5_adr').attr('checked',true);
                                         }
                                 
                                         
                                         var  InterventionPT2_6=k.InterventionPT2_6;
                                         //alert( InterventionPT2_6 );
                                         if(    InterventionPT2_6 == 'Y'   )
                                         {
                                               $('#InterventionPT2-6_adr').attr('checked',true);
                                         }
                                         
                                         var  InterventionPT2_7=k.InterventionPT2_7;
                                        // alert( InterventionPT2_7 );
                                        if(     InterventionPT2_7  == 'Y'   )
                                        {
                                              $('#InterventionPT2-7_adr').attr('checked',true);
                                        }
                                         
                                        var  InterventionDoctor2_1=k.InterventionDoctor2_1;
                                       // alert(InterventionDoctor2_1);
                                       if(  InterventionDoctor2_1  == 'Y')  
                                       {
                                               $('#InterventionDoctor2-1_adr').attr('checked',true);
                                       }
                                     
                                        
                                        var  InterventionDoctor2_2=k.InterventionDoctor2_2;
                                        // alert(   InterventionDoctor2_2   );
                                        if(  InterventionDoctor2_2 == 'Y'  )
                                        {
                                              $('#InterventionDoctor2-2_adr').attr('checked',true);
                                        }
                                        
                                        var  InterventionDoctor2_3=k.InterventionDoctor2_3;
                                        //alert( InterventionDoctor2_3 );
                                        if(   InterventionDoctor2_3 == 'Y')
                                        {
                                              $('#InterventionDoctor2-3_adr').attr('checked',true);
                                        }
                                        
                                        
                                        var  InterventionDoctor2_4=k.InterventionDoctor2_4;
                                       // alert(   InterventionDoctor2_4  );
                                        if(   InterventionDoctor2_4  == 'Y'  )
                                        {
                                               $('#InterventionDoctor2-4_adr').attr('checked',true);
                                        }
                                        
                                        
                                        var  InterventionDoctor2_5=k.InterventionDoctor2_5;
                                       // alert(    InterventionDoctor2_5   );
                                        if(   InterventionDoctor2_5  == 'Y'   )
                                        {
                                             $('#InterventionDoctor2-5_adr').attr('checked',true);
                                        }
                                        
                                        
                                        var   InterventionDoctor2_6=k.InterventionDoctor2_6;
                                      //  alert(  InterventionDoctor2_6  );
                                        if( InterventionDoctor2_6  == 'Y'  )
                                        {
                                              $('#InterventionDoctor2-6_adr').attr('checked',true);
                                        }
                                        
                                        var   InterventionDoctor2_7=k.InterventionDoctor2_7;
                                      //  alert(   InterventionDoctor2_7  );
                                        if(  InterventionDoctor2_7  == 'Y'  )
                                        {
                                               $('#InterventionDoctor2-7_adr').attr('checked',true);
                                        }
                                        
                                        
                                        var   Response2=k.Response2;
                                       // alert( Response2 );
                                       if( Response2  == '1')
                                       {
                                            $('#adr_response').attr('checked',true);
                                       }
                                       else if( Response2 == '2' )
                                       {
                                           $('#adr_improved').attr('checked',true);
                                       }
                                       else if(  Response2 == '3' )
                                       {
                                            $('#adr_notim').attr('checked',true);
                                       }
                                       else if( Response2 == '4' )
                                       {
                                            $('#adr_na').attr('checked',true);                  
                                       }
                                        
                                        
                                        
                                        var    ResponseDetail2=k.ResponseDetail2;
                                       // alert( ResponseDetail2 );
                                        $('#ResponseDetail3_adr').textbox('setValue',ResponseDetail2);
                                        
                                     //   var    ConfirmForDelete=k.ConfirmForDelete;
                                        
                                        var   followup_adr=k.followup_adr;
                                        
                                        var   week_adr=k.week_adr;
                                        
                                        
                                               
                                        });
                                   });     
                           
                                
                          }
                       "
                       />
                
               
            </label>
            
        </div>
        
        <div style="padding: 10px;">
            <label>
                ADRs :  <input class="easyui-combobox"  id="DRPselection2_adr"  style="width: 200px;height: 30px;" 
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
                     
                <!--
                <input class="easyui-combobox"  id="DRPselection2_adr"  style="width:200px;height: 30px;" 
                               data-options="
                                  url:'<?=base_url()?>index.php/adr/loadADR',
                                  valueField:'DRPselection2',
                                  textField:'DRPselection2',
                               "
                               /> -->
                
                
                
                
            </label>
        </div>
        
        <div style="padding: 10px;">
            <label>
                Drug/Product : <input class="easyui-combobox"   id="DRPDrug2_adr"    style="width: 200px;height: 30px;" 
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
                Detail : <input class="easyui-textbox" multiline="true"  id="ADRDetail2_adr"  style="width:300px;height: 50px;"    />
            </label>
        </div>
        
        
        
        
         <div style="padding: 10px;">
             
             Action :   <input  type="radio" id="Action2_1"      value="1"> Prevent
             <input  type="radio"  id="Action2_2"    value="2"> Correct
        
            
        </div>
        

        <div style="padding: 10px;">
            <label>
                  <?=nbs(40)?>
                Intervention
                <?=nbs(50)?>
                Patient
            </label>
        </div>
        
         <div style="padding: 10px;">
             <label>
                 <input type="checkbox"  id="InterventionPT2-1_adr"  /> Adjust for appropriate therapy due to health system
                  <?=nbs(10)?>
                 <input type="checkbox"  id="InterventionDoctor2-1_adr"  /> Add new medication
             </label>
        </div>
        <div style="padding: 10px;">
              <label>
                  <input type="checkbox"  id="InterventionPT2-2_adr" /> Correct technique of administration
                  <?=nbs(10)?>
                  <input type="checkbox"   id="InterventionDoctor2-2_adr" /> Adjust dosage regimen
             </label>
        </div>
            <div style="padding: 10px;">
              <label>
                  <input type="checkbox"  id="InterventionPT2-3_adr"  /> Improve compliance
                  <?=nbs(10)?>
                  <input type="checkbox"  id="InterventionDoctor2-3_adr"  /> Confirm prescription
             </label>
        </div>
        
               <div style="padding: 10px;">
              <label>
                  <input type="checkbox"  id="InterventionPT2-4_adr" /> Inform drug related problems
                  <?=nbs(10)?>
                  <input type="checkbox"  id="InterventionDoctor2-4_adr"  /> Discontinue medication
             </label>
        </div>
        
         <div style="padding: 10px;">
              <label>
                  <input type="checkbox"  id="InterventionPT2-5_adr"  /> Life style modification
                  <?=nbs(10)?>
                  <input type="checkbox" id="InterventionDoctor2-5_adr"   /> Inform drug relate problems
             </label>
        </div>
        
                 <div style="padding: 10px;">
              <label>
                  <input type="checkbox"  id="InterventionPT2-6_adr"  /> Monitor efficacy and toxicity
                  <?=nbs(10)?>
                  <input type="checkbox"  id="InterventionDoctor2-6_adr"  /> Suggest changing medication
             </label>
        </div>
        
         <div style="padding: 10px;">
              <label>
                  <input type="checkbox"   id="InterventionPT2-7_adr" /> Prevention of Adverse drug reaction
                  <?=nbs(10)?>
                  <input type="checkbox"  id="InterventionDoctor2-7_adr"  /> Suggest laboratory
             </label>
        </div>
        
        
        <div style="padding: 10px">
            <label>
                 Response :
            </label>
            
        </div>
        
        <div style="padding: 10px">
            <label>
               
                <input type="radio"  id="adr_response"    /> Resolved
                <input type="radio"  id="adr_improved"  /> Improved 
                
                
                <input class="easyui-textbox"  data-options=" multiline:true "  id="ResponseDetail3_adr"    style="width:300px;height: 50px;"   />
                  
                <br>
                
                <input type="radio" id="adr_notim"    /> Not Improved
                <input type="radio"  id="adr_na"  /> N/A
                
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
</body>
</html>
    