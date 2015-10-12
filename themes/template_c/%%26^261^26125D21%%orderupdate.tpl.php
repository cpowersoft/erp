<?php /* Smarty version 2.6.14, created on 2015-08-28 10:17:15
         compiled from order/orderupdate.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
Ext.onReady(function(){
    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';
	var account  = [<?php echo $this->_tpl_vars['account']; ?>
];
	account.push(['0','所有账户']);
    var simple =Ext.create('Ext.form.Panel',{
        frame:true,
        title: '订单批量更新',
		fileUpload:true,
        bodyStyle:'padding:5px 5px 0',
        width: 450,
        defaultType: 'textfield',
		renderTo:document.body,
        items: [{
			  fieldLabel: '账号',
			  xtype:'combo',
			  store: Ext.create('Ext.data.ArrayStore',{
					 fields: ["key", "key_account"],
					 data: account
				}),
				valueField :"key",
				displayField: "key_account",
				mode: 'local',
				editable: false,
      		  	labelWidth: 75,
				width:300,
				forceSelection: true,
				triggerAction: 'all',
				hiddenName:'accounttype',
				name:'account',
				value:'0'	//默认设置
		 
		 },{
				fieldLabel: 'excel文件',
				xtype: 'fileuploadfield',
      		  	labelWidth: 75,
				width:300,
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
	var formsubmit = function(){
					if(simple.getForm().isValid()){
						simple.getForm().submit({
							 url:'index.php?model=order&action=UpLoadupdate',
							 method:'post',
							 params:'',
							 success:function(form,action){
								if (action.result.success) {
									Ext.example.msg('导入成功',action.result.msg);
								} else {
									Ext.example.msg('导入错误',action.result.msg);
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