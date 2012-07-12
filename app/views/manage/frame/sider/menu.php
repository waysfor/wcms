			<div class="manage-menu">
				<ul id="main-nav">
				<?foreach ($menu as $key=>$item):?>
				<?if(!empty($item['tid'])):?>
                	<?if($item['id'] == '2'){?>
                    <li>
                    	<span class="title">网站信息</span>
                    </li>
                    <?}elseif($item['id'] == '4'){?>
                    <li>
                    	<span class="title">资源管理</span>
                    </li>
                    <?}elseif($item['id'] == '7'){?>
                    <li>
                    	<span class="title">工作助手</span>
                    </li>
                    <?}?>
                    <li>
                    	<a href="/manage<?=$item['address']?>" <?if($item['tid'] != '999'):?>onclick="return false"<?endif;?> class="nav-top-item <? if($item['tid']=='999'){echo 'no-submenu';}?>"><?=$item['name'];?></a>
                    	<?if(!empty($item['tid']) && $item['tid'] != '999'):?>
                        <ul>
                        	<?foreach(explode(',',$item['tid']) as $sub):?>
                        		<?foreach ($menu as $k=>$v):?>
                                	<?if ($v['id']==$sub):?><li>
                                    <a <? if(!empty($uri1) == $item['address'] && !empty($uri2) == $v['address']){echo 'class="current"';} ?> href="/manage<?=$item['address']?><?=$v['address']?>"><?=$v['name'];?></a></li><?endif;?>
                            	<?endforeach?>
                        	<?endforeach?>
                        </ul>
                    	<?endif;?>
                    </li>
				<?endif;?>
				<?endforeach?>
				</ul>
			</div>