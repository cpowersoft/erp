Ext.ux.CustomerView=Ext.extend(Ext.Viewport,{initComponent:function(){this.layout='border';this.selectid='';this.getTab();this.creatselectionmodel();this.createStore();this.creatgrid();this.creatitems();Ext.ux.CustomerView.superclass.initComponent.call(this);},createStore:function(){this.store=new Ext.data.Store({proxy:new Ext.data.HttpProxy({url:this.listURL}),remoteSort:true,reader:new Ext.data.JsonReader({root:'topics',totalProperty:'totalCount',id:this.fields[0]},this.fields)});this.store.on('beforeload',function(){Ext.apply(this.baseParams,{is_black:Ext.getCmp('is_black1').getValue(),is_value:Ext.getCmp('is_value1').getValue(),starttime:Ext.fly('starttime').dom.value,totime:Ext.fly('totime').dom.value,keyword:Ext.fly('keyword').dom.value});});},setid:function(str){this.selectid='';this.selectid=str;},getid:function(){return this.selectid;},creatgrid:function(){var cm=this.creatcolumns();var bbar=this.creatBbar();var tbar=this.creatTbar();this.grid=new Ext.grid.EditorGridPanel({id:'cugrid',loadMask:true,frame:true,height:400,region:'center',store:this.store,cm:cm,sm:this.sm,tbar:tbar,bbar:bbar,clicksToEdit:1});},creatselectionmodel:function(){var thiz=this;var setid=this.setid;doSelect=this.doSelect;var tab=this.getTab();var sm=new Ext.grid.CheckboxSelectionModel({listeners:{"rowselect":{fn:function(e,rowindex,record){setid(record.data,thiz);doSelect(tab.getActiveTab().id,record.data,thiz);}}}});this.sm=sm;},doSelect:function(id,info,thiz){if(!info){if(id!='tab1')Ext.example.msg('错误','请先选择一条订单记录');return;}
switch(id){case'tab1':Ext.getCmp('tab1_item').getStore().load({params:{id:info.customer_id}});break;case'tab2':Ext.getCmp('tab2_item').getStore().load({params:{email:info.email}});break;}},creatcolumns:function(){var ds=this.store;var sm=this.sm;var cdata=[['0','否'],['1','是']];var comboxDepartmentStore=new Ext.data.SimpleStore({fields:['value','text'],data:cdata});var cols=[{header:'UserId',dataIndex:'userid',sortable:true,width:128},{header:'邮箱',width:200,dataIndex:'email'},{header:'购买次数',sortable:true,dataIndex:'buy_degree'},{header:'购买总金额',sortable:true,dataIndex:'buy_sum_money'},{header:'上次购买时间',sortable:true,dataIndex:'last_buy_time'},{header:'电话',dataIndex:'tel'},{header:'联系人',width:180,dataIndex:'consignee'},{header:'有无价值',dataIndex:'is_value',renderer:Ext.ux.CustomerView.deal_bool_fld,editor:new Ext.form.ComboBox({id:"is_value",forceSelection:true,selectOnFocus:true,typeAhead:true,triggerAction:'all',store:comboxDepartmentStore,mode:'local',displayField:'text',valueField:'value',lazyRender:true})},{header:'是黑名单?',dataIndex:'is_black',renderer:Ext.ux.CustomerView.deal_bool_fld,editor:new Ext.form.ComboBox({id:"is_blacklist",forceSelection:true,selectOnFocus:true,typeAhead:true,triggerAction:'all',store:comboxDepartmentStore,mode:'local',displayField:'text',valueField:'value',lazyRender:true})}];return new Ext.grid.ColumnModel(cols);},creatTbar:function(){var store=this.store;var pagesize=this.pagesize;var step=this.step;return new Ext.Toolbar({items:['<b>客户_列表</b>','-',{xtype:'button',text:'保存更新',iconCls:'x-tbar-save',handler:function(){var m=store.modified.slice(0);if(m.length==0)return false;var jsonArray=[];Ext.each(m,function(item){var moddata=new Object();moddata.customer_id=item.data.customer_id;moddata.is_value=item.data.is_value;moddata.is_black=item.data.is_black;if(moddata.is_black=='1'){moddata.email=item.data.email;}
jsonArray.push(moddata);});Ext.getBody().mask("正在更新状态.请稍等...","x-mask-loading");Ext.Ajax.request({url:'index.php?model=customer&action=ChangeStatus',method:'POST',params:{'data':Ext.encode(jsonArray)},success:function(response,opts){var res=Ext.decode(response.responseText);Ext.getBody().unmask();if(res.success){Ext.example.msg('MSG',res.msg);store.commitChanges();}else{Ext.Msg.alert('MSG',res.msg);}},failure:function(){Ext.example.msg('MSG','保存失败'),store.rejectChanges();}})}},'->','黑名单',{xtype:'combo',store:new Ext.data.SimpleStore({fields:["id","key_type"],data:[['-1','所有类型'],['0','否'],['1','是']]}),valueField:"id",displayField:"key_type",mode:'local',width:80,editable:false,forceSelection:true,triggerAction:'all',hiddenName:'is_black1',id:'is_black1',value:-1,},'-','价值客户:',{xtype:'combo',store:new Ext.data.SimpleStore({fields:["id","key_type"],data:[['-1','所有类型'],['0','否'],['1','是']]}),valueField:"id",displayField:"key_type",mode:'local',width:80,editable:false,forceSelection:true,triggerAction:'all',hiddenName:'is_value1',id:'is_value1',value:-1},'开始时间:',{xtype:'datefield',id:'starttime',format:'Y-m-d',fieldLabel:'From'},'-','结束时间:',{xtype:'datefield',id:'totime',format:'Y-m-d',fieldLabel:'To'},'-',{xtype:'textfield',id:'keyword',name:'keyword',enableKeyEvents:true,listeners:{scope:this,keypress:function(field,e){if(e.getKey()==13){store.load({params:{start:0,limit:pagesize,keyword:Ext.fly('keyword').dom.value}});}}}},'-',{xtype:'button',text:'搜索',iconCls:'x-tbar-search',handler:function(){store.load({params:{start:0,limit:pagesize,is_black:Ext.getCmp('is_black1').getValue(),is_value:Ext.getCmp('is_value1').getValue(),starttime:Ext.fly('starttime').dom.value,totime:Ext.fly('totime').dom.value,keyword:Ext.fly('keyword').dom.value}});}}]});},creatBbar:function(){var pagesize=this.pagesize;return new Ext.PagingToolbar({plugins:new Ext.ui.plugins.ComboPageSize(),pageSize:pagesize,displayInfo:true,displayMsg:'第{0} 到 {1} 条数据 共{2}条',emptyMsg:"没有数据",store:this.store,items:['-',{text:'发送邮件',pressed:true,handler:function(){}}]});},creatTab:function(){var thiz=this;var store=this.store;var getid=this.getid;doSelect=this.doSelect;var rma_form=new Ext.FormPanel({labelWidth:70,url:'index.php?model=customer&action=addcustomernote',frame:false,id:'customer_note_form',border:false,defaultType:'textfield',defaults:{width:'80%'},items:[{fieldLabel:'&nbsp;&nbsp;&nbsp;编辑内容',id:'remarkid',xtype:'textarea',allowBlank:false,blankText:'不能为空',height:250,name:'remark'}],buttonAlign:'center',buttons:[{text:'新增记录',handler:function(startrow){var row=Ext.getCmp('cugrid').getSelectionModel().selectRow(startrow);var rownum=Ext.getCmp('cugrid').getSelectionModel().getSelected();if(rownum){var customer_id=rownum.get('customer_id')
if(rma_form.getForm().isValid()){rma_form.getForm().submit({params:'customer_id='+customer_id,success:function(form,action){if(action.result.success==true){Ext.example.msg('提示','添加一条跟踪记录成功');Ext.getCmp('remarkid').setValue('');customergrid.getStore().reload();}
rma_form.getForm().reset();}});}else{Ext.example.msg('提示','信息不能为空');}}else{Ext.example.msg('提示','请选择一条客户记录');}}}]});var tab1store=new Ext.data.Store({proxy:new Ext.data.HttpProxy({url:'index.php?model=customer&action=CustomerNoteList'}),reader:new Ext.data.JsonReader({root:'topics',totalProperty:'totalCount',id:'customer_note_id'},['customer_note_id','customer_id','user_id','manage_user','remark','addtime'])});var customergrid=new Ext.grid.GridPanel({id:'tab1_item',store:tab1store,height:290,border:false,autoScroll:true,columns:[{dataIndex:'user_id',readOnly:true,hidden:true,value:'0'},{header:'管理人',dataIndex:'manage_user',width:100},{header:'记录内容',dataIndex:'remark',width:500},{header:'记录时间',dataIndex:'addtime'}]});customergrid.addListener('cellclick',cellclick);function cellclick(grid,rowIndex,columnIndex,e){var row=customergrid.getSelectionModel().selectRow();var rownum=customergrid.getSelectionModel().getSelected();var nremark=rownum.get('remark')
Ext.getCmp('remarkid').setValue(nremark);return;rma_form.getForm().findField('remark').setValues(nremark);return;}
var ct=new Ext.Panel({border:false,height:290,layout:'border',items:[{width:'70%',id:'note_list',border:false,region:'west',bodyStyle:{background:'#ffffff',},items:customergrid},{id:'send_note',region:'center',border:false,width:'20%',bodyStyle:{background:'#ffffff',},items:rma_form}]})
var tab2store=new Ext.data.Store({proxy:new Ext.data.HttpProxy({url:'index.php?model=customer&action=customerorderlist'}),reader:new Ext.data.JsonReader({root:'topics',totalProperty:'totalCount',id:'order_id'},['order_sn','order_amount','paid_time','add_time','end_time','shipping_time','RATE'])});var tab2_item=new Ext.grid.GridPanel({id:'tab2_item',store:tab2store,height:264,border:false,autoScroll:true,columns:[{header:'订单号',width:130,dataIndex:'order_sn'},{header:'金额',dataIndex:'order_amount'},{header:'支付时间',dataIndex:'paid_time'},{header:'录单时间',dataIndex:'add_time'},{header:'完成时间',dataIndex:'end_time'},{header:'发货时间',dataIndex:'shipping_time'}]});var tab=new Ext.TabPanel({activeTab:0,autoWidth:true,height:325,boxMaxHeight:325,plain:true,defaults:{autoScroll:true},items:[{id:'tab1',title:'跟踪记录',listeners:{activate:function(){doSelect('tab1',getid(),thiz);}},items:[ct]},{id:'tab2',title:'购买订单',listeners:{activate:function(){doSelect('tab2',getid(),thiz);}},items:[tab2_item]}]});return tab;},getTab:function(){if(!this.tab){this.tab=this.creatTab();}
return this.tab;},creatitems:function(){return this.items=[this.grid,{region:'south',height:350,border:false,layout:'fit',collapsed:false,collapsible:true,items:[this.tab]}];}});Ext.ux.CustomerView.change_status=function(id,status_num,fld,yds,email){status_num=status_num==1?0:1;if(email!=undefined)
email_para='&email='+email;else
email_para='';Ext.Ajax.request({url:'index.php?model=customer&action=changestatus&id='+id+'&fld='+fld+'&status='+status_num+email_para,success:function(response){var result=Ext.decode(response.responseText);if(result.success==true){yds.reload();}}});}
Ext.ux.CustomerView.deal_bool_fld=function(value,metaData,record){return['否',' 是'][value];}