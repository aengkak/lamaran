				
                      <thead>
                        <tr>
						  <th>No</th>
                          <th>Username</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php $no = 1; foreach ($user as $u) :?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $u->username;?></td>
                          <td><button class="btn btn-warning fa fa-edit" onclick="edituser(<?php echo $u->id;?>)"></button>
							  <button class="btn btn-danger fa fa-close" onclick="deleteuser(<?php echo $u->id;?>)"> </button>
						  </td>
                        </tr>
                        <?php $no++; endforeach;?>
                      </tbody>