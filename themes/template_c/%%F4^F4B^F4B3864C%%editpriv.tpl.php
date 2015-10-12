<?php /* Smarty version 2.6.14, created on 2015-08-17 10:12:13
         compiled from system/editpriv.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <style type="text/css">
        .x-check-group-alt {
            background: #D1DDEF;
            border-top:1px dotted #B5B8C8;
            border-bottom:1px dotted #B5B8C8;
        }
    </style>
<script type="text/javascript">
	Ext.onReady(function() {
		var privform =  Ext.create('Ext.FormPanel',{
			frame:false,
			border:false,
			id:'privform',
			buttonAlign:'center', 
			items:[{xtype:'hidden',name:'id',value:'<?php echo $this->_tpl_vars['id']; ?>
'},{xtype:'hidden',name:'type',value:'<?php echo $this->_tpl_vars['type']; ?>
'},
			{
			xtype:'checkboxgroup',
			fieldLabel:'账号管理',
			name:'account',
			id:'account',
			columns: 5,
			items:[
					<?php $_from = $this->_tpl_vars['acclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['itemlist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['itemlist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['itemkey'] => $this->_tpl_vars['checkitem']):
        $this->_foreach['itemlist']['iteration']++;
?>{
					boxLabel:'<?php echo $this->_tpl_vars['checkitem']['name']; ?>
',
					name:'item',
					inputValue:'<?php echo $this->_tpl_vars['checkitem']['code']; ?>
',
					checked:<?php if ($this->_tpl_vars['checkitem']['cando']): ?>true<?php else: ?>false<?php endif; ?>
					}<?php if (($this->_foreach['itemlist']['iteration'] == $this->_foreach['itemlist']['total'])):  else: ?>,<?php endif;  endforeach; endif; unset($_from); ?> ]
			},
			<?php $_from = $this->_tpl_vars['privlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['list']['iteration']++;
?>{
			xtype:'checkboxgroup',
			fieldLabel:'<?php echo $this->_tpl_vars['item']['action_type_name']; ?>
',
			name:'action<?php echo $this->_tpl_vars['item']['id']; ?>
',
			id:'action<?php echo $this->_tpl_vars['item']['id']; ?>
',
			<?php if (($this->_foreach['list']['iteration']-1) % 2 == 0): ?>itemCls: 'x-check-group-alt',<?php endif; ?>
			columns: 5,
					 items: [
							<?php $_from = $this->_tpl_vars['item']['action_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['itemlist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['itemlist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['itemkey'] => $this->_tpl_vars['checkitem']):
        $this->_foreach['itemlist']['iteration']++;
?>{
							boxLabel:'<?php echo $this->_tpl_vars['checkitem']['name']; ?>
',
							name:'item',
							inputValue:'<?php echo $this->_tpl_vars['checkitem']['code']; ?>
',
							checked:<?php if ($this->_tpl_vars['checkitem']['cando']): ?>true<?php else: ?>false<?php endif; ?>
							}<?php if (($this->_foreach['itemlist']['iteration'] == $this->_foreach['itemlist']['total'])):  else: ?>,<?php endif;  endforeach; endif; unset($_from); ?>
										 ]
							}<?php if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])):  else: ?>,<?php endif;  endforeach; endif; unset($_from); ?>],
				buttons: [{
		text: '保存',
		type: 'submit', 
		handler:function(){formsubmit();}
		},{
		text: '取消',
		handler:function(){privform.form.reset();}
		}],
		renderTo:document.body 
		});
		var formsubmit = function(){
			var hobbys = '';var hobbys1 = '';
			<?php $_from = $this->_tpl_vars['privlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['list']['iteration']++;
?>
			var ckd = Ext.getCmp('action<?php echo $this->_tpl_vars['item']['id']; ?>
').getChecked(); //获取已经选取的checkbox
			for(var i=0; i< ckd.length; i++){
				hobbys += ','+ ckd[i].inputValue;  //遍历组合到数组中
			}
			 <?php endforeach; endif; unset($_from); ?>
			 
			 var ckd2 = Ext.getCmp('account').getChecked();
			 for(var j=0; j< ckd2.length; j++){
				hobbys1 += ','+ ckd2[j].inputValue;  //遍历组合到数组中
			 }
			 var action = hobbys.substr(1);
			 var action1 = hobbys1.substr(1);
			 //alert(action); alert(action1);return;
			 var type = privform.form.findField('type').getValue();
			 var id = privform.form.findField('id').getValue();
			privform.form.doAction('submit',{
			 url:'index.php?model=privilege&action=savepriv',
			 method:'post',
			 params:{'actionlist':action,'account_list':action1},
			 success:function(form,action){
			  if (action.result.msg=='OK') {
			Ext.example.msg('编辑权限成功',action.result.msg);
			} else {
			Ext.Msg.alert('编辑权限失败',action.result.msg);
			  }
			 },
			 failure:function(){
			Ext.example.msg('操作','服务器出现错误请稍后再试！');
			 }
								  });
			}
	loadend();
	});
</script>
<div id="easyGrid" style="margin:20px;"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 