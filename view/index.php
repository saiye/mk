<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Marked 文档工具</title>

        <link rel="stylesheet" href="https://static.runoob.com/assets/js/jquery-treeview/jquery.treeview.css" />
        <link rel="stylesheet" href="https://static.runoob.com/assets/js/jquery-treeview/screen.css" />

        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://static.runoob.com/assets/js/jquery-treeview/jquery.cookie.js"></script>
        <script src="https://static.runoob.com/assets/js/jquery-treeview/jquery.treeview.js" type="text/javascript"></script>

        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <style>
			.box{
				width:100%;
				height:100%;
				position:relative;
			}
			.left{
				float: left;
				width:12%;
				height: 100%;
                position:relative;
                background-color: beige;
                border-radius:25px;
                overflow: hidden;
                text-overflow: ellipsis;
			}
            .top{
                width: 100%;
                height:30px;
                position:relative;
            }
            .content-view{
                width: 100%;
                min-height:1600px;
                height: auto;
                position:relative;
                background-color: beige;
                padding: 2% 2% 2% 2%;
                border-radius:25px;
            }
			.content-box{
				width: 85%;
				height:auto;
				float: left;
                margin-left:2%;
                position:relative;
			}
		</style>
	</head>
	<body>
		<div class="box">
			<div class="left">
                <ul id="browser" class="filetree treeview-famfamfam">
                    <?php foreach($list as $val){ ?>
                    <li  data-path="<?php echo $val['path'];?>" data-type="<?php echo $val['type'];?>"><span class="<?php echo $val['type'];?>"><?php echo $val['title'];?></span>
                        <?php if($val['type']=='folder'){ ?>
                        <ul>
                            <?php if(!empty($val['children']))foreach($val['children'] as $sub){ ?>
                                <li data-path="<?php echo $sub['path'];?>"  data-type="<?php echo $sub['type'];?>">
                                    <span class="<?php echo $sub['type'];?> closed"><?php echo $sub['title'];?></span>
                                    <!--三级-->
                                    <?php if(!empty($sub['children'])){?>
                                        <ul class="filetree treeview-famfamfam">
                                            <?php foreach($sub['children'] as $sub2){ ?>
                                                <li data-path="<?php echo $sub2['path'];?>"  data-type="<?php echo $sub2['type'];?>">
                                                    <span class="<?php echo $sub2['type'];?> closed"><?php echo $sub2['title'];?></span>

                                                    <?php if(!empty($sub2['children'])){?>
                                                        <ul class="filetree treeview-famfamfam">
                                                            <?php foreach($sub2['children'] as $sub3){ ?>
                                                                <li data-path="<?php echo $sub3['path'];?>"  data-type="<?php echo $sub3['type'];?>">
                                                                    <span class="<?php echo $sub3['type'];?> closed"><?php echo $sub3['title'];?></span>
                                                                    <?php if(!empty($sub3['children'])){?>
                                                                        <ul class="filetree treeview-famfamfam">
                                                                            <?php foreach($sub3['children'] as $sub4){ ?>
                                                                                <li data-path="<?php echo $sub4['path'];?>"  data-type="<?php echo $sub4['type'];?>">
                                                                                    <span class="<?php echo $sub4['type'];?> closed"><?php echo $sub4['title'];?></span>
                                                                                </li>
                                                                            <?php }?>
                                                                        </ul>
                                                                    <?php }?>
                                                                </li>
                                                            <?php }?>
                                                        </ul>
                                                    <?php }?>

                                                </li>
                                            <?php }?>
                                        </ul>
                                    <?php }?>
                                </li>
                            <?php }?>
                        </ul>
                        <?php }?>
                    </li>
                    <?php }?>
                </ul>

			</div>
			<div class="content-box">
                      <div class="content-view"></div>
			</div>
		</div>

	</body>

    <script>

        $(document).ready(function(){
            $("#browser").treeview({
                toggle: function() {
                    console.log("%s was toggled.", $(this).find(">span").text());
                }
            });
        });

        $('li').click(function () {
            let  path=$(this).attr('data-path');
            let  type=$(this).attr('data-type');
            if(type=='file'){
                //异步获取文件内容
                $.post('/data/list',{'path':path,'type':type},function (res) {
                    $('.content-view').html(marked(res.content));
                });
            }else{
                //展开下拉框

            }
        });
    </script>
</html>