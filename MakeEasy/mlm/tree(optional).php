	<div class="row">
					<div class="col-lg-2"></div>
					<form method="POST">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" name="search-id" class="form-control" required>
							</div>
						</div><!--/col-lg-6-->
						<div class="col-lg-2">
							<div class="form-group">
								<input type="submit" name="search" class=" btn btn-primary" value="Search">				
							</div>
						</div><!--/col-lg-6-->
					</form>
					<div class="col-lg-8">
				</div><!--/.row-->
			<div class="row">
					<div class="col-lg-12">
					<div class="table-responsive">
					<table class="table" align="center" border="0" style="text-align:center">
					<tr height="120">
					<?php
						$data = tree_data($search);
					?>
					<td  style="color: red;">
						<?php echo $data['leftcount'] ?>
					</td>
					<td colspan="2">
						<i class="fa fa-user fa-4x" style="color:#1430B1"></i>
						<p>
							<?php echo $search; ?>
						</p>
					</td>
					<td style="color: red;">
						<?php echo $data['rightcount'] ?>
					</td>
				</tr>
				<tr height="120">
					<?php
						$first_left_user = $data['left'];
						$first_right_user = $data['right'];
					?>
					<?php 
						if($first_left_user!="")
						{
							?>
							<td colspan="2">
								<a href="tree.php?search-id=<?php echo $first_left_user ?>">
								<i class="fa fa-user fa-4x" style="color:#D520BE"></i>
								<p>
									<?php echo $first_left_user ?>
								</p>
								</a>
							</td>
							<?php 
						}
					else
					{
						?>
						<td colspan="2">
							<i class="fa fa-user fa-4x" style="color:#1976D2"></i>
							<p>
								<?php echo $first_left_user ?>
							</p>
						</td>
						<?php
					}
						?>
					<?php 
						if($first_right_user!="")
						{
						?>
							<td colspan="2">
							<a href="tree.php?search-id=<?php echo $first_right_user ?>">
							<i class="fa fa-user fa-4x" style="color:#1976D2"></i>
							<p>
								<?php echo $first_right_user ?>
							</p>
							</a>
							</td>
							<?php 
						}
							else{
							?>
							<td colspan="2">
								<i class="fa fa-user fa-4x" style="color:#1976D2"></i>
								<p>
									<?php echo $first_right_user ?>
								</p>
							</td>
							<?php
						}
					?>
		</tr>
			<tr height="120">
				<?php 
					$data_first_left_user = tree_data($first_left_user);
					$second_left_user = $data_first_left_user['left'];
					$second_right_user = $data_first_left_user['right'];

					$data_first_right_user = tree_data($first_right_user);
					$third_left_user = $data_first_right_user['left'];
					$thidr_right_user = $data_first_right_user['right'];
				?>
				<?php 
					if($second_left_user!="")
					{
				?>
					<td>
						<a href="tree.php?search-id=<?php echo $second_left_user ?>">
							<i class="fa fa-user fa-4x" style="color:#00838F"></i>
							<p>
								<?php echo $second_left_user ?>
							</p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
						<td>
							<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						</td>
					<?php
					}
					?>
					<?php 
						if($second_right_user!=""){
					?>
					<td>
						<a href="tree.php?search-id=<?php echo $second_right_user ?>">
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						<p>
							<?php echo $second_right_user ?></p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
						<td>
							<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						</td>
					<?php
					}
					?>
					<?php 
						if($third_left_user!=""){
					?>
					<td>
						<a href="tree.php?search-id=<?php echo $third_left_user ?>">
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						<p>
							<?php echo $third_left_user ?>
						</p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
					<td>
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
					</td>
					<?php
					}
					?>
					<?php 
						if($thidr_right_user!=""){
					?>
					<td>
						<a href="tree.php?search-id=<?php echo $thidr_right_user ?>">
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
						<p>
							<?php echo $thidr_right_user ?></p>
						</a>
					</td>
					<?php 
					}
					else{
					?>
					<td>
						<i class="fa fa-user fa-4x" style="color:#00838F"></i>
					</td>
					<?php
					}
					?>
					</tr>
				</table>