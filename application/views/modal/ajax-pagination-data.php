<?php if(!empty($posts)): foreach($posts as $post):
  $level = $post['level'];
  $sublevel = substr($level,1);
  if ($sublevel == NULL) {
    $l = "lamaran/".$post['jabatan_id'];
  } else {
    $l = "tingkat/".$post['jabatan_id']."/".$sublevel;
  }?>
  <li class="mini-timeline-highlight <?php if($post['cek'] == 0){?> mini-timeline-danger <?php } ?>">
     <div class="mini-timeline-panel">
      <h5 class="time"><?php echo $post['date'];?></h5>
      <a <?php if($post['cek'] == 0){?> onclick="notif(<?php echo $post['id_notif'];?>)" <?php } ?>
        href="<?php echo base_url().$l."/".$post['lamaran_id'];?>">
        <?php echo $post['username']." Mengomentari ".$post['nama']?>
      </a>
    </div>
  </li><br>
<?php endforeach; else: ?>
<p>Tidak Ada.</p>
<?php endif; ?><br>
<?php echo $this->ajax_pagination->create_links(); ?>
