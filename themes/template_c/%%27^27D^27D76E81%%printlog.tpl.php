<?php /* Smarty version 2.6.14, created on 2015-09-09 11:55:15
         compiled from system/printlog.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
Ext.onReady(function(){
	var ds = Ext.create('Ext.data.Store', {
            fields: ['ids','admin_id','type','addtime'],
            pageSize: 30,
            proxy: {
                type: 'ajax',
                url: 'index.php?model=system&action=printloglist',
				actionMethods:{
					read:'POST'
				},
                reader: {
                    type: 'json',
                    root: 'topics',
                    totalProperty: 'totalCount'
                }
            }
        });
	/*var ds = new Ext.data.Store({
		proxy : new Ext.data.HttpProxy({url:'index.php?model=system&action=printloglist'}),
        reader: new Ext.data.JsonReader({
			root: 'topics',
            totalProperty: 'totalCount'
			},['ids','admin_id','type','addtime'])
    });*/
	var colModel = [
		 {header:'打印人',flex:1,dataIndex:'admin_id'},
		 {header:'打印时间',flex:1,dataIndex:'addtime',renderer:function(val,x,rec){
					   return '<a href="#" onclick="openWindowWithPost(\'index.php?model=order&action=print&type='+rec.get('type')+'\',\''+rec.get('ids')+'\',\'订单打印'+Math.floor(Math.random()*100)+'\')">'+val+'</a>';
					   }
		 }
		];
	var grid = Ext.create('Ext.grid.Panel', {
				border:false,
				loadMask: true,
				autoHeight:true,
				title:'条目列表',
				store: ds,
				columns: colModel,
				width:500,
				frame:true,
				viewConfig : {
					forceFit: true
				},
				renderTo: document.body,
				autoScroll: true,
				bbar: Ext.create('Ext.toolbar.Toolbar', {
					pageSize: 30,
					store: ds,
					displayInfo: true,
					displayMsg: '第{0} 到 {1} 条数据 共{2}条',
					emptyMsg: "没有数据"
        		})
            });
	ds.load({params:{start:0, limit:30}});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>