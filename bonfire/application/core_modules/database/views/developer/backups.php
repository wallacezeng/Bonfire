<?php echo $this->load->view('developer/sub_nav', null, true); ?>

<?php if (isset($backups) && is_array($backups) && count($backups) > 0) : ?>
	<?php echo form_open('/admin/developer/database/backups'); ?>
		<table>
			<thead>
				<tr>
					<th id="cb" class="column-check" style="width: 2em">
						<input class="check-all" type="checkbox" />
					</th>
					<th>Filename</th>
					<th style="width: 6.5em">Size</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="3">
						
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($backups as $file => $atts) :?>
				<tr>
					<td class="column-check">
						<input type="checkbox" value="<?= $file ?>" name="checked[]" />
					</td>
					<td>
						<?= $file ?>
						<div class="row-actions">
							<a href="/admin/developer/database/get_backup/<?= $file ?>" title="Download this file">Download</a> | 
							<a href="/admin/developer/database/restore/<?= $file ?>" title="Restore this file">Restore</a>
						</div>
					</td>
					<td><?= round($atts['size'] / 1024 , 3) ?> KB</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
			
		<div class="alignright">
			Delete selected backup files &nbsp;&nbsp;
			<button type="submit" name="submit" class="button">Delete</button>
		</div>
		
		</form>
	
	<?php else : ?>
		<div class="notification attention">
			<p>No previous backups were found.</p>
		</div>
	<?php endif; ?>