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



<div id="form_ins_treatment">
      
       <div style="margin:0px 0 10px 0;"></div>
      <div class="easyui-panel" title="" >
          <form id="fr_drug"  action="<?=base_url()?>index.php/welcome/insert_treatment"   method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Date :</td>
                    <td><input  name="MonitoringDate"  type="text" class="easyui-datebox" required="required"></td>
                </tr>
                
                <tr>
                    <td>Drug/ProductID :</td>
                    <td><input name="Drug_ProductID"  class="f1 easyui-textbox" ></input></td>
                </tr>
                <tr>
                    <td>DosageRegimen :</td>
                    <td><input name="DosageRegimen"   class="f1 easyui-textbox" ></input></td>
                </tr>
                <tr>
                    <td>Amount :</td>
                    <td><input name="Amount"  class="f1 easyui-textbox" ></input></td>
                </tr>
                
                
          
                
                <tr>
                    <td></td>
                    <td>    <input type="submit" value="บันทึก"></input>  <input type="reset" value="ล้างข้อมูล"></input>     </td>
                </tr>
                
            </table>
        </form>
          
        
      </div>
  </div>



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