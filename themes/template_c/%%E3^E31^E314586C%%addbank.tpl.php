<?php /* Smarty version 2.6.14, created on 2015-09-16 14:44:51
         compiled from finance/addbank.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="common/lib/ext-4/ux/css/MultiSelect.css"/>
<script type="text/javascript" src="common/lib/ext-4/ux/MultiSelect.js"></script>
<script type="text/javascript" src="common/lib/ext-4/ux/ItemSelector.js"></script>
<script type="text/javascript">
Ext.onReady(function() {
	 Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';
	var ds1 = Ext.create('Ext.data.ArrayStore',{
        data: [<?php echo $this->_tpl_vars['info']['ds1']; ?>
],
        fields: ['value','text']
    });
	
	 var ds = Ext.create('Ext.data.ArrayStore',{
		data: [<?php echo $this->_tpl_vars['info']['ds']; ?>
],
        fields: ['value','text']
    });
	
    var bank = Ext.create('Ext.FormPanel',{
		renderTo: document.body,
		labelWidth: 70,
        frame:false,
		border:false,
		width: 450,
		buttonAlign:'center',
		defaults: {width: 200},
        items: [{
				<?php if ($this->_tpl_vars['info']['account']): ?>
				xtype:'label',
				<?php else: ?>
				xtype:'textfield',
				<?php endif; ?>
                fieldLabel: '账户',
				<?php if ($this->_tpl_vars['info']['account']): ?>
				text: '<?php echo $this->_tpl_vars['info']['account']; ?>
',
				<?php endif; ?>
                name: 'account',
				listeners: {
						change:function(field,e){
							Ext.getBody().mask("Checking Account.waiting...","x-mask-loading");
							Ext.Ajax.request({
							   url: 'index.php?model=finance&action=checkaccount',
							   loadMask:true,
							   params: { value:field.getValue() },
								success:function(response,opts){
									var res = Ext.decode(response.responseText);
									Ext.getBody().unmask();
										if(res.success){
											Ext.example.msg('MSG','保存成功!');
										}else{
											Ext.Msg.alert('ERROR',res.msg);
										}						
									}
								});
						}
					}
            },{
				xtype:'numberfield',
				fieldLabel: '余额',
				width:250,
				labelWidth:85,
				decimalPrecision:4,
				allowDecimals:true,
				<?php if ($this->_tpl_vars['info']['money']): ?>
				value: '<?php echo $this->_tpl_vars['info']['money']; ?>
',
				<?php endif; ?>
                name: 'money'
            },{
                fieldLabel: '管理人员',
				width: 500,
				xtype: 'itemselector',
				id: 'users',
				name:'users',
				imagePath: 'common/lib/ext/ux/images/',
				multiselects: [{
					legend: '未选择的用户',
					width: 150,
					height: 150,
					store: ds,
					displayField: 'text',
					valueField: 'value'
				},{
				 	legend: '已选择的用户',
					width: 150,
					height: 150,
					displayField: 'text',
					valueField: 'value',
					store: ds1,
					tbar:[{
						text: '清空',
						handler:function(){
							bank.getForm().findField('users').reset();
						}
					}]
				}]
            },{
				xtype:'hidden',
				name: 'id',
				id:'id',
				value: '<?php echo $this->_tpl_vars['info']['id']; ?>
'
			}],

        buttons: [{
            text: '确定',
				handler:function(){
					if(bank.form.isValid()){
						bank.form.doAction('submit',{
							 url:'index.php?model=finance&action=saveBank',
							 method:'post',
							 success:function(form,action){
								Ext.example.msg('MSG','保存成功!');
							 },
							 failure:function(){
								Ext.Msg.alert('操作','服务器出现错误请稍后再试！');
							 }
                      });
					}
				}
        },{
            text: '重置',
			handler:function(){bank.form.reset();}
        }]
    });
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>