<?php /* Smarty version 2.6.14, created on 2015-08-28 10:16:13
         compiled from goods/import.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var goods_brand = [<?php echo $this->_tpl_vars['goods_brand']; ?>
];
	var xlstype=[['0','普通产品'],['1','组合产品']];
    var simple = Ext.create('Ext.form.Panel',{
        labelWidth: 75,
        frame:true,
        title: '产品批量导入',
		fileUpload:true,
        bodyStyle:'padding:5px 5px 0',
        width: 350,
        defaults: {width: 150},
        defaultType: 'textfield',
		renderTo:document.body,
        items: [{
					editable: false,
					fieldLabel:'分类',
					xtype:'triggerfield',
					id:'cat_name',
					name:'cat_name',
					value:'All',
					width:250,
					onSelect: function(record){
					},
					onTriggerClick: function() {
						getCategoryFormTree('index.php?model=goods&action=getcattree&com=1',0,afterselect);
					}
					},{xtype:'hidden',id:'cat_id',name:'cat_id',value:0},{
					xtype:'combo',
					store: Ext.create('Ext.data.ArrayStore',{
							 fields: ["id", "key_type"],
							 data: xlstype
							}),
					valueField :"id",
					displayField: "key_type",
					mode: 'local',
					width:250,
					editable: false,
					forceSelection: true,
					triggerAction: 'all',
					hiddenName:'type',
					name: 'type',
					allowBlank:false,
					value:0,
					fieldLabel: '格式'
            },{
				fieldLabel: 'xls文件',
				width:250,
				xtype: 'fileuploadfield',
				allowBlank:false,
				name:'file_path'
            }
        ],

        buttons: [{
				text: '导入',
				type: 'submit',
				handler:function(){formsubmit();}
			}]
    });
	
	var afterselect = function(k,v){
		Ext.getCmp('cat_name').setValue(v);
		Ext.getCmp('cat_id').setValue(k);
		}
	var formsubmit = function(){
		if(Ext.getCmp('cat_id').getValue() ==0){Ext.example.msg('Error','请选择对应导入分类');return false;}
					if(simple.getForm().isValid()){
						simple.submit({
							 url:'index.php?model=goods&action=upload',
							 method:'post',
							 params:'',
							 success:function(form,action){
							 		if (action.result.success) {
										Ext.example.msg('导入成功',action.result.msg);
									} else {
										Ext.Msg.alert('导入错误',action.result.msg);
							 		}
							 },
							 failure:function(form,action){
									Ext.Msg.alert('操作',action.result.msg);
							 }
                      });
					}
				}
	
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>