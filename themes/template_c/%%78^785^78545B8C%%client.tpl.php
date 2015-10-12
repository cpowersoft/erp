<?php /* Smarty version 2.6.14, created on 2015-09-09 08:24:15
         compiled from system/client.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/system/client.js"></script>
    <script type="text/javascript">
Ext.onReady(function() {
var ve = [['1','基础版'],['2','团队版']];
    var EasyGrid = Ext.create('Ext.ux.PrivilegeGrid',{
        title: '客户列表',
		headers:['序号','用户名','开户时间','上次登录','公司名','联系人','QQ','QQ名','电话','总单量','版本'],
        fields: ['user_id','user_name','add_time','last_login','company','name','qq','qqname','tel','countorder','versions'],
		pagesize:10,
		ve:ve,
        renderTo: 'easyGrid'
    });
	EasyGrid.getStore().load({
			params:{start:0,limit:10}
			});
	loadend();
});
    </script>
    <div id="easyGrid" style="margin:20px;"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>