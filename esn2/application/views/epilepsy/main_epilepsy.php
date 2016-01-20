<style type="text/css">
        #fm_epilepsy{
            margin:0;
            padding:10px 30px;
        }
        .ftitle{
            font-size:14px;
            font-weight:bold;
            padding:5px 0;
            margin-bottom:10px;
            border-bottom:1px solid #ccc;
        }
        .fitem{
            margin-bottom:5px;
        }
        .fitem label{
            display:inline-block;
            width:80px;
        }
        .fitem input{
            width:160px;
        }
</style>

<script type="text/javascript">
      function add_epilepsy()
      {
            $('#add_epilepsy').dialog('open').dialog('setTitle','เพิ่มข้อมูล Epilepsy Clinic');

           // $('#fm_epilepsy').form('clear');
           // url = 'save_user.php';
      }
      function insert_epilepsy()
      {
            $('#fm_epilepsy').form('submit',
            { 
                       url:'<?=base_url()?>index.php/epilepsy/insert_epi',
                      onSubmit:function(data){
                           
                        },
                        success:function(data){
                              // $.messager.alert('สถานะของการบันทึกข้อมูล',data,'info');
                                         $('#dg').datagrid('reload');  //  $('#tb_EEG').datagrid('reload');
                                         $('#add_epilepsy').dialog('close');
                        }
        
             });
                

           
      }
</script>
    
<script type="text/javascript">
    
         function calEPI_()
         {
                 //  $.messager.alert("","test","");
               var  a= parseInt( $('#frequency').numberbox('getValue') );  //ชักครั้งก่อน
               var  b= parseInt( $('#clinic_response').textbox('getValue') ); //ชักปัจจุบัน
               
        
            
                   if(  b >= 0  &&  a >= 0  )
                                {
                                         // $('#calEPI').textbox('setValue',a+b);
                                             if( b > a )
                                            {
                                                                           ya=(100*b)/a;
                                                                           y2=ya-100;
                                                                            if(  y2  <= 25 )
                                                                           {
                                                                               //$("#clinic_response").val('Same');
                                                                                //       alert('Same'); 
                                                                                 $('#calEPI').textbox('setValue','Same');
                                                                           }
                                                                            else if (    y2  > 25 )
                                                                           {
                                                                           //$("#clinic_response").val('Worse');
                                                                                   //   alert('Worse');  
                                                                                   $('#calEPI').textbox('setValue','Worse');
                                                                           }
                                            }
                                             else if ( b< a ) // ลด
                                            {	
                                                               ya=(100*b)/a;
                                                               y2=100-ya;
                                                              if( y2 > 25  &&  y2 <=50 )
                                                             {
                                                                                //  $("#clinic_response").val('Moderated Improvement');
                                                                                  $('#calEPI').textbox('setValue','Moderated Improvement');
                                                              }
                                                               else if ( y2 > 50  )
                                                               {
                                                                                 // $("#clinic_response").val('Marked Improvement');
                                                                                       $('#calEPI').textbox('setValue','Marked Improvement');
                                                               }
                                                               else if  ( y2 <= 25 )
                                                              {
                                                                                 // $("#clinic_response").val('Same');
                                                                                 $('#calEPI').textbox('setValue','Same'); 
                                                              }
                                          }  
                                            else  if  ( b = a  ) // ไม่เพิ่มไม่ลด  ECli5=Seizure free หมายถึง ไม่ชักเลย ต้องเป็น 0  เท่าเดิม
                                            {
                                                       // $("#clinic_response").val('Seizure free');
			 $('#calEPI').textbox('setValue','Seizure free'); 					 
                                            }
 
                                }
                                 else
		{
		        $.messager.alert("แสดงสถานะการระบุค่าการกรอกข้อมูล","ระบุค่า Frequency (time/month) ให้ถูกต้อง !!","error");
                                          //  $('#frequency').numberbox.('focus')
		}	
                 
               
         
    }
    
    /*
            //clinic_response
      $(function(){
             var  a= parseInt( $('#frequency').numberspinner('getValue') );  //ชักครั้งก่อน
             var  b= parseInt( $('#clinic_response').textbox('getValue') ); //ชักปัจจุบัน

            $('#clinic_response').textbox('textbox').bind('keydown',function(e){
                  if(e.keyCode==13)
                    {                        
                               
                  
                                
                                 if(  b >= 0  &&  a >= 0  )
                                {
                                      
                                       if( b > a )
                                    {
                                        ya=(100*b)/a;
+                                      y2=ya-100;
+                                      if(  y2  <= 25 )
+                                      {
+                                         //$("#clinic_response").val('Same');
                                             alert('Same'); 
+                                      }
+                                      else if (    y2  > 25 )
+                                      {
+                                         //$("#clinic_response").val('Worse');
                                            alert('Worse');    
+                                      }
                                    }
                                }
                                else if ( b< a ) 
                                {
                                        //alert("ลด");
                                        ya=(100*b)/a;
                                        y2=100-ya;
                                        if( y2 > 25  &&  y2 <=50 )
                                        {
                                           // $("#clinic_response").val('Moderated Improvement');
                                            alert('Moderated Improvement');    
                                        }
                                        else if ( y2 > 50  )
                                        {
                                           //  $("#clinic_response").val('Marked Improvement');
                                           alert('Marked Improvement');    
                                        }
                                        else if  ( y2 <= 25 )
                                        {
                                           // $("#clinic_response").val('Same');
                                             alert('Same');    
                                        }
                                }
                                else  if  ( b = a  ) // ไม่เพิ่มไม่ลด  ECli5=Seizure free หมายถึง ไม่ชักเลย ต้องเป็น 0  เท่าเดิม
                                {
                                       // $("#clinic_response").val('Seizure free');
                                       alert('Seizure free');    
                                 
                                }



                    }
            });
             
      });
      */
     
     
</script>
    
    
    <table id="dg" title="Epilepsy Clinic" class="easyui-datagrid" style="width:700px;height:250px"
            url="<?=base_url()?>index.php/epilepsy/value_monitoring/"
            toolbar="#toolbar1" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <!--
                <th field="productname" >Productname</th>
                <th field="unitcost" >unitcost</th>
                <th field="listprice" >listprice</th>
                <th field="attr1" >attr1</th>
                -->
                 <th field="MonitoringDate" >MonitoringDate</th>
                 <th field="HN" >HN</th>          
                 <th field="Lab" >Lab</th>
                   <th field="Value" >Value</th>
                 <!--<th field="Lab_value" >ค่า Lab</th>-->
                 
                
            </tr>
        </thead>
    </table>


<div id="toolbar1">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="add_epilepsy()" >เพิ่มรายการเริ่มต้น</a>
</div>

<!--
64=Frequency (time/month) :
66=Clinical Response
67=Severity of Attack
101=Duration of Attack
-->

<div id="add_epilepsy" class="easyui-dialog" style="width:600px;height:550px;padding:10px 20px"
            closed="true" buttons="#dlg-buttons" data-options=" modal:true ">
        <!-- <div class="ftitle">เพิ่มข้อมูล Epilepsy Clinic</div> -->
        <form id="fm_epilepsy" method="post" novalidate>
            <table cellpadding="5">
            <tr>
                <td>
                HN :
                </td>
                <td>
                    <input class="easyui-textbox" style="width:100px" id="HN_epilepsy" name="HN_epilepsy" data-options="iconCls:'icon-man',readonly:true " required="require">
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <?php echo nbs(30); ?>
                     <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">View Frequency of Seizure Chart</a>
                </td>
            </tr>
            
            <tr>
                <td>
                    
                </td>
                    <td>
                    This Visit
                    <?php  echo nbs(15);  ?>
                    Last Visit
                    </td>
            </tr>
            
            <tr>
                <td>
                Frequency (time/month) (64) :
                
                </td>
                <td>
                    <input   class="easyui-numberbox"   style="width:50px;height:40px"   id="frequency" name="frequency" >
                </td>    
            </tr>
            
            
            <tr>
                <td>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'" style="width:200px"  onclick="calEPI_()">Clinical Response (66) :</a>
                </td>
                <td>
                    <input   class="easyui-numberbox" id="clinic_response" name="clinic_response" style="width:50px;height:40px"  />
                       
                    <input class="easyui-textbox"  id="calEPI"  style="width:200px;height: 40px;"  data-options="  readonly:true,  iconCls:'icon-print', size:'large' "/>
                    
                </td>
            </tr>
            
            <tr>
                <td>Duration of Attack (101) :</td>
                <td>
                    <select class="easyui-combobox" name="Duration_of_Attack" id="Duration_of_Attack" style="width:200px;">
                                   <option value="1">Same</option>
                                   <option value="2">Increase</option>
                                   <option value="3">Decrease</option>
                        </select>
                </td>
            </tr>
            
            <tr>
                <td>Severity of Attack (67) :</td>
                <td>
                    <select class="easyui-combobox" name="Severity_of_Attack" id="Severity_of_Attack" style="width:200px;">
                                   <option value="1">Same</option>
                                   <option value="2">Increase</option>
                                   <option value="3">Decrease</option>
                        </select>
                </td>
            </tr>
            
            <tr>
                <td>วัน/เดือน/ปี ที่บันทึกข้อมูล (MonitoringDate) :</td>
                <td><input class="easyui-datebox" id="MonitoringDate" name="MonitoringDate" required="required" ></input></td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'" style="width:100px" onclick="insert_epilepsy()">เพิ่มข้อมูล</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" style="width:100px" onclick="$('#add_epilepsy').window('close');">ปิดหน้าต่าง</a>
                </td>
            </tr>
            </table>
            
            <!--
            <div class="fitem">
                <label>Last Name:</label>
                <input name="lastname" class="easyui-textbox" required="true">
            </div>
            <div class="fitem">
                <label>Phone:</label>
                <input name="phone" class="easyui-textbox">
            </div>
            <div class="fitem">
                <label>Email:</label>
                <input name="email" class="easyui-textbox" validType="email">
            </div>
             -->
             
        </form>
    </div>


<!--  

<div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">เพิ่มรายการ</a>
        
       
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
        
    </div>
 -->
<!--
    <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
            closed="true" buttons="#dlg-buttons">
        <div class="ftitle">User Information</div>
        <form id="fm" method="post" novalidate>
            <div class="fitem">
                <label>First Name:</label>
                <input name="firstname" class="easyui-textbox" required="true">
            </div>
            <div class="fitem">
                <label>Last Name:</label>
                <input name="lastname" class="easyui-textbox" required="true">
            </div>
            <div class="fitem">
                <label>Phone:</label>
                <input name="phone" class="easyui-textbox">
            </div>
            <div class="fitem">
                <label>Email:</label>
                <input name="email" class="easyui-textbox" validType="email">
            </div>
        </form>
    </div>
-->

    <!--
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    -->