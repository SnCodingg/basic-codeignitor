<table>
          <tr>
          <th>Name</th>
          <th>Email</th>
          </tr>
          <?php foreach($pagination as $data){ ?>
             <tr>
              <td><?= $data['name'] ?></td>
              <td><?= $data['email'] ?></td>
             </tr>
          <?php } ?>
      </table>
      <?php echo $pager->links(); ?>