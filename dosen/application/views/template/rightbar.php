<div class="col-sm-4">
		<div class="box" style="border-radius: none; border-top: none;">
			<div class="box-header with-border"  style="margin-bottom: 1em;">
				<h3 class="box-title"><b>INFO</b></h3>
			</div>
			<ul class="info news-items" style="padding-right:30px; padding-bottom:10px;">
				<?php
				if (isset($info))
				{
					foreach($info as $data): ?>
					<li>
						<div class="news-item-date"><span class="news-item-day"><?= date('d', strtotime($data['created'])); ?></span> <span class="news-item-month"><?= date('M', strtotime($data['created'])); ?></span> </div>
						<div class="news-item-detail"><span class="text-bold"><?= $data['judul'] ?></span>
						<p class="news-item-preview"> <?= $data['content'] ?> </p>
						</div>
					</li>
				<?php endforeach; 
				}
				else 
				{
					echo "404 not found";
				}
				?>
			</ul>
		</div> <!-- /.box box-solid -->

		<div class="box" style="border-radius: none; border-top: none;">
			<div class="box-body">
				<ul class="info news-items" style="padding-inline-start: 5px;">
					<div class="news-item-detail">
						<p class="news-item-preview"> <i class="fa fa-phone color-primary"></i>  &nbsp;021-88955882 </p>
					</div>
					<div class="news-item-detail">
						<p class="news-item-preview"> <i class="fa fa-envelope primary"></i>  &nbsp;ft@ubharajaya.ac.id </p>
					</div>
					<div class="news-item-detail">
						<p class="news-item-preview"><i class="fa fa-rss-square primary"></i><a href="https://ft.ubharajaya.ac.id/feed/" target="_blank" style="color: #333333;">  &nbsp;ft.ubharajaya.ac.id/feed/</a> </p>
					</div>
					<div class="news-item-detail">
						<p class="news-item-preview"><i class="fa fa-globe primary"></i><a href="https://ft.ubharajaya.ac.id" target="_blank" style="color: #333333;">  &nbsp;ft.ubharajaya.ac.id</a> </p>
					</div>
				</ul>
			</div> <!-- /.box-body -->
		</div> <!-- /.box box-solid -->
</div><!-- /.col-sm-4 -->
