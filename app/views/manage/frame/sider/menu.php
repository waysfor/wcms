			<div class="manage-menu">
				<ul id="main-nav">
				</ul>
				<?=$nav?>
				<? exit; ?>
				<!--分割线-->
				<ul id="main-nav">
					<!-- Accordion Menu -->
					<li>
						<a href="/manage" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->后台首页</a>
					</li>
					<li> 
						<a href="/history" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->课程管理</a>
						<ul>
							<li><a href="#">课程查看</a></li>
							<li><a class="current" href="#">课程添加</a></li> <!-- Add class "current" to sub menu items also -->
							<li><a href="#">课程搜索</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="nav-top-item">
							新闻管理
						</a>
						<ul>
							<li><a href="#">新闻查看</a></li>
							<li><a href="#">新闻添加</a></li>
							<li><a href="#">新闻搜索</a></li>
						</ul>
					</li>
                    <li>
                    	<span class="title">资源管理</span>
                    </li>
					<li>
						<a href="#" class="nav-top-item">
							课程资源
						</a>
						<ul>
							<li><a href="#">课程查看</a></li>
							<li><a href="#">课程添加</a></li>
							<li><a href="#">课程搜索</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="nav-top-item">
							讲师资源
						</a>
						<ul>
							<li><a href="#">讲师查看</a></li>
							<li><a href="#">讲师添加</a></li>
							<li><a href="#">讲师搜索</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="nav-top-item">
							客户资源
						</a>
						<ul>
							<li><a href="#">客户查看</a></li>
							<li><a href="#">客户添加</a></li>
							<li><a href="#">客户搜索</a></li>
						</ul>
					</li>
                    <li>
                    	<span class="title">工作助手</span>
                    </li>
					<li>
						<a href="#" class="nav-top-item">
							工作计划
						</a>
						<ul>
							<li><a href="#">昨日计划</a></li>
							<li><a href="#">今日计划</a></li>
							<li><a href="#">明日计划</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="nav-top-item">
							统计管理
						</a>
						<ul>
							<li><a href="#">工作计划统计</a></li>
							<li><a href="#">电话统计</a></li>
						</ul>
					</li>
				</ul>
			</div>