<?php top('Список пользователей')

?>
<h1>Упраление пользователями</h1>
<?php

    $data_user = mysqli_query($CONNECT, "SELECT * FROM `users`");
    echo '
        <div class = "users-table">
        <table>
        <thead>
          <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">E-mail</th>
            <th rowspan="2">Удалить пользователя</th>
          </tr>
        </thead>
        <tbody>
          ';
    while ($row = mysqli_fetch_assoc($data_user)) {
        echo '
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['email'].'</td>
            <td class = "button-td"><button onclick="deleteUser('.$row['id'].')">Удалить</button></td>
            </tr>
          ';
    }
    echo '
    </tbody>
  </table>
  </div>';



?>
  <script>
  function deleteUser(id) {
      if (confirm("Вы действительно хотите удалить пользователя?")) {
          $.ajax({
              url: "delete_user",
              type: "POST",
              data: {id: id},
              success: function(response) {
                  location.reload();
              }
          });
      }
  }
  </script>
<?php bottom()?>