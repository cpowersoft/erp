<?php /* Smarty version 2.6.14, created on 2015-08-10 11:04:16
         compiled from goods/modifystock.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	loadend();
});
	function changeshelfstock(value,goods_id,shelf_id,type){
					Ext.getBody().mask("Updating Data .waiting...","x-mask-loading");
					Ext.Ajax.request({
					   url: 'index.php?model=goods&action=changeshelfstock',
					   loadMask:true,
					   params: { shelf_id: shelf_id,value:value,goods_id:goods_id,type:type },
						success:function(response,opts){
							var res = Ext.decode(response.responseText);
							Ext.getBody().unmask();
								if(res.success){
								Ext.example.msg('MSG',res.msg);
								}else{
								Ext.Msg.alert('ERROR',res.msg);
								}						
							}
						});
		}
		function clearvar(goods_id,shelf_id)
		{
					Ext.getBody().mask("Updating Data .waiting...","x-mask-loading");
					Ext.Ajax.request({
					   url: 'index.php?model=goods&action=clearvar',
					   loadMask:true,
					   params: { shelf_id: shelf_id,goods_id:goods_id },
						success:function(response,opts){
							var res = Ext.decode(response.responseText);
							Ext.getBody().unmask();
								if(res.success){
								Ext.example.msg('MSG',res.msg);
								}else{
								Ext.Msg.alert('ERROR',res.msg);
								}						
							}
						});
		}
</script>
<table border="1">
<tr><td>货架名</td><td width="50">产品数量</td><td width="100">货架位置</td><td width="50">报警库存</td><td>操作</td></tr>
<?php $_from = $this->_tpl_vars['shelflist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shelf']):
?>
<tr><td><?php echo $this->_tpl_vars['shelf']['name']; ?>
</td><td><input size="10" type="text" name="<?php echo $this->_tpl_vars['shelf']['shelf_id']; ?>
" value="<?php echo $this->_tpl_vars['shelf']['value']; ?>
" onchange="changeshelfstock(this.value,<?php echo $this->_tpl_vars['shelf']['goods_id']; ?>
,<?php echo $this->_tpl_vars['shelf']['shelf_id']; ?>
,1)"></td><td><input type="text" name="place<?php echo $this->_tpl_vars['shelf']['shelf_id']; ?>
" value="<?php echo $this->_tpl_vars['shelf']['stock_place']; ?>
" onchange="changeshelfstock(this.value,<?php echo $this->_tpl_vars['shelf']['goods_id']; ?>
,<?php echo $this->_tpl_vars['shelf']['shelf_id']; ?>
,2)"></td><?php if ($this->_tpl_vars['shelf']['is_main'] == 1): ?><td><input type="text" size="10" name="warn<?php echo $this->_tpl_vars['shelf']['shelf_id']; ?>
" value="<?php echo $this->_tpl_vars['shelf']['warn_qty']; ?>
" onchange="changeshelfstock(this.value,<?php echo $this->_tpl_vars['shelf']['goods_id']; ?>
,<?php echo $this->_tpl_vars['shelf']['shelf_id']; ?>
,3)"></td><td><input type="button" value="清空锁定库存" onclick="clearvar(<?php echo $this->_tpl_vars['shelf']['goods_id']; ?>
,<?php echo $this->_tpl_vars['shelf']['shelf_id']; ?>
)"/></td><?php else: ?><td></td><td></td><?php endif; ?></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>