

<!-- <div style="margin:20px 0;"></div> -->

<table id="dg_app1" title=" (Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา "  data-options="singleSelect:true,collapsible:true"></table>

<!--
<div id="toolbar">
   ref="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
    
</div>
-->


<!--
<table class="easyui-datagrid" title=" (Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา " style="width:900px;height:250px"
    data-options="singleSelect:true,collapsible:false,url:'<?=base_url()?>index.php/appendix/tb_appendix1',method:'get'">
        <thead>
            <tr>
                <th data-options="field:'interview_date',align:'left'" editor="{type:'validatebox',options:{required:true}}"  >วัน-เดือน-ปี ที่สัมภาษณ์</th>
           
                <th data-options="field:'id_appendix1'">ID</th>
                <th data-options="field:'HN'" editor="{type:'validatebox',options:{required:true}}">HN</th>
                <th data-options="field:'person_id',width:100,align:'center'">รหัสบัตรประชาชน</th>
             
                <th data-options="field:'name',align:'left'" editor="{type:'validatebox',options:{required:true}}">ชื่อ</th>
                <th data-options="field:'surname',align:'left'" editor="{type:'validatebox',options:{required:true}}">นามสกุล</th>
                <th data-options="field:'sex',align:'left'" editor="{type:'validatebox',options:{required:true}}">เพศ</th>
                <th data-options="field:'prov_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">จังหวัด</th>
                <th data-options="field:'amphur_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">อำเภอ</th>
                <th data-options="field:'district_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">ตำบล</th>
                <th data-options="field:'zipcode',align:'left'" editor="{type:'validatebox',options:{required:true}}">รหัสไปรษณีย์</th>
                <th data-options="field:'zipcode',align:'left'" editor="{type:'validatebox',options:{required:true}}">รหัสไปรษณีย์</th>
                <th data-options="field:'address',align:'left'" editor="{type:'validatebox',options:{required:true}}">ที่อยู่</th>
                <th data-options="field:'telephone',align:'left'" editor="{type:'validatebox',options:{required:true}}">เบอร์โทรศัพท์</th>
               <th data-options="field:'birthdate',align:'left'" editor="{type:'validatebox',options:{required:true}}">วัน-เดือน-ปี เกิด</th>
               <th data-options="field:'age',align:'left'" editor="{type:'validatebox',options:{required:true}}">อายุ</th>
               <th data-options="field:'occupational_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">อาชีพ</th>
               <th data-options="field:'education_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">ระดับการศึกษา</th>
               <th data-options="field:'payment_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">สิทธิการรักษา</th>
               <th data-options="field:'age_payment',align:'left'" editor="{type:'validatebox',options:{required:true}}">เริ่มมีการชักเมื่อปี</th>
               <th data-options="field:'age_sick',align:'left'" editor="{type:'validatebox',options:{required:true}}">ชักมาแล้ว</th>
               <th data-options="field:'epilepsy_first',align:'left'" editor="{type:'validatebox',options:{required:true}}">รูปแบบการชักที่เป็นครั้งแรก</th>
               <th data-options="field:'detail_epilepsy_first',align:'left'" editor="{type:'validatebox',options:{required:true}}">รูปแบบการชักที่เป็นครั้งแรก อื่นๆ ระบุ</th>
               <th data-options="field:'current_epilepsy',align:'left'" editor="{type:'validatebox',options:{required:true}}">รูปแบบการชักที่ ณ ปัจจุบัน</th>
               <th data-options="field:'other_current_epilepsy',align:'left'" editor="{type:'validatebox',options:{required:true}}">รูปแบบการชักที่ ณ ปัจจุบัน อื่นๆ ระบุ</th>
               <th data-options="field:'ever_EEG',align:'left'" editor="{type:'validatebox',options:{required:true}}">เคยตรวจ EEG มาก่อนหรือไม่</th>
               
               <th data-options="field:'results_EEG',align:'left'" editor="{type:'validatebox',options:{required:true}}">ผลการตรวจ EEG</th>
              
               <th data-options="field:'ever_CT_MRI',align:'left'" editor="{type:'validatebox',options:{required:true}}">เคยตรวจ CT/MRI มาก่อนหรือไม่  </th>
               
               <th data-options="field:'result_CT_MRI',align:'left'" editor="{type:'validatebox',options:{required:true}}">เคยตรวจ CT/MRI </th>
           
               <th data-options="field:'nature_CT_MRI',align:'left'" editor="{type:'validatebox',options:{required:true}}">ลักษณะความผิดปกติจาก CT/MRI </th>
           
               <th data-options="field:'other_Nature_CT_MRI',align:'left'" editor="{type:'validatebox',options:{required:true}}">ลักษณะความผิดปกติจาก CT/MRI อื่นๆ </th>
           
               <th data-options="field:'drug_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">ยาที่ได้รับมาก่อนหน้านี้พร้อมระบุความรุนแรงและแบบแผนการใช้ยา </th>
            
               <th data-options="field:'drug_other',align:'left'" editor="{type:'validatebox',options:{required:true}}">ยาที่ได้รับมาก่อนหน้านี้พร้อมระบุความรุนแรงและแบบแผนการใช้ยา อื่น ๆ</th>
               
               <th data-options="field:'disease_drug_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">โรคร่วมอื่นๆ ของผู้ป่วย </th>
               
               <th data-options="field:'disease_drug_other',align:'left'" editor="{type:'validatebox',options:{required:true}}">โรคร่วมอื่นๆ ของผู้ป่วย ระบุ</th>
               
               <th data-options="field:'allergic',align:'left'" editor="{type:'validatebox',options:{required:true}}">ประวัติการแพ้ยา</th>
              
               <th data-options="field:'allergic_detail',align:'left'" editor="{type:'validatebox',options:{required:true}}">ประวัติการแพ้ยา อื่นๆ </th>
             
               <th data-options="field:'drug_epilepsy',align:'left'" editor="{type:'validatebox',options:{required:true}}">ยากันชักที่แพ้</th>
               
               <th data-options="field:'drug_epilepsy_detail',align:'left'" editor="{type:'validatebox',options:{required:true}}">ยากันชักที่แพ้ อื่นๆ ระบุ</th>
           
               
               <th data-options="field:'nature_drug_epilepsy_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">ลักษณะการแพ้ยากันชัก</th>
           
               <th data-options="field:'Nature_drug_epilepsy_other',align:'left'" editor="{type:'validatebox',options:{required:true}}">ลักษณะการแพ้ยากันชัก อื่นๆ ระบุ</th>
           
                   
               <th data-options="field:'stimulate_epilepsy_id',align:'left'" editor="{type:'validatebox',options:{required:true}}">สิ่งกระตุ้นให้เกิดอาการชัก</th>
           
             
                
              
            </tr>
        </thead>
    </table>
-->

