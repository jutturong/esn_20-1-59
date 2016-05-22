<script type="text/javascript">
            function insert_treatment()
            {
                $("#form_ins_treatment").dialog({
                //$("#ff2").dialog({
                    title:"เพิ่มรายการยา (Treatment Medication Profile) ",
                    width:400,
                    height:200,
                    close:false,
                    cache:false,
                    href:'',
                    modal:true
                });
                //$("#form_ins_treatment").dialog('refresh','');
            }
</script>


<script type="text/javascript">
    
  
$(function()
{
    $("#fr_drug").form({
        success:function(data){          
           // alert("success");
           $.messager.alert(' บันทึกข้อมูลรายการยา ',data,'info');
        }
    });
});




</script>

<script type="text/javascript">
		$(function(){
			$('#ff2').form({
				success:function(data){
					$.messager.alert('Info', data, 'info');
				}
			});
		});
</script>


<script type="text/javascript"   >
        function insert_tr()
        {
                //action="<?=base_url()?>index.php/welcome/insert_treatment"
                //alert('t');
                  $('#fr_drug').form('submit',{
                          url:'<?=base_url()?>index.php/welcome/insert_treatment',
                          success:function(data)
                            {
                                  //alert(data);
                                     if( data == '1'  )
                                     {
                                            $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','Info');
                                            $('#dia_treatment').dialog('close');
                                            $('#dg_treatment').datagrid('reload');
                                     }
                                     else
                                     {
                                            $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลล้มเหลว','Err');
                                            $('#dia_treatment').dialog('close');
                                            $('#dg_treatment').datagrid('reload');
                                      }
                            }
                      
                  });  
        }
        
        function  update_tr()
        {
                        $('#fr_drug').form('submit',{
                          url:'<?=base_url()?>index.php/welcome/update_tr',
                          success:function(data)
                            {
                                  //alert(data);
                                  
                                  
                                     if( data == '1'  )
                                     {
                                            $.messager.alert('สถานะการแก้ไขข้อมูล','แก้ไขข้อมูลสำเร็จ','Info');
                                            $('#dia_treatment').dialog('close');
                                            $('#dg_treatment').datagrid('reload');
                                     }
                                     else
                                     {
                                            $.messager.alert('สถานะการแก้ไขข้อมูล','แก้ไขข้อมูลล้มเหลว','Err');
                                            $('#dia_treatment').dialog('close');
                                            $('#dg_treatment').datagrid('reload');
                                      }
                                      
                                      
                            }
                      
                  });  
            
         }
 </script>

 <!-- ระบบการค้นหา -->
 <div class="easyui-dialog"   id="dia_sr_treatment"  
     data-options="
          closed:true,
          title:' ค้นหารายการยา ',
          iconCls:'icon-search',
          buttons:[  {  text:'Close',iconCls:'icon-cancel',handler:function(){  $('#dia_sr_treatment').dialog('close'); }   }   ]
          
     "    style="margin:10px 5 10px 0;width: 400px;height: 150px;left:10px;top: 10px;"
     >
         
     ระบุรายการค้นหายา :  <input class="easyui-combobox"    id='sr_treatment'   style="width:200px;height: 40px;"   data-options="
                                 url:'<?=base_url()?>index.php/welcome/sr_treatment',
                                 valueField:'id_treatment',
                                 textField:'Drug_ProductID',
                                 method:'post',
                                 mode:'remote',
                                 onSelect:function()
                                     {   
                                         
                                            var  id_treatment=$('#sr_treatment').combobox('getValue');
                                            var  url='<?=base_url()?>index.php/welcome/fetch_treatment/'  +   id_treatment  ;
                                            //alert(   url  );  
                                               $('#dg_treatment').datagrid({  url:url });
                                      }
                                 
                                 "    />
     
 </div>
 
 <!-- ระบบการค้นหา -->
 
 
<!--  เพิ่มข้อมูลยา --->
<div class="easyui-dialog"   id="dia_treatment"  
     data-options="
          closed:true,
          title:' เพิ่มข้อมูลรายการยา ',
          iconCls:'icon-man',
          
     "    style="margin:10px 5 10px 0;width: 400px;height: 250px;left:10px;top: 10px;"
     >

      
   
    
          
          <form id="fr_drug"     method="post" enctype="multipart/form-data"  novalidate="novalidate"  >
           
              
              <table>
                  <tr>
                      <td>
                          
                      </td>
                      <td>
                          <input  class="easyui-textbox"   id='id_treatment'   name="id_treatment"    data-options=" readonly:true,  "   style="width:100px;height: 30px;"   />
                      </td>
                  </tr>
             
                <tr>
                    <td>Date :</td>
                    <td><input  name="MonitoringDate"  id="MonitoringDate"  name="MonitoringDate"   type="text" class="easyui-datebox" required="required"></td>
                </tr>
                
                <tr>
                    <td>Drug/ProductID :</td>
                    <td><input name="Drug_ProductID"  id="Drug_ProductID"  name="Drug_ProductID"   class="f1 easyui-textbox" ></input></td>
                </tr>
                <tr>
                    <td>DosageRegimen :</td>
                    <td><input name="DosageRegimen"   id="DosageRegimen"  name="DosageRegimen"  class="f1 easyui-textbox" ></input></td>
                </tr>
                <tr>
                    <td>Amount :</td>
                    <td><input name="Amount"  id="Amount"  name="Amount"   class="f1 easyui-textbox" ></input></td>
                </tr>
                
                
          
                
                <tr>
                  
                    <td  colspan="2">    
                        <!--<input type="submit" value="บันทึก"></input> 
                        <input type="reset" value="ล้างข้อมูล"></input>   -->
                        
                        <?=nbs(10)?>
                        <a href="javascript:void(0)"   onclick="  
                                 insert_tr();
                                                        "   style="width:80px;height: 40px;"  class="easyui-linkbutton"  iconCls="icon-save">บันทึก</a>
                                                        <a href="javascript:void(0)"  class="easyui-linkbutton"  iconCls='icon-edit'   style="width:80px;height: 40px;"   
                                                             onclick="   
                                                                   //alert('t');
                                                                    update_tr();
                                                                                                                            "   >แก้ไข</a>                                 
                        <a href="javascript:void(0)"   onclick="  $('#dia_treatment').dialog('close');    "   style="width:80px;height: 40px;"  class="easyui-linkbutton"  iconCls="icon-cancel">ปิด</a>
                        
                    </td>
                </tr>
                
            </table>
              
              
        </form>
          
        
 

</div>
<!--  เพิ่มข้อมูลยา --->

<!--
<div class="easyui-panel" title="Ajax Form" >
		<form id="ff2" action="<?=base_url()?>index.php/welcome/test2" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Name:</td>
					<td><input name="name" class="f1 easyui-textbox"></input></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input name="email" class="f1 easyui-textbox"></input></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input name="phone" class="f1 easyui-textbox"></input></td>
				</tr>
				<tr>
					<td>File:</td>
					<td><input name="file" class="f1 easyui-filebox"></input></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Submit"></input></td>
				</tr>
			</table>
		</form>
	</div>
-->